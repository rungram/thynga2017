<?php 
	$d->reset();
	$sql_sptc= "select * from #_product where tc_big>0 order by stt asc,id desc limit 0,20";
	$d->query($sql_sptc);
	$sptc = $d->result_array();
	
	$d->reset();
	$sql_sptc_total= "select * from #_product where tc_big>0";
	$d->query($sql_sptc_total);
	$sptc_total = $d->result_array();
	
	
?>



 <?php for($i=0,$count_tc=count($sptc);$i<$count_tc;$i++)

 { 
 		$a = "style='background: url(upload/sanpham/".$sptc[$i]['thumb_tc'].") no-repeat center top'";
 	
 ?>
  <div class="p-item cell-<?=$sptc[$i]["tc_big"]?>" style="position: absolute; left: 0%; top: <?php if($sptc[$i]["tc_big"]==2) echo '0px'; else echo '578px';?>"> <div class="p-badge">  </div>

 <div class="p-item-bound" <?php if($sptc[$i]["tc_big"]==2) echo $a;?> > <a href="chi-tiet-san-pham/<?=$sptc[$i]["tenkhongdau"]?>-<?=$sptc[$i]["id"]?>.html" class="p-link-prod" title="<?=$sptc[$i]["ten_vi"]?>"></a> <figure class="p-image"> <span> <a href="chi-tiet-san-pham/<?=$sptc[$i]["tenkhongdau"]?>-<?=$sptc[$i]["id"]?>.html" title="<?=$sptc[$i]["ten_vi"]?>"> <img class="lazy" src="upload/sanpham/<?=$sptc[$i]["thumb"]?>" data-original="" alt=""> </a> </span> </figure> <div class="p-info"> <div class="p-top-info"> <div class="p-info-show"> <div class="p-name"> <a href="chi-tiet-san-pham/<?=$sptc[$i]["tenkhongdau"]?>-<?=$sptc[$i]["id"]?>.html" title="<?=$sptc[$i]["ten_vi"]?>"><h3><?=$sptc[$i]["ten_vi"]?></h3></a> </div>

 <div class="p-price">    <span class="p-current-price"><?php echo number_format ($sptc[$i]['gia'],0,",",".");?><span>đ</span></span>    </div>

 </div>

 </div>

 <div class="p-hide-info">  <div class="best-seller-order"> 

				<?=$sptc[$i]["mota_vi"]?>

 </div>

  <div class="p-promotion"> <div class="hightlight-des">
  <?=$sptc[$i]["mota_en"]?>
</div>

 </div>

 </div>

 </div>

 </div>

 </div><!--sptrangchu_anhlon-->

<?php }?>


<div class="p-item cell-1 p-item-more" style="position: absolute; left: 50%; top: 2023px; transition-property: opacity, transform; transition-duration: 0.4s; transform: translate3d(0%, 0px, 0px);"> <div class="p-item-bound"> <a href="san-pham-trang-chu.html" class="p-more" data-current="19"> <span> <i class="icons p-more-icon"></i> <label>Xem thêm <strong><?=count($sptc_total)?></strong> sản phẩm</label> </span> </a> </div>

 </div>

            


            


            

