<?php
	
	$d->reset();
	$sql_giaycn="select photo from #_thuvienanh ";
	$d->query($sql_giaycn);
	$result_giaycn=$d->result_array();
	
				
?> 
<img src="upload/thuvienanh/<?=$result_giaycn[0]['photo']?>"  width="195"  height="282"/>