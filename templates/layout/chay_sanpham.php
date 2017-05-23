<?php
	$sql_chaysp = "select thumb,id,tenkhongdau from #_product where hienthi=1 order by ngaytao desc";
	$d->query($sql_chaysp);
	$result_chaysp = $d->result_array();

?>

<script src="file:///E|/xampp/htdocs/vuonghanhphat/templates/layout/js/ImageScroller.js" language="javascript"></script>
<div id="ctsdiv123" style="text-align:center; position:relative; height:254px; overflow:hidden">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl123" style="position:relative; margin:0px;padding-top:10px">
        
             <?php for($i=0,$count_chaysp=count($result_chaysp);$i<$count_chaysp;$i++){?>
             <tr>
                <td valign="top">
                   <table width="100%" cellspacing="0" cellpadding="0" border="0">
                           <tr>
                              <td valign="top">
                             <a href="chi-tiet-san-pham/<?=$result_chaysp[$i]['tenkhongdau']?>-<?=$result_chaysp[$i]['id']?>.html" target="_blank" style="color:#333333;margin-bottom:10px;"><img src="<?=_upload_sanpham_l.$result_chaysp[$i]['file:///E|/xampp/htdocs/vuonghanhphat/templates/layout/thumb']?>" style="margin-top:5px;margin-bottom:10px;; border:1px solid #CCC;" width="202" height="121" /></a>
                              </td>
                              
                           </tr>                          
                  
			 </table>
                </td>
             </tr>
             <?php }?>
           
             </table>
 <script type="text/javascript">createScroller("myScroller123", "ctsdiv123", "ctstbl123",0,20,1,0,1);</script>   
 </div>