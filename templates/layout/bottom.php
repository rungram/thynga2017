<?php 
	$d->reset();
	$sql_list ="select *  from #_product_list order by stt asc limit 0,5";
	$d->query($sql_list);
	$list =$d->result_array();
	
?>
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
				alert('Bạn chưa nhập tên!');
			else{
			//var encoded = Base64.encode(keyword);
			location.href = "index.php?com=tim-kiem&keyword="+keyword;
			loadPage(document.location);			
			}
		}		
</script>  



<div id="menuHeader"> <a id="m-nav"><i class="icons m-nav-list-icon"></i> </a> <a href="index.html" class="logo"><img src="images/logo-black.png"></a> <div class="search-box"> <form> <input class="search-text-box tab-keyword" placeholder="Nhập tên sản phẩm" type="text" id="keyword"> <button type="button" class="submit" onclick="onSearch(event,'keyword');"><i class="glyphicon glyphicon-search"></i></button> <div class="asmr"> <ul class="fshop-search-cate"></ul>
 <ul class="fshop-search-prod"></ul>
 </div>

 </form> </div>

 <div class="header-hotline"> <a href="tel:18006601"> <p>Hotline miễn phí</p> <p><i class="icons red-phone-icon"></i> <strong><?=$row_setting["hotline"]?></strong></p> </a> </div>

 <a href="tel:<?=$row_setting["hotline"]?>" class="btn-fodp"> Đặt mua giá tốt <i class="icons cart-header"></i> </a> </div>

 <div id="menuWrapper"> <div id="menuBox"> <div id="scroller" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);"> 
 
 <ul id="menu">
 
 	<?php for($i=0,$count_l=count($list);$i<$count_l;$i++){ ?>
      <li class=""> <a href="danh-muc/<?=$list[$i]["tenkhongdau"]?>-<?=$list[$i]["id"]?>.html"> 
      <span> <label><i class="icons m-<?=$list[$i]["ten_cn"]?>-icon"></i></label> </span> 
      <label><?=$list[$i]["ten_vi"]?></label> </a> 
      </li> 
    <?php }?>
  
  
  
  
  
  <li class=""> <a href="khuyen-mai.html" title="Khuyến mãi"> <span> <label><i class="icons m-promotion-icon"></i></label> </span> <label>Khuyến mãi</label> </a> </li>
  
  
   <li class=""> <a href="tin-hay.html" title="Tin hay"> <span> <label><i class="icons m-paper-icon"></i></label> </span> <label>Tin hay</label> </a> </li> 
   
   
   <li class=""> <a href="hoi-dap.html" title="Hỏi đáp"> <span> <label><i class="icons m-refresh-icon"></i></label> </span> <label>Hỏi đáp</label> </a> </li> 
   
   <li class=""> <a href="lien-he.html"  title="Liên hệ"> <span> <label><i class="icons m-paper-icon"></i></label> </span> <label>Liên hệ</label> </a> </li> 
   
   
   </ul>
 </div>

 <div style="position: absolute; z-index: 9999; width: 7px; bottom: 2px; top: 2px; right: 1px; overflow: hidden; pointer-events: none; transform: translateZ(0px); transition-duration: 0ms; opacity: 0;" class="iScrollVerticalScrollbar iScrollLoneScrollbar"><div style="box-sizing: border-box; position: absolute; background: rgba(0, 0, 0, 0.5) none repeat scroll 0% 0%; border: 1px solid rgba(255, 255, 255, 0.9); border-radius: 3px; width: 100%; transition-duration: 0ms; display: block; height: 271px; transform: translate(0px, 0px) translateZ(0px); transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1);" class="iScrollIndicator"></div>

</div>

</div>

 </div>



    
    <div class="modal fade" id="modal-call-me" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="fshop-pucb-close b-close close-f-modal" data-dismiss="modal"><a onclick="ga('send', 'event', 'Tat Popup lay sdt sp bestseller mobile home page ', 'Tat Popup lay sdt sp bestseller mobile home page ', 'Tat Popup lay sdt sp bestseller mobile home page ')">&nbsp;</a></div>

