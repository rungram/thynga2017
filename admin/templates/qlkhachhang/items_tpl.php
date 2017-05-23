
<form action="#" method="post" name="frmLIST_PRODUCT" id="frmLIST_PRODUCT">
<table class="blue_table">
	<tr>
		<th style="width:5%;">Số thứ tự</th>		
        <th style="width:10%;">Tên khách hàng</th>
		<th style="width:10%;">Điện thoại</th>
		<th style="width:10%;">Email</th>                           
        <th style="width:15%;">Địa chỉ</th>       
		<th style="width:5%;">User</th>
        <th style="width:10%;">Pass</th>
		<th style="width:5%;">Xóa</th>
         
	</tr>
	<?php $stt=1;for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$stt++?></td>
        <td style="width:10%;"><?=$items[$i]['tenkhachhang']?></td>
        <td style="width:10%;"><?=$items[$i]['dienthoai']?></td>	
        <td style="width:10%;"><?=$items[$i]['email']?></td>	
        <td style="width:15%;"><?=$items[$i]['diachi']?></td>	

     
        <td style="width:5%;"><?=$items[$i]['user']?></td>
        <td style="width:5%;"><?=$items[$i]['matkhau']?></td>	
        
  
		<td style="width:5%;"><a href="index.php?com=qlkhachhang&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
</form>

<div class="paging"><?=$paging['paging']?></div>