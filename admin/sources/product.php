<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urlsanpham ="";
$urlsanpham.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urlsanpham.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urlsanpham.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "product/items";
		break;
	case "add":		
		$template = "product/item_add";
		break;
	case "edit":		
		get_item();
		$template = "product/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_item":
		get_loais();
		$template = "product/loais";
		break;
	case "add_item":		
		$template = "product/loai_add";
		break;
	case "edit_item":		
		get_loai();
		$template = "product/loai_add";
		break;
	case "save_item":
		save_loai();
		break;
	case "delete_item":
		delete_loai();
		break;
		
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "product/cats";
		break;
	case "add_cat":		
		$template = "product/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "product/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#===================================================	
	
	
	
	case "copy":
		copy_sp();
		break;
	#===================================================	
	
	case "man_list":
		get_lists();
		$template = "product/lists";
		break;
	case "add_list":		
		$template = "product/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "product/list_add";
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

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging,$urlsanpham;
	
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['tc']!='')
	{
		$id_up = $_REQUEST['id'];
		$id_tc = $_REQUEST['tc'];
		$sql_sp = "UPDATE table_product SET tc_big ='".$id_tc."' WHERE  id = ".$id_up."";
		$d->query($sql_sp);
	}
	#----------------------------------------------------------------------------------------
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spdc']!='')
	{
	$id_up = $_REQUEST['spdc'];
	$spdc=time();
	$sql_sp = "SELECT id,spdc FROM table_product where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['spdc'];
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spdc ='".$spdc."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spdc =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spmoi']!='')
	{
	$id_up = $_REQUEST['spmoi'];
	$sql_sp = "SELECT id,spmoi FROM table_product where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$spmoi=$cats[0]['spmoi'];
	if($spmoi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spmoi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spmoi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_product";	
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where  	id_list=".$_REQUEST['id_list']."";
	}
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and	id_cat=".$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and	id_item=".$_REQUEST['id_item']."";
	}
	
	if($_REQUEST['keyword']!='')
	{
	$keyword=addslashes($_REQUEST['keyword']);
	$sql.=" where ten_vi LIKE '%$keyword%'";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man".$urlsanpham;
	$maxR=50;
	$maxP=50;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");	
	$sql = "select * from #_product where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'],180,190, _upload_sanpham,$file_name,2);		
			$data['thumb2'] = create_thumb($data['photo'],480,480, _upload_sanpham,$file_name,2);		
			$data['thumb_tc'] = create_thumb($data['photo'],400,290, _upload_sanpham,$file_name,2);	
			$d->setTable('product');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				if($row['check_copy']==0)
				{
					
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);		
				delete_file(_upload_sanpham.$row['thumb2']);	
				delete_file(_upload_sanpham.$row['thumb_tc']);	
				}
			}
		}
		$data['id_mau'] = (int)$_POST['id_mau'];	
		$data['video_hinh'] = $_POST['video_hinh'];		 	
		$data['id_list'] = (int)$_POST['id_list'];			
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['id_catcat'] = (int)$_POST['id_catcat'];		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['soluong'] = $_POST['soluong'];
		$data['baohanh'] = $_POST['baohanh'];
		$data['trinhtrang'] = $_POST['trinhtrang'];
		$data['xuatxu'] = $_POST['xuatxu'];
		$data['vanchuyen'] = $_POST['vanchuyen'];
		$data['masp'] = $_POST['masp'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['gia'] = (int)$_POST['gia'];		
		$data['giagiam'] = (int)$_POST['giagiam'];				
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['mota_cn'] = $_POST['mota_cn'];		
		$data['thongso'] = $_POST['thongso'];		
		$data['noidung_vi'] = $_POST['noidung_vi'];			
		$data['noidung_en'] = $_POST['noidung_en'];	
		$data['noidung_cn'] = $_POST['noidung_cn'];									
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['ngaytao'] = lay_thoigian();			
		$d->setTable('product');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'],180, 190, _upload_sanpham,$file_name,2);		
			$data['thumb2'] = create_thumb($data['photo'],480, 480, _upload_sanpham,$file_name,2);	
			$data['thumb_tc'] = create_thumb($data['photo'],400, 290, _upload_sanpham,$file_name,2);	
		}		
		$data['id_mau'] = (int)$_POST['id_mau'];		
		$data['id_list'] = (int)$_POST['id_list'];			
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];	
		$data['id_catcat'] = (int)$_POST['id_catcat'];			
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['soluong'] = $_POST['soluong'];
		$data['baohanh'] = $_POST['baohanh'];
		$data['trinhtrang'] = $_POST['trinhtrang'];
		$data['xuatxu'] = $_POST['xuatxu'];
		$data['vanchuyen'] = $_POST['vanchuyen'];
		$data['masp'] = $_POST['masp'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['video_hinh'] = $_POST['video_hinh'];	
		$data['gia'] = (int)$_POST['gia'];	
		$data['giagiam'] = (int)$_POST['giagiam'];					
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['mota_cn'] = $_POST['mota_cn'];		
		$data['thongso'] = $_POST['thongso'];		
		$data['noidung_vi'] = $_POST['noidung_vi'];			
		$data['noidung_en'] = $_POST['noidung_en'];	
		$data['noidung_cn'] = $_POST['noidung_cn'];	
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = lay_thoigian();	
		
		$d->setTable('product');
		$d->insert($data);
		$id_newest = $d->insert_id;
		
		/*begin xu ly phan hinh anh lien quan va mau-------------------------------------------------
		
		$file_hinhmau  		 = upload_mutil_file('file_hinhmau',_upload_dacdiem_sp);
		$chon_mau  		 	 = $_POST['chon_mau'];
		$count_hinhmau 		 = count($file_hinhmau);	
			
		for($k=0;$k<$count_hinhmau;$k++){
			$data_hinhmau['photo']    = $file_hinhmau[$k];
			$data_hinhmau['thumb']    = create_thumb($file_hinhmau[$k],70,70,_upload_dacdiem_sp,$file_name.$k,2);
			$data_hinhmau['thumb2']   = create_thumb($file_hinhmau[$k],480,480,_upload_dacdiem_sp,$file_name.$k,2);	
			$data_hinhmau['chon_mau'] = $chon_mau[$k];
			$data_hinhmau['id_sp']    = $id_newest;
			$d->reset();
			$d->setTable('hinh_cungsp');
			$d->insert($data_hinhmau);
		}
		//end xu ly phan hinh anh lien quan va mau-------------------------------------------------
		
		
		//begin xu ly phan dac diem-------------------------------------------------
		
		$ten_dacdiem    	 = $_POST['ten_dacdiem'];
		$mota_dacdiem  		 = $_POST['mota_dacdiem'];
		$count_dd 			 = count($ten_dacdiem);		
		$file_dacdiem  		 = upload_mutil_file('file_dacdiem',_upload_dacdiem_sp);
		
		for($i=0;$i<$count_dd;$i++){
			
			$data_dd['ten_vi']   = $ten_dacdiem[$i];
			$data_dd['mota_vi']  = $mota_dacdiem[$i];
			$data_dd['photo']    = $file_dacdiem[$i];
			$data_dd['thumb']    = create_thumb($file_dacdiem[$i],480,270,_upload_dacdiem_sp,$file_name.$i,2);	
			$data_dd['id_sp']    = $id_newest;
			$d->setTable('lkweb');
			$d->insert($data_dd);
		}
		//end xu ly phan dac diem---------------------------------------------------
		
		//begin xu ly phan hinh anh thuc te-------------------------------------------------
		
		
		$file_hinh  		 	   = upload_mutil_file('file_hinh',_upload_dacdiem_sp);
		$count_hinh 			   = count($file_hinh);		
		for($j=0;$j<$count_hinh;$j++){
			$data_hinh['photo']    = $file_hinh[$j];
			$data_hinh['thumb']    = create_thumb($file_hinh[$j],75,50,_upload_dacdiem_sp,$file_name.$j,2);	
			$data_hinh['id_sp']    = $id_newest;
			$d->setTable('video');
			$d->insert($data_hinh);
		}
		//end xu ly phan hinh anh thuc te-------------------------------------------------*/
		
		
		
		
		if($id_newest)
		{			
			redirect("index.php?com=product&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,thumb,thumb2,check_copy,photo from #_product where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array())
			{
				if($row['check_copy']==0)
				{	
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
					delete_file(_upload_sanpham.$row['thumb2']);
					delete_file(_upload_sanpham.$row['thumb_tc']);
				}
			}
		
		$sql = "delete from #_product where id='".$id."'";
		$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
}

#====================================
function get_cats(){
	global $d, $items, $paging;
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spmoi']!='')
	{
	$id_up = $_REQUEST['spmoi'];
	$sql_sp = "SELECT id,spmoi FROM table_product_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$spmoi=$cats[0]['spmoi'];
	if($spmoi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET spmoi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET spmoi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	
	$sql = "select * from #_product_cat";
		
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where id_list=".$_REQUEST['id_list']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
	
	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 226, 110, _upload_sanpham,$file_name,2);		
			$d->setTable('product_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}						
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['id_list'] = $_POST['id_list'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
			$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}else{	
	
	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 226, 110, _upload_sanpham,$file_name,2);		
		}			
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
			$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		$d->setTable('product_cat');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_cat where id='".$id."'";
			$d->query($sql);
		if($d->num_rows()>0)
		{
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);			
			}
		}
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
}
/*---------------------------------*/
function get_loais(){
	global $d, $items, $paging;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_item where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_item";
		
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where id_list=".$_REQUEST['id_list']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_item";
	$maxR=50;
	$maxP=50;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_loai(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item");
	
	$sql = "select * from #_product_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_item");
	$item = $d->fetch_array();
}

function save_loai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 226, 110, _upload_sanpham,$file_name,2);		
			$d->setTable('product_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}			
				
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat']= $_POST['id_cat'];	
		$data['id_catcat'] = $_POST['id_catcat'];		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_item&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_item");
	}else{	
	
	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 226, 110, _upload_sanpham,$file_name,2);		
		}			
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat']= $_POST['id_cat'];	
		$data['id_catcat'] = $_POST['id_catcat'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_item');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_item");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_item");
	}
}

