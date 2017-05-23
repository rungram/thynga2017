<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); //bo thonng bao khi cac file chua dinh nghia
	session_start();
	$session=session_id();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	@define ( _upload_folder , './media/upload/' );

    if(!isset($_SESSION['lang2']))
	{
		$_SESSION['lang2']='vi';
	}
	
	$lang=$_SESSION['lang2'];	//Lấy ngỗn ngữ
	require_once _source."lang_$lang.php";	//Lấy các Hằng.

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";
	include_once _source."useronline.php";	
	
	
	
	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	
	$sql =  "select id_order  from #_order where id='".$id."'";
	$d->query($sql);
	$result =$d->fetch_array();	
	
	//delete bang don hang
	$id_order = $result['id_order'];
	$sql_dh = "delete from #_donhang where id_order='".$id_order."'";
	$d->query($sql_dh);
	
	$d->reset();
	$sql_delete = "delete from #_order where id='".$id."'";
	if($d->query($sql_delete))
	echo json_encode(1);
	else
	echo json_encode(0);
?>


