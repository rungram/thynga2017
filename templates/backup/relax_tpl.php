<table width="602" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
		<table width="602" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="media/images/vn/thanh_tieu_de_giaitri.jpg" width="602" height="49" /></td>
  </tr>
  <tr>
    <td valign="top" class="nen_tranh_lon_giua">
		<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200"><img src="media/images/vn/giaitri_hinh.jpg" width="200" height="371" /></td>
  </tr>
</table></td>
    <td width="400" valign="top">
	<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
		
		
		
		<table width="401" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="401">&nbsp;</td>
  </tr>
	<?php
		$count = count($hot_relax);
		for($i=0; $i<$count && $i<3; $i++){
			if($i>0) echo '<tr><td class="duongvien_lon" height="3"></td></tr>';
	?>
  <tr>
    <td><table width="402" border="0" cellspacing="0" cellpadding="0">
      <tr valign="top">
        <td width="100%" align="justify"><div style="padding-left:5px"><span><p class="tex_vbv"><a href="index.php?com=relax&id=<?=$hot_relax[$i]['id']?>" class="tex_menu_aaaa"><?=$hot_relax[$i]['ten']?></a></p>
        </span></div>
          <div class="service_detail" style="padding:0 5px;"><?=$hot_relax[$i]['mota']?></div></td>
      </tr>
    </table></td>
  </tr>
	<?php
		}
	?>
</table>




</td>
  </tr>
</table></td>
  </tr>
</table></td>
  </tr>
	
	
<?php
	$count = count($hot_relax);
		for(; $i<$count; $i++){
?>
  <tr>
    <td class="duongvien_lon" height="3"></td>
  </tr>
  <tr>
    <td width="259" align="justify">
		<div style="padding-left:5px"><span><p class="tex_vbv"><a href="index.php?com=relax&id=<?=$hot_relax[$i]['id']?>" class="tex_menu_aaaa"><?=$hot_relax[$i]['ten']?></a></p></span></div>
          <div class="service_detail" style="padding:0 5px;"><?=$hot_relax[$i]['mota']?></div></td>
  </tr>
<? }?>  
	<tr><td>&nbsp;</td></tr>
	<?php
		$count = count($other_relax);
		if($count>0){
	?>

  <tr>
    <td>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="179"><img src="media/images/vn/tieu_tin.jpg" width="179" height="42" /></td>
    <td width="418"><table width="423" border="0" cellspacing="0" cellpadding="0">
      <tr>
    <td class="duongvien_lon" height="3"></td>
  </tr>
    </table></td>
  </tr>
</table>
</td>
  </tr>


  <tr valign="top">
    <td id="hinh_nen_001">
		<table width="600" border="0" cellspacing="2" cellpadding="2">
  <?php
			for($i=0; $i<$count; $i++){
	?>
	<tr>
    <td width="8">&nbsp;</td>
    <td><img src="media/images/24.gif" width="8" height="11" /></td>
    <td width="574">	
	<div align="justify"><span>
			<p class="tex_vbc_02">
			<a href="index.php?com=relax&id=<?=$other_relax[$i]['id']?>" class="tex_menu_aaaa"><?=$other_relax[$i]['ten']?></a></p></span></div></td>
  </tr>
	<?php
			}
	?>
</table>
	</td>
  </tr>
	<? }?>
  <tr>
    <td>&nbsp;</td>
  </tr>
	
	<?php if($paging['paging']!=""){?>
   <tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	 <td width="400"><table border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td class="duongvien_lon" height="3" width="400"></td>
       </tr>
     </table></td>   
    <td style="padding:5px 8px" align="center"><div class="phantrang"><?=$paging['paging']?></div></td>
  </tr>
</table>

	</td>
  </tr>
  <? }?>
</table>	</td>
  </tr>
   <tr>
    <td valign="top" class="nen_tranh_lon_duoi" height="56">&nbsp;</td>
  </tr>  
</table>

	</td>
  </tr>
</table>