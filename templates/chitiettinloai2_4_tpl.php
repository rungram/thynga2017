<div class="tieude_center">GIẢI PHÁP CÔNG NGHỆ</div>

<div class="bo_center">
<h2><?=$result_chitiettinloai2_4[0]["ten_$lang"]?></h2><br />
<i><?=$result_chitiettinloai2_4[0]["mota_$lang"]?></i><br />
<?=$result_chitiettinloai2_4[0]["noidung_$lang"]?>

<div class="tin_lq">
<b><?=_tintuckhac?></b>
<ol>
<?php
for($i=0,$count_tinlq=count($result_tinlq);$i<$count_tinlq;$i++) 
{
	?>
		<li><a href="chi-tiet-giai-phap-cong-nghe/<?=$result_tinlq[$i]["tenkhongdau"]?>-<?=$result_tinlq[$i]["id"]?>.html"><?=$result_tinlq[$i]["ten_vi"]?></a></li>
	<?php
}
?>


</ol>

</div>
</div>