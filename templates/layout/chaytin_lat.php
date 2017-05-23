<?php
    $d->reset();
	$sql_quangcao = "select ten_vi,thumb from #_tinloai2_1 where hienthi=1 order by stt asc";
	$d->query($sql_quangcao);
	$quangcao = $d->result_array();
?>


<!--Jcasoul dọc-->
    <script src="../../../vuonbiabengo/templates/layout/js/jcarousellite_1.0.1c4.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $(".km").jCarouselLite({
            vertical: false,
            hoverPause:true,
            visible:3,
            auto:2000,
            speed:2000
        });
    });
    </script>
<!--Jcasoul dọc-->

<div class="km">
    <ul>
    
    <?php
	for($i=0,$count_km=count($quangcao);$i<$count_km;$i++){?>
        	<li><div class="tung_km"><a href="../../../vuonbiabengo/templates/layout/upload"><img src="upload/tinloai2_1/<?=$quangcao[$i]['thumb']?>"/></a></div></li>
     <?php }?>		
    </ul>
</div><!---END .tintuc-->
