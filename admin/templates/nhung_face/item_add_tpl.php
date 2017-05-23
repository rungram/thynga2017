<h3>Thêm mới</h3>

<form name="frm" method="post" action="index.php?com=nhung_face&act=save" enctype="multipart/form-data" class="nhaplieu">

	<b>Facebook</b> 
	<input type="text" name="facebook" value="<?=@$item['facebook']?>" class="input" /><br />
	

    <b>Skype</b> 
	<input type="text" name="twinter" value="<?=@$item['twinter']?>" class="input" /><br />
	
	<b>Google+</b>
	<input type="text" name="google" value="<?=@$item['google']?>" class="input" /><br />     
    <b>Youtube</b>
	<input type="text" name="youtube" value="<?=@$item['youtube']?>" class="input" /><br />     
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=nhung_face&act=man'" class="btn" />
</form>