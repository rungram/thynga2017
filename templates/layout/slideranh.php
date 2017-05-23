

<?php

	$d->reset();
	$sql_thuvienanh="select * from #_slideshow";
	$d->query($sql_thuvienanh);
	$result_thuvienanh=$d->result_array();


?>
<script type="text/javascript" src="js/JSON.js"></script>
<script type="text/javascript" src="js/slide_truong.js"></script>
<div id="wap">
	<ul id="nav1">
    <?php
    	for($i=0,$count_show=count($result_thuvienanh);$i<$count_show;$i++)
		{
			?>
    	<li <?php if($i==0) echo "class='current'" ?>><img src="upload/slideshow/<?=$result_thuvienanh[$i]['photo']?>" /></li>
			<?php
		}
	?>
    </ul>
</div>