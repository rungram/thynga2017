<style>
.donhang td{
	width:auto !important;
	
}
.le{
    background: #fff !important;
}
.chan{
    background: #D2FFFF !important;
}

</style>
<script language="javascript">			
	function select_status(id)
	{	
		
		var status = document.getElementById("trangthai").value;
		var dataString = 'id='+id+'&status='+status;
		var check = confirm("Bạn có muốn thay đổi!");
		if(check) {
					$.ajax
					({
						type: "POST",
						url: "change_status.php",
						data: dataString,
						cache: false,
						success: function(result)
						{
							//console.log(result);
							location.reload();
						} 
					 });
		} 
			
	}

	
</script>

<form action="#" method="post" name="frmLIST_PRODUCT" id="frmLIST_PRODUCT">

               
<table class="blue_table">
	<tr>
		<th align="center"  style="width:5%;">STT</th>
        <th align="center"  style="width:5%;">Mã</th>
        <th align="center"  style="width:75%;">Danh sách đặt hàng</th>
        <th align="center"  style="width:10%;">Ngày đặt</th>
        <th align="center"  style="width:10%;">Thay đổi trạng thái</th>
        <th align="center"  style="width:5%;">Hủy</th>
         
	</tr>
	
    <?php 
				
				if(count($items)>=1)
				for($i=0,$count_l=count($items);$i<$count_l;$i++){
					if(($i+1)%2==0) $class ='chan';else $class ='le';
					$d->reset();
					$sql2 ="select * from #_donhang where id_order ='".$items[$i]["id_order"]."'  order by id desc";
					$d->query($sql2);	
					$list_donhang =$d->result_array();	
					$sum[$i]=0;
					 ?>
                  <tr class="<?=$class?>">
                      	<td style="width:5% !important;"><?=$i+1?></td>
                        <td style="width:5% !important;"><?=$items[$i]["ma_donhang"]?></td>
                        <td style="width:75% !important;">
                        
                        <!--danh sach don hang -->
                         <table  class="donhang"  style="width:100% !important;">
                            
                            <tbody>
                            	
                                <?php for($j=0,$count_dh=count($list_donhang);$j<$count_dh;$j++){
									
									 $sum[$i] = $sum[$i] + $list_donhang[$j]['tonggia'];
									 ?>
                                <tr>
                                <td style="width:5% !important;"><?=$j+1?></td>	
                                <td style="width:25% !important;"><?=$list_donhang[$j]["tenmathang"]?></td>	
                                <td style="width:25% !important;" align="center"><img src="../upload/sanpham/<?=$list_donhang[$j]["hinh"]?>" width="50" /></td>	
                                <td style="width:15% !important;" align="center"><?php echo number_format ($list_donhang[$j]['giamathang'],0,",",".")." VNĐ";?></td>
                                <td style="width:10% !important;" align="center"><?=$list_donhang[$j]["soluong"]?></td>	
                                <td style="width:15% !important;" align="center"><?php echo number_format ($list_donhang[$j]['tonggia'],0,",",".")." VNĐ";?></td>	
                                </tr>
                                
                                 <?php }?>
                              <tr>
                                <td></td>	
                                <td></td>	
                                <td></td>	
                                <td></td>
                                <td align="center"><b>Tổng giá</b></td>	
                                <td align="center"><b><?php echo number_format($sum[$i],0,",",".")." VNĐ";?></b></td>	
                                </tr>
                      	    </tbody>
                          </table>
                        <!--danh sach don hang -->

                        </td>
                        <td  style="width:10%;"><?=$items[$i]["ngaytao"]?></td>	
                         <td>
     <select name="trangthai" class="trangthai" id="trangthai" onchange="select_status(<?=$items[$i]["id"]?>)">
     
     <option value="0" <?php if($items[$i]["trangthai"]==0) echo 'selected="selected"'; ?>>Mới đặt</option>
     <option value="1" <?php if($items[$i]["trangthai"]==1) echo 'selected="selected"'; ?>>Đang xử lý</option>
     <option value="2" <?php if($items[$i]["trangthai"]==2) echo 'selected="selected"'; ?>>Đã thanh toán</option>
     <option value="3" <?php if($items[$i]["trangthai"]==3) echo 'selected="selected"'; ?>>Đã hủy</option>
    
    </select>
                        </td>	
                        <td  style="width:5%;"><a href="index.php?com=qlgiohang&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>	

                </tr>
                <?php }
				
				else echo '<tr class="center">
                                        <td colspan="99" class="notfound-data">
                                            Bạn chưa có đơn hàng nào
                                        </td>
                          </tr>';
				?>
                
                
                
</table>
</form>

<div class="paging"><?=$paging['paging']?></div>