<?php  
if(isset($_POST['id'])){
	
	$id = ($_POST['id']);	
	
}
?>

	

<div id="sptieubieu">
<?php

{
$kt = 0;
for($i = 1; $i <= $_SESSION["tongsp"];$i++)
{
	if($id==$_SESSION["id".$i])
	{
		$kt = 1;
		$_SESSION["Soluong".$i]++;
		break;
	}

}
if($kt==0)
{
	
	$lenh = "select * from #_product where id='$id'";
	$d->query($lenh);
	$row=$d->result_array();
	$n = count($row);
	if($n > 0)
	{
		
		$_SESSION["tongsp"]++;
		$j = $_SESSION["tongsp"];
		session_register("id");
		$_SESSION["id".$j]=$row[0]['id'];
		session_register("ten");
		$_SESSION["ten".$j]=$row[0]["ten_vi"];
		session_register("hinh");
		$_SESSION["hinh".$j]=$row[0]['thumb'];
		session_register("gia");
		$_SESSION["gia".$j]=$row[0]['gia'];
		session_register("Soluong");
		$_SESSION["Soluong".$j]= 1;		
	}
	
}
}
?>
<form id="form1" name="form1" method="post" action="?com=cap-nhat-gio-hang">
	<div class="ds_giohang">
    
    
  
    </div>
    
    <div class="ds_giohang2">
    
    <table width="100%" border="1px solid #000">
    
    <tr class="tieude_gh">
      <td align="center">STT</td>
      <td align="center">Tên sản phẩm</td>
      <td align="center">Hình</td>
      <td align="center">Đơn giá</td>
      <td align="center">Số lượng</td>
      <td align="center">Thành tiền</td>
      <td align="center">Xóa</td>
    </tr>
    <?php
    for($i = 1; $i <= $_SESSION["tongsp"];$i++)
	{
		?>
    <tr>
      <td align="center"><?php echo $i;  ?></td>
      <td align="center"><?php echo $_SESSION["ten".$i];  ?></td>
      <td align="center">
      
	 
            
	  <img src="upload/sanpham/<?=$_SESSION["hinh".$i]?>" width="80"/>
     
      </td>
      <td align="center"><?php echo $_SESSION["gia".$i];  ?></td>
      <td align="center"><label for="soluong"></label>
      <input name="C<?php echo $i;  ?>" type="text" id="soluong" size="10" class="button" value="<?php echo $_SESSION["Soluong".$i];  ?>" /></td>
      <td align="center"><?php echo $_SESSION["Soluong".$i]*$_SESSION["gia".$i];  ?></td>
      <td align="center"><input type="checkbox" name="X<?php echo $i;  ?>" id="xoa" class="button" />
      <label for="xoa"></label></td>
    </tr>
    <?php
	}
	?>
  </table>
  
    </div>
  
  <?php
  function tongtien()
  {
	  $s=0;
	     for($i = 1; $i <= $_SESSION["tongsp"];$i++)
		 {
			 $s=$s + $_SESSION["gia".$i]*$_SESSION["Soluong".$i];
			 $_SESSION['s']=$s;
		 }
		 return $s;
		 
  }
  ?>

  <p align="center">Tổng tiền:<?php echo number_format(tongtien(),0,',','.');?> VND</p>
  
  <p align="center">
    <input type="submit" name="capnhat" class="button" value="Cập nhật" />
    <input type="button" name="dathang" class="button" value="Đặt hàng" onclick="location.href='?com=send-gio-hang'" />
    <input type="submit" name="xoa" id="xoa"  class="button" value="Xóa" />
  </p>
</form>
</div>











