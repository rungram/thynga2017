<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=thuvienanhcapcha&act=save_photo" enctype="multipart/form-data" class="nhaplieu">

    <b>Hình ảnh </b> <input type="file" name="file" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - Width: 170px</strong><br />
    
	<br />
   	<b>Tên album</b><input type="text" name="thumb" style="width:150px" /><br />
    
<b>Số thứ tự </b> <input type="text" name="stt" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thuvienanhcapcha&act=man_photo'" class="btn" />
</form>