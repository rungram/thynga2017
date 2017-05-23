<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "tinloai3_2/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_tinloai3_2 limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tinloai3_2&act=capnhat");
		

	$data['noidung_vi'] = $_POST['noidung_vi'];
		$data['noidung_en'] = $_POST['noidung_en'];
			$data['noidung_cn'] = $_POST['noidung_cn'];
	$d->reset();
	$d->setTable('tinloai3_2');
	if($d->update($data))
		header("Location:index.php?com=tinloai3_2&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tinloai3_2&act=capnhat");
}

?>