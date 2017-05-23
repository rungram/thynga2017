<?php
		$vals = array();
		$index = array();
		$data = array();
		
		$content = @file_get_contents("http://www.sjc.com.vn/xml/tygiavang.xml");	
		$xml_parser = xml_parser_create();
		
		xml_parse_into_struct($xml_parser, $content, $vals, $index);
		
		//print_r($vals);
		xml_parser_free($xml_parser);
		
		echo '<table cellpadding="0" cellspacing="0" border="0">';
		echo '<tr ><td width="56%">Loại vàng</td><td width="22%">Mua </td><td width="22%">Bán</td></tr>';
		foreach( $vals as $el){
		if($el['level']==3 && isset($el['attributes'])){
				$at = $el['attributes'];				
				echo '<tr><td colspan="3"><b>'.$at['NAME'].'</b></td></tr>';				
				
				
			}
		if($el['level']==4 && isset($el['attributes'])){
			$at = $el['attributes'];
			
			echo '<tr><td>'.$at['TYPE'].'</td>';
			echo '<td>'.$at['BUY'].'</td>';
			echo '<td>'.$at['SELL'].'</td></tr>';		
		}
		}
		echo '</table>';
		
		
		













?>