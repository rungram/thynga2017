/**
 * Created by toanbui on 2/17/15.
 */
jQuery(document).ready(function($){
    $('ul#top-menu').superfish({
        pathClass:'current',
        animation:   {opacity:'show',height:'slideDown'},
        speed: 'fast',
        cssArrows: false,
        speedOut: 'fast'
    });
    $('.cycle-slideshow-2').cycle();
    $('.owl-carousel').owlCarousel({
        items: 3,
        loop: true,
        nav: true,
        responsive:{
            0:{
                items: 1
            },
            769:{
                items: 3
            }
        }
    });
    $('#menu').slicknav({
        closeOnClick: true
    });
});