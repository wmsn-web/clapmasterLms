$(document).ready(function(){


    $(".profileSlider").owlCarousel({
        loop:false,
        mouseDrag:true,
        nav:true,
        navText:['','<img src="<?= base_url(); ?>assets/img/arrowRight.png" alt="">'],
        autoplay:false,
        autoplayTimeout:5000,
        smartSpeed:1000,
        // animateOut: 'slideOutDown',
        // animateIn: 'flipInX',
        dots:false,
        margin:30,
        responsive : {
		    0 : {
        		items:1,
		    },
		    480 : {
        		items:2,
		    },
		    768 : {
        		items:3,
		    },
		    1200 : {
        		items:4,
		    },
		},
    });


    $(".searchSliderImg").owlCarousel({
    	items:1,
        loop:true,
        mouseDrag:true,
        nav:false,
        navText:['','<img src="<?= base_url(); ?>assets/img/arrowRight.png" alt="">'],
        autoplay:true,
        autoplayTimeout:5000,
        smartSpeed:1000,
        // animateOut: 'slideOutDown',
        // animateIn: 'flipInX',
        dots:true,
    });

});