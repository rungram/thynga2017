<?php
	$d->reset();
	$sql_bn="select * from #_banner";
	$d->query($sql_bn);
	$result_bn=$d->fetch_array();			
?>
<style>
.head{
	width:100%;
	background:url('upload/banner/<?=$result_bn['photo']?>') top center no-repeat;
	background-size:100%;
	margin:auto;
	
}
</style>