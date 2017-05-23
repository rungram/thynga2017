<?php 
            $id =  addslashes($_GET['id']);
			$d->reset();
			$sql_tungdanhmuc="select * from #_thuvienanh where hienthi = 1 and thumb='$id'  order by stt asc ";
			$d->query($sql_tungdanhmuc);	
			$result_hinhanh=$d->result_array();	
			
			$d->reset();
			$sql_laycat="select * from #_product_cat where hienthi =1 and id='$id'";
			$d->query($sql_laycat);	
			$result_cat=$d->fetch_array();	
			
			$d->reset();
			$sql_laylist="select * from #_product_list where hienthi =1 and id='".$result_cat['id_list']."'";
			$d->query($sql_laylist);	
			$result_laylist=$d->fetch_array();	
			
						
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=15;
			$maxP=5;
			$paging=paging_home($result_hinhanh , $url, $curPage, $maxR, $maxP);
			$result_spnam=$paging['source'];
            
			
			$total_sp = count($result_spnam);
        ?>
<div class="bg-white">
    <div class="clearfix"></div>
    <div class="col-12" id="san-pham">
    <?php
	for ($i=0;$i<count($result_hinhanh);$i++)
	{ 
	?>
        <div class="col-4 item">
            <div class="shadow-1">
                    <h3>
                        <a href="#"><?=$result_hinhanh[$i]["ten_vi"]?></a>
                    </h3>
                    <div class="image-container">
                        <a href="upload/thuvienanh/<?php echo $result_hinhanh[$i]["photo"];?>" target="_blank">
                            <img class="img-responsive" src="upload/thuvienanh/<?php echo $result_hinhanh[$i]["photo"]; ?>" alt="<?=$result_hinhanh[$i]["thumb"]?>" alt="">
                        </a>
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