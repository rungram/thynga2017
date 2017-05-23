<?php
	
	
    $d->reset();
	$sql_tuyendung="select noidung_vi from #_tinloai3_2";
	$d->query($sql_tuyendung);
	$result_tuyendung=$d->fetch_array();
	
	
	

				
?>


<div class="tieude_center">DỊCH VỤ</div>

<div class="bo_center">
<?=$result_tuyendung["noidung_vi"]?>
</div>