<h3>Thêm đặc điểm nổi bật</h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>      

        <th style="width:20%;">Tên sản phẩm</th>  
        <th style="width:20%;">Tên đặc điểm</th>  
        <th style="width:30%;">Hình ảnh</th>   
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>        
        
		<td align="center" style="width:5%;">
        
		<?php
		$sql_sp="select ten_vi from table_product where id='".$id_sp."'";
		$result_sp=mysql_query($sql_sp);
	 	$item_sp =mysql_fetch_array($result_sp);
		echo @$item_sp['ten_vi'];
		?>  
    
     </td>
     <td align="center" style="width:5%;">
        
		<?=$items[$i]['ten_vi']?>
 
    
     </td>
     
        <td style="width:40%;">
       <img src="<?=_upload_dacdiem_noibat.$items[$i]['thumb']?>" width="200"/>
        </td>       		
		<td style="width:5%;"><a href="index.php?com=dacdiem_noibat&act=edit_photo&id=<?=$items[$i]['id']?>&id_sp=<?=$id_sp;?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=dacdiem_noibat&act=delete_photo&id=<?=$items[$i]['id']?>&id_sp=<?=$id_sp;?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=dacdiem_noibat&act=add_photo&id_sp=<?=$id_sp?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>