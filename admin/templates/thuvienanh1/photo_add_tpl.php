<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=thuvienanh&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<1; $i++){?>	
    <b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - Width: 170px</strong><br />
    
	<br />
   	<b>Tên album</b><select id="ten_album" name="ten_album">
<option value="0">Chọn tên album ảnh</option>
<option value="giai-phap">Giải pháp</option>
<option value="dich-vu">Dịch vụ</option>
<option value="tin-tuc">Tin tức</option>
</select>	<br />
    
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thuvienanh&act=man_photo'" class="btn" />
</form>