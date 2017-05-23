<?php
	
	$d->reset();
	$sql_qc_slide ="select *  from #_banner order by stt asc limit 0,2";
	$d->query($sql_qc_slide);
	$qc_slide=$d->result_array();
	
	$d->reset();
	$sql_tungdanhmuc="select * from #_product where hienthi =1 order by stt desc limit 0,5";
	$d->query($sql_tungdanhmuc);
	$result_spnam=$d->result_array();
	
	$d->reset();
	$sql_video="select * from #_video where hienthi =1 order by stt desc limit 0,3";
	$d->query($sql_video);
	$result_video=$d->result_array();
	
    $d->setTable('gioithieu');
	$d->select("noidung_$lang,mota_$lang,link");
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$noidung_about= $row["noidung_$lang"];
		if(strlen ($noidung_about) > 200)
		{
		    $noidung_about = substr ($noidung_about, 0, 500);
		    $noidung_about = substr ($noidung_about, 0, strrpos ($noidung_about, ' ')).'...';
		}
		$noidung_mota= $row["mota_$lang"];
		$noidung_link= $row['link'];
	}
	$d->reset();
	$sql_hinhhanh="select * from #_thuvienanhcapcha where hienthi =1 order by stt asc ";
	$d->query($sql_hinhhanh);
	$result_hinhanh=$d->result_array();
?>
<div class="thy-row section">
            <div class="col-12">
                <div class="col box box-1 col-1-3">
                    <div class="shadow-1">
                        <div class="inside-2">
                            <h3>Giới thiệu</h3>
                            <div class="box-content">
                            <?=$noidung_about?>
                            </div>
                            <div class="float-right">
                                <a href="gioi-thieu.html" class="read-more">Xem thêm</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col box box-1 col-1-3">
                    <div class="shadow-1">
                        <div class="inside-2">
                            <h3>Tin tức</h3>
                            <div class="box-content">
                                <ul class="news-list">
                                    <?php include _template."layout/tinnoibat.php"; ?>
                                </ul>
                            </div>
                            <div class="float-right">
                                <a href="tin-tuc.html" class="read-more">Xem thêm</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col box box-1 col-1-3">
                    <div class="shadow-1">
                        <div class="inside-2">
                            <h3>Hình ảnh hoạt động</h3>

                            <div class="box-content">
                                <ul class="thumbs-list">
                                <?php
                            	for ($i=0;$i<count($result_hinhanh);$i++)
                            	{ 
                            	?>
                                    <li><a href="chi-tiet-anh/<?=$result_hinhanh[$i]['tenkhongdau']?>-<?=$result_hinhanh[$i]['id']?>.html">
                                    <img src="upload/thuvienanhcapcha/<?php echo $result_hinhanh[$i]["photo"];?>" style="overflow: hidden;padding-right: 8px;padding-top: 8px;" height="61px" alt="<?=$result_spnam[$i]["thumb"]?>"/></a></li>
                                <?php
                            	} 
                            	?>
                                </ul>
                            </div>
                            <div class="float-right">
                                <a href="thu-vien-anh.html" class="read-more">Xem thêm</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

    <div class="clearfix"></div>
</div>
<div class="thy-row section">
            <div class="col-12">
                <div class="col-12">
                    <div class="box-2">
                        <h3 class="box-title">
                            Sản phẩm nổi bật
                            <div class="float-right">
                                <a href="#" class="read-all">
                                    Tất cả sản phẩm
                                </a>
                            </div>
                        </h3>
                        <div class="clearfix"></div>
                        <div class="box-content">
                            <div class="owl-carousel nav-style-1" id="product-carousel">
                            <?php for($i=0,$count_spnam=count($result_spnam);$i<$count_spnam;$i++) { ?>    
                                <div class="item">
                                    <div class="image-container">
                                        <a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html">
                                            <img class="img-responsive" src="upload/sanpham/<?php if($result_spnam[$i]["tc_big"]==1) echo $result_spnam[$i]["thumb"]; else echo $result_spnam[$i]["thumb"] ?>" alt=""/>
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h4>
                                            <a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"><?=$result_spnam[$i]["ten_vi"]?></a>
                                        </h4>
                                        <p>Giá:<?php echo number_format ($result_spnam[$i]['gia'],0,",",","),"";?></p>
                                        <a class="detail" href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html">Chi tiết</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

    <div class="clearfix"></div>
</div>
<div class="thy-row section end-section">
            <div class="col-12">
                <div class="box-3">
                    <h3>VIDEO NỔI BẬT</h3>
                    <div class="box-content">
                    <?php for($i=0,$count_spnam=count($result_video);$i<$count_spnam;$i++) { ?>    
                        <div class="col-4 item">
                            <iframe class="video" width="100%" height="300px" src="https://www.youtube.com/embed/<?php echo $result_video[$i]['url'] ?>" frameborder="1" allowfullscreen></iframe>
                            <p><?=$result_video[$i]["ten_vi"]?></p>
                        </div>
                    <?php } ?>     
                        <div class="clearfix"></div>
                        <div class="text-right">
                            <a href="video.html" class="read-more-2">Xem thêm ></a>
                        </div>
                    </div>
                </div>
            </div>
    <div class="clearfix"></div>
</div>