<?php
    $d->reset();
	$sql_quangcao = "select thumb,link from #_chayhinh_doitac where hienthi=1 order by stt asc";
	$d->query($sql_quangcao);
	$quangcao = $d->result_array();
?>
<div style="width:1000px;margin-left:45px;">
<script type="text/javascript">
marqueeInit({
	uniqueid: 'mycrawler2',
	style: {
		'width': '1100px',
		'height': '100px',
		'z-index': '80'
	},
	inc: 2, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast:1,
	neutral: 150,
	savedirection: true,
	random: true
});
</script>


<div id="mycrawler2">
            	<?php for($i=0,$count_km=count($quangcao);$i<$count_km;$i++){?>
           <a href="http://<?=$quangcao[$i]['link']?>" target="_blank"><img src="<?=_upload_chayhinh_doitac_l.$quangcao[$i]['thumb']?>" " alt="Đối tác solarvietnam - pin năng lượng mặt trời" width="120"/></a>
                <?php }?>
</div>

</div>

