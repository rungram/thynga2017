<?php
	$d->reset();
	$sql_hotro="select id,ten_vi,yahoo,dienthoai  from #_yahoo where hienthi =1 order by stt asc";
	$d->query($sql_hotro);
	$result_support=$d->result_array();
	
	
	$d->reset();
	$sql_qc="select photo,link  from #_chayhinh_quangcao  where hienthi =1 order by stt asc limit 0,1";
	$d->query($sql_qc);
	$result_qc=$d->result_array();
	
	$d->reset();
	$sql_dmsp="select id,ten_$lang,tenkhongdau from #_product_list where hienthi =1 order by stt asc";
	$d->query($sql_dmsp);
	$result_dmsp=$d->result_array();
	
	$d->reset();
	$sql_dmsp2="select id,ten_$lang,tenkhongdau from #_product2_list where hienthi =1 order by stt asc";
	$d->query($sql_dmsp2);
	$result_dmsp2=$d->result_array();
	
	$d->reset();
	$sql_dow="select id,ten_$lang,tenkhongdau from #_download_list where hienthi =1 order by stt asc";
	$d->query($sql_dow);
	$result_dow=$d->result_array();
	
	
				
?>

<div class="tintuc">
	<div class="tieude_tintuc"> TIN TỨC NỔI BẬT</div>
	<?php include _template."layout/chaytintuc.php"; ?>
</div>

<div class="danhmuc">
	<div class="tieude_tintuc">DỊCH VỤ XÂY DỰNG</div>
  
   <ul>
   <?php
    for($i=0,$count_dmsp=count($result_dmsp);$i<$count_dmsp;$i++)
		{
			?>
   <li class="dmc1"><a href="dich-vu-xay-dung-list/<?=$result_dmsp[$i]["tenkhongdau"]?>-<?=$result_dmsp[$i]["id"]?>.html">+ <?=$result_dmsp[$i]["ten_$lang"]?></a>
      
      
     
   
   
   
   </li>
   <div class="cap2">
    <ul>
<?php
		$id_list=$result_dmsp[$i]['id'];
		$d->reset();
		$sql_dmspc2="select ten_$lang,tenkhongdau,id from #_product_cat where hienthi =1 
		and id_list='$id_list'  order by stt asc";
		$d->query($sql_dmspc2);
		$result_dmspc2=$d->result_array();
		for($j=0,$count_dmspc2=count($result_dmspc2);$j<$count_dmspc2;$j++)
		{
			?>
<li class="dmc2"><a href="dich-vu-xay-dung-cat/<?=$result_dmspc2[$j]["tenkhongdau"]?>-<?=$result_dmspc2[$j]["id"]?>.html">- <?=$result_dmspc2[$j]["ten_$lang"]?></a></li>
			<?php
		}
								
?>
</ul>
</div>
   			<?php
  
		}
	?>
   
   </ul>
   
 
    
</div>


<div class="face">
<iframe src="//www.facebook.com/plugins/likebox.php?href=<?=$row_setting['banquyen']?>&amp;height=358&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=483560725080053" scrolling="no" frameborder="0" style="border: hidden; overflow:hidden; height:310px; width:100%; border-right-color:#FFFFFF" allowTransparency="true"></iframe>
</div>


<!--danhmuc-->





 