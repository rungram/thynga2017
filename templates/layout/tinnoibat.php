<?php 
	$d->reset();
	$sql_tin_nb= "select * from #_tinloai1_1 order by id desc limit 0,2";
	$d->query($sql_tin_nb);
	$tin_nb = $d->result_array();
?>
 <?php for($i=0,$count_tnb=count($tin_nb);$i<$count_tnb;$i++){ 
 if(strlen ($tin_nb[$i]["mota_vi"]) > 60)
 {
     $tin_nb[$i]["mota_vi"] = substr ($tin_nb[$i]["mota_vi"], 0, 60);
     $tin_nb[$i]["mota_vi"] = substr ($tin_nb[$i]["mota_vi"], 0, strrpos ($tin_nb[$i]["mota_vi"], ' ')).'...';
 }
 ?>
 <li class="item">
    <div class="image-container">
        <a href="tin-tuc-detail/<?=$tin_nb[$i]["tenkhongdau"]?>-<?=$tin_nb[$i]["id"]?>.html">
            <img class="img-responsive" src="upload/tinloai1_1/<?=$tin_nb[$i]["thumb"]?>"/>
        </a>
    </div>
    <div class="text">
        <h4><a href="tin-tuc-detail/<?=$tin_nb[$i]["tenkhongdau"]?>-<?=$tin_nb[$i]["id"]?>.html"><?=$tin_nb[$i]["ten_vi"]?></a></h4>

        <p>
            <?=$tin_nb[$i]["mota_vi"]?>
        </p>
    </div>
    <div class="clearfix"></div>
</li>
 <?php }?>  