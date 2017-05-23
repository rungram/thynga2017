<h3><a href="index.php?com=product&act=add">Thêm tin danh muc</a>
        &nbsp;Danh mục&nbsp;<?=get_main_category();?>Hãng sản xuất&nbsp;<?=get_main_item();?>&nbsp;
          Danh mục 3&nbsp;<?=get_main_loai();?>&nbsp;
        </h3>
         <br />
         TÌM KIẾM NHANH 
       <input type="text" id="matim" size="50" placeholder="Nhập tên sản phẩm ..." value="<?=$_REQUEST['keyword']?>" />
       <input type="button" id="search" value="TÌM " onclick="timma()" /> <br />
<script language="javascript">	

	function timma()
		{	
			var matim=document.getElementById("matim");
			window.location ="index.php?com=product&act=man&keyword="+matim.value;	
			return true;
		}



	function select_onchange()
	{	
		var b=document.getElementById("id_list");
		window.location ="index.php?com=product&act=man&id_list="+b.value;	
		return true;
	}
	
	function select_onchange1()
	{	
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=man&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}
	
	function select_onchange2()
	{	
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		var d=document.getElementById("id_item");
		window.location ="index.php?com=product&act=man&id_list="+b.value+"&id_cat="+c.value+"&id_item="+d.value;	
		return true;
	}

</script>
<?php
function get_main_category()
	{
		$sql="select * from table_product_list order by stt asc,id desc";
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
		$sql_huyen="select * from table_product_cat where id_list=".$_REQUEST['id_list']." order by stt desc ";
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
		$sql_loai="select * from table_product_item where id_list=".$_REQUEST['id_list']." and  id_cat=".$_REQUEST['id_cat']." order by stt desc ";
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
<table class="blue_table" style="margin-top:10px;">
	<tr>
		<th style="width:5%;">Số thứ tự</th>		
        <th style="width:10%;">Danh mục cấp 1 </th>
        <th style="width:10%;">Danh mục cấp 2</th>
        <th style="width:10%;">Danh mục cấp 3</th>
        <th style="width:10%;">Tên sản phẩm</th> 
        <th style="width:10%;">Hình</th> 
        <th style="width:10%;">Màu sản phẩm</th> 
        <th style="width:10%;">Bổ sung thông tin</th>   
		<th style="width:10%;">Giá</th>
        <th style="width:10%;">Giá KM</th>
        <th style="width:10%;">Bình luận</th>
        <th style="width:5%;">Bán chạy</th>
        
        <th style="width:10%;">Trang chủ lớn/nhỏ</th>
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
		<td style="width:5%;"> <a href="index.php?com=product&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['stt']?></a></td>		      
        <td align="center" style="width:5%;">
        
		<?php
		$sql_danhmuc1="select ten_vi from table_product_list where id='".$items[$i]['id_list']."'";
		$result=mysql_query($sql_danhmuc1);
	 	$item_danhmuc1 =mysql_fetch_array($result);
	 	echo @$item_danhmuc1['ten_vi'];
		?>  
    
     </td>
     <td align="center" style="width:15%;">
        
		<?php
		$sql_danhmuc1="select ten_vi from table_product_cat where id='".$items[$i]['id_cat']."'";
		$result=mysql_query($sql_danhmuc1);
	 	$item_danhmuc1 =mysql_fetch_array($result);
	 	echo @$item_danhmuc1['ten_vi'];
		?>  
    
     </td>
   
	   <td align="center" style="width:15%;">
        
		<?php
		$sql_danhmuc1="select ten_vi from table_product_item where id='".$items[$i]['id_item']."'";
		$result=mysql_query($sql_danhmuc1);
	 	$item_danhmuc1 =mysql_fetch_array($result);
	 	echo @$item_danhmuc1['ten_vi'];
		?>  
    
     </td>
                  
       
        
      <td align="center" style="width:10%;">
	 <a href="index.php?com=product&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
	  <?=$items[$i]['ten_vi']?> 
      </a>      
      </td>  
      
         
        <td align="center" style="width:10%;">
     <a href="index.php?com=product&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
	  <img src="../upload/sanpham/<?=$items[$i]['thumb']?>"  />
      </a>      
        
        </td>
      
       <td align="center" style="width:15%;">
        
		<?php
		$sql_danhmuc1="select * from table_tinloai2_2 where id='".$items[$i]['id_mau']."'";
		$result=mysql_query($sql_danhmuc1);
	 	$item_danhmuc1 =mysql_fetch_array($result);
	 	echo @$item_danhmuc1['ten_vi'];
		?>  
    
     </td>
       
       
       
      <td align="center" style="width:10%;">
     <a href="index.php?com=hinh_cungsp&act=man_photo&id_sp=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;" target="_blank">
	  Hình và màu khác
      </a>     <br /><br />  
       <a href="index.php?com=dacdiem_noibat&act=man_photo&id_sp=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;" target="_blank">
	 Đặc điểm nổi bật
      </a>     
      			<br /> <br /> 
       <a href="index.php?com=hinhanh_thucte&act=man_photo&id_sp=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;" target="_blank">
	 Hình ảnh thực tế
      </a>      
        </td>
           
       
     
     
          
        
        <td align="center" style="width:10%;">
	
	   <?php echo number_format ($items[$i]['gia'],0,",",".")." VNĐ";?>
    
      </td>       
        <td style="width:10%;">
         <?php if($items[$i]['giagiam']>0) echo number_format ($items[$i]['gia'],0,",",".")." VNĐ"; else echo 'Không Khuyến Mãi';?>
		 </td>  
           <td style="width:10%;">
        <a href="index.php?com=binhluan&act=man_photo&id_sp=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;" >
	 Bình luận
      </a>    
      
		 </td>  
         
       
         <td style="width:5%;">
		<?php 
		if(@$items[$i]['spdc']!=0)
		{
		?>
        
        <a href="index.php?com=product&act=man&spdc=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/hot.png" width="30" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product&act=man&spdc=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>  
         
         
          
          
         
          <td style="width:10%;">
		
        <a href="index.php?com=product&act=man&tc=2&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">Lớn <?php if(@$items[$i]['tc_big']==2) echo '<b style="color:#090">(Chọn)</b>'; ?></a>
		<br />
         <a href="index.php?com=product&act=man&tc=1&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">Nhỏ <?php if(@$items[$i]['tc_big']==1) echo '<b style="color:#090">(Chọn)</b>'; ?></a>
        <br />
         <a href="index.php?com=product&act=man&tc=0&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">Không <?php if(@$items[$i]['tc_big']==0) echo '<b style="color:#090">(Chọn)</b>'; ?></a>
        
         </td>  
         
           
         
         
         
          <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=product&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>
         
         
		<td style="width:5%;"><a href="index.php?com=product&act=edit&id_danhmuc=<?=$items[$i]['id_danhmuc']?>&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=product&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=product&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>