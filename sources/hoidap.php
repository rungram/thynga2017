<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql_cauhoi = "select id,noidung,traloi  from #_faq where hienthi=1 order by id desc";
	$d->query($sql_cauhoi);	
	$rows_cauhoi=$d->result_array();
		
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$url=getCurrentPageURL();
		$maxR=10;
		$maxP=5;
		$paging=paging($rows_cauhoi, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];
	
	if(!empty($_POST)){						
			$data['hoten'] = $_POST['ten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['diachi'] = $_POST['diachi'];
			$data['noidung'] = $_POST['noidung'];
			$data['ngaygui'] = time();			
					
		$d->setTable('faq');
		if($d->insert($data))
			transfer("Thông tin câu hỏi đã được gửi", "hoi-dap.html");
		else
			transfer("Lưu dữ liệu bị lỗi", "hoi-dap.html");
		}
		

?>