<?php  if(!defined('_source')) die("Error");


{
	
	$d->reset();
	$sql_tinloai1_1="select id,thumb,ten,tenkhongdau,left(mota,515) as mota from #_tinloai1_1 where hienthi =1 order by stt asc";
	$d->query($sql_tinloai1_1);	
	$result_tinloai1_1=$d->result_array();	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=7;
	$maxP=5;
	$paging=paging_home($result_tinloai1_1 , $url, $curPage, $maxR, $maxP);
	$result_tinloai1_1=$paging['source'];
	
}
?>