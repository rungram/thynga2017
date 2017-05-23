
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


<?php
	$user_dn=$_SESSION["user_dn"];
	$sql_kh = "select * from #_khachhang where user='$user_dn'";	
	$d->query($sql_kh);
	$info_kh = $d->fetch_array();
	
	$user=$_POST["user"];
	$matkhau=$_POST["matkhau"];
	$email=$_POST["email"];
	$hoten=$_POST["hoten"];
	$dienthoai=$_POST["dienthoai"];
	$diachi=$_POST["diachi"];


if(isset($_POST["dangky"]))
{
	
	
		
		$d->reset();
		$lenhktemail= "select * from #_khachhang where email='$email' and id<>'".$info_kh["id"]."'";
		$kqktemail=$d->query($lenhktemail);
		$result_ktemail =$d->result_array();	
		$ktemail=count($result_ktemail);
		
		$d->reset();
		$lenhktuser= "select * from #_khachhang where user='$user' and id<>'".$info_kh["id"]."'";
		$kqktuser=$d->query($lenhktuser);
		$result_ktuser =$d->result_array();	
		$ktuser=count($result_ktuser);
		
	    if($ktemail == 1)
		    $user_email="Email  đã có người sử dụng";
		else if($ktuser == 1)
		    $user_user="User  đã có người sử dụng";
		else
		{
				$d->reset();
				$lenhdangky="update  
				#_khachhang set tenkhachhang='$hoten',diachi='$diachi',dienthoai='$dienthoai',email='$email',matkhau='$matkhau',tinh_tp='$tinh_tp'
				where user='$user_dn'";
				$kqdangky=$d->query($lenhdangky);
   		 		if($kqdangky)
					transfer("Cập nhật thông tin thành công", "thoat.html");
				else
					transfer("Lỗi - Vui lòng thử lại", "quan-ly-tai-khoan.html");
		
		}
		
		

	

	
	
	
}


	
?>


<script type="text/javascript">
function CheckSignup()
	{
		var s=document.formdangky;
		
		//begin user
		if(s.user.value=='')
		{
			document.getElementById("user_error").style.display = "block";
			document.getElementById("user_error").innerHTML=" Bạn chưa nhập user!";
			s.user.focus();
			return false;	
		}
		
		else
			document.getElementById("user_error").style.display = "none";
		//end user	
		
		//begin matkhau
		if(s.matkhau.value=='')
		{
			document.getElementById("matkhau_error").style.display = "block";
			document.getElementById("matkhau_error").innerHTML=" Bạn chưa nhập mật khẩu!";
			s.matkhau.focus();
			return false;	
		}
		
		else
			document.getElementById("matkhau_error").style.display = "none";
			
	
		if(s.matkhau.value.length < 6)
		{
			document.getElementById("matkhau_error").style.display = "block";
			document.getElementById("matkhau_error").innerHTML=" Mật khẩu ít nhất 6 kí tự!";
			s.matkhau.focus();
			return false;	
		}
		
		else
			document.getElementById("matkhau_error").style.display = "none";	
			
				
		//end matkhau	
		
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
		
		//begin ho ten
		if(s.hoten.value=='')
		{
			document.getElementById("hoten_error").style.display = "block";
			document.getElementById("hoten_error").innerHTML="Bạn chưa nhập họ tên!";
			s.hoten.focus();
			return false;	
		}
		else
			document.getElementById("hoten_error").style.display = "none";
		
		//end hoten
		
		//begin dien thoai
		if(s.dienthoai.value=='')
		{
			document.getElementById("dienthoai_error").style.display= "block";
			document.getElementById("dienthoai_error").innerHTML=" Bạn chưa nhập điện thoại!";
			s.dienthoai.focus();
			return false;	
		}
		else
			document.getElementById("dienthoai_error").style.display = "none";
			
			
					if(isNaN(s.dienthoai.value))
		{
			document.getElementById("dienthoai_error").style.display= "block";
			document.getElementById("dienthoai_error").innerHTML="Điện thoại phải là số!";
			s.dienthoai.focus();
			return false;	
		}
		else
			document.getElementById("dienthoai_error").style.display = "none";
			
		//end dien thoai	
		
		
		
		//begin dia chi		
		if(s.diachi.value=='')
		{
			document.getElementById("diachi_error").style.display = "block";
			document.getElementById("diachi_error").innerHTML=" Bạn chưa nhập địa chỉ!";
			s.diachi.focus();
			return false;	
		}
		else
			document.getElementById("diachi_error").style.display = "none";
			
			//begin dia chi		
		if(document.getElementById("dongy").checked == false)
		{
			document.getElementById("dongy_error").style.display = "block";
			document.getElementById("dongy_error").innerHTML=" Bạn chưa đồng ý!";
			
			return false;	
		}
		else
			document.getElementById("dongy_error").style.display = "none";
			
			
	}
			
