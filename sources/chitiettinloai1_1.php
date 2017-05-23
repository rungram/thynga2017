<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id']))
{
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_chitiettinloai1_1="select photo,ten,mota,noidung from #_tinloai1_1 where hienthi =1 and id='$id'";
	$d->query($sql_chitiettinloai1_1);	
	$result_chitiettinloai1_1=$d->result_array();	
				
	
}
?>