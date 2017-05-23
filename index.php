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
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";
	include_once _source."useronline.php";	
	
	
	include_once _lib."functions_giohang.php";
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		
	$pid=$_REQUEST['productid'];	
	$_SESSION['size'.$pid]=$_REQUEST['spsize'];	
	$_SESSION['mau'.$pid]=$_REQUEST['spmau'];	
	$q=isset($_GET['quality']) ? (int)$_GET['quality'] : "1";
	addtocart($pid,$q);
	redirect("http://$config_url/gio-hang.html");
	}
?>
<!doctype html>
<html lang="en">
<base href="http://<?=$config_url?>/"  />
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/superfish.css"/>
    <link rel="stylesheet" href="css/megafish.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/slicknav.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <script data-main="js/app.js" src="js/require.js"></script>
    <title>Thy Nga</title>
    <script language="javascript" type="text/javascript">
	function addtocart(pid){
		
		document.formtruong.productid.value=pid;
		document.formtruong.command.value='add';
		document.formtruong.submit();
	}

	</script>


    <form name="formtruong" action="index.php">
        <input type="hidden" name="productid" />
        <input type="hidden" name="command" />
    </form>
</head>
 

<body>
<div class="thy-container">
    <div class="shadow-1">
    <?php include _template."layout/header.php"; ?>
    <?php include _template.$template."_tpl.php"; ?> 
    </div>
</div>
    <?php include _template."layout/footer.php"; ?>
  
</body>
</html>