<?php
    $d->reset();
	$sql_quangcao = "select * from #_hinhanh_thucte where  id_sp = '$id' order by stt asc ";
	$d->query($sql_quangcao);
	$sp_new = $d->result_array();
?>
<style>
.tung_kmm {
width:700px;
height:420px;
margin:auto;
text-align:center;
}
.tung_kmm a img{
width:700px;
height:420px;
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
width:100%;
height:420px;
margin-left:40px;
}
.next{
	position:absolute;
	z-index:40000 !important;
	bottom:35%;
	right:0px;
	cursor:pointer;
	width:26px;
	height:55px;
	background:url(images/next_dt.png) !important;
}
.prev{
	position:absolute;
	z-index:40000 !important;
	bottom:35%;
	right:86px !important;
	cursor:pointer;
	width:26px;
	height:55px;
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
            visible:1,
            auto:1000,
            speed:1000,
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
            <img src="<?=_upload_hinhanh_thucte_l.$sp_new[$i]['thumb']?>"/>
            </a>
         
            </div>
             
            </li>
     <?php }?>		
    </ul>
     <div class="prev"></div>
     <div class="next"></div>	
</div><!---END .tintuc-->
