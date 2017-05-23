<?php 
	$d->reset();
	$sql_topbc= "select * from #_product where spdc<>0 order by stt asc,id desc limit 0,6";
	$d->query($sql_topbc);
	$top_bc = $d->result_array();
?>

<div class="best-seller">
    <div class="best-seller-title clearfix">
        <h3 class="left">Top bán chạy nhất</h3>
        <a href="top-ban-chay.html" target="_blank" class="best-seller-more right">Xem thêm <i class="fa fa-angle-right"></i> </a>
    </div>


    <div class="best-seller-content">
        <div class="best-seller-list">
            <!-- Slider main container -->
            <div class="swiper-container best-seller-swiper swiper-container-horizontal">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                     <?php for($i=0,$count_bc=count($top_bc);$i<$count_bc;$i++){ ?>
                       <div class="swiper-slide p-item col-lg-2 col-md-3 col-sm-4 col-xs-6 swiper-slide-active" style="width: 199.667px;"> 
                       
                       <div class="p-label icons best-seller-label"></div>

 <a href="chi-tiet-san-pham/<?=$top_bc[$i]["tenkhongdau"]?>-<?=$top_bc[$i]["id"]?>.html" title="<?=$top_bc[$i]["ten_vi"]?>" class="p-link-prod"></a> <figure class="p-image"> <span> 
 
 <a href="chi-tiet-san-pham/<?=$top_bc[$i]["tenkhongdau"]?>-<?=$top_bc[$i]["id"]?>.html" title="<?=$top_bc[$i]["ten_vi"]?>"> 
 <img src="upload/sanpham/<?=$top_bc[$i]["thumb"]?>" alt="<?=$top_bc[$i]["ten_vi"]?>"> </a> </span> 
 
 </figure> 
 
 
                         <div class="p-info"> 
                         <div class="p-top-info"> 
                         <div class="p-name"> 
                         <h3><a href="chi-tiet-san-pham/<?=$top_bc[$i]["tenkhongdau"]?>-<?=$top_bc[$i]["id"]?>.html" title="<?=$top_bc[$i]["ten_vi"]?>"></a><?=$top_bc[$i]["ten_vi"]?></h3> 
                         
                         </div>

 <div class="p-price">     <span class="p-current-price"><?php echo number_format ($top_bc[$i]['gia'],0,",",".");?><span>đ</span></span>     </div>

 </div>

 <div class="p-hide-info">  
 
     <div class="p-promotion"> 
            <?=$top_bc[$i]["mota_vi"]?>    
     </div>

  </div>

 </div>

 </div>
  					 <?php }?>
                </div>


            </div>


        </div>


    </div>


</div>