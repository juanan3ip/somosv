(function($) {

    "use strict";
    
    var image_swip = function($scope, $) {
        if( $('.image_swipe').length ){
            $(".image_swipe").twentytwenty();
        }
        }
    //Elementor JS Hooks
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/karde_best_service.default', image_swip);
        
    });
        
    })(window.jQuery);