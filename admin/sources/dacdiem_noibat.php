<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "dacdiem_noibat/photos";
		break;
	case "add_photo":
		get_photos2();		
		$template = "dacdiem_noibat/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "dacdiem_noibat/photo_edit";
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
	$d->setTable('dacdiem_noibat');
	$d->setOrder('stt,id desc');
	$d->setWhere('id_sp', $id_sp);
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dacdiem_noibat&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photos2(){
	global $d, $items, $paging,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	$d->setTable('dacdiem_noibat');
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dacdiem_noibat&act=man_photo";
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
	transfer("Không nhận được dữ liệu", "index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
	$d->setTable('dacdiem_noibat');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
	$item = $d->fetch_array();	
}

function save_photo(){
	global $d,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=dacdiem_noibat&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_dacdiem_noibat,$file_name)){
				$data['photo']  = $photo;
				$data['thumb']  = create_thumb($data['photo'],470,285, _upload_dacdiem_noibat,$file_name,2);	
				
				$d->setTable('dacdiem_noibat');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_dacdiem_noibat.$row['photo']);
					delete_file(_upload_dacdiem_noibat.$row['thumb']);
				}
			}
			$data['id_sp'] = $id_sp;	
			$data['ten_vi'] = $_POST['ten_vi'];	
			$data['mota_vi'] = $_POST['mota_vi'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$d->reset();
			$d->setTable('dacdiem_noibat');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
			redirect("index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
			
	}
	
	
	{ 			for($i=1; $i<=5; $i++){
				if($data['photo'] = upload_image("file".$i, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_dacdiem_noibat,$file_name.$i))
					{						
						$data['thumb'] = create_thumb($data['photo'], 470,285, _upload_dacdiem_noibat,$file_name.$i,2);		
						
						$data['stt'] = $_POST['stt'.$i];	
						$data['id_sp'] = $id_sp;	
						$data['ten_vi'] = $_POST['ten_vi'.$i];	
						$data['mota_vi'] = $_POST['mota_vi'.$i];								
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;																	
						$d->setTable('dacdiem_noibat');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
					}
			}

			redirect("index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
	}
}

function delete_photo(){
	global $d,$id_sp;
	$id_sp=$_REQUEST['id_sp'];
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('dacdiem_noibat');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
		$row = $d->fetch_array();
		delete_file(_upload_dacdiem_noibat.$row['photo']);
		delete_file(_upload_dacdiem_noibat.$row['thumb']);
		if($d->delete())
			redirect("index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
	}else transfer("Không nhận được dữ liệu", "index.php?com=dacdiem_noibat&act=man_photo&id_sp=$id_sp");
}

#====================================



?>

	
