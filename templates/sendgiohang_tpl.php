<?php

	$d->reset();
	$sql_khachhang="select *  from #_khachhang where user='".$_SESSION['user']."'";
	$d->query($sql_khachhang);
	$result_kh=$d->fetch_array();
	
	$tennguoidat=$result_kh['Tenkhachhang'];
	$diachi=$result_kh['Diachi'];
	$dienthoai=$result_kh["Dienthoai"];
	$email=$result_kh["Email"];

	
	
		
		$ngaydathang=date("Y-m-d");
		 for($i = 1; $i <= $_SESSION["tongsp"];$i++)
   {
	   
	   
	   $tenmathang=$_SESSION["ten".$i];
	   $hinhmathang=$_SESSION["hinh".$i];
	   $giamathang=$_SESSION["gia".$i];
	   $soluong=$_SESSION["Soluong".$i];
	   $tonggia=$giamathang*$soluong;
	   $d->reset();
	   $sql_sendgiohang="insert into #_donhang(tennguoidat,dienthoai,diachi,email,tenmathang,giamathang,soluong,ngaydathang,tonggia,hinh)
	values('$tennguoidat','$dienthoai','$diachi','$email','$tenmathang','$giamathang','$soluong','$ngaydathang','$tonggia','$hinhmathang')";
   	   $send_giohang=$d->query($sql_sendgiohang);	
	    if($send_giohang)
		{
	   		 
	  		 unset($_SESSION["id".$i]);
			 unset($_SESSION["ten".$i]);
			 unset($_SESSION["hinh".$i]);
			 unset($_SESSION["gia".$i]);
			 unset($_SESSION["Soluong".$i]);
	  		
		}
	 
   }
   	   
	  
	  		
       
       
	   
	   
	   		 unset($_SESSION["tongsp"]);
			?>
            <script>
			alert('Gửi đơn hàng thành công');
			location.href="?com=index";
			
			</script>
            
            <?php
			
			
		

	

?>