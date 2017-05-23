<?php 
         
			$d->reset();
			$sql_tinl="select * from #_tinloai1_1 where hienthi =1 order by id desc";
			$d->query($sql_tinl);	
			$result_tinl=$d->result_array();		
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=10;
			$maxP=5;
			$paging=paging_home($result_tinl , $url, $curPage, $maxR, $maxP);
			$result_tinl=$paging['source'];
			
			
			$sql_tinll="select * from #_tinloai1_1 where hienthi =1 order by stt asc";
			$d->query($sql_tinll);	
			$result_tinll=$d->result_array();	

?>
<div class="bg-white">
    <div class="thy-row">
    <?php for($i=0,$count_tll=count($result_tinl);$i<$count_tll;$i++) { ?>   
        <div class="news-item">
            <div class="col-12">
                <h2><a href="tin-tuc-detail/<?=$result_tinl[$i]['tenkhongdau']?>-<?=$result_tinl[$i]['id']?>.html"><?=$result_tinl[$i]['ten_vi']?></a></h2>
            </div>
            <div class="col-3">
                <a href="tin-tuc-detail/<?=$result_tinl[$i]['tenkhongdau']?>-<?=$result_tinl[$i]['id']?>.html">
                    <img class="img-responsive" src="upload/tinloai1_1/<?=$result_tinl[$i]["thumb"]?>" alt="">
                </a>
            </div>
            <div class="col-9">
                <p>
                    <?=$result_tinl[$i]["mota_vi"]?>
                </p>
                <a href="tin-tuc-detail/<?=$result_tinl[$i]['tenkhongdau']?>-<?=$result_tinl[$i]['id']?>.html" class="read-more">Chi tiết</a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } ?> 
    </div>
</div> 