<h3><a href="index.php?com=thuvienanhcapcha&act=add_photo">Thêm hình ảnh</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:15%;">Số thứ tự</th>  
        <th style="width:15%;">Tên album ảnh</th>    
		<th style="width:50%;">Hình ảnh</th>   
		<th style="width:15%;">Sửa</th>
        <th style="width:15%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:15%;"><?=$items[$i]['stt']?></td>
		<td style="width:15%;"><?=$items[$i]['thumb']?></td>
        <td style="width:50%;">
       <img src="<?=_upload_thuvienanhcapcha.$items[$i]['photo']?>" width=300px/>
        </td>  
	
		<td style="width:15%;"><a href="index.php?com=thuvienanhcapcha&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:15%;"><a href="index.php?com=thuvienanhcapcha&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=thuvienanhcapcha&act=add_photo"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>