function delete_loai(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_item where id='".$id."'";
			$d->query($sql);
		if($d->num_rows()>0)
		{
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);			
			}
		}
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_item");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item");
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_list where id='".$id_up."'";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_list";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_list";
	$maxR=50;
	$maxP=50;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");	
	$sql = "select * from #_product_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 226, 110, _upload_sanpham,$file_name,2);		
			$d->setTable('product_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}							
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list");
	}else{	
	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 226, 110, _upload_sanpham,$file_name,2);		
		}					
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		$d->setTable('product_list');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_list where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");
}

function copy_sp()

{
	global $d;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	$d->reset();	
	
	$sql = "
			update table_product set check_copy =1
			where id='".$id."'";
	$d->query($sql);
				
	$sql = "
			insert into table_product(id_list,id_item,id_cat,thumb,thumb2,photo,spdc,masp,ten_vi,noidung_vi,gia,spmoi,hienthi,check_copy)
			select id_list,id_item,id_cat,thumb,thumb2,photo,spdc,masp,ten_vi,noidung_vi,gia,spmoi,hienthi,1
			from table_product 
			where id='".$id."'";
	if($d->query($sql))
			redirect("index.php?com=product&act=man");
	else
			transfer("Copy dữ liệu bị lỗi", "index.php?com=product&act=man");
	
	
}
?>