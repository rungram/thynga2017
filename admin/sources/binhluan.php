<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "binhluan/photos";
		break;
	case "add_photo":
		get_photos2();		
		$template = "binhluan/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "binhluan/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
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

function get_photos(){
	global $d, $items, $paging,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	
	$d->reset();
	$sql_bl="select * from #_binhluan where id_sp='$id_sp' and id_parent=0 order by id desc ";
	$d->query($sql_bl);

	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=binhluan&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photos2(){
	global $d, $items, $paging,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	$d->setTable('binhluan');
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=binhluan&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
	$d->setTable('binhluan');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
	$item = $d->fetch_array();	
}

function save_photo(){
	global $d,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=binhluan&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_binhluan,$file_name)){
				$data['photo']  = $photo;
				$data['thumb']  = create_thumb($data['photo'],95,90, _upload_binhluan,$file_name,2);	
				$data['thumb2'] = create_thumb($data['photo'],480,480, _upload_binhluan,$file_name,2);	
				$d->setTable('binhluan');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_binhluan.$row['photo']);
					delete_file(_upload_binhluan.$row['thumb']);
				}
			}
			
			
			$data['traloi'] = $_POST['traloi'];		
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$d->reset();
			$d->setTable('binhluan');
			$d->setWhere('id', $id);
			$check_up = $d->update($data);
			
			//luu danh sách binh luan them truoc
			
				$d->reset();
				$sql_bl="select * from #_binhluan where id_parent='".$id."' order by id desc ";
				$d->query($sql_bl);
				$result_bl=$d->result_array();
				if(count($result_bl)>=1)
				for($k=0,$count_bl=count($result_bl);$k<$count_bl;$k++) 
				{
					$ht = isset($_POST['hienthi_'.$k]) ? 1 : 0; 
					$tl = $_POST['traloi_'.$k];
					$id = $_POST['id_'.$k];
					$sql_up="update #_binhluan set hienthi='$ht',traloi = '$tl' where id='$id'";
					$d->query($sql_up);
				}
			
			//luu danh sách binh luan them truoc
			
			
			if(!$check_up) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
			redirect("index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
			
	}
	
	
	{ 			for($i=1; $i<=5; $i++){
				if($data['photo'] = upload_image("file".$i, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_binhluan,$file_name.$i))
					{						
						$data['thumb'] = create_thumb($data['photo'], 95,90, _upload_binhluan,$file_name.$i,2);		
						$data['thumb2'] = create_thumb($data['photo'],480,480, _upload_binhluan,$file_name,2);	
						$data['stt'] = $_POST['stt'.$i];	
						$data['id_sp'] = $id_sp;	
						$data['chon_mau'] = $_POST['chon_mau'];								
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;																	
						$d->setTable('binhluan');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
					}
			}

			redirect("index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
	}
}

function delete_photo(){
	global $d,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('binhluan');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
		$row = $d->fetch_array();
		delete_file(_upload_binhluan.$row['photo']);
		delete_file(_upload_binhluan.$row['thumb']);
		if($d->delete())
			redirect("index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
	}else transfer("Không nhận được dữ liệu", "index.php?com=binhluan&act=man_photo&id_sp=$id_sp");
}

#====================================



?>

	
