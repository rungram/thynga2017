<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id']))
{
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_chitiettinloai2_5="select photo,ten_$lang,mota_$lang,noidung_$lang from #_tinloai2_5 where hienthi =1 and id='$id'";
	$d->query($sql_chitiettinloai2_5);	
	$result_chitiettinloai2_5=$d->result_array();	
	
	$d->reset();
	$sql_tinlq="select tenkhongdau,ten_$lang,id from #_tinloai2_5 where hienthi =1 and id<>'$id'";
	$d->query($sql_tinlq);	
	$result_tinlq=$d->result_array();	
	
	
				
	
}
?>