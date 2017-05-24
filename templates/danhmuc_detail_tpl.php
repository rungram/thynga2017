<?php 
            $id =  addslashes($_GET['id']);
			$d->reset();
			$sql_tungdanhmuc="select * from #_product where hienthi =1 and id_list='$id'  order by stt asc ";
			$d->query($sql_tungdanhmuc);	
			$result_spnam=$d->result_array();	
			
			$d->reset();
			$sql_laylist="select * from #_product_list where hienthi =1 and id='$id'";
			$d->query($sql_laylist);	
			$result_laylist=$d->fetch_array();	
			
			
						
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=30;
			$maxP=5;
			$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
			$result_spnam=$paging['source'];
            
			
			$total_sp = count($result_spnam);
			
			$d->reset();
			$sql_list ="select * from #_product_cat where hienthi=1 and id_list='$id' order by stt asc limit 0,8";
			$d->query($sql_list);
			$list =$d->result_array();
        ?>


<div class="bg-white">
    <div class="col-12">
        <div class="col-12">
            <div class="related-news product-list">
                <div class="bg-orange">
                    <div class="col-12">
                        <ul>
                        <?php for($i=0,$count_l=count($list);$i<$count_l;$i++){
                        ?>
                            <li><a href="danh-muc-cat/<?=$list[$i]["tenkhongdau"]?>-<?=$list[$i]["id"]?>.html"><?=$list[$i]["ten_vi"]?></a></li>
                        <?php }?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="bottom-arrow"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="col-12" id="san-pham">
    <?php
	for ($i=0;$i<count($result_spnam);$i++)
	{ 
	?>
        <div class="col-4 item">
            <div class="shadow-1">
                    <h3>
                        <a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"><?=$result_spnam[$i]["ten_vi"]?></a>
                    </h3>
                    <div class="image-container">
                        <a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html">
                            <img class="img-responsive tva" src="upload/sanpham/<?php if($result_spnam[$i]["tc_big"]==1) echo $result_spnam[$i]["photo"]; else echo $result_spnam[$i]["photo"] ?>" alt="<?=$result_spnam[$i]["ten_vi"]?>" alt="">
                        </a>
                    </div>
                    <div class="product-meta">
                        <div class="col-6 text-center pricing">
                            Giá: <?php echo number_format ($result_spnam[$i]['gia'],0,",",","),"";?>
                        </div>
                        <div class="col-6">
                            <a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html" class="common-read-more">Chi tiết</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php
	} 
	?>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>