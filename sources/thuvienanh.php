<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	
	$id =  addslashes($_GET['id']);
	$d->reset();		
	$sql_chitietanh = "select photo from #_thuvienanh where hienthi=1 and id='".$id."'";
	$d->query($sql_chitietanh);
	$result_chitietanh  = $d->result_array();

	
}
?>