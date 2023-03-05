(function($) {

    "use strict";
    

    var banner_carousel = function($scope, $) {
        if ($('.banner-carousel').length) {
            $('.banner-carousel').owlCarousel({
                loop:true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                margin:0,
                nav:true,
                smartSpeed: 1000,
                autoplay: 8000,
                autoplayTimeout:8000,
                navText: [ '<span class="icon flaticon-arrows-1"></span>', '<span class="icon flaticon-right-arrow"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    800:{
                        items:1
                    },
                    1024:{
                        items:1
                    }
                }
            });
        }
        
    }

    var banner_carousel_two = function($scope, $) {
        if ($('.banner-carousel-two').length) {
            $('.banner-carousel-two').owlCarousel({
                loop:true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                margin:0,
                nav:true,
                smartSpeed: 500,
                autoplay: 7000,
                autoplayTimeout:7000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    800:{
                        items:1
                    },
                    1024:{
                        items:1
                    }
                }
            });
        }
        
    }

    var team_carousel = function($scope, $) {
        if ($('.team-carousel').length) {
            $('.team-carousel').owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    768:{
                        items:3
                    },
                    1024:{
                        items:3
                    },
                    1200:{
                        items:4
                    }
                }
            });
        }
        
    }

    var news_carousel = function($scope, $) {
        
        if ($('.news-carousel').length) {
            $('.news-carousel').owlCarousel({
                loop:false,
                margin:30,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    1024:{
                        items:3
                    },
                    1200:{
                        items:3
                    }
                }
            });
        }
    
    }

    var testimonial_carousel = function($scope, $) {
        
        if ($('.testimonial-carousel').length) {
            $('.testimonial-carousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    768:{
                        items:1
                    },
                    1024:{
                        items:1
                    }
                }
            });
        }
    
    }

    var testimonial_carousel = function($scope, $) {
        
        if ($('.testimonial-carousel').length) {
            $('.testimonial-carousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    768:{
                        items:1
                    },
                    1024:{
                        items:1
                    }
                }
            });
        }
    
    }

    var departments_carousel = function($scope, $) {
        
        if ($('.departments-carousel').length) {
            $('.departments-carousel').owlCarousel({
                loop:false,
                margin:30,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    1024:{
                        items:3
                    },
                    1200:{
                        items:3
                    }
                }
            });
        }
    
    }

    var reviews_carousel = function($scope, $) {
        
        if ($('.reviews-carousel').length) {
            $('.reviews-carousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    1024:{
                        items:2
                    },
                    1200:{
                        items:3
                    }
                }
            });
        }
    
    }

    var featured_carousel = function($scope, $) {
        
        if ($('.featured-carousel').length) {
            $('.featured-carousel').owlCarousel({
                loop:true,
                center:true,
                margin:2,
                nav:true,
                dots:false,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1,
                        center:false
                    },
                    600:{
                        items:1,
                        center:false
                    },
                    768:{
                        items:2,
                        center:false
                    },
                    1024:{
                        items:2,
                        center:false
                    },
                    1200:{
                        items:3
                    }
                }
            });
        }
    
    }

    var hi_carousel = function($scope, $) {
        
        if ($('.hi-carousel').length) {
            $('.hi-carousel').on('initialized.owl-carousel translate.owl-carousel', function(e){
                idx = e.item.index;
                $('.owl-item.inview').removeClass('inview');
                $('.owl-item.previous').removeClass('previous');
                $('.owl-item').eq(idx).addClass('inview');
                $('.owl-item').eq(idx-1).addClass('previous');
            });
            $('.hi-carousel').owlCarousel({
                center: true,
                loop:true,
                margin:50,
                autoplay: true,
                autoPlay: 5000,
                dots:false,
                nav:true,
                navText: [ '<span class="icon flaticon-left-1"></span>', '<span class="icon flaticon-right-1"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    768:{
                        items:1
                    },
                    1024:{
                        items:1
                    }
                }
            })
        }
    
    }

    

    var guest_carousel = function($scope, $) {
        
        if ($('.guest-carousel').length) {
            $('.guest-carousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                smartSpeed: 700,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    800:{
                        items:2
                    },
                    1024:{
                        items:2
                    },
                    1200:{
                        items:2
                    }
                }
            });
        }
    
    
    }

    var single_item_carousel = function($scope, $) {
        
        if ($('.single-item-carousel').length) {
            $('.single-item-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout:5000,
                navText: [ '<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    800:{
                        items:1
                    },
                    1024:{
                        items:1
                    }
                }
            });
        }
    
    
    }

    var loadmore_gallery_one = function($scope, $) {
        
        if($('.filter-list').length){
            $('.filter-list').mixItUp({});
        }
    
        //3 Column Load More Mixitup Gallery With Filters
        if($('.loadmore-gallery-one .filter-gallery-one').length){
            
            $(".loadmore-gallery-one .filter-gallery-one").mixItUp({
                selectors: {
                    target: ".mix" // As in mixitup
                },
                layout: {
                    display: "inline-block" // As in mixitup
                },
                loadmore: {
                    // The number of items to start with
                    initial: 9,
                    // The number of items to load on click on the loadmore button
                    loadMore: 3,
                    // A selector string for the existing wrapper the buttons will be inserted into
                    buttonWrapper: ".loadmore",
                    // The class of the Load more button
                    buttonClass: "loadmore-button",
                    // The label of the Load more button
                    buttonLabel: "Load More",
                    // The class of the less button
                    lessClass: "loadmore-less",
                    // The label of the less button
                    lessLabel: "Show Less"
                }
                });
        }
    
    
    }


    var sortableMasonryallery = function($scope, $) {
        
        function sortableMasonry() {
            if($('.sortable-masonry').length){
        
                var winDow = $(window);
                // Needed variables
                var $container=$('.sortable-masonry .items-container');
                var $filter=$('.filter-btns');
        
                $container.isotope({
                    filter:'*',
                     masonry: {
                        columnWidth : '.masonry-item.col-lg-4'
                     },
                    animationOptions:{
                        duration:500,
                        easing:'linear'
                    }
                });
                
        
                // Isotope Filter 
                $filter.find('li').on('click', function(){
                    var selector = $(this).attr('data-filter');
        
                    try {
                        $container.isotope({ 
                            filter	: selector,
                            animationOptions: {
                                duration: 500,
                                easing	: 'linear',
                                queue	: false
                            }
                        });
                    } catch(err) {
        
                    }
                    return false;
                });
        
        
                winDow.on('resize', function(){
                    var selector = $filter.find('li.active').attr('data-filter');
    
                    $container.isotope({ 
                        filter	: selector,
                        animationOptions: {
                            duration: 500,
                            easing	: 'linear',
                            queue	: false
                        }
                    });
                });
        
        
                var filterItemA	= $('.filter-btns li');
        
                filterItemA.on('click', function(){
                    var $this = $(this);
                    if ( !$this.hasClass('active')) {
                        filterItemA.removeClass('active');
                        $this.addClass('active');
                    }
                });
            }
        }
        sortableMasonry();
    
    
    }




    
    var progressBar = function($scope, $) {
        var delay = 500;
        $(".progress-bar").each(function(i) {
            $(this).delay(delay * i).animate({ width: $(this).attr('aria-valuenow') + '%' }, delay);

            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: delay,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now) + '%');
                }
            });
        });
    }
    
    var citygovt_welcome = function($scope, $) {
        if ($('.three_items').length) {
            $('.three_items').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayTimeout: 5000,
                navText: ['<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        }
    }


    //Elementor JS Hooks
    $(window).on('elementor/frontend/init', function() {
         elementorFrontend.hooks.addAction('frontend/element_ready/slider_banner.default', banner_carousel);
         elementorFrontend.hooks.addAction('frontend/element_ready/slider_banner.default', banner_carousel_two);

         elementorFrontend.hooks.addAction('frontend/element_ready/citygovtteam.default', team_carousel);
         elementorFrontend.hooks.addAction('frontend/element_ready/city_govt_blogs.default', news_carousel);
         elementorFrontend.hooks.addAction('frontend/element_ready/citygovt_testimonial.default', testimonial_carousel);

         elementorFrontend.hooks.addAction('frontend/element_ready/citygovt_department.default', departments_carousel);
         elementorFrontend.hooks.addAction('frontend/element_ready/citygovt_testimonial.default', reviews_carousel);

         elementorFrontend.hooks.addAction('frontend/element_ready/citygovt_highlight.default', featured_carousel);
         elementorFrontend.hooks.addAction('frontend/element_ready/citygovt_highlight.default', hi_carousel);
         elementorFrontend.hooks.addAction('frontend/element_ready/CitygovtEventGuest.default', guest_carousel);

         elementorFrontend.hooks.addAction('frontend/element_ready/department_carosel.default', single_item_carousel);
         elementorFrontend.hooks.addAction('frontend/element_ready/masonary_gallery1.default', loadmore_gallery_one);

         elementorFrontend.hooks.addAction('frontend/element_ready/masonary_gallery1.default', sortableMasonryallery);
         elementorFrontend.hooks.addAction('frontend/element_ready/ProgressSkill.default', progressBar);
         elementorFrontend.hooks.addAction('frontend/element_ready/citygovt_welcome.default', citygovt_welcome);

         

         

         
         


         
         
        
  
        
    });

})(window.jQuery);