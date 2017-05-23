<h2>Chia sẻ</h2>
<table class="blue_table">
	<tr>
		
       	<th style="width:20%;">Facebook</th>
       	<th style="width:20%;">Skype</th>
		
		<th style="width:20%;">Google +</th>       
        <th style="width:15%;">Youtube</th>       
		<th style="width:5%;">Sửa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:20%;"><?=$items[$i]['facebook']?></td>
        <td style="width:20%;"><?=$items[$i]['twinter']?></td>
		
		<td style="width:20%;"><?=$items[$i]['google']?></td>
		<td style="width:15%;"><?=$items[$i]['youtube']?></td>
		
		<td style="width:5%;"><a href="index.php?com=nhung_face&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
        
	</tr>
		
	<?php	}?>
</table>
