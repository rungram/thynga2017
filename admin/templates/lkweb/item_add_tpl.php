<h3>Liên kết website</h3>

<form name="frm" method="post" action="index.php?com=lkweb&act=save" enctype="multipart/form-data" class="nhaplieu">

	<b>Tên việt:</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br /><br />
    <b>Tên anh:</b> <input type="text" name="ten_en" value="<?=$item['ten_en']?>" class="input" /><br /><br />
   
    
	<b>Link</b> <input type="text" name="url" value="<?=$item['url']?>" class="input" />
&nbsp;Dạng:&nbsp;www.tenmien.com

<br />

	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lkweb&act=man'" class="btn" />
</form>