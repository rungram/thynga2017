<?php 
	$d->reset();
	$sql_images= "select * from #_slideshow where hienthi=1 order by stt asc,id desc";
	$d->query($sql_images);
	$slideshow = $d->result_array();
	

?>
	<!--SLIDE SHOW-->
    <!--SLIDE ẢNH NIMO-->
    <!--<link rel="stylesheet" href="nimo/css/default/default.css" type="text/css" media="screen" /> 
    <link rel="stylesheet" href="nimo/css/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nimo/css/dark/dark.css" type="text/css" media="screen" />-->
    <link rel="stylesheet" href="nimo/css/bar/bar.css" type="text/css" media="screen" />  
    <link rel="stylesheet" href="nimo/css/nivo-slider.css" type="text/css" media="screen" />

    <script type="text/javascript" src="nimo/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider2').nivoSlider();
    });
    </script>   
    <div  class="slider-wrapper theme-bar">
    	<div id="slider2" class="nivoSlider">
        <?php
			if(count($slideshow) != 0){
				foreach($slideshow as $v){
		?>
        			<a href="<?php echo $v['link']; ?>" target="_blank" title="<?php echo $v['ten']; ?>"><img src="<?php echo _upload_slideshow_l.$v['thumb']; ?>" alt="<?php echo $v['ten']; ?>"/></a>
        <?php
				}
			}
		?>                      
        </div>
    </div>
    <!--END SLIDE SHOW-->