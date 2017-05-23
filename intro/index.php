<?php
	session_start();
	$session=session_id();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './quanly/lib/');
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
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>

.intro{
	width:100%;
	height:650px;
	background:url(images/intro.png);
	
}

.banner_intro{
	width:666px;
	height:118px;
	background:url(images/banner_intro.png);
	margin:auto;
}

.vung_dangnhap{
	width:685px;
	height:320px;
	margin:auto;
	font-size:30px;
	font-weight:bold;
	color:#fff;
}

.form_dn{
	width:475px;
	height:165px;
	margin-top:100px;
	margin-left:130px;
}
.form_dn ul li{
	list-style-type:none;
	height:45px;
}
.form_dn ul li input{
	float:right;
	width:240px;
	height:37px;
	
	
}
.btn{
	background:url(images/bg_dn.png);
	width:146px;
	height:44px;
	border:none;
	margin-left:240px;
}
.dt_intro{
	width:650px;
	height:80px;
	margin:auto;
	background:url(images/dt_intro.png) left no-repeat;
	background-position:220px 20px;
	color:#fff600;
	font-size:30px;
	text-align:right;
	line-height:85px;
}
.dt_intro b{
	margin-top:30px;
}
</style>

<div class="intro">
	<div class="banner_intro"></div>
	<div class="vung_dangnhap">
    	<div class="form_dn">
    <form action="" method="post" class="nhaplieu" id="login">
    <ul>
    <li><strong>Tên đăng nhập</strong><input type="text" name="username" class="input" /></li>
    <li><strong>Mật khẩu</strong><input type="password" name="password" class="input" /></li>
    <input type="submit" value="" class="btn" />
    </form>
    	</div>
    </div>
    
    <div class="dt_intro">
    	<b>0905707302</b>
    </div>
	<div class="clear"></div>

</div>


<?php

	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "select * from #_user where username='".$username."'";
	$d->query($sql);
	if($d->num_rows() == 1){
		$row = $d->fetch_array();
		if(($row['password'] == md5($password)) && ($row['role'] == 3)){
			$_SESSION[$login_name] = true;
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['login']['username'] = $username;
			transfer("Đăng nhập thành công","index.php");
		}
	}
	transfer("Tên đăng nhập, mật khẩu không chính xác", "intro.php");










?>