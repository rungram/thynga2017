


<!--SLIDER-NHIEU-HIEU-UNG CSS-->
<link href="css/skitter.styles.css" rel="stylesheet" type="text/css" />
<!--SLIDER-NHIEU-HIEU-UNG CSS-->

<!--SLIDER-NHIEU-HIEU-UNG JS-->
<script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" src="js/jquery.skitter.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.animate-colors-min.js"></script>
<script>
	$(document).ready(function() {
		
		var options = {};
		$('.box_skitter_large').skitter(options);
		
	});
</script>
<!--SLIDER-NHIEU-HIEU-UNG JS + layout-slider-->
<?php
	$d->reset();
	$sql_slider = "select ten,photo,link from #_slideshow order by stt asc";
	$d->query($sql_slider);
	$result_slider=$d->result_array();
	
?>  
<?php
$arr =array("cube","cubeSpread","paralell","cubeStop","horizontal","directionRight","cubeHide","showBars","showBarsRandom","cubeRandom","cubeStopRandom","showBarsRandom","tube","fade","fadeFour","block","blind","blindHeight","blindWidth","cubeSize","directionBottom","directionRight","directionLeft");
?>
<div class="box_skitter box_skitter_large">
        <ul>
        <?php  for($i=0,$count_result_slider=count($result_slider);$i<$count_result_slider;$i++){ ?>
            <li><a href="<?=$result_slider[$i]['link']?>"><img src="<?= _upload_slideshow_l.$result_slider[$i]['photo'] ?>" width="969" height="275" class="<?php echo $arr[$i]; ?>" /></a></li>	
            <?php } ?>			
        </ul>
</div>