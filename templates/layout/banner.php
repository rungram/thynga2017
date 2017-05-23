<?php
	
	$d->reset();
	$sql_face = "select* from #_nhung_face";
	$d->query($sql_face);
	$result_face=$d->result_array();
	
?> 



<div class="tencty">
 <?php include _template."layout/banner_thuong.php"; ?>  
           
            
            </div>
             <span class="slogan">
           
            </span>
            
            <div class="timkiem">
           	<?php include _template."layout/timkiem.php"; ?>
            </div>
            <div class="phone"><?=$row_setting['dienthoai']?></div>
			<div class="email"><?=$row_setting['email']?></div>
            <div class="acount">
            <div class="vietnam"><a href="index.php?com=ngonngu&lang=vi"><img src="images/icon_vi.png" /></a></div>
    <div class="anh"><a href="index.php?com=ngonngu&lang=en"><img src="images/icon_en.png" /></a></div>
           </div>
  <div class="face"><a href="<?=$result_face[0]['facebook']?>" target="_blank"><img src="images/facebook-icon.png" class="icon_face"/></a><a href="<?=$result_face[0]['twinter']?>" target="_blank"><img src="images/icon_skype.png" /></a><a href="<?=$result_face[0]['youtube']?>" target="_blank"><img src="images/youtube_icon.png" /></a><a href="<?=$result_face[0]['google']?>" target="_blank"><img src="images/google-icon.png" /></a></div>
  
  
  