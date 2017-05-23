<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "download/items";
		break;
	case "add":
		$template = "download/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "download/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
	
	case "man_cat":
		get_cats();
		$template = "download/cats";
		break;
	case "add_cat":		
		$template = "download/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "download/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	
	case "man_list":
		get_lists();
		$template = "download/lists";
		break;
	case "add_list":		
		$template = "download/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "download/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
	default:
		$template = "index";	
	
		
}

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_cats()
{
	
	global $d, $items, $paging;
	$sql = "select * from #_download_cat";
	$d->query($sql);
	$items = $d->result_array();
}
function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
	
	$sql = "select * from #_download_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat");
	$item = $d->fetch_array();
}
function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=download&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_download,$file_name)){
		$data['photo'] = $photo;	
		$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_download,$file_name,1);		
		}		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['id_list'] = $_POST['id_list'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		
		$d->setTable('download_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=download&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=download&act=man_cat");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_download,$file_name)){
		$data['photo'] = $photo;	
		$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_download,$file_name,1);		
		}	
		$data['id_list'] = $_POST['id_list'];
			$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('download_cat');
		if($d->insert($data))
			redirect("index.php?com=download&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=download&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "select * from #_download_cat where id='".$id."'";
			$d->query($sql);
			$row = $d->fetch_array();
			delete_file(_upload_download.$row['photo']);	
			delete_file(_upload_download.$row['thumb']);	
			$sql2 = "delete from #_download_cat where id='".$id."'";
			$d->query($sql2);
		
		if($d->query($sql))
			redirect("index.php?com=download&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=download&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=download&act=man_cat");
}

function get_items(){
	global $d, $items, $paging;
		
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_download where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_download SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_download SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_download ";
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where  	idlt=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=download&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=download&act=man");
	
	$sql = "select * from #_download where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=download&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=$_FILES['file']['name'];
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=download&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'pdf|doc|docx|rar|zip',_upload_download,$file_name)){
			$data['file'] = $photo;	
					
			$d->setTable('download');
			$d->setWhere('id', $id);
			$d->select();
			
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_download.$row['file']);	
								
			}
		}		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['linkmd'] = $_POST['linkmd'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['mota'] = $_POST['mota'];		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		
		$d->setTable('download');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=download&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=download&act=man");
	}else{
		
		if($photo = upload_image("file", 'pdf|doc|docx|rar|zip',_upload_download,$file_name)){
			$data['file'] = $photo;			
		}		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['linkmd'] = $_POST['linkmd'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['mota'] = $_POST['mota'];		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] =date("Y-m-d");
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];

		$d->setTable('download');
		if($d->insert($data))
			redirect("index.php?com=download&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=download&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_download where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_download.$row['file']);			
			}
			$sql = "delete from #_download where id='".$id."'";
			$d->query($sql);
			
		}
		
		if($d->query($sql))
			redirect("index.php?com=download&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=download&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=download&act=man");
}


function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_download_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_download_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_download_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_download_list";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=download&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=download&act=man_list");	
	$sql = "select * from #_download_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=download&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=download&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG', _upload_download,$file_name)){
		$data['photo'] = $photo;	
		$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_download,$file_name,1);		
		}
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('download_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=download&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=download&act=man_list");
	}else{	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG', _upload_download,$file_name)){
		$data['photo'] = $photo;	
		$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_download,$file_name,1);	
		}
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('download_list');
		if($d->insert($data))
			redirect("index.php?com=download&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=download&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "select * from #_download_list where id='".$id."'";
			$d->query($sql);
			$row = $d->fetch_array();
			delete_file(_upload_download.$row['photo']);	
			delete_file(_upload_download.$row['thumb']);	
			$sql2 = "delete from #_download_list where id='".$id."'";
			$d->query($sql2);
		
		if($d->query($sql))
			redirect("index.php?com=download&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=download&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=download&act=man_list");
}
?>
