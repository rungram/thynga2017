<h3><a href="index.php?com=download&act=add_list">Thêm danh mục</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		<th style="width:30%;">Upload cấp 1</th>
         <th style="width:10%;">Logo cấp 1</th>		
        <th style="width:10%;">Tên việt</th>
        <th style="width:10%;">Tên anh</th>
        <th style="width:10%;">Tên trung</th>
         <th style="width:10%;">Logo cấp 2</th>	
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
        <td align="center" style="width:15%;">
        
		<?php
		$sql_danhmuc1="select ten_vi,thumb from table_download_list where id='".$items[$i]['id_list']."'";
		$result=mysql_query($sql_danhmuc1);
	 	$item_danhmuc1 =mysql_fetch_array($result);
	 	echo @$item_danhmuc1['ten_vi'];
	
		?>  
    	<td align="center" style="width:10%;">
       
	 	<img src="../upload/download/<?=@$item_danhmuc1['thumb'];?>"   width="100" height="100"/> 
     	</td>
		<td align="center" style="width:10%;"><?=$items[$i]['ten_vi']?> </td>
        <td align="center" style="width:10%;"><?=$items[$i]['ten_en']?> </td>	
        <td align="center" style="width:10%;"><?=$items[$i]['ten_cn']?> </td>	
        <td align="center" style="width:20%;"><img src="../upload/download/<?=$items[$i]['thumb']?>"   width="100" height="100"/> </td>	
      		
	
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=download&act=man_cat&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=download&act=man_cat&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;"><a href="index.php?com=download&act=edit_cat&id=<?=$items[$i]['id']?>&id_list=<?=$items[$i]['id_list']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=download&act=delete_cat&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=download&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>