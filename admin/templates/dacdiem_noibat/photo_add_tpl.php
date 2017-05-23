<?php
function get_main_list()
	{
		$sql="select * from table_tinloai2_2 order by stt,id asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_mau" name="chon_mau"  class="main_font">
			<option value="0">Chọn màu</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["chon_mau"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>

<h3>Đặc điểm nổi bật</h3>
<form name="frm" method="post" action="index.php?com=dacdiem_noibat&act=save_photo&id_sp=<?=$id_sp;?>" enctype="multipart/form-data" class="nhaplieu">

<?php for($i=1; $i<=5; $i++){?>	
    <b>Hình ảnh <?=$i?></b> <input type="file" name="file<?=$i?>" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - Width: 170px</strong><br />
    <br />  
    <b>Tên đặc điểm  <?=$i?></b> <input type="text" name="ten_vi<?=$i?>" value="" class="input" /><br />   
    
   
    <b>Mô tả đặc điểm  <?=$i?></b> 
    <textarea name="mota_vi<?=$i?>" cols="80" rows="5" ></textarea>
    <br />   
   
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	<hr />
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dacdiem_noibat&act=man_photo'" class="btn" />
</form>