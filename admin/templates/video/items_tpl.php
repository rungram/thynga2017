<h3><a href="index.php?com=video&act=add">Thêm mới video</a></h3>

<table class="blue_table">
	<tr>
		
		<th style="width:38%;">Link video</th>
		
		<th style="width:6%;">Sửa</th>
		
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		
        <td style="width:38%;"><?=$items[$i]['url']?></td>
		
		<td style="width:6%;"><a href="index.php?com=video&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>