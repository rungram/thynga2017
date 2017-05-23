<?php 
         
			$id =  addslashes($_GET['id']);
			
			$d->reset();
			$sql_tanglx="update  #_tinloai1_3 set luotxem=luotxem+1 where id='$id'";
			$d->query($sql_tanglx);
	
			$sql_detail="select * from #_tinloai1_3 where id='$id'";
			$d->query($sql_detail);	
			$result_detail=$d->fetch_array();	
			
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
                                <li class="active"><a href="">Thông tin chung</a></li>
                            </ol>
                        </div>
                </div>
                
                
                <div class="row">
                <div class="fns-menunews">
                    <span class="fns-mnnewsicon"><i class="glyphicon glyphicon-menu-hamburger"></i> DANH MỤC TIN</span>
                    <ul class="clearfix">
                        <li ><a href="" title="">Thông tin chung</a></li>
                       <li  class="active"><a href="" title=""><?=$result_detail['ten_vi']?></a></li>
                      
                    </ul>
                </div>
            	</div>


				
                
                <div class="row fshop-newslist">
        <!--LEFT - MAIN-->
        <div class="fshop-news-colleft"> 
        <div class="row"> 
        <div class="fns-lnewsbox">                            
         
         
         				
                    <h1 class="fnews-detail-title"><?=$result_detail['ten_vi']?></h1>

                    <p class="fnews-detail-time"><span class="text-danger"> <?=$result_detail['luotxem']?> lượt xem</span></p>
                    
                    
                    
                    <ul class="fnews-detail-orthernews">
                    </ul>
                    
                    <!--DETAIL ORTHER NEWS-->
					<input type="hidden" value="huy">
                    <div class="fnews-detail-content">
                        							
						<?=$result_detail['noidung_vi']?>
                    </div>
        
          
          
           </div> </div> </div>
        <!--RIGHT SITEBAR-->
        <div class="fshop-news-colright">
            <div class="row">		
                <div class="fshop-rnl-row clearfix">
                    <div class="fshop-rnl-col">
                        

                            
                      
                          <div class="fshop-rnl-ctmore"> 
                          
                          <a href="" title="Thông tin khác" class="fns-rnewstitle"><h3>Thông tin chung</h3></a> 
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
 