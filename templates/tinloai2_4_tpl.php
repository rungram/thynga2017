<div class="tieude_center">GIẢI PHÁP CÔNG NGHỆ</div>
<div class="clear"></div>

<?php

for($i=0,$count_tinloai2_3=count($result_tinloai2_4);$i<$count_tinloai2_3;$i++)
{
	?>

<div class="tung_tintuc">
	<div class="hinh_tungtintuc">
		  <a href="chi-tiet-giai-phap-cong-nghe/<?=$result_tinloai2_4[$i]['tenkhongdau']?>-<?=$result_tinloai2_4[$i]['id']?>.html"><img src="<?=_upload_tinloai2_4_l.$result_tinloai2_4[$i]['thumb']?>"  width="95%" height="95%" />
   		 </a>
    </div>
    <div class="tomtat_tung_tintuc">
    	<font color="#004175"><b><?=$result_tinloai2_4[$i]["ten_$lang"]?></b></font><br />
		<?=$result_tinloai2_4[$i]["mota_vi"]?>...
       
	</div>
    <div class="xemthem"><a href="chi-tiet-giai-phap-cong-nghe/<?=$result_tinloai2_4[$i]['tenkhongdau']?>-<?=$result_tinloai2_4[$i]['id']?>.html"><?=_xemtiep?>&nbsp;<img src="images/icon_xemthem.png" /></a></div>
    
</div>

	<?php
}
?>
<div class="clear"></div>     
<div class="phantrang" ><?=$paging['paging']?></div>   
