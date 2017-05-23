<?php
	
	$d->reset();
	$sql_video="select * from #_nhung_face";
	$d->query($sql_video);
	$result_video=$d->fetch_array();
				
?>
<div style="margin-left:40px;">
<a href="<?=$result_video['facebook']?>" target="_blank"> <img src="images/face.png" /></a>
<a href="<?=$result_video['twinter']?>" target="_blank"> <img src="images/twinter.png" /></a>
<a href="<?=$result_video['google']?>" target="_blank"> <img src="images/google.png" /></a>
</div>
<div class="clear"></div>
Copyright © 2015 Bien Viet JSC<span>  - Design by :HGN</span>



        

