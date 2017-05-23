
<script type="text/javascript" src="fancybox/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		
	</style>
<?php
if(isset($_GET['id']))
{	
	$id =  addslashes($_GET['id']);
	
	$d->reset();
	$sql_tanglx="update  #_product set luotxem=luotxem+1 where id='$id'";
	$d->query($sql_tanglx);
	
	$d->reset();
	$sql_chitietsp="select *  from #_product where hienthi= 1 and id='$id'";
	$d->query($sql_chitietsp);
	$result_chitietsp=$d->result_array();
	
	$id_list=$result_chitietsp[0]['id_list'];
	
	$d->reset();
	$sql_laylist="select ten_$lang from #_product_list where hienthi= 1 and id='$id_list'";
	$d->query($sql_laylist);
	$result_laylist=$d->fetch_array();
	
	$d->reset();
	$sql_spkhac="select id,ten_$lang,tenkhongdau,thumb,gia,masp,luotxem  from #_product where hienthi= 1 and id_list ='$id_list' and id<>'$id' order by stt asc limit 0,12";
	$d->query($sql_spkhac);
	$result_spkhac=$d->result_array();
	
	
	

}
?>
<div class="tieude_center">CHI TIẾT SẢN PHẨM</div>
<div class="bo_center">


<div class="chitiet_sp">
	<div class="hinh_chitiet">	
<a class="fancybox" href="upload/sanpham/<?=$result_chitietsp[0]['photo']?>" data-fancybox-group="gallery" ><img src="upload/sanpham/<?=$result_chitietsp[0]['thumb2']?>" /></a>

	</div>
	<div class="vung_info">
		
 				<table width="100%" border="0" cellspacing="0" cellpadding="0">
    
    	<tbody><tr class="rowInfo01">
          <td valign="top" class="colInfo1" width="30%">Tên</td>
          <td width="10" valign="top" class="colInfo2" align="center"> : </td>
          <td class="colInfo2"><?=$result_chitietsp[0]["ten_$lang"]?></td>
       </tr>
       
       <tr>
          <td valign="top" class="colInfo1" width="30%">Mã số </td>
          <td width="10" valign="top" class="colInfo2" align="center"> : </td>
          <td class="colInfo2"><span class="maso"><?=$result_chitietsp[0]['masp']?></span></td>
       </tr>
       
       
			
            
      <tr>
          <td valign="top" class="colInfo1">Lượt xem </td>
          <td width="10" valign="top" class="colInfo2" align="center"> : </td>
          <td class="colInfo2"><?=$result_chitietsp[0]['luotxem']?></td>
      </tr>
      
      <tr class="rowInfo01">
          <td valign="top" class="colInfo1" width="30%">Bảo hành </td>
          <td width="10" valign="top" class="colInfo2" align="center"> : </td>
          <td class="colInfo2"><?=$result_chitietsp[0]['baohanh']?></td>
       </tr>
       
       <tr>
          <td valign="top" class="colInfo1">Giá</td>
          <td width="10" valign="top" class="colInfo2" align="center"> : </td>
          <td class="colInfo2"><span class="price"><?php if($result_chitietsp[0]['gia']!=0) echo '<b>'.number_format ($result_chitietsp[0]['gia'],0,",",".").'</b>'." VND";else echo _lienhe ?></span> </td>
        </tr>
        
         <tr>
        <td valign="top" class="colInfo1">Chia sẻ </td>
        <td width="10" valign="top" class="colInfo2" align="center"> : </td>
        <td class="colInfo2"><div class="go">
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
</div><div class="go"><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<g:plusone></g:plusone></div></td>
      </tr>
        
    </tbody></table>

	</div>




</div><!--chitiet_sp-->
<div class="clear"></div>

<div class="bo_center">

<?=$result_chitietsp[0]["noidung_$lang"]?>
</div>
<div class="clear"></div>

<?php
for($i=0,$count_spkhac=count($result_spkhac);$i<$count_spkhac;$i++)
 {
	 
	 ?>
          <div class="khung_tungsp">
    
    <div class="hinh_tungsp">
   
    <a href="chi-tiet-san-pham/<?=$result_spkhac[$i]["tenkhongdau"]?>-<?=$result_spkhac[$i]["id"]?>.html"><img src="upload/sanpham/<?=$result_spkhac[$i]['thumb']?>" border="0" width="100%" height="100%" alt="<?=$result_spkhac[$i]["ten_$lang"]?>" class="button float-shadow"/></a>
    </div>
	
    	
    <div class="thontin_tungsp">
     <a href="chi-tiet-san-pham/<?=$result_spkhac[$i]["tenkhongdau"]?>-<?=$result_spkhac[$i]["id"]?>.html"><?=$result_spkhac[$i]["ten_$lang"]?>
   </a><br />
	
    </div>
    
   
 
    
    </div> 
   <?php
 }


?>

</div>
