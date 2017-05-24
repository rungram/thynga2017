
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
<?php 
if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	global $d;
	$data['ten'] = $_POST['ten'];
	$data['email'] = $_POST['email'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['diachi'] = $_POST['diachi'];
	$data['noidung'] = $_POST['noidung'];
	$data['subject'] = $_POST['subject'];
	$d->setTable('lienhe');
	$d->insert($data);
}
?>
<div class="bg-white">
		<div class="col-12">
            <h2>LIÊN HỆ VỚI THY NGA</h2>
        </div>
        <div class="col-12">
        <div class="box_mid">
  <div class="mid-title">
    <div class="clear"></div>
  </div>
  		<!--chinh --> 
  		<div class="mid-content">
			<div class="fhd-content row">
            
            <div class="fhd-cleft col-xs-12 col-sm-12">
            
              <div class="vnt_login">
    
    <div class="login-form">
        
        <div class="formMember">
            
            <form class="validate" method="post" name="frm" action="lien-he.html">
                <div class="row_input">
                    <label>Họ tên: <span>*</span></label>
                    <input class="form-control require" type="text" name="ten" value="" required>
                </div>
                <div class="row_input">
                    <label>Điện thoại:<span>*</span></label>
                    <input class="form-control require" type="text" name="dienthoai" value="" required> 
                     <span class="error" id="matkhau_error" style="color='#FF0000'"></span>
                </div>
                
                <div class="row_input">
                    <label>Email </label>
                    <input class="form-control require" type="text" name="email" value="">
                </div>
                 <div class="row_input">
                    <label for="phone">Điạ chỉ</label>
                    <input class="form-control require" type="text" name="diachi" value="">
                 </div>
                <div class="row_input">
                    <label for="phone">Tiêu đề: <span>*</span></label>
                    <input class="form-control require" type="text" name="subject" value="" required>
                 </div>
                 <div class="row_input">
                    <label for="phone">Lời nhắn: <span>*</span></label>
                    <textarea name="noidung" class="txt area require"></textarea>
                 </div>
                 <div class="form_button">
                 <input type="submit" name="btn_submit"  class="btn" value="Gửi">
                 </div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>          	  
            
            </div></div>

  		</div>  
  		<!--chinh -->
          
</div>
        </div>
      
        <div class="clearfix"></div>
    
    <div class="clearfix"></div>
</div>