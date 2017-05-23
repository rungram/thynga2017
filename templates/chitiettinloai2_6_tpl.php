<div class="tieude_center"><?=_tintucnl?></div>

<div class="bo_center">

<?=$result_chitiettinloai2_3[0]["noidung_$lang"]?>

<div class="tin_lq">
<b><?=_tintuckhac?></b>
<ol>
<?php
for($i=0,$count_tinlq=count($result_tinlq);$i<$count_tinlq;$i++) 
{
	?>
		<li><a href="?com=chi-tiet-tin-tuc&id=<?=$result_tinlq[$i]["id"]?>"><?=$result_tinlq[$i]["ten_vi"]?></a></li>
	<?php
}
?>


</ol>

</div>
</div>