<?php
	
	$sql_slider = "select thumb,link from #_slideshow order by stt,id desc";
	$d->query($sql_slider);
	$result_slider=$d->result_array();
	
	
?>  
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/scripts_slider.js"></script>
<div id="slider">
                        <div id="sliderWrp">
                            <div class="wrap">
                                <div id="slide-holder">
                                    <div id="slide-runner">
                                          <?php
										  		for($i=0,$count_slider=count($result_slider);$i<$count_slider;$i++){
					 						?>
                                        <a href="<?=$result_slider[$i]['link']?>" target="_blank">
                                            <img id="slide-img-<?=$i+1?>" src="<?=_upload_slideshow_l.$result_slider[$i]['thumb']?>" class="slide" />
                                        </a>
                                         <?php } ?>
                                                                                <div id="slide-controls">
                                            <p id="slide-client" class="text">
                                                <strong></strong><span></span>
                                            </p>
                                            <p id="slide-desc" class="text">
                                            </p>
                                            <p id="slide-nav">
                                            </p>
                                        </div>
                                    </div>
                                    <!--content featured gallery here -->
                                </div>
                                <script type="text/javascript">
                                    if ( !window.slider ) var slider = {}; slider.data = [
							 <?php for($i=0,$count_slider=count($result_slider);$i<$count_slider;$i++){	?>                           
    			                       <?php if($i!=0)echo ','?>{ "id": "slide-img-<?=$i+1?>", "client": "", "desc": "" } 
	                        <?php } ?>
													   ];
                                </script>
                            </div>
                        </div>
                        <!--sliderHome-->
                    </div>