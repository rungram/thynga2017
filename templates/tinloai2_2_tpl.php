<?php  if(!defined('_source')) die("Error");

	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_tungdanhmuc="select * from #_tinloai2_2   order by stt asc ";
	$d->query($sql_tungdanhmuc);	
	$result_spnam=$d->result_array();	
	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=24;
	$maxP=5;
	$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
	$result_spnam=$paging['source'];
	
?>
<style>
.tomtat_tung_tintuc h2 a{
	font-size:18px;
}

</style>
<div class="duongdan"><img src="images/category.png" />TRANG CHỦ > TUYỂN DỤNG </div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-580f0ec9f9566573"></script> 
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
<div class="bo_center">
<div class="tieude_giua"> TUYỂN DỤNG </div>
<div class="sp_tieubieu">
	    <?php for($i=0,$count_spnam=count($result_spnam);$i<$count_spnam;$i++) { ?>       
   <div class="tung_tintuc">
	<div class="hinh_tungtintuc">
		  <a href="tuyen-dung/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"><img src="<?=_upload_tinloai2_2_l.$result_spnam[$i]['thumb']?>"  width="95%" height="95%"  class="button float-shadow" />
   		 </a>
    </div>
    <div class="tomtat_tung_tintuc">
    	<h2><a href="tuyen-dung/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"><?=$result_spnam[$i]["ten_$lang"]?></a></h2><br />
         <span class="ngaytao"><img src="images/calendar.png" width="10" /><?=$result_spnam[$i]["ngaytao"]?></span></span><br />
		<?=$result_spnam[$i]["mota_vi"]?>
	</div>
    <div class="xemthem"><a href="tuyen-dung/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"><?=_xemtiep?>&nbsp;<img src="images/icon_xemthem.png" /></a></div>
    
</div>
   	 	<?php } ?> 
     <div class="clear"></div>     
	 <div class="paging"><?=$paging['paging']?></div>

</div>
</div>








