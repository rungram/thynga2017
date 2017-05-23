<?php
	

?>
<style>
.doitac{
	width:990px;
	margin:auto;
	
}
.tung_kmm {
width:240px;
height:130px;
margin:auto;
text-align:center;
}
.tung_kmm a img{
width:226px !important;
height:110px !important;
border:1px solid #cecece;
padding:2px;

}
.kmm ul li {
background:none !important;
text-align:center;

}

.kmm ul li a {
list-style:none !important;
}

.kmm {
list-style:none !important;

position:relative;
width:100%;
height:160px;
}
.prev{
    background: url(images/prev.png) no-repeat;
    width: 38px;
    height: 30px;
    position: absolute;
    left: 0px;
    top:48px;
	z-index:900;
	cursor:pointer;
}
.next{
    background: url(images/next.png) no-repeat;
    width: 38px;
    height: 30px;
    position: absolute;
    right: 0px;
    top: 48px;
z-index:900;
cursor:pointer;
}

</style>
<!--Jcasoul dọc-->
    <script src="js/jcarousellite_1.0.1c4.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $(".kmm").jCarouselLite({
            vertical: false,
            hoverPause:true,
            visible:5,
            auto:2000,
            speed:500,
			btnNext: ".next",
        	btnPrev: ".prev",

        });
    });
    </script>
<!--Jcasoul dọc-->


<?php
if(count($list_child)>=1)
{
	?>
<div class="kmm">
    <ul>
    
    <?php
		for($i=0,$count_lq=count($list_child);$i<$count_lq;$i++){
		if($list_child[$i]['thumb']) $img =  _upload_sanpham_l.$list_child[$i]['thumb'];
		else 			   $img =  'images/no-image.png';
		
		?>
        	<li><div class="tung_kmm">
            <a href="<?=$dm?>/<?=$list_child[$i]['tenkhongdau']?>-<?=$list_child[$i]['id']?>.html"><img src="<?=$img?>"/><br />
            <?=$list_child[$i]['ten_vi']?>
            </a>
            
            </div>
            
            </li>
     <?php }?>		
    </ul>
    <div class="prev"></div>
    <div class="next"></div>
</div><!---END .tintuc-->
	<?php
}
?>