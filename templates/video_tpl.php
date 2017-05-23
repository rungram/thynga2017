<?php 
            $id =  addslashes($_GET['id']);
			$d->reset();
			$sql_tungdanhmuc="select * from #_video where hienthi =1 order by stt desc ";
			$d->query($sql_tungdanhmuc);	
			$result_spnam=$d->result_array();	
        ?>


<div class="bg-white">
    <div class="clearfix"></div>
    <div class="col-12" id="san-pham">
    <?php
	for ($i=0;$i<count($result_spnam);$i++)
	{ 
	?>
        <div class="col-4 item">
            <div class="shadow-1">
                    <h3>
                       <?=$result_spnam[$i]["ten_vi"]?>
                    </h3>
                    <div class="image-container">
                        <iframe class="video" width="100%" height="300px" src="https://www.youtube.com/embed/<?php echo $result_spnam[$i]['url'] ?>" frameborder="1" allowfullscreen></iframe>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php
	} 
	?>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>

