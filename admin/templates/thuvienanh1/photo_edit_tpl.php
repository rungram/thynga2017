<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=thuvienanh&act=save_photo&id=<?=$_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?=_upload_thuvienanh.$item['thumb']?>"/>
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <?=_hinhanh_type?><br />
   	<b>Tên album</b><select id="ten_album" name="ten_album">
<option value="0">Chọn tên album ảnh</option>
<option value="giai-phap" <?php if($item['ten_album']=='giai-phap') echo "selected='selected'"  ?> >Giải pháp</option>
<option value="dich-vu" <?php if($item['ten_album']=='dich-vu') echo "selected='selected'"  ?>>Dịch vụ</option>
<option value="tin-tuc" <?php if($item['ten_album']=='tin-tuc') echo "selected='selected'"  ?>>Tin tức</option>
</select>	<br />
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thuvienanh&act=man_photo'" class="btn" />
</form>