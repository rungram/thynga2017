<?php
if(isset($_GET['id']))
{	
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_chitietsp="select *  from #_product where hienthi= 1 and id='$id'";
	$d->query($sql_chitietsp);
	$result_chitietsp=$d->result_array();
	
	$title_bar=$result_chitietsp[0]['ten']."-";
}
?>