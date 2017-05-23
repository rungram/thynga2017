<?php
	$d->reset();
	$sql_list ="select *  from #_product_list order by stt asc limit 0,5";
	$d->query($sql_list);
	$list =$d->result_array();
	
	$d->reset();
	$sql_tin_l ="select *  from #_tinloai1_1_list order by stt asc limit 0,3";
	$d->query($sql_tin_l);
	$tin_l=$d->result_array();
	
	$d->reset();
	$sql_qc_slide ="select *  from #_slideshow order by stt asc limit 0,6";
	$d->query($sql_qc_slide);
	$qc_slide=$d->result_array();
?>

<div class="bg-gray">
            <div class="thy-row" id="header">
                <div id="logo" class="col">
                    <a href="index.html">
                        <img src="images/logo.png" alt="logo thynga"/>
                    </a>
                </div>
                <div id="banner" class="col">
                    <a href="index.html">
                        <img class="img-responsive" src="images/banner.jpg" alt=""/>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="thy-row">
                <div class="menu-container">
                    <?php include _template."layout/menu_top.php"; ?>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="thy-row">
                <div class="col-12">
                    <ul id="top-social">
                    <?php
                	 if(!$_SESSION['user_dn'])
                	 {
                	 ?>
                    <li><a class="dangnhap" href="dang-nhap.html" title="Đăng nhập">Đăng nhập</a></li>
                	<li><a class="dangky" href="dang-ky.html" title="Đăng ký">Đăng ký</a></li>
                	<?php
                	 }
                	 else
                	  {
                		 ?>
                         <li><a class="dangtaisan" href="quan-ly-tai-khoan.html" title="Quản lý tài khoản">Quản lý tài khoản</a></li>
                         <li>Xin chào : <?=$_SESSION['user_dn']?></li>
                         <li><a href="thoat.html"><b>Thoát</b></a></li>
                         
                		
                     	<?php
                	 }
                	 ?>
                     <li><a class="dangtaisan" href="gio-hang.html" title="Giỏ hàng">Giỏ hàng</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="thy-row">
                <div class="col-12">
                    <ul id="top-social">
                        <li><a href="#"><img src="images/skype.jpg" alt="skype"/></a></li>
                        <li><a href="#"><img src="images/yahoo.jpg" alt="yahoo"/></a></li>
                        <li><a href="#"><img src="images/facebook.jpg" alt="facebook"/></a></li>
                        <li><a href="#"><img src="images/google-plus.jpg" alt="google plus"/></a></li>
                        <li class="text">Hotline tư vấn Ms. Nga <span class="highlight highlight-1">0909 333 999</span></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="thy-row">
                <div class="center external col-4">
                    <ul id="per-slide-template"></ul>
                </div>
                <div class="col-8 float-right">
                    <div class="cycle-slideshow-2" id="main-slide"
                         data-cycle-fx="scrollHorz"
                         data-cycle-timeout="3000"
                         data-cycle-pager="#per-slide-template">
                        <div class="cycle-prev"></div>
                        <div class="cycle-next"></div>
                        <?php
                        for($i=0,$count_qcsl=count($qc_slide);$i<$count_qcsl;$i++){
                        ?>
                        <img src="upload/slideshow/<?=$qc_slide[$i]["thumb"]?>"
                             data-cycle-pager-template="<li><a href=#><?=$qc_slide[$i]["ten"]?></a></li>">
                         <?php
                        } 
                         ?>
                    </div>
                </div>
        <div class="clearfix"></div>
    </div>
</div>

