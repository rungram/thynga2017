<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:20%;">Tên </th>
        <th style="width:20%;">Điện thoại</th>
       
        <th style="width:20%;">Email</th>
		<th style="width:34%;">Nội dung</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++)
	{
	?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['id']?></td>
        <td style="width:20%;"><?=$items[$i]['ten']?></td>
         <td style="width:20%;"><?=$items[$i]['dienthoai']?></td>
		<td style="width:20%;"><?=$items[$i]['email']?></td>
		<td style="width:34%;"><?=$items[$i]['noidung']?></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>