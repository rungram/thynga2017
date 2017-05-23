
<?php
	
	$d->reset();
	$sql_upuser="select * from #_khachhang where user='".$_SESSION['user']."'";
	$d->query($sql_upuser);
	$result_upuser=$d->result_array();
				
?>



<div class="gui_thongtin">
<div class="close_img"></div>



<script type="text/javascript">
	function CheckSignup()
	{
		var s=document.formdangky;
		if(s.hoten.value=='')
		{
			document.getElementById("hoten_error").style.display = "block";
			document.getElementById("hoten_error").innerHTML="Bạn chưa nhập họ tên!";
			s.hoten.focus();
			return false;	
		}
		else
			document.getElementById("hoten_error").style.display = "none";
			
		if(s.diachi.value=='')
		{
			document.getElementById("diachi_error").style.display = "block";
			document.getElementById("diachi_error").innerHTML=" Bạn chưa nhập địa chỉ!";
			s.diachi.focus();
			return false;	
		}
		else
			document.getElementById("diachi_error").style.display = "none";
			
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
			

			
			
				
			
if(s.user.value=='')
		{
			document.getElementById("user_error").style.display= "block";
			document.getElementById("user_error").innerHTML=" Bạn chưa nhập user!";
			s.user.focus();
			return false;	
		}
		else
			document.getElementById("user_error").style.display = "none";

	
		if(s.matkhau.value=='')
		{
			document.getElementById("matkhau_error").style.display= "block";
			document.getElementById("matkhau_error").innerHTML="Bạn chưa nhập mật khẩu!";
			s.matkhau.focus();
			return false;	
		}
		else
			document.getElementById("matkhau_error").style.display = "none";
	

if(s.xacnhanmatkhau.value=='')
		{
			document.getElementById("xacnhanmatkhau_error").style.display= "block";
			document.getElementById("xacnhanmatkhau_error").innerHTML="Bạn chưa nhập xác nhận mật khẩu!";
			s.xacnhanmatkhau.focus();
			return false;	
		}
		else
			document.getElementById("xacnhanmatkhau_error").style.display = "none";

		
		if(s.xacnhanmatkhau.value!=s.matkhau.value)
		{
			document.getElementById("xacnhanmatkhau_error").style.display= "block";
			document.getElementById("xacnhanmatkhau_error").innerHTML="mật khẩu không trùng!";
			s.xacnhanmatkhau.focus();
			return false;	
		}
		else
			document.getElementById("xacnhanmatkhau_error").style.display = "none";
		return true;	
	}
	
	
</script>

</head>

<body>
<?php


$hoten=$_POST["hoten"];
$phai=$_POST["phai"];
$diachi=$_POST["diachi"];
$ngaysinh=$_POST["nam2"]."-".$_POST["thang"]."-".$_POST["ngay"];
$dienthoai=$_POST["dienthoai"];
$email=$_POST["email"];
$user=$_POST["user"];
$matkhau=$_POST["matkhau"];
$xacnhanmatkhau=$_POST["xacnhanmatkhau"];

if(isset($_POST["dangky"]))
{
	
		$d->reset();
		$lenhktuser= "select * from #_khachhang where user='$user' ";
		$kqktuser=$d->query($lenhktuser);
		$result_ktuser =$d->result_array();	
		$ktuser=count($result_ktuser);
		
		$d->reset();
		$lenhktemail= "select * from #_khachhang where email='$email'";
		$kqktemail=$d->query($lenhktemail);
		$result_ktemail =$d->result_array();	
		$ktemail=count($result_ktemail);
		
		if($ktuser == 1)
			$user_kt="User đã có người sử dụng";
			
		else if($ktemail == 1)
		    $user_email="Email  đã có người sử dụng";
		else
		{
		$d->reset();
		$lenhdangky="insert into 
		#_khachhang(tenkhachhang,email,phai,diachi,ngaysinh,dienthoai,user,matkhau,xacnhanmatkhau)values('$hoten','$email','$phai',
	'$diachi','$ngaysinh','$dienthoai','$user','$matkhau','$xacnhanmatkhau')";
	$kqdangky=$d->query($lenhdangky);
   		 if($kqdangky)
	
		{
			
			?>
        	<script>
			alert('Đăng ký thành công');
			location.href="?com=index"
			</script>
        
       	    <?php
		
		
		
		}
		else
		{
			?>
      	  <script>
			alert('Đăng ký thất bại');
			</script>
        
        	<?php
		
		}
		}
	
	
	
	
}

