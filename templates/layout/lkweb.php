<?php
	
	$d->reset();
	$sql_dsweb="select url,ten_$lang from #_lkweb where hienthi =1 order by stt asc";
	$d->query($sql_dsweb);
	$result_dsweb=$d->result_array();
	
				
?>
<div class="lkweb_chinh">
<form id="form1" name="form1" method="post" action="">
 	 <label for="select"></label> 
     <select name="select" onchange="window.open(this.value, this.value)" style="border:none;margin-top:2px"> 
     <option value="0">----  <?=_lkweb2?>  -----</option>
     <?php 
     {
     	for($i=0,$count_dsweb=count($result_dsweb);$i<$count_dsweb;$i++)
		{
		?>
     	<option value="http://<?=$result_dsweb[$i]['url']?>"><?=$result_dsweb[$i]["ten_$lang"]?></option> 
        <?php
		}
     }
	 ?>
    </select>
</form>
</div>
 	<ul>
     <?php 
     
     	for($i=0,$count_dsweb=count($result_dsweb);$i<$count_dsweb;$i++)
		{
		?>
   			<li ><a href="http://<?=$result_dsweb[$i]['url']?>" target="_blank"><?=$result_dsweb[$i]['url']?></a></li>
            <?php
		}
	?>
 
    </ul>
