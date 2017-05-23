<?php
    $d->reset();
	$sql_quangcao = "select thumb,link from #_chayhinh_quangcao where hienthi=1 order by stt asc";
	$d->query($sql_quangcao);
	$sp_new = $d->result_array();
?>
<style>
.tung_kmm {
width:255px;
height:185px;
margin:auto;
text-align:center;
}
.tung_kmm a img{
width:225px;
height:185px;
margin-top:10px;

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
overflow:hidden;
position:relative;
width:1000px;
height:160px;
margin-left:40px;
}
.next{
	position:absolute;
	z-index:40000 !important;
	bottom:35%;
	right:0px;
	cursor:pointer;
	width:26px;
	height:37px;
	background:url(images/next_dt.png) !important;
}
.prev{
	position:absolute;
	z-index:40000 !important;
	bottom:35%;
	right:86px !important;
	cursor:pointer;
	width:26px;
	height:37px;
	left:0px;
	background:url(images/prev_dt.png) !important;
}
</style>
<!--Jcasoul dọc-->
    <script src="js/jcarousellite_1.0.1c4.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $(".kmm").jCarouselLite({
            vertical: false,
            hoverPause:true,
            visible:4,
            auto:2000,
            speed:2000,
			btnNext: '.next',
 			btnPrev: '.prev'
        });
    });
    </script>
<!--Jcasoul dọc-->

<div class="kmm">
    <ul>
    
    <?php
	for($i=0,$count_new=count($sp_new);$i<$count_new;$i++){?>
        	<li>
            <div class="tung_kmm">
            <a href="<?=$sp_new[$i]['link']?>">
            <img src="<?=_upload_chayhinh_quangcao_l.$sp_new[$i]['thumb']?>"/>
            </a>
         
            </div>
             
            </li>
     <?php }?>		
    </ul>
     <div class="prev"></div>
     <div class="next"></div>	
</div><!---END .tintuc-->