?>
<form id="formdangky" method="post" onSubmit="return CheckSignup()" name="formdangky"  action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F1F1">
    <tr>
      <td height="40" colspan="2" align="center" class="chudau"><strong>SỬA ĐỔI THÔNG TIN THÀNH VIÊN</strong></td>
    </tr>
    <tr>
      <td width="220" style="padding-left:15px" class="chunendangky">Họ tên</td>
      <td width="494"><label for="hoten"></label>
      <input name="hoten" type="text" id="hoten" size="60" value="<?=$result_upuser[0]['Tenkhachhang']?>"/>
      <font color="#FF0000">(*)
      <span class="hide error" id="hoten_error"></span> </font>
      </td>
    </tr>
   
    <tr>
      <td style="padding-left:15px;" class="chunendangky">Địa chỉ</td>
      <td><label for="diachi"></label>
        <label for="diachi"></label>
        <div align="left">
         
            <input name="hoten" type="text" id="hoten" size="60" value="<?=$result_upuser[0]['Diachi']?>"/>
      </div>
        <font color="#FF0000">(*)<span class="hide error" id="diachi_error"> </span></font>
      </td>
    </tr>
    
     <tr>
      <td style="padding-left:15px" class="chunendangky">Tuổi</td>
      <td><label for="tuoi"></label>
      <input name="tuoi" type="text" id="tuoi" size="60" value="<?php echo $_POST["tuoi"];?>"/>
     
        <font color="#FF0000">(*)<span class="hide error" id="tuoi_error"> </span> </font>
      </td>
    </tr>
    
    <tr>
      <td style="padding-left:15px" class="chunendangky">Điện thoại</td>
      <td><label for="dienthoai"></label>
      <input name="dienthoai" type="text" id="dienthoai" size="60" value="<?=$result_upuser[0]['Dienthoai']?>"/>
     
        <font color="#FF0000">(*)<span class="hide error" id="dienthoai_error"> </span> </font>
      </td>
    </tr>
    <tr>
      <td style="padding-left:15px" class="chunendangky">Email</td>
      <td><label for="email"></label>
      <input name="email" type="text" id="email" size="60" value="<?=$result_upuser[0]['Email']?>" />
      <font color="#FF0000">(*)<span class="hide error" id="email_error"> </span></font><br />
      <?php
	  		{
        	if($ktemail == 1)
			?>
			<font color="#FF0000"><?php echo $user_email ;?></font>
            <?php
			}
      ?>
      </td>
    </tr>
    <tr>
      <td style="padding-left:15px" class="chunendangky">User</td>
      <td><label for="user"></label>
      <input name="user" type="text" id="user" size="60" value="<?=$result_upuser[0]['user']?>"/>
   
      <font color="#FF0000">(*)
      <span class="hide error" id="user_error"> </span> </font><br />
      <?php
	  		{
        	if($ktuser == 1)
			?>
			<font color="#FF0000"><?php echo $user_kt ;?></font>
            <?php
			}
      ?>
      </td>
    </tr>
    <tr>
      <td style="padding-left:15px" class="chunendangky">Pass</td>
      <td><label for="matkhau"></label>
      <input name="matkhau" type="text" id="matkhau" size="60" value="<?=$result_upuser[0]['Matkhau']?>"/>
      
      <font color="#FF0000">(*)
      <span class="hide error" id="matkhau_error"> </span> </font>
      </td>
    </tr>
    
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="dangky" class="button" value="Sửa"/></td>
    </tr>
  </table>
</form>



</div>