
<?php
function get_main_list($id)
	{
		global $id;
		$sql_sp="select ten_vi from table_product where id='".$id."'";
		$result_sp=mysql_query($sql_sp);
	 	$item_sp =mysql_fetch_array($result_sp);
		return @$item_sp['ten_vi'];
		
    
	}
		$d->reset();
		$sql_bl="select * from #_binhluan where id_parent='".$_REQUEST['id']."' order by id desc ";
		$d->query($sql_bl);
		$result_bl=$d->result_array();
?>
<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=binhluan&act=save_photo&id=<?=$_REQUEST['id'];?>&id_sp=<?=$id_sp;?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Tên sản phẩm:</b>
	 <?php

	{
	
		$sql_sp="select ten_vi from table_product where id='".$_REQUEST['id_sp']."'";
		$result_sp=mysql_query($sql_sp);
	 	$item_sp =mysql_fetch_array($result_sp);
		echo @$item_sp['ten_vi'];
		
    
	}
?><br /><br />
   	 <b>Nội dung câu hỏi </b> 
     <textarea name="noidung" cols="80" rows="5"  style="background:#CCC"><?=$item['noidung']?></textarea>
   	 <br />    <br />  
     <b>Người gửi: </b><?=$item['hoten']?><br/><br/>
     <b>Email: </b><?=$item['email']?><br/><br/>
     <b>Ngày gửi: </b><?=$item['ngaytao']?><br/><br/>
     <b>Cho phép hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
     <b>Trả lời</b><br/>
     <div><textarea name="traloi" id="traloi"><?=$item['traloi']?></textarea></div>
    <br /> 
	

    <b>Danh sách hỏi thêm</b>  <br />
    <ul>
      <?php
	  $elements ='';
	  if(count($result_bl)>=1)
	   for($i=0,$count_bl=count($result_bl);$i<$count_bl;$i++) 
	  	{ 
			 $elements .= ','.'traloi_'.$i;
		?>   
        <li><?=$i+1?></li>  
        <textarea name="noidung_<?=$i?>" cols="80" rows="5" style="background:#CCC" ><?=$result_bl[$i]['noidung']?></textarea><br />
        <b>Người gửi: </b><?=$result_bl[$i]['hoten']?><br/><br/>
        <b>Email: </b><?=$result_bl[$i]['email']?><br/><br/>
        <b>Ngày gửi: </b><?=$result_bl[$i]['ngaytao']?><br/><br/>
        <b>Cho phép hiển thị</b> <input type="checkbox" name="hienthi_<?=$i?>" <?=$result_bl[$i]['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
         <b>Trả lời</b>  <br />
        <div><textarea name="traloi_<?=$i?>" id="traloi_<?=$i?>"><?=$result_bl[$i]['traloi']?></textarea></div>
        <input type="hidden" name="id_<?=$i?>" value="<?=$result_bl[$i]['id']?>" />
        <?php }
	  ?>
     </ul>
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=binhluan&act=man_photo'" class="btn" />
</form>

<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "traloi<?=trim($elements)?>",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"300px",
    width:"100%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>