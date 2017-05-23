<?php  if(!defined('_source')) die("Error");
	$d->setTable('gioithieu');
	$d->select("noidung_$lang,mota_$lang,link");
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$noidung_about= $row["noidung_$lang"];
		$noidung_mota= $row["mota_$lang"];
		$noidung_link= $row['link'];
	}
	
	
?>