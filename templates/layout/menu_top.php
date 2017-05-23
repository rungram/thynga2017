<?php
	
	$d->reset();
	$sql_list ="select *  from #_product_list where hienthi=1 order by stt asc limit 0,5";
	$d->query($sql_list);
	$list =$d->result_array();
?>

<ul id="top-menu" class="thy-menu sf-menu">
    <li class="active"><a href="index.html">Trang chủ</a></li>
    <li><a href="gioi-thieu.html">Giới thiệu</a></li>
    <?php for($i=0,$count_l=count($list);$i<$count_l;$i++){
		$d->reset();
		$sql_cat ="select *	from #_product_cat where id_list='".$list[$i]["id"]."' order by stt asc";
		$d->query($sql_cat);
		$cat =$d->result_array();
		$child = 'class="dropdown"';
		$taga	= '<i class="fa fa-angle-down"></i>';
		$href = 'danh-muc/'.$list[$i]["tenkhongdau"].'-'.$list[$i]["id"].'.html';
		$toggle ='class="dropdown-toggle" data-toggle="dropdown"';
		if(count($cat)<1)
		{
		$href = 'danh-muc-list/'.$list[$i]["tenkhongdau"].'-'.$list[$i]["id"].'.html';	
			$child = "";
			$taga = "";
			$toggle='';
		}
	 ?>
    <li>
        <a href="<?php echo $href;?>"><?=$list[$i]["ten_vi"]?></a>
        <?php
    	if(count($cat)>0)
    	{
    	?>
        <ul class="sub-menu">
        <?php for($j=0,$count_c=count($cat);$j<$count_c;$j++){ ?>
            <li><a href="danh-muc-cat/<?=$cat[$j]["tenkhongdau"]?>-<?=$cat[$j]["id"]?>.html"><?=$cat[$j]["ten_vi"]?></a></li>
            <?php 
        	}
            ?>
        </ul>
        <?php 
    	}
        ?>
    </li>
    <?php 
	}
    ?>
    <li><a href="tin-tuc.html">Tin tức</a></li>
    <li><a href="thu-vien-anh.html">Thư viện ảnh</a></li>
    <li><a href="video.html">Video</a></li>
    <li><a href="lien-he.html">Liên hệ</a></li>
</ul>