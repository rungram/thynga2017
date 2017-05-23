
<h3>Hình ảnh thực tế</h3>
<form name="frm" method="post" action="index.php?com=hinhanh_thucte&act=save_photo&id_sp=<?=$id_sp;?>" enctype="multipart/form-data" class="nhaplieu">

<?php for($i=1; $i<=5; $i++){?>	
    <b>Hình ảnh <?=$i?></b> <input type="file" name="file<?=$i?>" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - Width: 170px</strong><br />
    <br />  
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhanh_thucte&act=man_photo'" class="btn" />
</form>