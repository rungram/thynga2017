<?php
	
	
	$d->reset();
	$sql_support="select ten_$lang,yahoo,skype,dienthoai,fax from #_yahoo where hienthi= 1 order by stt asc";
	$d->query($sql_support);
	$result_support=$d->result_array();
	
	$d->reset();
	$sql_video="select url from #_video";
	$d->query($sql_video);
	$result_video=$d->result_array();
	
				
?>
<!--Lich-->    
  <link href="css/lich.css" type="text/css" rel="stylesheet" />

  <script src="js/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".nd_lich" ).datepicker();
  });
  </script>
<!--Lich-->  
<div class="hotro">
	<div class="tieude_right">
    <div class="ten_tieuderight"><?=_hotro?></div>
    </div>
    
    <div class="nd_dmright">
    <div class="clear"></div>
	<div class="hotline">
    <div class="ten_hotline"><i><?=$row_setting['hotline']?></i></div>
    
    
    </div>
    <?php
		 for($i=0,$count_hotro=count($result_support);$i<$count_hotro;$i++)
		{
			?>
    		<div class="moi_hotro">
    		<ul>
        
        	<li><?=$result_support[$i]["ten_$lang"]?>:&nbsp;<font color="#026709"><?=$result_support[$i]["dienthoai"]?></font></li>
        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax:&nbsp;<font color="#026709"><?=$result_support[$i]["fax"]?></font></li>
        	<li><img border="0" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến" src="http://opi.yahoo.com/online?u=<?=$result_support[$i]['yahoo']?>&amp;m=g&amp;t=1" width="126" height="25"></li>
        	 <li><img src="images/icon_skype.png" /></li>
        
        	</ul>
            </div>
            <?php
		}
	?>
    
    </div>
</div>
<div class="video">
	<div class="tieude_right">
    <div class="ten_tieuderight">VIDEO CLIP</div>
    </div>
    <div class="nd_dmvideo">
    
    <div class="hinh_video">
    <iframe width="191" height="163" src="http://www.youtube.com/embed/<?=$result_video[0]['url']?>" frameborder="0" allowfullscreen ></iframe>
    </div>
    
    
    </div>




</div>
<div class="lich">
	<div class="tieude_right">
    <div class="ten_tieuderight"><?=_lich?></div>
    </div>
    <div class="nd_dmlich">
    
    <div class="nd_lich">
    
    </div>
    
    
    </div>




</div>
<div class="timkiem_sp">
	<div class="tieude_right">
    <div class="ten_tieuderight"><?=_timkiemsp1?></div>
    </div>
    <div class="nd_dmtim">
    <div class="ten_timsp"><?=_timkiemsp2?>:</div>
<script language="javascript"> 
    	function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
	}
	function onSearch(evt) {			
	
			var keyword = document.getElementById("keyword").value;
			if(keyword=='')
				alert('Bạn chưa nhập từ khóa tìm kiếm!');
			else{
			//var encoded = Base64.encode(keyword);
			location.href = "index.php?com=tim-kiem&keyword="+keyword;
			loadPage(document.location);			
			}
		}		
</script>                                   
<input type="text"  size="24" height="50" name="keyword" id="keyword" onKeyPress="doEnter(event,'keyword');" 
placeholder="<?=_ghichutim?> ..." />
<div class="hinh_tk">
 <img src="images/nen_timkiem.png" align="absmiddle" onclick="onSearch(event,'keyword');" style="cursor:pointer;" height="18"/>
 </div>  
   
   
   <div class="qc_right">
     <?php include _template."layout/chayanh_quangcao2.php"; ?> 
    
    </div>

    
    </div>
	


</div>