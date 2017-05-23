<style>
.tieude_center3{
	margin-top:100px;
}
table{
	border-bottom: 1px solid #ccc;
padding:10px;
}
.ds_giohang2 table tr{
	
	
}
.tieude_gh{
border-bottom: 1px solid #d6d6d6 !important;
height:54px;
width:100%;
font-weight:bold;
}
.hinh_gh{
float:left;
margin:10px;
}
.mota_hinh{

text-align:left;
width:450px;
height:80px;
margin:10px;
}
.nutxoa{
background:url(images/delete.png) top center no-repeat;
cursor:pointer;
border:none;
}
.right_gh{
	float:right;
	
	width:300px;
	text-align:left;
	margin:10px;
	
}
.right_gh span{
	float:right;

	
}
.right_gh ul li{
	line-height:30px;

	
}
.nutgh{
	
 height: auto;
    font-size: 16px;
    line-height: 24px;
    padding: 8px 20px;
    background: #f58320;
    color: #ffffff;
    border: 0px;
    outline: 0px;
    position: relative;
    overflow: hidden;
    z-index: 1;
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 400;
	
	
}
.canhnut{
	
margin:10px;	
	
}
.canhnut input{
	
margin:5px;	
	
}
</style>


<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.formgiobo.pid.value=pid;
			document.formgiobo.command.value='delete';
			document.formgiobo.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.formgiobo.command.value='clear';
			document.formgiobo.submit();
		}
	}
	function update_cart(){
		document.formgiobo.command.value='update';
		document.formgiobo.submit();
	}
</script>

<div class="container-fluid">
<div class="tieude_center3"><h3>GIỎ HÀNG CỦA BẠN</h3></div>
	<div class="ds_giohang2">
    
			<form name="formgiobo" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" /> 
				 <table width="100%">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr class="tieude_gh"><td align="center">STT</td><td>Sản phẩm</td><td align="center">Giá</td><td align="center">Số lượng</td><td align="center">Tổng giá</td><td align="center">Xóa</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];					
					$pname=get_product_name($pid);
					$pma=get_masp($pid);
					$phinh=get_hinh($pid);
					$pmota=get_mota($pid);
					$pkodau=get_kodau($pid);
					$psale=get_giagiam($pid);
					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td width="10%" align="center"><?=$i+1?></td>
            		<td width="29%">
					
					 <a href="chi-tiet-san-pham/<?=$pkodau?>-<?=$pid?>.html">
				
                    	<div class="hinh_gh">  <img src="upload/sanpham/<?=$phinh?>" width="50"/></div>
      					  <div class="mota_hinh">
      					  <ul>
       				 <li> <b><?=$pname?></b><span style="font-size:11px">[ <?=$pma?>]</span></li>
        			 <li style="font-size:12px;"> <i><?=$pmota?></i></li>
        				  </ul>
       					 </div>
        
                    </a>
                    
                    </td>
                   
                     <td width="17%" align="center"><b>
					<?php 
					if($psale ==0) 
					echo number_format(get_price($pid),0, ',', '.').'đ';
					else 
					echo number_format($psale,0, ',', '.').'đ';
					 ?>
                    
                    </b></td>
                    <td width="15%" align="center">
                    
                 <select onchange="update_cart()" name="product<?=$pid?>" >
                    <?php 
					for($k=1;$k<=20;$k++)
					{
						?>
                    <option value="<?=$k?>" <?php  if($q==$k) echo 'selected="selected"';   ?>><?=$k?></option>
                   
                    	<?php
					}
					?>
                    </select>
                    
                    
                    </td>                    
                    <td width="18%" align="center">
						<?php 
					if($psale ==0) 
					echo number_format(get_price($pid)*$q,0, ',', '.').'đ';
					else 
					echo number_format(get_giagiam($pid)*$q,0, ',', '.').'đ';
					 ?>
                    
				
                    
                    </td>
                    <td width="10%" align="center"><a href="javascript:del(<?=$pid?>)"><img src="images/delete.png" border="0" /></a></td>
            		</tr>
            <?php					
				}
			?>
				<tr><td colspan="8">
                
                <i style="padding:10px">Đặt hàng qua điện thoại <?=$row_setting['hotline']?></i>
               	<div class="right_gh">
                
                <ul>
                <li>Phí vận chuyển <span> <?= number_format($row_setting['phivc'],0, ',', '.').'đ';?></span></li>
 
                <li>Tổng cộng:<span style="color:#FF0000;font-size:20px;font-weight:bold">
				
                
            
                
                <?= number_format( get_ordersale_total($pid)+$row_setting['phivc'],0, ',', '.').'đ';?>
				</span>
                
                </li>
                </ul>
                
                </div>
                </td>
                </tr>
                
              
                
                
                <tr>
                	<td colspan="6" align="right">

                    <div class="canhnut">
                 <input type="button" value="Mua tiếp" onclick="window.location='http://<?=$config_url?>/index.html'" class="nutgh">
               
               
                
                
           
  			 <input type="button" value="Thanh toán" onclick="window.location='http://<?=$config_url?>/thanh-toan.html'" class="nutgh">
  
             
                </div>
                    </td>
                </tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>Không có sản phẩm nào trong giỏ hàng!</td>";
			}
		?>
        </table>			
  </form>
         </div>
      </div>