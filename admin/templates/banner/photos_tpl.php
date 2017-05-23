<h3><a href="index.php?com=banner&act=add_photo">Thêm hình ảnh</a></h3>
<font color="#FF0000"><b>Lưu ý dùng banner có độ rộng(385px) và cao(175px) để ảnh banner đẹp nhất</b></font>
<table class="blue_table">
	<tr>
		<th style="width:5%;">ID</th>      
		<th style="width:65%;">Hình ảnh</th>   
        <th style="width:20%;">Link web</th>  
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['id']?></td>
		
        <td style="width:65%;">
       <img src="<?=_upload_banner.$items[$i]['thumb']?>"  />
        </td>  
        <td style="width:20%;"><?=$items[$i]['link']?></td>       		
		<td style="width:5%;"><a href="index.php?com=banner&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=banner&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=banner&act=add_photo"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>