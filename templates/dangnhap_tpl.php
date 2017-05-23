
<style>
.box_mid {
    width: 100%;
    margin-bottom: 30px;
}
.box_mid .mid-title {
    border-bottom: 1px solid #e5e5e5;
}
.box_mid .mid-title {
    width: auto;
    position: relative;
    margin-bottom: 20px;
}
.box_mid .mid-title .titleL {
    font-size: 35px;
    line-height: 45px;
    color: #333333;
    margin-bottom: 10px;
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 400;
   text-align:center;
}
.box_mid .mid-title .titleL h1 {
    font-size:25px;
    color: #333333;
    line-height: 45px;
    font-weight: normal;
    margin-bottom: 5px;
}
.box_mid .mid-title .titleL .small {
    color: #333333;
}

.box_mid .mid-title .titleL .color, .box_mid .mid-title .titleL .color a {
    color: #105ca7;
}
.box_mid .mid-content {
    margin-bottom: 20px;
    min-height: 200px;
}
.vnt_login .login-social {
    width: 280px;
    float: left;
}
.vnt_login .Ltitle {
    font-size: 20px;
    line-height: 30px;
    margin-bottom: 15px;
    color: #666666;
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 400;
}
.Lsocial {
    width: 100%;
    padding-right: 80px;
    position: relative;
}
.vnt_login .login-form {
    width: 870px;
    float: right;
}
.vnt_login .Ltitle {
    font-size: 20px;
    line-height: 30px;
    margin-bottom: 15px;
    color: #666666;
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 400;
}
.formMember .row_input {
    margin-bottom: 10px;
}
.remember {
    margin-bottom: 10px;
    padding-left: 150px;
}
.form_button {
    margin-bottom: 10px;
    padding-left: 150px;
}
.remember{
	margin-bottom: 10px;
	padding-left: 150px;
}
.remember ul{
	position: relative;
}
.remember ul:after{
	content:"";
	clear: both;
	display: block;
}
.remember ul li{
	float: left;
	padding: 0px 8px;
	position: relative;
}
.remember ul li:first-child{
	padding: 0px 8px 0px 0px;
}
.remember ul li input[type=checkbox]{
	margin-right: 5px;
}
.remember ul li a{
	color: #333333;
}
.remember ul li a:hover{
	text-decoration: underline;
}
.remember ul li ~ li:before{
	position: absolute;
	content:"|";
	left: 0px;
	top: 0px;
}
.form_button {
    margin-bottom: 10px;
    padding-left: 150px;
}
.form_button ul li:first-child {
    padding: 0px 8px 0px 0px;
}
.form_button ul li {
    float: left;
    padding: 0px 8px;
    position: relative;
}
.form_button button.btn {
    height: auto;
    font-size: 16px;
    line-height: 24px;
    padding: 7px 20px;
    background: #f58320;
    color: #ffffff;
    text-transform: uppercase;
    border: 0px;
    outline: 0px;
    position: relative;
    overflow: hidden;
    z-index: 1;
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 700;
}
.formMember .row_input .form-control {
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    -ms-border-radius: 0px;
    border-radius: 0px;
    box-shadow: inset 1px 2px 3px rgba(0,0,0,0.1);
    display: inline-block;
    width: 420px;
}
.formMember .row_input label {
    font-weight: normal;
    color: #2d2d2d;
    width: 150px;
    padding-right: 10px;
    display: inline-block;
}
</style>

<script type="text/javascript">
function CheckSignup2()
	{				
	var s2=document.formdangnhap;			
		
		
		
		if(s2.user_dn.value=='')
		{
			document.getElementById("userdn_error").style.display= "block";
			document.getElementById("userdn_error").innerHTML="Bạn chưa nhập user!";
			s2.user_dn.focus();
			return false;	
		}
		else
			document.getElementById("userdn_error").style.display = "none";
			
		if(s2.pass.value=='')
		{
			document.getElementById("passdn_error").style.display= "block";
			document.getElementById("passdn_error").innerHTML="Bạn chưa nhập mật khẩu!";
			s2.pass.focus();
			return false;	
		}
		else
			document.getElementById("passdn_error").style.display = "none";
	
	}
	
	
</script>

<?php
if(isset($_POST["user_dn"])&&isset($_POST["pass"]))
{
	$user_dn = $_POST["user_dn"];
	$pass = $_POST["pass"];
	$d->reset();
	$lenhdangnhap = "select * from #_khachhang where user='$user_dn' and matkhau='$pass'";
	$kqdangnhap=$d->query($lenhdangnhap);
	$result_dangnhap =$d->result_array();	
	$n=count($result_dangnhap);
	
			if($n > 0)
				{
					$_SESSION["user_dn"]=$user_dn;
	
					transfer("Đăng nhập thành công", "index.html");
				}
				else
				transfer("Username hoặc mật khẩu không đúng - vui lòng thử lại", "dang-nhap.html");
		
}

?>
<div class="container-fluid">
<div class="box_mid" style="margin-top:150px;">
  <div class="mid-title">
    <div class="titleL"><h1>Đăng Nhập <span class="small">hoặc</span> <span class="color"><a href="dang-ky.html">Đăng ký thành viên</a></span></h1></div>
    <div class="titleR"></div>
    <div class="clear"></div>
  </div>
  <div class="mid-content">
    


<div id="Member" class="Member">
	
	




	<div class="vnt_login">
		
		<div class="login-form">
			<div class="Ltitle">Đăng nhập bằng tài khoản web</div>
			
			<div class="formMember">
				<form id="formdangnhap" name="formdangnhap" method="post" action="" onSubmit="return CheckSignup2()">
					<input type="hidden" name="do_login" value="1">
					<input type="hidden" name="ref" id="ref" value="http://zenland.vn/">

					<div class="row_input">
						<label for="username">Tên đăng nhập<br>(viết liền không dấu) <span>*</span></label>
						<input type="text" name="user_dn" id="user_dn" class="form-control required">
                         <span class="error" id="userdn_error" style="color='#FF0000'"></span>
					</div>
					<div class="row_input">
						<label for="password">Mật khẩu <span>*</span></label>
						<input type="password" name="pass" id="pass" class="form-control required">
                         <span class="error" id="passdn_error" style="color='#FF0000'"></span>
					</div>
					<div class="remember">
						<ul>
							<li><input type="checkbox" name="check_remember" id="check_remember"><span>Ghi nhớ</span></li>
							<li><a href="quen-mat-khau.html" class="forget_pass" title="Bạn quên mật khẩu?" target="_top">Bạn quên mật khẩu?</a></li>
						</ul>
					</div>
					<div class="form_button">
						<ul>
							<li><button id="dnhap" name="dnhap" type="submit" class="btn" value="Đăng nhập"><span>Đăng nhập</span></button></li>
							<li><a href="dang-ky.html">Bạn chưa có tài khoản?</a></li>
						</ul>
					</div>
				</form>
			</div>
		</div>
		<div class="clear"></div>
	</div>




</div>
 

  </div>          
</div>

</div>