<?php 
function get_main_album()
{
    $sql="select * from table_thuvienanhcapcha order by stt,id asc";
    $stmt=mysql_query($sql);
    $str='
		<select id="thumb" name="thumb" onchange="select_onchange()" class="main_font">
		<option value="0">Chọn album</option>
		';
    while ($row=@mysql_fetch_array($stmt))
    {
        if($row["id"]==(int)@$_REQUEST["id_list"])
            $selected="selected";
        else
            $selected="";
        $str.='<option value='.$row["id"].' '.$selected.'>'.$row["thumb"].'</option>';
    }
    $str.='</select>';
    return $str;
}
?>
<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=thuvienanh&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên ảnh</b> <input type="text" name="ten_vi" class="input" /><br /> 
    <b>Hình ảnh</b> <input type="file" name="file" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - Width: 170px</strong><br />
    
	<br />
   	<b>Tên album</b><?=get_main_album();?><br />
    
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thuvienanh&act=man_photo'" class="btn" />
</form>