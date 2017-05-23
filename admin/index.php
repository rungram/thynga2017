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
	
	switch($com){
		case 'order':
			$source = "donhang";
			break;
		case 'product':
			$source = "product";
			break;
		case 'product2':
			$source = "product2";
			break;
		case 'product3':
			$source = "product3";
			break;
		case 'hinh_cungsp':
			$source = "hinh_cungsp";
			break;
		case 'binhluan':
			$source = "binhluan";
			break;
		case 'dacdiem_noibat':
			$source = "dacdiem_noibat";
			break;
		case 'hinhanh_thucte':
			$source = "hinhanh_thucte";
			break;
		case 'tinloai1_1':
			$source = "tinloai1_1";
			break;
		case 'tinloai1_2':
			$source = "tinloai1_2";
			break;
		case 'tinloai1_3':
			$source = "tinloai1_3";
			break;
		case 'tinloai1_4':
			$source = "tinloai1_4";
			break;
		case 'tinloai2_1':
			$source = "tinloai2_1";
			break;
		case 'tinloai2_2':
			$source = "tinloai2_2";
			break;
		case 'tinloai2_3':
			$source = "tinloai2_3";
			break;
		case 'tinloai2_4':
			$source = "tinloai2_4";
			break;
		case 'tinloai2_5':
			$source = "tinloai2_5";
			break;
		case 'tinloai3_1':
			$source = "tinloai3_1";
			break;
		case 'tinloai3_2':
			$source = "tinloai3_2";
			break;
		case 'tinloai3_3':
			$source = "tinloai3_3";
			break;
		case 'fax_dtban':
			$source = "fax_dtban";
			break;
		case 'phongkd':
			$source = "phongkd";
			break;
		case 'lkweb':
			$source = "lkweb";
			break;
		case 'nhung_face':
			$source = "nhung_face";
			break;
		case 'qlgiohang':
			$source = "qlgiohang";
			break;
		case 'qlkhachhang':
			$source = "qlkhachhang";
			break;
		case 'user':
			$source = "user";
			break;		
		case 'video':
			$source = "video";
			break;
		case 'download':
			$source = "download";
			break;				
		case 'about':
			$source = "about";
			break;
		case 'slideshow':
			$source = "slideshow";
			break;
		case 'thuvienanh':
			$source = "thuvienanh";
			break;
		case 'thuvienanhcapcha':
		    $source = "thuvienanhcapcha";
		    break;
		case 'chayhinh_quangcao':
			$source = "chayhinh_quangcao";
			break;	
		case 'chayhinh_doitac':
			$source = "chayhinh_doitac";
			break;		
		case 'footer':
			$source = "footer";
			break;		
		case 'title':
			$source = "title";
			break;					
		case 'setting':
			$source = "setting";
			break;		
		case 'quangcao':
			$source = "quangcao";
			break;						
		case 'yahoo':
			$source = "yahoo";
			break;					
		case 'lienhe':
			$source = "lienhe";
			break;
		case 'faq':
			$source = "faq";
			break;	
		case 'banner':
			$source = "banner";
			break;
		case 'banner_flash':
			$source = "banner_flash";
			break;
		case 'download':
			$source = "download";
			break;		
		default: 
			$source = "";
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		redirect("index.php?com=user&act=login");
	}
	
	if($source!="") include _source.$source.".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Administration</title>
<link href="media/css/style.css" rel="stylesheet" type="text/css" />
<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<!-- /TinyMCE -->
 <script src="../js/jquery.js"></script>
</head>

<body>

<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?>  
<div id="wrapper">
	<?php include _template."header_tpl.php"?>
    
    <div id="main"> 
		 
        <!-- Right col -->
        <div id="contentwrapper">
        <div id="content">
          <?php include _template.$template."_tpl.php"?>
        </div>
        </div>
        <!-- End right col -->
        
        <!-- Left col -->
        <div id="leftcol">
          <div class="innertube">
           <?php include _template."menu_tpl.php";?>
          </div>
        </div>
        <!-- End Left col -->
		
			<div class="clr"></div>
    </div>
  <div id="footer">
		<?php include _template."footer_tpl.php"?>
	</div>
</div>
<?php }else{?>   
				<?php include _template.$template."_tpl.php"?>
		<?php }?>
</body>
</html>
