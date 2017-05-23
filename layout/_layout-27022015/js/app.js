require.config({
    baseUrl: 'js',
    paths: {
        'jquery': 'jquery'
    },
    shim: {
        'hoverIntent': {
            deps: ['jquery','jquery.cycle2.min']
        },
        'superfish': {
            deps: ['hoverIntent','jquery.cycle2.min']
        },
        'owl.carousel.min':{
            deps: ['jquery']
        },
        'jquery.cycle2.min': {
            deps: ['jquery']
        },
        'jquery.slicknav.min':{
            deps: ['jquery']
        },
        'scripts': {
            'deps':['jquery.slicknav.min','superfish','jquery.cycle2.min','owl.carousel.min']
        }
    }
});
require(['scripts'], function ($) {
});