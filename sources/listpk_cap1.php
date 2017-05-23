<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id']))
{
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_tungdanhmuc="select * from #_product2 where hienthi =1 and id_list='$id'  order by stt asc ";
	$d->query($sql_tungdanhmuc);	
	$result_spnam=$d->result_array();	
	
	$d->reset();
	$sql_laylist="select * from #_product2_list where hienthi =1 and id='$id'  order by stt asc ";
	$d->query($sql_laylist);	
	$result_laylist=$d->result_array();	
	
	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=12;
	$maxP=5;
	$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
	$result_spnam=$paging['source'];
	
}
?>