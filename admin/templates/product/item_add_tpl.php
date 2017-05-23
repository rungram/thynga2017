<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_vi,noidung_en,noidung_cn,mota_vi,mota_en",
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

<h3>Sản phẩm</h3>
<script language="javascript">			
	function select_onchange()
	{		
		var b=document.getElementById("id_list");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+b.value;	
		return true;
	}

	
</script>

<script language="javascript">			
	function select_onchange2()
	{		
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+b.value+"&id_cat="+c.value;	;	
		return true;
	}

	
</script>
<?php
function get_main_list()
	{
		$sql="select * from table_product_list order by stt,id asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option value="0">Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
	function get_main_cat()
	{
		$sql_huyen="select * from table_product_cat where id_list=".$_REQUEST['id_list']." order by id asc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange2()">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_loai()
	{
		$sql_loai="select * from table_product_item where id_list=".$_REQUEST['id_list']." and  id_cat=".$_REQUEST['id_cat']." order by stt desc ";
		$result=mysql_query($sql_loai);
		$str='
			<select id="id_item" name="id_item"  onchange="select_onchange3()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_loai=@mysql_fetch_array($result)) 
		{
			if($row_loai["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_loai["id"].' '.$selected.'>'.$row_loai["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<?php
function get_main_list2($id_mau)
	{
		$sql="select * from table_tinloai2_2 order by stt,id asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_mau" name="id_mau"  class="main_font">
			<option value="0">Chọn màu</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)$id_mau)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
function get_main_list22($id_mau)
	{
		$sql="select * from table_tinloai2_2 order by stt,id asc";
		$stmt=mysql_query($sql);
		$str='
			<select name=""  class="main_font chonmau_add">
			<option value="0">Chọn màu</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$id_mau)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>

<style>
	.dacdiem_goc,.hinh_goc,.hinhmau_goc {
		border:1px solid #ccc;
		width:95%;
		padding:1%;
		margin:1%;
		display:none;
	}
	.cac_dacdiem {
		
	}
	.moi_dacdiem,.moi_hinh,.moi_hinhmau {
		border:1px solid #ccc;
		margin:1%;
		padding:1%;
		display:block !important;
		position:relative;
	}
	.close_moi_dacdiem,.close_hinh,.close_hinhmau {
		
		position:absolute;
		top:0px;
		right:0px;
	}
	</style>
<script>
	$(document).ready(function(e) {
        $('#add_dacdiem').click(function(e) {
            	//alert('uuu');
				$(".dacdiem_goc").clone().appendTo(".cac_dacdiem");
				$(".cac_dacdiem").find('.dacdiem_goc').attr( "class", "moi_dacdiem" );
				$(".cac_dacdiem").find('.ten_dd').attr( "name", "ten_dacdiem[]" );
				$(".cac_dacdiem").find('.mota_dd').attr( "name", "mota_dacdiem[]" );
				$(".cac_dacdiem").find('.input_dd').attr( "name", "file_dacdiem[]" );
        });
		
		$('#add_hinh').click(function(e) {
            	//alert('uuu');
				$(".hinh_goc").clone().appendTo(".cac_hinh");
				$(".cac_hinh").find('.hinh_goc').attr( "class", "moi_hinh" );
				$(".cac_hinh").find('.input_dd').attr( "name", "file_hinh[]" );
        });
		
		$('#add_hinhmau').click(function(e) {
            	//alert('uuu');
				$(".hinhmau_goc").clone().appendTo(".cac_hinhmau");
				$(".cac_hinhmau").find('.hinhmau_goc').attr( "class", "moi_hinhmau" );
				$(".cac_hinhmau").find('.input_dd').attr( "name", "file_hinhmau[]" );
				$(".cac_hinhmau").find('.chonmau_add').attr( "name", "chon_mau[]" );
        });
		
    });
	$(document).on('click', '.close_moi_dacdiem,.close_hinh,.close_hinhmau', function() {
    		$(this).parent().remove();
	});

	</script> 
    
<form name="frm" method="post" action="index.php?com=product&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
    <b>Danh mục 1:</b><?=get_main_list();?><br /><br />
	<b>Danh mục 2:</b><?=get_main_cat();?><br /><br />
    <b>Danh mục 3:</b><?=get_main_loai();?><br /><br />

	<b>Chọn màu:</b><?=get_main_list2($item['id_mau']);?><br /><br />
	<?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình đại diện:</b> <input type="file" name="file" /> <?=_product_type?><br /><br />
 
    <br /><br />   
    <b>Tên sản phẩm</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br /> 
    <b>Giá sản phẩm</b> <input type="text" name="gia"    value="<?=$item['gia']?>"    class="input" /><br />  
    <b>Giá khuyến mãi(nếu có)</b> <input type="text" name="giagiam"    value="<?=$item['giagiam']?>"    class="input" /><br />  
    <b>Mô tả ngắn </b> 
    <textarea name="mota_vi" cols="80" rows="5" ><?=$item['mota_vi']?>
    </textarea>
    <br />  
    <b>Mô tả ngắn thêm</b> 
    <textarea name="mota_en" cols="80" rows="5" ><?=$item['mota_en']?>
    </textarea>
    <br />     
         
     

    
    <br /><br /> 
    <b>Thông số kỹ thuật </b><br/>
	<div>
	 <textarea name="noidung_vi" id="noidung_vi"><?=$item['noidung_vi']?></textarea></div>
    <br /><br />  

    
    <b>Video hình</b> <input type="text" name="video_hinh" value="<?=$item['video_hinh']?>" class="input" /><br />
(mã sau v= của youtube)  	<br /><br />
     <br /><br /> 
     <b>Hướng dẫn sử dụng</b><br/>
	<div>
	 <textarea name="noidung_en" id="noidung_en"><?=$item['noidung_en']?></textarea></div>
    <br /><br />  
     <b>Câu hỏi thường gặp</b><br/>
	<div>
	 <textarea name="noidung_cn" id="noidung_cn"><?=$item['noidung_cn']?></textarea></div>
    <br /><br /> 
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man'" class="btn" />
</form>