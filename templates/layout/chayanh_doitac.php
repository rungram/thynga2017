<?php
	$sql_moinhat = "select photo,link from #_chayhinh_doitac where hienthi=1 order by stt asc";
	$d->query($sql_moinhat);
	$nums_anh = $d->result_array();

?>

<script src="js/ImageScroller.js" language="javascript"></script>
<div id="ctsdiv123" style="text-align:center; position:relative; height:350px; overflow:hidden">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl123" style="position:relative; margin:0px;padding-top:10px">
        
             <?php for($i=0,$count_ha=count($nums_anh);$i<$count_ha;$i++){?>
             <tr>
                <td valign="top">
                   <table width="100%" cellspacing="0" cellpadding="0" border="0">
                           <tr>
                              <td valign="top">
                             <a href="http://<?=$nums_anh[$i]['link']?>" target="_blank" style="color:#333333;margin-bottom:10px;"><img src="<?=_upload_chayhinh_doitac_l.$nums_anh[$i]['photo']?>" style="margin-top:5px;margin-bottom:10px;; border:1px solid #CCC;" width="194" height="177" /></a>
                              </td>
                              
                           </tr>                          
                  
			 </table>
                </td>
             </tr>
             <?php }?>
           
             </table>
 <script type="text/javascript">createScroller("myScroller123", "ctsdiv123", "ctstbl123",0,20,1,0,1);</script>   
 </div>