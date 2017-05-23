<div class="tieude_center">TIN TỨC</div>
<div class="clear"></div>

<?php

for($i=0,$count_tinloai2_3=count($result_tinloai2_1);$i<$count_tinloai2_3;$i++)
{
	?>

<div class="tung_tintuc">
	<div class="hinh_tungtintuc">
		  <a href="tin-tuc/<?=$result_tinloai2_1[$i]['tenkhongdau']?>-<?=$result_tinloai2_1[$i]['id']?>.html"><img src="<?=_upload_tinloai2_1_l.$result_tinloai2_1[$i]['thumb']?>"  width="95%" height="95%"  class="button float-shadow" />
   		 </a>
    </div>
    <div class="tomtat_tung_tintuc">
    	<font color="#004175"><b><?=$result_tinloai2_1[$i]["ten_$lang"]?></b></font><br />
		<?=$result_tinloai2_1[$i]["mota"]?>...
       
	</div>
    <div class="xemthem"><a href="tin-tuc/<?=$result_tinloai2_1[$i]['tenkhongdau']?>-<?=$result_tinloai2_1[$i]['id']?>.html"><?=_xemtiep?>&nbsp;<img src="images/icon_xemthem.png" /></a></div>
    
</div>

	<?php
}
?>
<div class="clear"></div>     
<div class="phantrang" ><?=$paging['paging']?></div>   
