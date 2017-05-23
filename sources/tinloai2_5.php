<?php  if(!defined('_source')) die("Error");


{
	
	$d->reset();
	$sql_tinloai2_5="select id,thumb,ten_vi,tenkhongdau,left(mota_vi,500) as mota_vi from #_tinloai2_5 where hienthi =1 order by stt asc";
	$d->query($sql_tinloai2_5);	
	$result_tinloai2_5=$d->result_array();	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=7;
	$maxP=5;
	$paging=paging_home($result_tinloai2_5 , $url, $curPage, $maxR, $maxP);
	$result_tinloai2_5=$paging['source'];
	
}
?>