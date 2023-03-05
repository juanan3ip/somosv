(function($) {

    "use strict";
    

    var slider_banner = function($scope, $) {
            if ($('.banner-carousel').length) {
                $('.banner-carousel').owlCarousel({
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    loop:true,
                    margin:0,
                    dots: false,
                    nav: true,
                    singleItem:true,
                    smartSpeed: 500,
                    autoplay: true,
                    autoplayTimeout:6000,
                    navText: [ '<span class="fas flaticon-arrow left"></span>', '<span class="fas flaticon-arrow right"></span>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1024:{
                            items:1
                        }
                    }
                });    		
            }
    }


    //Elementor JS Hooks
    $(window).on('elementor/frontend/init', function() {

        elementorFrontend.hooks.addAction('frontend/element_ready/yacher_banner.default', slider_banner);
        

    });
        
    })(window.jQuery);