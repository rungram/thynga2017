<h3><li><a href="index.php?com=user&act=add">Tạo user</a></li></h3>


<form action="#" method="post" name="frmLIST_PRODUCT" id="frmLIST_PRODUCT">
<table class="blue_table">
	<tr>
		<th style="width:5%;">Number</th>		
 
		
        <th style="width:10%;">Username</th>                   
        <th style="width:10%;">Avata</th>  
       
		
		<th style="width:5%;">Edit</th>
		<th style="width:5%;">Delete</th>
	
            <input name="ids" type="hidden" id="ids">
            <input name="mod" type="hidden" id="mod">
            <input name="strID" type="hidden" id="strID">
            <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?=$_POST['txtLIST_ID']?>">
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$i+1?></td>	
        	      
    	
        <td align="center" style="width:10%;"><?=$items[$i]['username']?></td>                      
    	
        
        <td align="center" style="width:10%;"><?=$items[$i]['ngayvaocty']?></td>         
          
     
	
         
		<td style="width:5%;"><a href="index.php?com=user&act=edit&id_danhmuc=<?=$items[$i]['id_danhmuc']?>&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=user&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
    
    
        
        
        
	<?php	}?>
</table>
</form>

<div class="paging"><?=$paging['paging']?></div>