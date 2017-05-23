<?php
	$d->reset();
	$sql_bando= "select * from #_setting ";
	$d->query($sql_bando);
	$result_bando = $d->result_array();
	
	

?>

<link href="map.css" rel="stylesheet" type="text/css" />

<h3 class="tieude_giua">Bản đồ</h3>
<div class="box_containerlienhe">



   <div class="content" style="overflow:hidden">
               	         
            <ul class="list_map">
            	<li><b>Địa chỉ : </b> <?=$result_bando[0]['diachi_vi']?> - Điện thoại: <?=$result_bando[0]['dienthoai']?>   <a onclick="moveToMaker(7895)" href="javascript:()"></a> </li>               
            </ul>
            	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpZ1QxzdRnNOC2IbmUtdxAqup_8FA49X0&callback=initMap"
  type="text/javascript"></script>
		   <script type="text/javascript">
		   var map;
		   var infowindow;
		   var marker= new Array();
		   var old_id= 0;
		   var infoWindowArray= new Array();
		   var infowindow_array= new Array();function initialize(){
			   var defaultLatLng = new google.maps.LatLng(<?=$result_bando[0]['toado']?>);
			   var myOptions= {
				   zoom: 14,
				   center: defaultLatLng,
				   scrollwheel : false,
				   mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);map.setCenter(defaultLatLng);
			    
			   var arrLatLng = new google.maps.LatLng(<?=$result_bando[0]['toado']?>);
			   infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?=$result_bando[0]['ten_vi']?></div><div> <?=$result_bando[0]['diachi_vi']?> - Điện thoại: <?=$result_bando[0]['dienthoai']?> </div></div>';
			   loadMarker(arrLatLng, infoWindowArray[7895], 7895);
			   
			   moveToMaker(7895);}function loadMarker(myLocation, myInfoWindow, id){marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true});
			   var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});}function moveToMaker(id){var location = marker[id].position;map.setCenter(location);if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;}</script>
           <div id="map_canvas"></div>
           <div class="clear"></div>
            </div>
</div>