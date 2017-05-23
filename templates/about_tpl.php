<?php  if(!defined('_source')) die("Error");
	$d->setTable('gioithieu');
	$d->select("noidung_$lang,mota_$lang,link");
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$noidung_about= $row["noidung_$lang"];
		$noidung_mota= $row["mota_$lang"];
		$noidung_link= $row['link'];
	}
		
			
	$d->reset();
	$sql_tin_foo ="select *  from #_tinloai1_3 order by stt asc limit 0,9";
	$d->query($sql_tin_foo);
	$result_tinll_c=$d->result_array();
	
?>
<div class="bg-white">
    <div class="col-12">
        <div class="col-12">
            <?=$noidung_about?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div> 