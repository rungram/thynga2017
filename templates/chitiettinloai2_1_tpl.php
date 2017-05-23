<?php
if(isset($_GET['id']))
{	
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_ab = "select *  from #_tinloai2_1 where  id='$id'";
	$d->query($sql_ab);
	$result_ab = $d->fetch_array();
	
		
	$d->reset();
	$sql_tinlq="select * from #_tinloai2_1 where  id<>'$id'";
	$d->query($sql_tinlq);	
	$result_tinlq=$d->result_array();	
	
	
}
?>
<div class="duongdan"><img src="images/category.png" />TRANG CHỦ > TIN TỨC > <?=$result_ab["ten_vi"]?></div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-580f0ec9f9566573"></script> 
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
<div class="bo_center">
<div class="tieude_giua"><?=$result_ab["ten_vi"]?></div>
<b><?=$result_ab["mota_vi"]?></b>  <br /><span class="ngaytao"><img src="images/calendar.png" width="10" /><?=$result_ab["ngaytao"]?></span></span><br />
<?=$result_ab["noidung_vi"]?>
<div class="clear"></div>
<div class="tin_lq">
<h3>TIN LIÊN QUAN</h3>
<ol>
<?php
for($i=0,$count_tinlq=count($result_tinlq);$i<$count_tinlq;$i++) 
{
	?>
		<li><a href="tin-tuc/<?=$result_tinlq[$i]["tenkhongdau"]?>-<?=$result_tinlq[$i]["id"]?>.html">
		<span class="ngaytao"><img src="images/calendar.png" width="10" /><?=$result_tinlq[$i]["ngaytao"]?> </span>
		<?=$result_tinlq[$i]["ten_$lang"]?> </a></li>
	<?php
}
?>


</ol>

</div>
</div>