<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act)
{

	case "man":
		$sql_xemgiohang="select * from table_order";
		$d->query($sql_xemgiohang);
		$items= $d->result_array();	
	
	
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url=getCurrentPageURL();	
		$maxR=20;
		$maxP=100;
		$paging=paging_home($items, $url, $curPage, $maxR, $maxP);
		$items=$paging['source'];	
		
		$template = "qlgiohang/items";
		break;
	case "delete":
		$sql =  "select id_order  from #_order where id='".$id."'";
		$d->query($sql);
		$result =$d->fetch_array();	
		
		//delete bang don hang
		$id_order = $result['id_order'];
		$sql_dh = "delete from #_donhang where id_order='".$id_order."'";
		$d->query($sql_dh);
		//delete bang order 
		$sql_delete = "delete from #_order where id='".$id."'";
		$d->query($sql_delete);
		redirect("index.php?com=qlgiohang&act=man");
		break;
}


?>
