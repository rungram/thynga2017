<?php
	$sql_moinhat = "select * from #_tinloai2_1 order by stt asc";
	$d->query($sql_moinhat);
	$nums_anh = $d->result_array();

?>
<style>
.tung_kmm {
width:160px;
margin:auto;
text-align:center;
margin:4px;

}
.tung_kmm a img{
width:160px;
height:125px;
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
position:relative;
width:100%;
margin-top:10px;
}
.prev{
    background: url(images/prev.png) no-repeat;
    width: 38px;
    height: 30px;
    position: absolute;
    left: 0px;
    top: 18px;
	z-index:900;
	cursor:pointer;
}
.next{
    background: url(images/next.png) no-repeat;
    width: 38px;
    height: 30px;
    position: absolute;
    right: 0px;
    top: 18px;
z-index:900;
cursor:pointer;
}
.hinh_tin{
    width:85px;
	float:left;
	margin:5px;
	border:1px solid #cecece;
}
.hinh_tin img{
    width:75px;
	margin:5px;
	height:70px;
}
.moi_tinchay{
    width:250px;
	border-bottom:1px solid #cecece;
	padding-top:5px;
	height:auto !important;
}
.info_tin{
    width:145px;
	text-align:justify;
	float:left;
	font-size:14px;
}
.ngaytao{
   
	font-size:12px;
}
</style>
<!--Jcasoul dọc-->
    <script src="js/jcarousellite_1.0.1c4.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $(".kmm").jCarouselLite({
            vertical: true,
            hoverPause:true,
            visible:5,
            auto:2000,
            speed:1000,
			btnNext: ".next",
        	btnPrev: ".prev",
        });
    });
    </script>
<!--Jcasoul dọc-->

<div class="kmm">
    <ul>
    
    <?php
	for($i=0,$count_lq=count($nums_anh);$i<$count_lq;$i++){?>
        	<li class="moi_tinchay">
            <div class="hinh_tin">
              <a href="tin-tuc/<?=$nums_anh[$i]["tenkhongdau"]?>-<?=$nums_anh[$i]["id"]?>.html" title="<?=$nums_anh[$i]["ten_vi"]?>" ><img src="upload/tinloai2_1/<?=$nums_anh[$i]['thumb']?>"/></a>
            </div>
            <div class="info_tin">
              
              <div style="color:#333333"><b><?=$nums_anh[$i]["ten_vi"]?></b></div>
               <span class="ngaytao"><img src="images/calendar.png" width="10" /><?=$nums_anh[$i]["ngaytao"]?></span></span>
            </div>
             
            </li>
     <?php }?>		
    </ul>
   
</div><!---END .tintuc-->
