<li class="icon_hotro"><a  href="ymsgr:sendIM?<?=$result_support[$i]['yahoo']?>"><img border="0" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến" src="http://opi.yahoo.com/online?u=<?=$result_support[$i]['yahoo']?>&amp;m=g&amp;t=1"></a>
</li>
	<?php include _template."layout/menu_bottom.php"; ?>
	
   <li>+&nbsp;Đang online: &nbsp;&nbsp;&nbsp;<?=$count_user_online?></li>
<li>+&nbsp;Đã online: &nbsp;&nbsp;&nbsp;&nbsp;<?=$all_visitors?></li>

<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<a href="skype:<?=$result_support[$i]['skype']?>?call"><img src="http://mystatus.skype.com/bigclassic/<?=$result_support[$i]['skype']?>" style="border: none;"  width="130" height="35" /></a>

	<?php include _template.$template."_tpl.php"; ?> 
    
    	<div class="vietnam"><a href="index.php?com=ngonngu&lang=vi"><img src="images/icon_vi.png" /></a></div>
    <div class="anh"><a href="index.php?com=ngonngu&lang=en"><img src="images/icon_en.png" /></a></div>