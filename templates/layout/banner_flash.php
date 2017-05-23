<?php



	$rong=1000;
	$cao=139;
	$d->reset();
	$sql_banner_flash = "select photo from #_banner_flash ";
	$d->query($sql_banner_flash);
	$row_banner_flash = $d->result_array();
	
?>  
        		<object 
  classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
  codeBase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"
  width="<?=$rong?>" height="<?=$cao?>">
	<param name="movie" value="upload/banner/<?=$row_banner_flash[0]['photo']?>">
	<param name="quality" value="high">
	<param name="wmode" value="transparent">
	<embed 
	  type="application/x-shockwave-flash"
	  pluginspage="http://www.macromedia.com/go/getflashplayer"
		src="upload/banner/<?=$row_banner_flash[0]['photo']?>" 
		quality="high"
		width="<?=$rong?>" 
		height="<?=$cao?>"
		wmode="transparent">
	</embed>
</object>