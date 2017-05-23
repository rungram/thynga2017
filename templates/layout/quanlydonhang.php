
<?php
	$user =	$_SESSION['user_dn'];
	$d->reset();
	$sql ="select * from #_order where user='".$user."' order by id_order asc";
	$d->query($sql);	
	$list_order =$d->result_array();	
	

?>
<style>

.fhd-cl-lprod li{
	line-height:40px;
	border-top:1px solid #cacaca;
	padding-left:5px;
	
}
.fhd-cl-lprod li a{
	padding:5px;
	padding-left:30px;
	background: url(images/icon-post2.png) no-repeat 5px 50%;
	
}
thead{
	border: 1px solid #dedede;
    background: #cccccc;
    color: #333333;
    font-weight: bold;
    font-size: 13px;
	
}
tbody{
	
    font-size: 12px;
	
}
.btn-del {
    display: inline-block;
    padding: 2px 10px;
    padding-left: 20px;
    color: #FFFFFF;
    background-color: #f58320;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    -ms-border-radius: 4px;
    border-radius: 4px;
    position: relative;
    line-height: 22px;
}
.le{
    background: #e7e7e7 !important;
}
.chan{
    background: #fafafa !important;
}
table,td,tr,th{
	border:1px solid #cacaca;
	padding:2px;
}
</style>

<script>

	$(document).ready(function(e) {

		$(".del_order").click(function() {

				var data_id = {
					id : $(this).attr('data-id')
				};
				var confim = confirm("Bạn có muốn thực hiện không ?");
				if (confim == true) {
					//console.log(data_user);
					$.ajax
					({
						type: "POST",
						dataType : 'json',
						url: "delete_order.php",
						data: data_id,
						cache: false,
						success : function (result){
										if (result==1){
											location.reload();
										}
										else
											alert('Lỗi hệ thống - vui lòng thử lại');
										
									},
					})	
				}
				
		});

	});

	
</script>
<div class="product-list">
                    
  <form action="/member/product/product.html" method="post" name="manage" id="manage"> 
                
                <table id="table_list" class="table table-striped">
                    <thead>
                        <tr>
                     
                        <th align="center" width="5%">STT</th>
                        <th align="center" width="5%">Mã</th>
                        <th align="center" width="65%">Danh sách đặt hàng</th>
                        <th align="center" width="10%">Ngày đặt</th>
                        <th align="center" width="10%">Trạng thái</th>
                        <th align="center" width="5%">Hủy</th>
                        </tr>
                    </thead>
                <tbody>
                <?php 
				
				if(count($list_order)>=1)
				for($i=0,$count_l=count($list_order);$i<$count_l;$i++){
					if(($i+1)%2==0) $class ='chan';else $class ='le';
					$d->reset();
					$sql2 ="select * from #_donhang where id_order ='".$list_order[$i]["id_order"]."'  order by id desc";
					$d->query($sql2);	
					$list_donhang =$d->result_array();	
					$sum[$i]=0;
					 ?>
                  <tr class="<?=$class?>">
                      	<td><?=$i+1?></td>
                        <td><?=$list_order[$i]["ma_donhang"]?></td>
                        <td>
                        
                        <!--danh sach don hang -->
                         <table style="width:100%" >
                            
                            <tbody>
                            	
                                <?php for($j=0,$count_dh=count($list_donhang);$j<$count_dh;$j++){
									
									 $sum[$i] = $sum[$i] + $list_donhang[$j]['tonggia'];
									 ?>
                                <tr>
                                <td><?=$j+1?></td>	
                                <td><?=$list_donhang[$j]["tenmathang"]?></td>	
                                <td align="center"><img src="upload/sanpham/<?=$list_donhang[$j]["hinh"]?>" width="50" /></td>	
                                <td align="center"><?php echo number_format ($list_donhang[$j]['giamathang'],0,",",".")." VNĐ";?></td>
                                <td align="center"><?=$list_donhang[$j]["soluong"]?></td>	
                                <td align="center"><?php echo number_format ($list_donhang[$j]['tonggia'],0,",",".")." VNĐ";?></td>	
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
                        <td><?=$list_order[$i]["ngaytao"]?></td>	
                        <td>
						<?php
                        	if($list_order[$i]["trangthai"]==3)	 	echo 'Đã hủy';
							elseif($list_order[$i]["trangthai"]==2) echo 'Đã thanh toán';
							elseif($list_order[$i]["trangthai"]==1) echo 'Đang xử lý';
							else								 	echo 'Mới đặt';
						?>
                        <?php
                        	if($list_order[$i]["trangthai"]==0 || $list_order[$i]["trangthai"]==1 )	
							{
								?>
                                
							<p>[-<a  href="gio-hang/sua-don-hang-<?=$list_order[$i]["id"]?>.html" class="edit_order" 
                            data-id="<?=$list_order[$i]["id"]?>"><b>Sửa</b></a>-]</p>	
                                <?php
							}
						?>
                        </td>	
                        <td><a  href="javascript:void(0);" class="del_order" data-id="<?=$list_order[$i]["id"]?>"><b>Xóa</b></a></td>	

                </tr>
                <?php }
				
				else echo '<tr class="center">
                                        <td colspan="99" class="notfound-data">
                                            Bạn chưa có đơn hàng nào
                                        </td>
                          </tr>';
				?>
                
                </tbody>
                
    </table>
    <input type="hidden" name="do_action" id="do_action" value="">
  </form>
                
</div>