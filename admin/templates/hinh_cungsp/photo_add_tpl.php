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

<h3>Hình ảnh theo màu</h3>
<form name="frm" method="post" action="index.php?com=hinh_cungsp&act=save_photo&id_sp=<?=$id_sp;?>" enctype="multipart/form-data" class="nhaplieu">
 <b>Màu:</b><?=get_main_list();?><br /><br />
<?php for($i=1; $i<=5; $i++){?>	
    <b>Hình ảnh <?=$i?></b> <input type="file" name="file<?=$i?>" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - Width: 170px</strong><br />
    <br />  
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinh_cungsp&act=man_photo'" class="btn" />
</form>