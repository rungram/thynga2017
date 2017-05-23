<h3><a href="index.php?com=product3&act=add">Thêm tin danh muc</a>
        &nbsp;Danh mục cấp 1&nbsp;<?=get_main_category();?>&nbsp;Danh mục cấp 2&nbsp;<?=get_main_item();?>&nbsp;Danh mục cấp 3&nbsp;<?=get_main_loai();?>
        </h3>
<script language="javascript">	
	function select_onchange()
	{	
		var b=document.getElementById("id_list");
		window.location ="index.php?com=product3&act=man&id_list="+b.value;	
		return true;
	}
	
	function select_onchange1()
	{	
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=product3&act=man&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}
	
	function select_onchange2()
	{	
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		var d=document.getElementById("id_item");
		window.location ="index.php?com=product3&act=man&id_list="+b.value+"&id_cat="+c.value+"&id_item="+d.value;	
		return true;
	}

</script>
<?php
function get_main_category()
	{
		$sql="select * from table_product3_list order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
	function get_main_item()
	{
		$sql_huyen="select * from table_product3_cat where id_list=".$_REQUEST['id_list']." order by stt desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	function get_main_loai()
	{
		$sql_loai="select * from table_product3_item where id_list=".$_REQUEST['id_list']." and  id_cat=".$_REQUEST['id_cat']." order by stt desc ";
		$result=mysql_query($sql_loai);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange2()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_loai=@mysql_fetch_array($result)) 
		{
			if($row_loai["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_loai["id"].' '.$selected.'>'.$row_loai["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>

<form action="#" method="post" name="frmLIST_PRODUCT" id="frmLIST_PRODUCT">
<table class="blue_table">
	<tr>
		<th style="width:5%;">Số thứ tự</th>		
        <th style="width:10%;">Cấp 1</th>
		<th style="width:10%;">Cấp 2</th>
        <th style="width:10%;">Cấp 3</th>
		 <th style="width:15%;">Tên sản phẩm việt</th>  
          <th style="width:15%;">Tên sản phẩm anh</th>          
           <th style="width:15%;">Tên sản phẩm trung</th>                     
                     
          <th style="width:10%;">Hình</th> 
          <th style="width:10%;">Hình cùng sản phẩm</th>    
          <th style="width:10%;">Sản phẩm ưa chuộng</th>
        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
            <input name="ids" type="hidden" id="ids">
            <input name="mod" type="hidden" id="mod">
            <input name="strID" type="hidden" id="strID">
            <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?=$_POST['txtLIST_ID']?>">
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"> <a href="index.php?com=product3&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['stt']?></a></td>		      
        <td align="center" style="width:15%;">
        
		<?php
		$sql_danhmuc1="select ten_vi from table_product3_list where id='".$items[$i]['id_list']."'";
		$result=mysql_query($sql_danhmuc1);
	 	$item_danhmuc1 =mysql_fetch_array($result);
	 	echo @$item_danhmuc1['ten_vi'];
		?>  
    
     </td>
	    <td align="center" style="width:15%;">
        
        <?php
		$sql_danhmuc="select ten_vi from table_product3_cat where id='".$items[$i]['id_cat']."'";
		$result=mysql_query($sql_danhmuc);
	 	$item_danhmuc =mysql_fetch_array($result);
	 	echo @$item_danhmuc['ten_vi']
		?>
        
        
        </td>
        
         <td align="center" style="width:15%;">
        
        <?php
		$sql_danhmuc2="select ten_vi from table_product3_item where id='".$items[$i]['id_item']."'";
		$result=mysql_query($sql_danhmuc2);
	 	$item_danhmuc2 =mysql_fetch_array($result);
	 	echo @$item_danhmuc2['ten_vi']
		?>
        
        
        </td>
      <td align="center" style="width:15%;">
	 <a href="index.php?com=product3&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
	  <?=$items[$i]['ten_vi']?> 
      </a>      
      </td>                      
       
        <td align="center" style="width:15%;">
	 <a href="index.php?com=product3&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
	  <?=$items[$i]['ten_en']?> 
      </a>      
      </td>     
      
       <td align="center" style="width:15%;">
	 <a href="index.php?com=product3&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
	  <?=$items[$i]['ten_cn']?> 
      </a>      
      </td>     
    
        
          
        
        <td align="center" style="width:10%;">
     <a href="index.php?com=product3&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
	  <img src="../upload/sanpham3/<?=$items[$i]['photo']?>" height="80"  width="100"/>
      </a>      
        
        </td>
        <td align="center" style="width:10%;">
    
  		<a href="index.php?com=hinh_cungsp&act=man_photo&id_sp=<?=$items[$i]['id']?>" style="text-decoration:none;">Quản lý hình</a>
        
        </td>
        <td style="width:5%;">
		<?php 
		if(@$items[$i]['spdc']!=0)
		{
		?>
        
        <a href="index.php?com=product3&act=man&spdc=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product3&act=man&spdc=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>           
         
          <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=product3&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product3&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>
         
         
		<td style="width:5%;"><a href="index.php?com=product3&act=edit&id_danhmuc=<?=$items[$i]['id_danhmuc']?>&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=product3&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=product3&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>