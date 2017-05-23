<?php
 error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); //bo thonng bao khi cac file chua dinh nghia
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$login_name = 'Gaconlonton';
	
	$d = new database($config['database']);
	
	$id=$_POST["id"];
	$status=$_POST["status"];
	$d->reset();
	$lenhgui="update  table_order SET trangthai='$status' WHERE id='$id'  ";
	//echo $lenhgui;
	//die;
	$kqgui=$d->query($lenhgui);
	if($kqgui) echo 1;else echo 0;
?>