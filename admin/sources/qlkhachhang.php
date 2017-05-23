<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act)
{

	case "man":
		$sql_xemkhachhang="select * from table_khachhang";
		$d->query($sql_xemkhachhang);
		$items= $d->result_array();	
	
	
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url=getCurrentPageURL();	
		$maxR=20;
		$maxP=100;
		$paging=paging_home($items, $url, $curPage, $maxR, $maxP);
		$items=$paging['source'];	
		
		$template = "qlkhachhang/items";
		break;
	case "delete":
		$sql_delete = "delete from #_khachhang where id='".$id."'";
		$d->query($sql_delete);
		redirect("index.php?com=qlkhachhang&act=man");
		break;
}


?>
