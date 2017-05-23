<?php
	$sql_moinhat2 = "select photo,link from #_chayhinh_quangcao where hienthi=1 order by stt asc";
	$d->query($sql_moinhat2);
	$nums_anh2 = $d->result_array();

?>
<div style="width:1000px;margin-left:20px;">
<script src="js/ImageScroller.js" language="javascript"></script>
<div id="ctsdiv1234" style="text-align:center; position:relative; height:135px; overflow:hidden">
             <table width="85%" border="0" cellspacing="0" cellpadding="0" id="ctstbl1234" style=" margin-right:20px;padding-top:10px">
        
             <?php for($i=0,$count_ha2=count($nums_anh2);$i<$count_ha2;$i++){?>
             <tr>
                <td valign="top">
                   
                             <a href="http://<?=$nums_anh2[$i]['link']?>" target="_blank"><img src="<?=_upload_chayhinh_quangcao_l.$nums_anh2[$i]['photo']?>" style="border:1px solid #CCC;" width="170"  /></a>
                            
                </td>
             </tr>
             <?php }?>
           
             </table>
 <script type="text/javascript">createScroller("myScroller1234", "ctsdiv1234", "ctstbl1234",0,20,1,0,1);</script>   

 </div>
  </div>
 