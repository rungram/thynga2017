<?php  if(!defined('_source')) die("Error");
{
// 	if(!$_SESSION['user_dn']) transfer("BẠN CẦN ĐĂNG NHẬP TRƯỚC", "dang-nhap.html");
	$d->reset();
	$sql_tungdanhmuc="select id,thumb,ten_$lang,tenkhongdau,gia,masp,giagiam,spmoi,luotxem from #_product where spdc >0  order by stt asc ";
	$d->query($sql_tungdanhmuc);	
	$result_spnam=$d->result_array();	
	

	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=20;
	$maxP=5;
	$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
	$result_spnam=$paging['source'];
	
}
?>
<style>
.khung_tt{
	
	border: 1px solid #e3e4e8;
  width: 100%;
  margin: 0 auto;
  overflow: hidden;
  margin: 10px 0 0;
  padding-bottom: 15px;
	
}
.tomtat_dh{
	
float:left;
width:435px;
padding:20px;
color:#414141;
font-size:13px;
padding-top:0px;
padding-bottom:0px;
}

.moi_dh{
	
float:left;
width:425px;

	
}

.moi_dh img{
	
float:left;
width:80px;
	
}

.tomtatmoi_dh{
width:320px;
margin-left:10px;
float:left;
text-align:justify;
	
}
.tomtat_dh span a{
	
float:right;
font-size:13px;
color:#0095da;
	
}
.tieude_tt{
	border-bottom: 1px solid #e3e4e8;
	padding-bottom:10px;
	margin-bottom:10px;
font-size:13px;
width:305px;
margin-top:10px;	
}
.info_nguoidat{
float:left;	
margin:10px;
width:500px;
}
.info_nguoidat input{
	
  background-color: #e6efc2;
  border: 1px solid #e5e5e5;
  border-radius: 4px;
  margin: 10px;
  color: #555;
  padding: 5px;
	width:380px;
	
}
.info_nguoidat textarea{
	
 background-color: #e6efc2;
  border: 1px solid #e5e5e5;
  border-radius: 4px;
  margin: 10px;
  color: #555;
  padding-top: 10px;
  padding-bottom: 10px;
  width:400px;
  height:100px;
	
}
.nutgh{
	
 height: auto;
    font-size: 14px;
    line-height: 24px;
    padding: 8px 20px;
    background: #f58320 !important;
    color: #ffffff !important;
    border: 0px;
    outline: 0px;
    position: relative;
    overflow: hidden;
    z-index: 1;
    font-weight: 400;
	width:auto !important;
	
	
}
.tieude_center3{
	margin-top:100px;
}

</style>
<div class="container-fluid">
<div class="tieude_center3"><h3>GIỎ HÀNG CỦA BẠN</h3></div>
<div class="khung_tt">
<div class="tomtat_dh">
<div class="tieude_tt"><b>Tóm tắt đơn hàng <span><a href="gio-hang.html">Thay đổi giỏ hàng</a></span></b></div>
<?php
$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++)
	
	{
		
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];					
					$pname=get_product_name($pid);
					$phinh=get_hinh($pid);
					$pmota=get_mota($pid);
					$pkodau=get_kodau($pid);
					$psale=get_giagiam($pid);
					$pma=get_masp($pid);
		?>
		<div class="moi_dh">
			 <img src="upload/sanpham/<?=$phinh?>"/>
			 <div class="tomtatmoi_dh">
            
            <?=$pname?><span style="font-size:11px">[ <?=$pma?>]<br />
            <b>
		
            	<?php 
					if($psale ==0) 
					echo number_format(get_price($pid),0, ',', '.').'đ x '.$q;
					else 
					echo number_format(get_giagiam($pid),0, ',', '.').'đ x '.$q;
					 ?>
            
            
            </b>
            <br />
            <?=$pmota?> 
            
            </div>

		</div><!--moi_dh-->
        <?php
	}
?>
</div>


<div class="info_nguoidat">

<b>Thông tin người đặt hàng </b>
<br />
<script language="javascript" src="admin/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('hoten2'), "Xin nhập Họ tên.")){
		document.getElementById('hoten2').focus();
		return false;
	}
	
	
	if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	if(!isEmpty(document.getElementById('email'))){
		if(!check_email(document.frm.email.value)){
			alert("Email không hợp lệ");
			document.frm.email.focus();
			return false;
		}
	}
	
	
	
	if(isEmpty(document.getElementById('diachi'), "Xin nhập Địa chỉ.")){
		document.getElementById('diachi').focus();
		return false;
	}
	
	
	
	document.frm.submit();
}
</script>
<?php

	$d->reset();
	$sql_khachhang="select *  from #_khachhang where user='".$_SESSION['user_dn']."'";
	$d->query($sql_khachhang);
	$result_kh=$d->fetch_array();
?>

<form method="post" name="frm" action="gui-don-hang.html" enctype="multipart/form-data">
<table  border="0">
  <tr>
    <td width="152">Họ tên</td>
    <td width="547"><input type="text" name="hoten2" id="hoten2" class="bg_text" value="<?=$result_kh["tenkhachhang"]?>" 
	
	<?php if($_SESSION['user_dn']) echo 'readonly="readonly"';  ?> required/></td>
  </tr>
  <tr>
    <td>Điện thoại</td>
    <td><input type="text" name="dienthoai" id="dienthoai"  class="bg_text" value="<?=$result_kh["dienthoai"]?>"<?php if($_SESSION['user_dn']) echo 'readonly="readonly"'; ?> required /></td>
  </tr>
   <tr>
    <td>Email</td>
    <td><input type="text" name="email" id="email"  class="bg_text" value="<?=$result_kh["email"]?>"<?php if($_SESSION['user_dn']) echo 'readonly="readonly"';  ?>/></td>
  </tr>
  
  <tr>
   <tr>
    <td>Địa chỉ</td>
    <td><input type="text" name="diachi"  id="diachi" class="bg_text" value="<?=$result_kh["diachi"]?>"<?php if($_SESSION['user_dn']) echo 'readonly="readonly"';  ?>/></td>
  </tr>
  <tr>
    <td>Ghi chú</td>
    <td><textarea name="noidung" class="ghichu"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="dh" class="nutgh" onclick="js_submit();" value="Gửi Đơn Hàng" /></td>
  </tr>
</table>
</form>


</div>

</div><!--khung_tt-->

</div>


