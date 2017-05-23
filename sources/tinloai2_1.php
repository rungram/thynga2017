<?php  if(!defined('_source')) die("Error");


{
	
	$d->reset();
	$sql_tinloai2_1="select id,thumb,ten_$lang,tenkhongdau,left(mota_$lang,180) as mota from #_tinloai2_1 where hienthi =1 order by stt asc";
	$d->query($sql_tinloai2_1);	
	$result_tinloai2_1=$d->result_array();	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=12;
	$maxP=5;
	$paging=paging_home($result_tinloai2_1 , $url, $curPage, $maxR, $maxP);
	$result_tinloai2_1=$paging['source'];
	
}
?>