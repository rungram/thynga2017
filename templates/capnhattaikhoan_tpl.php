
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

<style>
.left_capnhat{
	
	float:left;
	width:30%;
	padding-left:5%;
	padding-right:5%;
}
.title_left{
	
	background:#034ea1;
	color:#fff;
	padding:5px;
}
.left_capnhat ul{
	
	border:1px solid #cecece;
	
}
.left_capnhat ul li{
	
	line-height:30px;
}
.right_capnhat{
	
	float:left;
	width:70%;
}
.fhd-tits .fhd-titsh {
    display: inline-block;
    border-bottom: 2px solid #c91212;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 16px;
    padding: 7px 5px;
    position: relative;
    bottom: -2px;
}
.fhd-cl-lprod li{
	line-height:40px;
	border-top:1px solid #cacaca;
	padding-left:5px;
	
}
.fhd-cl-lprod li a{
	padding:5px;
	padding-left:30px;
	background: url(images/icon-post2.png) no-repeat 5px 50%;
	
}
.mau_nen{
	background:#ededed;
	padding-bottom:30px;
	
}

</style>
<div class="container-fluid">
<div class="mod-content" style="margin-top:150px;">
        
<div class="box_mid">
  <div class="mid-title">
    <div class="titleL"><h1>QUẢN LÝ THÔNG TIN<span class="small">&nbsp;||| </span> <span class="color"><a href="dang-nhap.html">QUẢN LÝ ĐƠN HÀNG</a></span></h1></div>
    <div class="titleR"></div>
    <div class="clear"></div>
  </div>
  		<!--chinh --> 
  		<div class="mid-content">
			<div class="fhd-content row"><input type="hidden" value="" id="newstype">
            
            <div class="fhd-cleft col-xs-12 col-sm-9">
            
              <?php 
			  if(@$_GET['com']=='quan-ly-tai-khoan' || @$_GET['com']=='thay-doi-thong-tin-ca-nhan' )
			  include _template."layout/thaydoithongtincanhan.php"; 
			  if(@$_GET['com']=='quan-ly-don-hang')
			  include _template."layout/quanlydonhang.php"; 
			  ?>
          	  
            
            </div>
            
            
            <div class="fhd-cright col-xs-12 col-sm-3">   <div class="fhd-cl-i"><div class="fhd-tits"><h2 class="fhd-titsh">MENU QUẢN LÝ THÔNG TIN</h2></div>
            <div class="fhd-cl-list">
            
            <ul class="fhd-cl-lprod mau_nen">
               
                 <li>
                <a class="fhd-cl-lname" href="quan-ly-don-hang.html" title="iPhone 7">Quản lý đơn hàng</a>
                </li>
                 <li>
                <a class="fhd-cl-lname" href="gio-hang.html" title="iPhone 7" target="_blank">Giỏ hàng của bạn</a>
                </li>
                 <li>
                <a class="fhd-cl-lname" href="thay-doi-thong-tin-ca-nhan.html" title="iPhone 7">Thay đổi thông tin cá nhân</a>
                </li>
               
                <li>
                <a class="fhd-cl-lname" href="thoat.html" title="iPhone 7">Thoát</a>
                </li>
                 
                
            </ul>
            </div>
            </div>    
            
            
              </div></div>

  		</div>  
  		<!--chinh -->
          
</div> 

    </div>
</div>