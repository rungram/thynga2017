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
	$chitiet_sp=$d->fetch_array();

	//list
	$d->reset();
	$sql_l="select * from #_product_list where hienthi= 1 and id='".$chitiet_sp['id_list']."'";
	$d->query($sql_l);
	$result_l=$d->fetch_array();
	
	//cat
	$d->reset();
	$sql_c="select * from #_product_cat where hienthi= 1 and id='".$chitiet_sp['id_cat']."'";
	$d->query($sql_c);
	$result_c=$d->fetch_array();
	
	$id_list = $chitiet_sp['id_list'];
	$d->reset();
	$sql_laylq="select * from #_product where hienthi =1 and id<>'$id' and id_list='$id_list' limit 0,5";
	$d->query($sql_laylq);
	$result_laylq=$d->result_array();
	
	$d->reset();
	$sql_spkhac="select id,ten_$lang,tenkhongdau,thumb,gia,masp,luotxem  from #_product where hienthi= 1 and id_list ='$id_list' and id<>'$id' order by stt asc limit 0,12";
	$d->query($sql_spkhac);
	$result_spkhac=$d->result_array();
	
	
		
	$url=getCurrentPageURL();
	
	
	//dem binh luan
	$d->reset();
	$sql_bl1="select  *  from #_binhluan where id_sp = '$id' and ( traloi <>'')";
	$d->query($sql_bl1);
	$result_bl1=$d->result_array();

	$d->reset();
	$sql_bl2="select *  from #_binhluan where id_sp = '$id' and (traloi IS  NULL or traloi ='')";
	$d->query($sql_bl2);
	$result_bl2=$d->result_array();
	
	$sum_comment = 2*count($result_bl1) + count($result_bl2);
	if(empty($sum_comment)) $sum_comment = 0;
}
?>

<div class="bg-white">
    <div class="bg-black">
        <div class="col-12">
            <div class="news-summary">
                <div class="col-12">
                    <h2><a href="#"><?=$chitiet_sp['ten_vi']?></a></h2>
                </div>
                <div class="col-6">
                    <a href="#">
                        <img class="img-responsive" src="upload/sanpham/<?php if($chitiet_sp["tc_big"]==1) echo $chitiet_sp["photo"]; else echo $chitiet_sp["photo"] ?>" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <p>
                        <?=$chitiet_sp['mota_vi']?>
                    </p>
                    <div class="down-arrow"></div>
                    <button type="submit" name="do_submit" id="do_submit" class="btn" onClick="addtocart(<?=$chitiet_sp['id']?>)"  valign=""><span>Đặt hàng ngay</span>
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-12">
        <div class="col-12">
            <?=$chitiet_sp['mota_en']?>
            <div class="related-news">
                <h4>Tin liên quan</h4>
                <div class="bg-black">
                    <div class="col-12">
                        <ul>
                        <?php for($i=0,$count_tlq=count($result_laylq);$i<$count_tlq;$i++) { ?>
                            <li><a href="chi-tiet-san-pham/<?=$result_laylq[$i]['tenkhongdau']?>-<?=$result_laylq[$i]['id']?>.html"><?=$result_laylq[$i]['ten_vi']?></a></li>
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