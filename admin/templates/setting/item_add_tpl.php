<h3>Thiết lập hệ thống</h3>

<form name="frm" method="post" action="index.php?com=setting&act=save" enctype="multipart/form-data" class="nhaplieu">
	<b>Tiêu đề web :</b> <input type="text" name="title_vi" value="<?=@$item['title_vi']?>" class="input" /><br /><br>
    <b>Tên công ty :</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
   
    <b>Email liên hệ:</b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br /><br>
   
    <b>Từ khóa SEO:</b> 
    <textarea name="keywords" cols="100" rows="6" class="input"><?=@$item['keywords']?>
    </textarea>
    <br /><br>
    <b>Mô tả SEO:</b> 
    <textarea name="description" cols="100" rows="6" class="input"><?=@$item['description']?>
    </textarea>
    <br /><br>
    <b>Hotline:</b> <input type="text" name="hotline" value="<?=@$item['hotline']?>" class="input" /><br /><br>
    <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br /><br>
    <b>Fax:</b> <input type="text" name="fax" value="<?=@$item['fax']?>" class="input" /><br /><br>
    <b>Địa chỉ :</b> <input type="text" name="diachi_vi" value="<?=@$item['diachi_vi']?>" class="input" /><br /><br>
  
    <b>Link face:</b> <input type="text" name="link_face" value="<?=@$item['link_face']?>" class="input" /><br /><br>
    <b>Bản quyền cuối web:</b> <input type="text" name="banquyen" value="<?=@$item['banquyen']?>" class="input" /><br /><br>
    <b>Tọa độ:</b> <input type="text" name="toado" value="<?=@$item['toado']?>" class="input" /><br /><br>
    
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=setting&act=capnhat'" class="btn" />
</form>