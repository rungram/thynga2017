
<div class="tieude_center"><?=$result_laylist[0]["ten_$lang"]?></div>


<div class="clear"></div>
<div class="sp_tieubieu">
	 <?php for($i=0,$count_spnam=count($result_spnam);$i<$count_spnam;$i++) 
	 { 
	 	
	 	?>       
    <div class="khung_tungsp">
   
    <div class="hinh_tungsp">
   
    <a href="chi-tiet-phu-kien/<?=$result_spnam[$i]["tenkhongdau"]?>-<?=$result_spnam[$i]["id"]?>.html"><img src="upload/sanpham2/<?=$result_spnam[$i]['thumb']?>" border="0" width="99%" height="99%"/></a>
    </div>
	
    	
    <div class="thontin_tungsp">
   
    <?=$result_spnam[$i]["ten_$lang"]?><br />
  
   
   
   
  
    </div>
       <div class="chitiet"><a href="chi-tiet-phu-kien/<?=$result_spnam[$i]["tenkhongdau"]?>-<?=$result_spnam[$i]["id"]?>.html">Xem chi tiết</a></div>
    
   
    
    
    </div> 
   
   	 	<?php 
	if(($i+1)%3==0) echo "<div class='bottom_dmsp'></div>";
		
	 } 
	 ?> 
   



     <div class="clear"></div>     
	 <div class="paging" ><?=$paging['paging']?></div>

</div>








