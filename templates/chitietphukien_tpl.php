
<script type="text/javascript">
	function CheckSignup()
	{
		var s=document.formdh;
		if(s.kiemtra_user.value=='')
		{
			document.getElementById("thongbao_login").style.display = "block";
			document.getElementById("thongbao_login").innerHTML="Bạn cần đăng nhập trước!!!";
		
			return false;	
		}
	}
	
	
</script>


<?php
if(isset($_GET['id']))
{	
	$id =  addslashes($_GET['id']);
	
	$d->reset();
	$sql_tanglx="update  #_product2 set luotxem=luotxem+1 where id='$id'";
	$d->query($sql_tanglx);
	
	$d->reset();
	$sql_chitietsp="select *  from #_product2 where hienthi= 1 and id='$id'";
	$d->query($sql_chitietsp);
	$result_chitietsp=$d->result_array();
	
	$id_cat=$result_chitietsp[0]['id_cat'];
	
	$d->reset();
	$sql_spkhac="select id,ten_vi,tenkhongdau,thumb,gia,masp,luotxem  from #_product2 where hienthi= 1 and id_cat ='$id_cat' and id<>'$id' order by stt asc limit 0,3 ";
	$d->query($sql_spkhac);
	$result_spkhac=$d->result_array();
	
	
	

}
?>
<div class="tieude_center">
<?=$result_chitietsp[0]["ten_$lang"]?>
</div>

<div class="chitiet_sp">
<div class="hinh_chitiet">	
<a href="upload/sanpham2/<?=$result_chitietsp[0]['photo']?>"  rel="lightbox[plants]"><img src="upload/sanpham2/<?=$result_chitietsp[0]['thumb2']?>" width="290" height="285"/></a>
<div class="hinhnho">

  <?php include _template."layout/chayanh_tungnhich.php"; ?>
  
</div><!--hinhnho-->
</div>
<div class="vung_info">
		<span><?=$result_chitietsp[0]["ten_$lang"]?></span>
        <div class="clear"></div>
        <ol>
        <li><?=_masp?> : <?=$result_chitietsp[0]['masp']?></li>
        <li><?=_luotxem?>:<?=$result_chitietsp[0]['luotxem']?></li>
        <li class="gia_chitiet"><?=_gia?>: 
		
		<?php 
		if($result_chitietsp[0]['gia']==0) echo 'Liên Hệ';
		else
		echo number_format ($result_chitietsp[0]['gia'],0,",",".")." VNĐ";
		
		
		?></li>
         <div class="go">
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
</div>
        <div class="go"><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<g:plusone></g:plusone></div>

 
 </ol>
      
        
        <div class="addcart">
    
        <div id="thongbao_login"></div>
        <form action="?com=gio-hang" method="post" onSubmit="return CheckSignup()"  name="formdh">
        <input type="hidden" name="kiemtra_user" value="<?=$_SESSION['user']?>" />
   		<input type="hidden" name="id" value="<?=$id?>" />
        <input class="dathang" type="submit"  value=""/>
        </form>
        </div>
        <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_button_preferred_4"></a>


</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51d579cb3f5baa2e"></script>
<!-- AddThis Button END -->
        <div class="clear"></div>
</div>
<div class="spkhac">

<?php
for($i=0,$count_spkhac=count($result_spkhac);$i<$count_spkhac;$i++)
 {
	 
	 ?>
     <div class="khung_tungsp2">

     	<div class="hinh_tungsp2">
     
     	<a href="chi-tiet-phu-kien/<?=$result_spkhac[$i]['tenkhongdau']?>-<?=$result_spkhac[$i]['id']?>.html"><img src="upload/sanpham2/<?=$result_spkhac[$i]['thumb']?>"  width="100%" height="100%"/></a>
     
       </div>
       <div class="thontin_tungsp2">
     	<b><?=$result_spkhac[$i]['ten_vi']?></b><br />
         <span class="masp"><?=$result_spkhac[$i]['masp']?></span><br />
   
   
     	 <span class="gia"><?php if($result_spkhac[$i]['gia']==0) echo 'liên hệ'; else echo number_format ($result_spkhac[$i]['gia'],0,",",".")." VNĐ";?></span><br />
     	 <span class="luotxem"><?=$result_spkhac[$i]['luotxem']?> <?=_luotxem?></span>
         
       </div>
     
     </div>
     
     <?php
	  
 }


?>



</div>

</div><!--chitiet_sp-->
<div class="clear"></div>
<div class="thanhnen"><?=_infosp?></div>
<div class="bo_center">

<?=$result_chitietsp[0]['noidung_vi']?>
</div>

