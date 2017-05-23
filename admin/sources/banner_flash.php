<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	
	case "capnhat":
		get_banner();
		$template = "banner_flash/logo_add";
		break;
	case "save":
		save_banner();
		break;
	#====================================
	case "man_banner":
		get_banner_giua();
		$template = "banner_flash/banner_giua_add";
		break;
	case "save_banner_giua":
		save_banner_giua();
		break;
	
	case "man_phai":
		get_banner_phai();
		$template = "banner_flash/banner_phai_add";
		break;
	case "save_banner_phai":
		save_banner_phai();
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


function get_banner(){
	global $d, $item;

	$sql = "select * from #_banner_flash ";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner()
{
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_banner_flash";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf', _upload_banner,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('banner_flash');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_banner.$row['photo']);
		}
		$data['photo'] = $photo;
		//echo dump($id);
		$d->setTable('banner_flash');
		$d->setWhere('id', $id);
	
		if($d->update($data))
			redirect("index.php?com=banner_flash&act=capnhat");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=banner_flash&act=capnhat");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'swf', _upload_banner,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		
		$d->setTable('banner_flash');
		if($d->insert($data))
		redirect("index.php?com=banner_flash&act=capnhat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=banner_flash&act=capnhat");
	
}
}









?>