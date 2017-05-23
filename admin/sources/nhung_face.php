<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "nhung_face/items";
		break;
	case "add":
		$template = "nhung_face/item_add";
		break;
	case "edit":
		get_item();
		$template = "nhung_face/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
		
	default:
		$template = "index";
}


function get_items(){
	global $d, $items, $paging;
	
	$sql = "select * from #_nhung_face ";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=nhung_face&act=man";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=nhung_face&act=man");
	
	$sql = "select * from #_nhung_face where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=nhung_face&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=nhung_face&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		$id =  themdau($_POST['id']);
		$data['facebook'] = $_POST['facebook'];
		$data['zingme'] = $_POST['zingme'];
		$data['google'] = $_POST['google'];
		$data['twinter'] = $_POST['twinter'];
		$data['youtube'] = $_POST['youtube'];
		
		
		
		$d->setTable('nhung_face');
		$d->setWhere('id', $id);
		if($d->update($data))
			header("Location:index.php?com=nhung_face&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nhung_face&act=man");
	}else{ // them moi
		$data['facebook'] = $_POST['facebook'];
		$data['zingme'] = $_POST['zingme'];
		$data['google'] = $_POST['google'];
		$data['twinter'] = $_POST['twinter'];
		$data['youtube'] = $_POST['youtube'];
	
		
		$d->setTable('nhung_face');
		if($d->insert($data))
			header("Location:index.php?com=nhung_face&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=nhung_face&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		
		// xoa item
		$sql = "delete from #_nhung_face where id='".$id."'";
		if($d->query($sql))
			header("Location:index.php?com=nhung_face&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=nhung_face&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=nhung_face&act=man");
}
#--------------------------------------------------------------------------------------------- photo

?>

	
