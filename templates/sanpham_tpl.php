<?php
	
	
	$d->reset();
	$sql_spnam="select id,ten_$lang,tenkhongdau,thumb,gia  from #_product where hienthi= 1 and spmoi>0 order by stt asc ";
	$d->query($sql_spnam);
	$result_spnam=$d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=18;
	$maxP=5;
	$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
	$result_spnam=$paging['source'];
				
?>

<div class="sp_uachuong">
<div class="thanh_dau">
    <div class="ten_thanhdau"><?=_sanpham?></div>
    
</div>
 <?php for($i=0,$count_spnam=count($result_spnam);$i<$count_spnam;$i++) 
	 { 
	 
	 	?>       
   <div class="khung_tungsp">
    <div class="ten_sp"><?=$result_spnam[$i]["ten_$lang"]?></div>
    <div class="hinh_tungsp">
   
    <img src="upload/sanpham/<?=$result_spnam[$i]['thumb']?>" border="0" width="100%" height="100%"/>
    </div>
	
    	
    <div class="thontin_tungsp">
   
    <?=$result_spnam[$i]["ten_$lang"]?><br />
    <span class="masp">#item 245-478</span><br />
    <span class="gia">$199,89</span><br />
    <span class="luotxem">156 lượt xem</span>
   
  
    </div>
    
   
    
    
    </div> 
   
   	 	<?php 
		
		
	 } 
	 ?> 
     <div class="clear"></div>     
	 <div class="phantrang" ><?=$paging['paging']?></div>
</div>