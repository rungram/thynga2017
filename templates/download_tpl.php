
   
    <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    

    <link rel="shortcut icon" href="/favicon.ico">
    <link href="css/cssv3.css" rel="stylesheet"/>

    <link href="css/productcatev3.css" rel="stylesheet"/>

    <meta name="adx:sections" content="Điện thoại" />

    <meta name="adx:objects" content="1" />

    <meta name="adx:authors" content="" />


    

   	

<?php 
			$d->reset();
			$sql_tungdanhmuc="select * from #_product where tc_big>0";
			$d->query($sql_tungdanhmuc);	
			$result_spnam=$d->result_array();	
			
			
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=30;
			$maxP=5;
			$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
			$result_spnam=$paging['source'];
            
			
			$total_sp = count($result_spnam);
        ?>


<body>
    <div class="wrapper page-news">
        <div id="main">
			<div class="container-fluid">
                


                


<!--Ver 3-->
<!--CATELOGY PAGE-->
    


<div class="fshop-mainbox">
    <div class="fshop-lprod-top">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="fshop-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li class="active"><a href="san-pham-trang-chu.html">Sản phẩm trang chủ</a></li>
                    </ol>
                </div>


            </div>


            <div class="col-md-6 col-xs-12 fshop-lprod-sltxtnews">
            
            <div class="fshop-lprod-slnews">
            
                                <div class="input-group"><span class="input-group-addon fshop-lpslnews-title">Tin mới <i>›</i></span>
                                <div class="fshop-lpslnews-main">
                   					
                                    <?php 
										$d->reset();
										$sql_tin_chay= "select * from #_tinloai1_1 order by id desc limit 0,10";
										$d->query($sql_tin_chay);
										$tin_chay = $d->result_array();
									?>
                                    <marquee onMouseOver="this.stop();" onMouseOut="this.start();">
                                     <?php for($i=0,$count_tc=count($tin_chay);$i<$count_tc;$i++){ ?>
                                     	<a href="tin-tuc-detail/<?=$tin_chay[$i]["tenkhongdau"]?>-<?=$tin_chay[$i]["id"]?>.html" title="<?=$tin_chay[$i]["ten_vi"]?>" ><?=($i+1).' -- '.$tin_chay[$i]["ten_vi"].' | '?></a> 
                                     <?php }?>
                                    </marquee>
                   				 </div>
                    
                    </div>

			</div><!--vung_tinnew-->

</div>



        </div>


    </div>


        <div class="row fshop-lprod-fillter clearfix">
            <div class="fshop-lprod-fprodname"> <h1>Sản phẩm trang chủ</h1> <span>(<?=$total_sp?> sản phẩm)</span></div>

        </div>


    <div class="row fshop-lprod-bnbot"><ul class="clearfix"><li class="fshop-lprod-ckch">Cam kết hàng chính hãng</li><li class="fshop-lprod-gttn">Giá thành tốt nhất</li><li class="fshop-lprod-hthd">Hỗ Trợ trả góp</li><li class="fshop-lprod-mpgh">Miễn phí Giao hàng toàn quốc</li><li class="fshop-lprod-bnbclode"></li></ul>        </div>


    <!--product list box-->

    <div class="row fshop-lprod-main box-products">
        <div class="bor-left"></div>
		

        <div id="category-products" class="products" data-link="#/dien-thoai" data-page="2" style="position: relative; height: 1734px;">
            <div class="grid-sizer"></div>

                <?php for($i=0,$count_spnam=count($result_spnam);$i<$count_spnam;$i++) { ?>    

              		  <div class="p-item cell-1" style="position: absolute; <?php if($result_spnam[$i]["tc_big"]==3) echo 'left: 33.3333%; top: 289px;' ;else echo 'left:66.6667%;top: 0px;'?>"><div class="p-badge">
                      
                      <img src="upload/sanpham/<?php if($result_spnam[$i]["tc_big"]==1) echo $result_spnam[$i]["thumb"]; else echo $result_spnam[$i]["thumb"] ?>" alt="<?=$result_spnam[$i]["ten_vi"]?>"></div>
                
                <div class="p-item-bound"><a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html" title="" class="p-link-prod"></a><figure class="p-image"><span><a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"><img src="upload/sanpham/<?php if($result_spnam[$i]["tc_big"]==1) echo $result_spnam[$i]["thumb"]; else echo $result_spnam[$i]["thumb_tc"] ?>" alt="<?=$result_spnam[$i]["ten_vi"]?>"></a></span></figure><div class="p-info"><div class="p-top-info"><div class="p-info-show"><div class="p-name"><a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"><h3><?=$result_spnam[$i]["ten_vi"]?></h3></a></div>
                
                <div class="p-price"><span class="p-current-price"><?php echo number_format ($result_spnam[$i]['gia'],0,",",".");?><span>đ</span></span>                    </div>
                
                </div>
                
                </div>
                
                <div class="p-hide-info"><div class="best-seller-order">
                		<?=$result_spnam[$i]["mota_vi"]?>
               			
                </div>
                
                <div class="p-promotion"><div class="hightlight-des">
                		<?=$result_spnam[$i]["mota_en"]?>
                
                </div>
                
                </div>
                
                </div>
                
                </div>
                
                </div>
                
                </div>
                
				<?php } ?> 
   
              
               


                  


        	</div>

		 <div class="clear"></div>     
	 	 <div class="paging" ><?=$paging['paging']?></div>
    </div>




    <!--end product list box-->
</div>





<style>.back-to-top {bottom: 150px !important;}.button-bottom {display: none;}</style>

            </div>



        </div>






        
       
    </div>




   <div id="menuHeader"> <a id="m-nav"><i class="icons m-nav-list-icon"></i> </a> <a href="#/" class="logo"><img src="images/logo-black.png"></a> <div class="search-box"> <form> <input class="search-text-box tab-keyword" placeholder="Bạn muốn tìm gì?" type="text"> <button type="submit" class="submit search-button search-button-btn"><i class="glyphicon glyphicon-search"></i></button> <div class="asmr"> <ul class="fshop-search-cate"></ul>
 <ul class="fshop-search-prod"></ul>
 </div>



 </form> </div>



 



  </div>



 





    
    <div class="modal fade" id="modal-call-me" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="fshop-pucb-close b-close close-f-modal" data-dismiss="modal"><a onClick="ga('send', 'event', 'Tat Popup lay sdt sp bestseller mobile home page ', 'Tat Popup lay sdt sp bestseller mobile home page ', 'Tat Popup lay sdt sp bestseller mobile home page ')">&nbsp;</a></div>







\



</div>



</div>



</div>



</div>










    <div class="back-to-top display">
        <a href="javascript:;"></a>
    </div>





     
 <script src="js/scriptsv3"></script>



    
    <meta name="adx:sections" content="Trang chủ">
    <meta name="adx:objects" content="0">
    <meta name="adx:authors" content="">

    
   <script src="js/homev3"></script>


    <script type="text/javascript" async src="js/conversion.js"></script>

    <script type="text/javascript">
        var ants_analytic = ants_analytic || [];
        ants_analytic.push({ conversionId: "c80ad084" });
    </script>

    


    

    <!-- End Google Tag Manager -->
    
    




 



</div>



