

<div class="thanhdau_center">
<div class="ten_thanhdau">DANH SÁCH TINLOAI_1_LIST</div>
</div>

<br />


<?php

for($i=0,$count_tinloai1_1_list=count($result_tinloai1_1_list);$i<$count_tinloai1_1_list;$i++)
{
	?>

<div class="tung_tintuc">
	
		  <a href="chi-tiet-tinloai1_1/<?=$result_tinloai1_1_list[$i]['tenkhongdau']?>-<?=$result_tinloai1_1_list[$i]['id']?>.html"><img src="<?=_upload_tinloai1_1_l.$result_tinloai1_1_list[$i]['thumb']?>"  width="20%" height="95%"/>
   		 </a>

    <div class="tomtat_tung_tintuc">
    	<font color="#47A3D9"><b><?=$result_tinloai1_1_list[$i]['ten']?></b></font><br />
		<i><?=$result_tinloai1_1_list[$i]['mota']?>...</i>
       
	</div>
     <div class="clear"></div>
</div>

	<?php
}
?>
<div class="clear"></div>     
<div class="phantrang" ><?=$paging['paging']?></div>
