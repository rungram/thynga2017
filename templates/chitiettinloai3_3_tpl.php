<?php 
         
			$id =  addslashes($_GET['id']);
			
			$d->reset();
			$sql_tanglx="update  #_tinloai1_1 set luotxem=luotxem+1 where id='$id'";
			$d->query($sql_tanglx);
	
	
			$sql_detail="select * from #_tinloai1_1 where id='$id'";
			$d->query($sql_detail);	
			$result_detail=$d->fetch_array();	
			
			
			
			$sql_tinll="select * from #_tinloai1_1_list where hienthi =1 order by stt asc";
			$d->query($sql_tinll);	
			$result_tinll=$d->result_array();	
			
			
			$d->reset();
			$sql_tinlq="select * from #_tinloai1_1 where  id<>'$id' limit 0,5";
			$d->query($sql_tinlq);	
			$result_tinlq=$d->result_array();

?>
<div class="bg-white">
    <div class="bg-black">
        <div class="col-12">
            <div class="news-summary">
                <div class="col-12">
                    <h2><a href="#"><?=$result_detail['ten_vi']?></a></h2>
                </div>
                <div class="col-6">
                    <a href="#">
                        <img class="img-responsive" src="upload/tinloai1_1/<?=$result_detail['thumb']?>" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <p>
                        <?=$result_detail['mota_vi']?>
                    </p>
                    <div class="down-arrow"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-12">
        <div class="col-12">
            <?=$result_detail['noidung_vi']?>
            <div class="related-news">
                <h4>Tin liên quan</h4>
                <div class="bg-black">
                    <div class="col-12">
                        <ul>
                        <?php for($i=0,$count_tlq=count($result_tinlq);$i<$count_tlq;$i++) { ?>
                            <li><a href="tin-tuc-detail/<?=$result_tinlq[$i]['tenkhongdau']?>-<?=$result_tinlq[$i]['id']?>.html"><?=$result_tinlq[$i]['ten_vi']?></a></li>
                         <?php } ?>     
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>