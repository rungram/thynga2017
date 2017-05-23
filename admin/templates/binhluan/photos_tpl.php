<h3>Danh sách bình luận sản phẩm</h3>
<style>

label {
    display: inline-block;
    background: #e40c0c;
    font-size: 12px;
    padding: 0 5px;
    color: #fff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    position: relative;
    top: -10px;
    left: -2px;
    height: 20px;
    line-height: 20px;
}


</style>
<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>   
        <th style="width:20%;">Tên sản phẩm</th>    
		<th style="width:20%;">Câu hỏi</th> 
        <th style="width:20%;">Tên</th>   
        <th style="width:10%;">Ngày gửi</th>   
        <th style="width:10%;">Trình trạng</th>  
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$i+1?></td>        
        
		<td align="center" style="width:20%;">
        
		<?php
		$sql_sp="select ten_vi from table_product where id='".$id_sp."'";
		$result_sp=mysql_query($sql_sp);
	 	$item_sp =mysql_fetch_array($result_sp);
		echo @$item_sp['ten_vi'];
		?>  
    
        </td>
       
        <td style="width:20%;"><?=$items[$i]['noidung']?></td>      
        <td style="width:20%;"><?=$items[$i]['hoten']?></td>    
        <td style="width:10%;"><?=$items[$i]['ngaytao']?></td>        
        <td style="width:10%;">
		
		<?php
		$d->reset();
		$sql_bl2="select *  from #_binhluan where id_sp = '".$id_sp."' and  id='".$items[$i]['id']."' and id_parent =0  and (traloi IS  NULL or traloi ='')";
		$d->query($sql_bl2);
		$result_bl2=$d->result_array();
		
		
		$d->reset();
		$sql_bl3="select *  from #_binhluan where id_sp = '".$id_sp."' and  id_parent='".$items[$i]['id']."'   and (traloi IS  NULL or traloi ='')";
		$d->query($sql_bl3);
		$result_bl3=$d->result_array();
		$tam = count($result_bl2)+count($result_bl3);
		if($tam>0)  echo '<label>'.$tam.'</label>  bình luận chưa trả lời';
		else echo 'Không có bình luận mới';
		?>  
        
        
        
        </td>        
		<td style="width:5%;"><a href="index.php?com=binhluan&act=edit_photo&id=<?=$items[$i]['id']?>&id_sp=<?=$id_sp;?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=binhluan&act=delete_photo&id=<?=$items[$i]['id']?>&id_sp=<?=$id_sp;?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<div class="paging"><?=$paging['paging']?></div>