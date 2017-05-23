<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
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
	//include_once _source."counter.php";
	//include_once _source."useronline.php";	
	
	
	$id=$_POST["id"];
	$id_parent= isset($_POST["id_parent"])? $_POST["id_parent"] : 0;
	$hoten=$_POST["hoten"];
	$email=$_POST["email"];
	$noidung=$_POST["noidung"];
	$ngaytao=date('Y-m-d H:i:s');
	$d->reset();
	$lenhgui="insert into 
	#_binhluan(id_sp,id_parent,hoten,email,ngaytao,noidung)values('$id','$id_parent','$hoten','$email','$ngaytao','$noidung')";
	$kqgui=$d->query($lenhgui);
	if($kqgui) echo 1;else echo 0;
?>


