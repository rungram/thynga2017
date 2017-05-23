<?php 
         
			$d->reset();
			$sql_tinl="select * from #_tinloai2_1 where hienthi =1 order by id desc";
			$d->query($sql_tinl);	
			$result_tinl=$d->result_array();		
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=10;
			$maxP=5;
			$paging=paging_home($result_tinl , $url, $curPage, $maxR, $maxP);
			$result_tinl=$paging['source'];
			
			
			$sql_tinll="select * from #_tinloai2_1 where hienthi =1 order by stt asc";
			$d->query($sql_tinll);	
			$result_tinll=$d->result_array();	
			
			
			$d->reset();
			$sql_tin_foo ="select *  from #_tinloai1_3 order by stt asc limit 0,9";
			$d->query($sql_tin_foo);
			$result_tinll_c=$d->result_array();


?>


  <link href="news.css" rel="stylesheet">
 <div class="wrapper page-news">
        <div id="main">
			<div class="fshop-mainbox">
            
            
                <div class="row">
                        <div class="fshop-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.html">Trang chủ</a></li>
                                <li class="active"><a href="tuyen-dung.html">Tuyển dụng</a></li>
                            </ol>
                        </div>
                </div>
                
                
                <div class="row">
                <div class="fns-menunews">
                    <span class="fns-mnnewsicon"><i class="glyphicon glyphicon-menu-hamburger"></i> DANH MỤC TIN</span>
                    <ul class="clearfix">
                        <li ><a href="gioi-thieu.html" title="">Giới thiệu về DANHLOI mobile</a></li>
                       <li  class="active"><a href="tuyen-dung.html" title="">Tuyển dụng</a></li>
                       <li class=""><a href="lien-he.html" title="">Liên hệ</a></li>
                    </ul>
                </div>
            	</div>


				
                
                <div class="row fshop-newslist">
        <!--LEFT - MAIN-->
        <div class="fshop-news-colleft"> 
        <div class="row"> 
        
        
        <div class="fns-lnewsbox">                            
          <?php for($i=0,$count_tl=count($result_tinl);$i<$count_tl;$i++){ ?>
        	  <div class="fns-lnewsitem"> <a href="tuyen-dung/<?=$result_tinl[$i]["tenkhongdau"]?>-<?=$result_tinl[$i]["id"]?>.html" title="<?=$result_tinl[$i]["ten_vi"]?>" data-id="" class="ns-viewed"> <img class="fns-lnewsimg" src="upload/tinloai2_1/<?=$result_tinl[$i]["thumb"]?>" alt="<?=$result_tinl[$i]["ten_vi"]?>"> </a> <a href="tuyen-dung/<?=$result_tinl[$i]["tenkhongdau"]?>-<?=$result_tinl[$i]["id"]?>.html" title="<?=$result_tinl[$i]["ten_vi"]?>" data-id="" class="ns-viewed"> <h3 class="fns-lnewstitle"><?=$result_tinl[$i]["ten_vi"]?></h3> </a> <div class="fns-lnewstime"><?=$result_tinl[$i]["ngaytao"]?></div> <div class="fns-lnewsinfo"> <?=$result_tinl[$i]["mota_vi"]?></div> </div> 
           <?php }?>
           <div class="clear"></div>     
	 	 <div class="paging"><?=$paging['paging']?></div>
          
          
           </div>
        
         </div> </div>
        <!--RIGHT SITEBAR-->
        <div class="fshop-news-colright">
            <div class="row">		
                <div class="fshop-rnl-row clearfix">
                    <div class="fshop-rnl-col">
                        
                            
                      
                          <div class="fshop-rnl-ctmore"> 
                          
                          <a href="" title="Thông tin chung" class="fns-rnewstitle"><h3>Thông tin chung</h3></a> 
                          <ul> 
                           <?php for($j=0,$count_tllc=count($result_tinll_c);$j<$count_tllc;$j++) { ?>  
                               <li class="clearfix"> <a href="thong-tin-chung/<?=$result_tinll_c[$j]['tenkhongdau']?>-<?=$result_tinll_c[$j]['id']?>.html" title="<?=$result_tinll_c[$j]['ten_vi']?>"> <div class="fshop-rnl-ctmoreimg"> <img src="images/logo.jpg"> </div> <div class="fshop-rnl-ctmoretitle"><?=$result_tinll_c[$j]['ten_vi']?> </div> </a> </li>  
						   <?php } ?> 
                          </ul> 
                          </div> 
                           
                          
                          
                             
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
			</div>
    </div>
 </div>
 