<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=slideshow&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<1; $i++){?>	
<b>Tên hình</b> <input type="text" name="ten<?=$i?>" value="" class="input" /><br /><br>
    <b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - Width: 170px</strong><br />
    <b>Link hình</b> <input type="text" name="link<?=$i?>" value="" class="input" /><br /><br>
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<?php }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slideshow&act=man_photo'" class="btn" />
</form>