</script>
<div class="container-fluid">
<div class="mod-content" style="margin-top:150px;">
        
<div class="box_mid">
  <div class="mid-title">
    <div class="titleL"><h1>Cập nhật tài khoản<span class="small">&nbsp;hoặc</span> <span class="color"><a href="dang-nhap.html">Đăng Nhập</a></span></h1></div>
    <div class="titleR"></div>
    <div class="clear"></div>
  </div>
  <div class="mid-content">

<div class="vnt_login">
    
    <div class="login-form">
        
        <div class="formMember">
            
            <form action=""  onSubmit="return CheckSignup()" name="formdangky" id="formdangky" method="post" class="validate " novalidate="novalidate">
                <div class="row_input">
                    <label for="rUserName">Tên đăng nhập<br>(viết liền không dấu) <span>*</span></label>
                    <input type="text" class="form-control required" id="user" name="user" value="<?=$info_kh["user"]?>" aria-required="true">
                 
    		  		 <span class="error" id="user_error" style="color='#FF0000'">
                      <?php
							{
							if($ktuser == 1)
							?>
							<font color="#FF0000"><?php echo $user_user ;?></font>
							<?php
							}
					  ?>
                     </span>
                </div>
                <div class="row_input">
                    <label for="rPassWord">Mật khẩu <span>*</span></label>
                    <input type="password" class="form-control required" id="matkhau" name="matkhau" value="<?=$info_kh["matkhau"]?>" autocomplete="off" aria-required="true">
                     <span class="error" id="matkhau_error" style="color='#FF0000'"></span>
                </div>
                
                <div class="row_input">
                    <label for="rEmail">Email <span>*</span></label>
                    <input type="text" class="form-control required" id="email" name="email" value="<?=$info_kh["email"]?>" aria-required="true">
                    <span class="error" id="email_error" style="color='#FF0000'">
                     <?php {
							if($ktemail == 1)
							?>
							<font color="#FF0000"><?php echo $user_email ;?></font>
							<?php
							}
					  ?>
                    </span>
                </div>
                
                <div class="row_input">
                    <label for="full_name">Họ tên <span>*</span></label>
                    
                    <input type="text" class="form-control required" id="hoten" name="hoten" value="<?=$info_kh["tenkhachhang"]?>" title="Vui lòng nhập Họ tên" aria-required="true">
                     <span class="error" id="hoten_error" style="color='#FF0000'"></span>
                </div>
                
                <div class="row_input">
                    <label for="phone">Điện thoại <span>*</span></label>
                    <input type="text" class="form-control required" id="dienthoai" name="dienthoai" value="<?=$info_kh["dienthoai"]?>" title="Vui lòng nhập Điện thoại" aria-required="true">
                    <span class="error" id="dienthoai_error" style="color='#FF0000'"></span>
                </div>
                
                 <div class="row_input">
                                    <label for="phone">Điạ chỉ <span>*</span></label>
                                    <input type="text" class="form-control required" id="diachi" name="diachi" value="<?=$info_kh["diachi"]?>" title="Vui lòng nhập địa chỉ" aria-required="true">
                                    <span class="error" id="diachi_error" style="color='#FF0000'"></span>
                 </div>
                

                <div class="remember">
                    <ul>
                        <li><input type="checkbox" name="dongy" id="dongy" checked="checked"><span>Tôi đã xem và đồng ý với quy chế của website này</span></li>
                        <span class="error" id="dongy_error" style="color='#FF0000'"></span>
                    </ul>
                </div>
                <div class="form_button">
                    <ul>
                        <li><button id="btnRegister" name="dangky" type="submit" class="btn" value="Cập nhật"><span>Cập nhật</span></button></li>
                        <li><a href="dang-nhap.html">Bạn có khoản?</a></li>
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