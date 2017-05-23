<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id']))

{
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_tinloai1_1_list="select id,thumb,ten,tenkhongdau,left(mota,515) as mota from #_tinloai1_1 where hienthi =1 and id_list='$id' order by stt asc";
	$d->query($sql_tinloai1_1_list);	
	$result_tinloai1_1_list=$d->result_array();	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=7;
	$maxP=5;
	$paging=paging_home($result_tinloai1_1_list , $url, $curPage, $maxR, $maxP);
	$result_tinloai1_1_list=$paging['source'];
	
}
?>