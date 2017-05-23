
<?php  if(!defined('_source')) die("Error");


{
	
	$d->reset();
	$sql_tinloai2_3="select id,thumb,ten_vi,ten_cn from #_tinloai2_3 where hienthi =1 order by stt asc";
	$d->query($sql_tinloai2_3);	
	$result_tinloai2_3=$d->result_array();	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=24;
	$maxP=5;
	$paging=paging_home($result_tinloai2_3 , $url, $curPage, $maxR, $maxP);
	$result_tinloai2_3=$paging['source'];
	
}
?>
<style>
.tung_lk{
    text-align: justify;
    font-size: 13px;
    width:210px;
    height: 150px;
    margin-top: 5px;
    float: left;
    margin-left:20px;
	margin-right:20px;
    position: relative;
    padding-bottom: 5px;
}
.hinh_tunglk{
	float: left;
    border: 1px solid #B7B7B7;
    width:210px;
    height: 148px;
    background-color: #FFF;
    border: 1px solid #CCC;
}
.ten_lk{
	
    width:210px;
   text-align:center;
}
</style>
<div class="tieude_center">LIÊN KẾT</div>
<div class="clear"></div>

<?php

for($i=0,$count_tinloai2_3=count($result_tinloai2_3);$i<$count_tinloai2_3;$i++)
{
	?>

<div class="tung_lk">
	<div class="hinh_tunglk">
		  <a target="_blank" href="<?=$result_tinloai2_3[$i]['ten_cn']?>"><img src="<?=_upload_tinloai2_3_l.$result_tinloai2_3[$i]['thumb']?>"  width="95%" height="95%" class="button float-shadow" />
   		 </a>
    </div>
    <div class="ten_lk">
    	<?=$result_tinloai2_3[$i]['ten_vi']?>
	</div>
  
    
</div>

	<?php
}
?>
<div class="clear"></div>     
<div class="phantrang" ><?=$paging['paging']?></div>   
