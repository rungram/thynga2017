<script language="javascript" src="quanly/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!check_email(document.frm.email.value)){
		alert("Email không hợp lệ");
		document.frm.email.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('tieude1'), "Xin nhập Chủ đề.")){
		document.getElementById('tieude1').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>


<?php
if(isset($_GET['id']))
{	
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_ab = "select *  from #_tinloai2_3 where  id='$id'";
	$d->query($sql_ab);
	$result_ab = $d->fetch_array();
}
?>
<div class="duongdan"><img src="images/category.png" />TRANG CHỦ > LIÊN HỆ</div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-580f0ec9f9566573"></script> 
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
<div class="bo_center">
<div class="tieude_giua">LIÊN HỆ VỚI CHÚNG TÔI</div>
<?=$company_contact["noidung_$lang"];?>  
<div class="clear"></div>
<div class="form_send" style="display:none;">

            <form method="post" name="frm" action="" enctype="multipart/form-data">
            
              <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe">
                                <tr>
                                <td width="18%"><?=_hoten?><span>*</span></td>
                                <td width="81%"><input name="ten" type="text" class="input" id="ten" size="50" /></td>
                                <td width="1%" colspan="2" rowspan="7">&nbsp;</td>
                                </tr>                        
                                 <tr>
                                <td><?=_diachi?><span>*</span></td>
                                <td><input name="diachi" type="text"  class="input" size="50" /></td>
                                </tr>
                                <tr>
                                <td><?=_sodt?><span>*</span></td>
                                <td><input name="dienthoai" type="text" class="input" id="dienthoai" size="50"/></td>
                                </tr>
                                <tr>
                                <td><?=_email?><span>*</span></td>
                                <td><input name="email" type="text" class="input" size="50"  /></td>
                                </tr>                                                  
                                <tr>
                                <td><?=_chude?>
                                  <span>*</span></td>
                                <td><input name="tieude1" type="text" class="input" id="tieude1" size="50"  /></td>
                                </tr>
                <tr>
                                  <td><?=_noidung?>
                  <span>*</span></td>
                                  <td><textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td><input class="nut" type="button" value="<?=_gui?>" onclick="js_submit();" /></td>
                                </tr>
                                </table>   
                   </form>
          </div><!--form_send-->
<?php include _template."map_tpl.php"; ?>	          
</div>
