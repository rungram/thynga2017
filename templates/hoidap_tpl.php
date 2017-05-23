
<?php
	
	
	$d->reset();
	$sql_hoidap="select ten_hoi,noidung_hoi,noidung_traloi  from #_hoidap where hienthi= 1 order by stt asc";
	$d->query($sql_hoidap);
	$result_hoidap=$d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=6;
	$maxP=5;
	$paging=paging_home($result_hoidap , $url, $curPage, $maxR, $maxP);
	$result_hoidap=$paging['source'];
	
				
?>

<div class="tieude_spmoi">
	<div class="ten_spmoi">
   HỎI ĐÁP
	</div>

</div>
   
<?php
for($i=0,$count_hoidap=count($result_hoidap);$i<$count_hoidap;$i++)
{
		?>
         <div class="khung_tungcauhoi">
          	<div class="phan_dau">
          		 	<div class="hinh_yahoo">
          				<img src="images/yahoo_icon.gif" width="100%" height="100%" />
         		 	</div>
                 	<div class="ten_cauhoi">
          				<?=$result_hoidap[$i]['ten_hoi']?>
         			 </div>
           </div>
           <div class="clear"></div>
           <div class="nd_cauhoi">
           <b>HỎI&nbsp;:</b>&nbsp;
           	<?=$result_hoidap[$i]['noidung_hoi']?>
           </div>
           <div class="clear"></div>
           <div class="nd_traloi">
           <b>TRẢ LỜI&nbsp;:</b>&nbsp;
            <?=$result_hoidap[$i]['noidung_traloi']?>
           </div>
           <div class="clear"></div>
        </div>  
              <div class="clear"></div>
		<?php 

} 
?>
<div class="clear"></div>
<div class="phantrang" ><?=$paging['paging']?></div>
<p>
<script type="text/javascript">
	function CheckSignup()
	{
		var s=document.formdangky;
		if(s.hoten.value=='')
		{
			document.getElementById("hoten_error").style.display = "block";
			document.getElementById("hoten_error").innerHTML="Bạn chưa nhập họ tên!";
			s.hoten.focus();
			return false;	
		}
		else
			document.getElementById("hoten_error").style.display = "none";
			
		if(s.noidung.value=='')
		{
			document.getElementById("noidung_error").style.display = "block";
			document.getElementById("noidung_error").innerHTML="Bạn chưa nhập nội dung!";
			s.noidung.focus();
			return false;	
		}
		else
			document.getElementById("noidung_error").style.display = "none";
			
	}
		
	
</script>
   
<?php

	$ten_hoi=$_POST['hoten'];
	$noidung_hoi=$_POST['noidung'];
	
if(isset($_POST["gui"]))
{
	$d->reset();
	$sql_guihoi="insert into  #_hoidap(ten_hoi,noidung_hoi)values('$ten_hoi','$noidung_hoi')";
	$send=$d->query($sql_guihoi);
	
	if($send)
	
	
	{
		
		?>
        <script>
		alert('Gửi câu hỏi thành công');
		</script>
        
        <?php
		
	}
	else
	{
		
		?>
        <script>
		alert('Gửi câu hỏi thất bại-Vui lòng gửi lại');
		</script>
        
        <?php
		
	}
}
?>	


     
	<form id="formdangky" method="post" onSubmit="return CheckSignup()" name="formdangky"  action="">    
         <table width="100%" cellpadding="5" cellspacing="0" border="0" >                        
         		<tr>
                        <td>Tên câu hỏi<span>*</span></td>
						<td><label>
						  <input name="hoten" type="text"  id="hoten" size="50" />
						</label>
                        <div id="hoten_error" style="color:#F00"></div>
                        </td>
                         
                </tr>                        
                <tr>
                        <td>Nội dung<span>*</span></td>				
						<td>
           <textarea name="noidung" cols="50" rows="5"  id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>  
            <div id="noidung_error" style="color:#F00"></div>
           				</td>
                        
                </tr>
                <tr>
                        <td colspan="3" align="center" class="text_vanban_gg1" valign="middle" style="padding-top:8px;"> 
                  	    <input type="submit" name="gui" id="gui" value="GỬI" />
                   		</td>
				</tr>
                        </table>     
	</form>
							
                         