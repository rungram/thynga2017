<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id']))
{
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_chitiettinloai2_3="select ten_$lang,mota_$lang,noidung_$lang from #_tinloai2_1 where  id='$id'";
	$d->query($sql_chitiettinloai2_3);	
	$result_chitiettinloai2_3=$d->result_array();	
	
	$d->reset();
	$sql_tinlq="select tenkhongdau,ten_$lang,id,ngaytao from #_tinloai2_1 where  id<>'$id'";
	$d->query($sql_tinlq);	
	$result_tinlq=$d->result_array();	
	
	$url=getCurrentPageURL();
				
	
}
?>
<div class="tieude_center">TIN TỨC VÀ SỰ KIỆN</div>
<div class="bo_center">



<h2 style="font: 400 28px/32px arial;text-rendering: geometricPrecision;"><?=$result_chitiettinloai2_3[0]["ten_$lang"]?></h2>
<br />
<b><?=$result_chitiettinloai2_3[0]["mota_$lang"]?></b>
<div class="tin_lq">

<ol>
<?php
for($i=0,$count_tinlq=count($result_tinlq);$i<2;$i++) 
{
	?>
		<li><a href="tin-tuc/<?=$result_tinlq[$i]["tenkhongdau"]?>-<?=$result_tinlq[$i]["id"]?>.html"><?=$result_tinlq[$i]["ten_$lang"]?> </a></li>
	<?php
}
?>


</ol>

</div>

<?=$result_chitiettinloai2_3[0]["noidung_$lang"]?>


<g:plusone></g:plusone>
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=639052932876022";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>

<div class="fb-like" data-href="<?=$url?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<!--gui binh luan-->


<style>
.binhluan  {
				
				
				margin-top:10px;
			}
			.binhluan input {
				
				width:185px;
				height:25px;
				margin-top:10px;
			}
			.binhluan textarea {
				
				width:90%;
				height:75px;
				margin-top:10px;
			}
			.guiykien {
				
				width:40px !important;
				clear:both;
				background:#b40101;
				color:#fff;
			}
			.moibinhluan {
				
				width:90%;
				border-bottom:1px solid #CCC;
				font-style:italic;
				padding-top:10px;
				padding-bottom:10px;
			}
</style>
<script language="javascript" src="quanly/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('hoten'), "Xin nhập Họ tên.")){
		document.getElementById('hoten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('email'), "Xin nhập Email.")){
		document.getElementById('email').focus();
		return false;
	}
	
	
	
	if(!check_email(document.frm.email.value)){
		alert("Email không hợp lệ");
		document.frm.email.focus();
		return false;
	}
	
	
	if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>

<!--gui binh luan-->


<div class="tin_lq">
<b><?=_tintuckhac?></b>
<ol>
<?php
for($i=2,$count_tinlq=count($result_tinlq);$i<$count_tinlq;$i++) 
{
	?>
		<li><a href="tin-tuc/<?=$result_tinlq[$i]["tenkhongdau"]?>-<?=$result_tinlq[$i]["id"]?>.html"><?=$result_tinlq[$i]["ten_$lang"]?> </a></li>
	<?php
}
?>


</ol>

</div>
</div>