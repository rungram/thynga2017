<?php  if(!defined('_source')) die("Error");
			
		if(isset($_GET['keyword'])){
			$tukhoa =  $_GET['keyword'];
			$tukhoa = trim(strip_tags($tukhoa));    	
    		if (get_magic_quotes_gpc()==false) {
    			$tukhoa = mysql_real_escape_string($tukhoa);    			
    		}								
			// cac tin tuc
			$sql_timkiem = "select * from #_product where (ten_$lang LIKE '%$tukhoa%') and hienthi=1 order by stt asc";			
			$d->query($sql_timkiem);
			$result_timkiem = $d->result_array();	
			
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=24;
			$maxP=5;
			$paging=paging_home($result_timkiem, $url, $curPage, $maxR, $maxP);
			$result_timkiem=$paging['source'];
		}	
		
?>