<?php
	$d->reset();
	$sql_chaytintuc="select id,left(ten_$lang,90) as ten,left(mota_$lang,55) as mota,tenkhongdau,thumb from #_tinloai2_5 where hienthi= 1 order by stt asc limit 0,4";
	$d->query($sql_chaytintuc);
	$result_chaytintuc=$d->result_array();
	

?>
<script src="js/ImageScroller.js" language="javascript"></script>
<div id="ctsdiv1234" style="text-align:center; position:relative; height:300px; overflow:hidden">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl1234" style="position:relative; margin:0px;padding-top:10px">
<?php
 for($i=0,$count_tt=count($result_chaytintuc);$i<$count_tt;$i++)
 {
	 ?>
     
      <tr>
                <td valign="top">
                   <table width="100%" cellspacing="0" cellpadding="0" border="0">
                           <tr>
                              <td valign="top">
                              
                       	<div class="chaytung_tintuc">
                         		<div class="hinhtin">
                                <a href="chi-tiet-dich-vu/<?=$result_chaytintuc[$i]['tenkhongdau']?>-<?=$result_chaytintuc[$i]['id']?>/" title="<?=htmlentities($result_chaytintuc[$i]['tenfull'], ENT_QUOTES, "UTF-8")?>">
                                <img src="upload/tinloai2_5/<?=$result_chaytintuc[$i]['thumb']?>" height="57" width="85" /></a>
                               </div>
                                <div class="ten_chaytin">
                                <b><?=$result_chaytintuc[$i]["ten"]?></b>
                                
                                </div><!--ten_chaytin-->
                        </div> <!--chaytung_tintuc-->
                        
                        
                  </td>
                              
                           </tr>                          
                  
			 </table>
                </td>
             </tr>
      <?php
 }
 ?>
    </table>
  <script type="text/javascript">createScroller("myScroller1234", "ctsdiv1234", "ctstbl1234",0,30,1,0,1);</script>   
 </div>
                          