<h3>Thêm mới fax_dtban</h3>

<form name="frm" method="post" action="index.php?com=fax_dtban&act=save" enctype="multipart/form-data" class="nhaplieu">

	<b>Tên</b> 
	<input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />
	
	<b>Điện thoại</b>
	<input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br />   
 	<b>Fax</b>
	<input type="text" name="fax" value="<?=@$item['fax']?>" class="input" /><br />      
	<b>Hotline</b>
	<input type="text" name="hotline" value="<?=@$item['hotline']?>" class="input" /><br />    
	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=fax_dtban&act=man'" class="btn" />
</form>