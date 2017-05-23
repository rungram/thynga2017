
<h3>Trả lời</h3>


<form name="frm" method="post" action="index.php?com=hoidap&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
     <b>Tên câu hỏi</b><br/>
	<div>
  <textarea name="ten_hoi" cols="100" rows="2" id="ten_hoi"><?=$item['ten_hoi']?></textarea></div>
    <br />
    
     <b>Nội dung câu hỏi</b><br/>
	<div>
  <textarea name="noidung_hoi" cols="100" rows="10" id="noidung_hoi"><?=$item['noidung_hoi']?></textarea></div>
    <br /> 
    
  <b>Nội dung câu trả lời</b><br/>
	<div>
  <textarea name="noidung_traloi" cols="100" rows="10" id="noidung_traloi"><?=$item['noidung_traloi']?></textarea></div>
    <br /> 
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hoidap&act=man'" class="btn" />
</form>