<div class="fcm-box"><p class="fshop-pucb-line1"><img src="images/title-consult.png" alt=""></p><div class="fshop-pucb-line"> Nhập email của bạn để nhận những thông tin ưu đãi,
            khuyến mại đặc biệt từ chúng tôi!</div>

<div class="fshop-pucb-form"><form id="form-call-me"><input class="fshop-pucb-txt fcm_phone_txt" placeholder="Email của bạn..." type="text"><input class="fshop-pucb-bnt ppo_best_bnt" data-name="Shop" value="Gửi thông tin" type="submit"></form></div>

</div>

<div class="fcm-thank"><p class="fshop-pucb-line1"><img src="images/pucb-title-thank.png" alt=""></p><p class="fshop-pucb-line">Bạn sẽ nhận được cuộc gọi của chúng tôi <strong>(8h-22h)</strong> từ số máy gọi đến <strong><?=$row_setting["dienthoai"]?></strong></p><div class="fshop-pucb-form"><input class="b-close fshop-pucb-bnt close-f-modal" data-dismiss="modal" value="Đồng ý" type="button"></div>

</div>

</div>

</div>

</div>

</div>

<div class="button-bottom"><ul><li><a href="javascript:jfpts.homepage.modalCallMe();">Gọi ngay cho tôi</a></li><li><a href="tel:<?=$row_setting["hotline"]?>">Gọi <?=$row_setting["hotline"]?></a></li></ul>
</div>




    <div class="back-to-top display">
        <a href="javascript:;"></a>
    </div>



     
 <script src="js/scriptsv3"></script>



    
    <meta name="adx:sections" content="Trang chủ">
    <meta name="adx:objects" content="0">
    <meta name="adx:authors" content="">

    
   <script src="js/homev3"></script>


    <script type="text/javascript" async="" src="js/conversion.js"></script>

    <script type="text/javascript">
        var ants_analytic = ants_analytic || [];
        ants_analytic.push({ conversionId: "c80ad084" });
    </script>

    


    

    <!-- End Google Tag Manager -->
    
    <!--dong cai tu van mien phi <div class="fs-callfix">
        <label>
            <a href="tel:<=$row_setting["hotline"]?>" title="">
                <span></span>
                <p>Tư vấn miễn phí(24/7)<br> <strong><=$row_setting["hotline"]?></strong></p>
            <i></i>
            </a>
        </label>
    </div> -->


 <!-- Facebook Pixel Code 
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return; n = f.fbq = function () {
                n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            }; if (!f._fbq) f._fbq = n;
            n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = []; t = b.createElement(e); t.async = !0;
            t.src = v; s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s)
        }(window,
        document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '527503604082474', {
            em: 'insert_email_variable,'
        });
        fbq('track', 'PageView');
    </script>

    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=527503604082474&ev=PageView&noscript=1&quot; /">
    </noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
<!-- Google Tag Manager (noscript) 
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W84P7P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) 

<div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div>

</div>

<div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" style="border: medium none;" src="http://staticxx.facebook.com/connect/xd_arbiter/r/fTmIQU3LxvB.js?version=42#channel=f211b1677a3dada&amp;origin=http%3A%2F%2Ffptshop.com.vn" frameborder="0"></iframe><iframe name="fb_xdm_frame_https" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" style="border: medium none;" src="js/fTmIQU3LxvB_002.htm" frameborder="0"></iframe></div>

</div>

</div>
<!--
<iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: medium none;" frameborder="0"></iframe><iframe name="oauth2relay438046197" id="oauth2relay438046197" src="js/postmessageRelay.htm" style="width: 1px; height: 1px; position: absolute; top: -100px;" tabindex="-1" aria-hidden="true"></iframe><iframe id="apiproxy51be3357cc19704f77831794a418204e2bd369790.6560576767978962" name="apiproxy51be3357cc19704f77831794a418204e2bd369790.6560576767978962" style="width: 1px; height: 1px; position: absolute; top: -100px;" src="js/proxy_002.htm" tabindex="-1" aria-hidden="true"></iframe></body></html>-->