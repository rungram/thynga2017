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
	$val=$_POST["val"];
	$type=$_POST["type"];
	$d->reset();
	if($type==1)
	$sql_like="update  #_binhluan set like_mem=like_mem+'$val' where id='$id'";
	else
	$sql_like="update  #_binhluan set like_adm=like_adm+'$val' where id='$id'";
	$d->query($sql_like);
	
	$d->reset();
	$sql_result ="select like_adm,like_mem from  #_binhluan  where id='$id'";
	$d->query($sql_result);
	$result =$d->fetch_array();
	if($type==1) echo $result['like_mem']; else echo $result['like_adm'];
?>


