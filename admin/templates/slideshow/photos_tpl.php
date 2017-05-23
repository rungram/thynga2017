<h3><a href="index.php?com=slideshow&act=add_photo">Thêm hình ảnh</a></h3>
<font color="#FF0000"><b>Lưu ý up hình slideshow rộng(800px) cao(300px) cho đẹp</b></font>
<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>  
        <th style="width:30%;">Tên hình ảnh</th>  
		<th style="width:30%;">Hình ảnh</th>  
        <th style="width:20%;">Link hình</th>  
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td style="width:5%;"><?=$items[$i]['ten']?></td>
        <td style="width:40%;"><img src="<?=_upload_slideshow.$items[$i]['thumb']?>" width="300"/></td>  
        <td style="width:5%;"><?=$items[$i]['link']?></td>     		
		<td style="width:5%;"><a href="index.php?com=slideshow&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=slideshow&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=slideshow&act=add_photo"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>