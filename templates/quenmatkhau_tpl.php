
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
    font-size:13px;
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
	var s=document.formdangnhap;			
		
		
		
		
		//begin email 
		if(s.email.value=='')
		{
			document.getElementById("email_error").style.display = "block";
			document.getElementById("email_error").innerHTML=" Bạn chưa nhập email!";
			s.email.focus();
			return false;	
		}
		else
		{
			var email = document.getElementById('email');
	 		 var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(email.value)) {
				document.getElementById("email_error").style.display = "block";
			    document.getElementById("email_error").innerHTML=" Bạn nhập email chưa đúng!";
			    s.email.focus();
				return false;
			 }
			else
			{
				document.getElementById("email_error").style.display = "none";	
			}
		}
		
		//end email
	
	}
	
	
</script>


<?php if(!defined('_source')) die("Error");

	
		if(!empty($_POST)){	
		
		$email = $_POST["email"];
		$sql_kh = "select * from #_khachhang where email='$email'";	
		$d->query($sql_kh);
		$info_kh = $d->fetch_array();
		
		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = "116.193.76.21"; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = "info@gianhangcongngheviet.com"; // SMTP account username
		$mail->Password   = "1234qwer!@#$";  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom('info@gianhangcongngheviet.com',$_POST['ten']);

		//Thiết lập thông tin người nhận
		$mail->AddAddress($company['email'], $company['ten']);
		
		//Thiết lập email nhận email hồi đáp
		//nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($_POST['email'],$_POST['ten']);

		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = $_POST['tieude1']." - ".$company['ten'];
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	

			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Mật khẩu đăng nhập website của bạn</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Mật khẩu của bạn là:</th><td>'.$info_kh["matkhau"].'</td>
				</tr>
				';
			$body .= '</table>';
			
			$mail->Body = $body;
			if($mail->Send())
			transfer("Mật khẩu mới đã được gửi vào email của bạn.", "index.html");
			else
			 transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "quen-mat-khau.html");
		}
		
		
	
?>
<div class="container-fluid">
<div class="box_mid" style="margin-top:150px;">
  <div class="mid-title">
    <div class="titleL"><h1>Bạn đã quên mật khẩu ?
<span class="small"></span> <span class="color"></span></h1></div>
    <div class="titleR"></div>
    <div class="clear"></div>
  </div>
  <div class="mid-content">
    


<div id="Member" class="Member">
	
	<div class="vnt_login">
		
		<div class="login-form">
			<div class="Ltitle">Chỉ cần nhập địa chỉ email của bạn trong các mẫu dưới đây <br />và bấm vào nút "Gửi lại mật khẩu" và chúng tôi sẽ gửi thông tin lấy lại mật khẩu qua email của bạn ngay lập tức.</div>
			
			<div class="formMember">
				<form id="formdangnhap" name="formdangnhap" method="post" action="" onSubmit="return CheckSignup2()">
					
					<div class="row_input">
						<label for="email">Email của bạn<span>*</span></label>
						<input type="text" name="email" id="email" class="form-control required">
                         <span class="error" id="email_error" style="color='#FF0000'"></span>
					</div>
					
					<div class="remember">
						
					</div>
					<div class="form_button">
						<ul>
							<li><button id="dnhap" name="dnhap" type="submit" class="btn" value="Đăng nhập"><span>Gửi lại mật khẩu</span></button></li>
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