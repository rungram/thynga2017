<?php  if(!defined('_source')) die("Error");


{
	
	$d->reset();
	$sql_tinloai2_2="select id,ten_vi,tenkhongdau,thumb,diachi,dientich,khoicong,hoanthanh from #_tinloai2_2 order by id desc";
	$d->query($sql_tinloai2_2);	
	$result_da=$d->result_array();	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=16;
	$maxP=5;
	$paging=paging_home($result_da , $url, $curPage, $maxR, $maxP);
	$result_da=$paging['source'];
	

	
}
?>