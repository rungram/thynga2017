<script language="javascript"> 
    	function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
	}
	function onSearch(evt) {			
	
			var keyword = document.getElementById("keyword").value;
			if(keyword=='')
				alert('Bạn chưa nhập từ khóa tìm kiếm!');
			else{
			//var encoded = Base64.encode(keyword);
			location.href = "index.php?com=tim-kiem&keyword="+keyword;
			loadPage(document.location);			
			}
		}		
</script>  

 <img src="images/nut_search.png" align="absmiddle" onclick="onSearch(event,'keyword');"  style="cursor:pointer"/>                               
<input type="text"  name="keyword" id="keyword" onKeyPress="doEnter(event,'keyword');" 
placeholder="Tìm kiếm ..." />
