<?php

function citygovt_get_custom_styles() {
	global $citygovt_options;
	$redux_opt_prefix = 'citygovt_';

	if ( ( isset( $citygovt_options[ $redux_opt_prefix . 'main_color' ] ) ) && ( ! empty( $citygovt_options[ $redux_opt_prefix . 'main_color' ] ) ) ) {

		$citygovt_main_color = $citygovt_options[ $redux_opt_prefix . 'main_color' ];

	}else{
		$citygovt_main_color = '';
	}

	ob_start();
	if ( ( isset( $citygovt_options[ $redux_opt_prefix . 'main_color' ] ) ) && ( ! empty( $citygovt_options[ $redux_opt_prefix . 'main_color' ] ) ) ) {
		?>

/* Color File - Defult #00aa55 */

a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.theme_color{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}

.btn-style-one .btn-title{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.btn-style-two:hover .btn-title{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.btn-style-three:hover .btn-title{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.scroll-to-top:hover{
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-one .email .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.header-top-one .email .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.header-top-one .hours .hours-btn{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-one .mid-text i {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.header-top-one .hours .hours-dropdown{
	border-top: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.header-top-one .hours .hours-dropdown li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-one .phone .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-one .phone a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-menu .navigation>li.current-menu-item>a, 
.main-menu .navigation>li:hover>a, 
.main-menu .navigation>li.current>a, 
.header-style-two .header-upper .main-menu .navigation>li:hover>a, 
.header-style-two .header-upper .main-menu .navigation>li.current>a, 
.header-style-two .header-upper .main-menu .navigation>li.current>a:before, 
.header-style-two .header-upper .main-menu .navigation>li:hover>a:before {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sticky-header .main-menu .navigation > li:hover > a,
.sticky-header .main-menu .navigation > li.current > a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-menu .navigation > li > ul > li:hover > a:before,
.main-menu .navigation > li > ul > li > ul > li:hover > a:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-menu .navigation > li > ul > li:hover > a:after,
.main-menu .navigation > li > ul > li > ul > li:hover > a:after{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-menu .navigation > li > ul > li:hover > a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-menu .navigation > li > ul > li > ul > li:hover > a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.social-links-one li a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-style-one .other-links .language .lang-dropdown{
	border-top: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.header-style-one .other-links .language .lang-dropdown li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-two .left-text .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-two .info li .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-two .info li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-two .language .lang-btn .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-two .language .lang-dropdown{
	border-top: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.header-top-two .language .lang-dropdown li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.social-links-two li a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.search-popup .search-form fieldset input[type="submit"]{
	background:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.search-popup .search-form fieldset input[type="submit"]:hover{
	background:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.search-popup .recent-searches li a:hover{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.mobile-menu .navigation li > a:before{
	border-left: 3px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.banner-carousel .next-slide .count{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.banner-section .owl-nav .owl-prev:hover, 
.banner-section .owl-nav .owl-next:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	background: none;
}
.banner-section-two .owl-nav .owl-prev:hover, 
.banner-section-two .owl-nav .owl-next:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sec-title .separator:before{
	border-bottom: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sec-title .separator:after{
	border-bottom: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sec-title .separator .cir{
	border: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sec-title .separator .c-2{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.list-style-one li:before{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.welcome-section .owl-dots .owl-dot.active span {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	outline-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block .content-box .icon-box {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.featured-block .content-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block .content-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.featured-block .hover-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block .more-link{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block .more-link a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block .inner-box:hover .more-link a:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.about-section .upper-text .big-letter{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.about-section .quote-box .round-point{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.about-section .quote-box .round-point:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.about-section .content_box .image_box .icon-box {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.about-section .quote-box .inner{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.about-section .quote-box .inner:before{
	border-top: 20px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-right: 20px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.services-section .image-left .image-layer:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-service-block .lower-box{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-two .content-box .icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-two .inner-box:hover .content-box .icon-box:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-two .content-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-two .read-more a:before{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-two .read-more a:hover,
.featured-block-two .inner-box:hover .read-more a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-three .content-box .icon-box {
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.services-section .sec-title .more-link a {
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.event-block .content-box .cat-info span {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block .content-box .content .notification li span {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.event-block .inner-box:hover .content-box .date-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block .content-box .cat-info a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block .content-box h3 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block .read-more a:before{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block .read-more a,
.event-block .read-more a:hover,
.event-block .inner-box:hover .read-more a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.newsletter-box .form-box .form-group input[type="text"]:focus,
.newsletter-box .form-box .form-group input[type="email"]:focus,
.newsletter-box .form-box .form-group input[type="tel"]:focus{
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.events-section .see-all a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-two .content-box .cat-info span {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-banner .cat-info span {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.wp-block-tag-cloud a:hover, .sidebar .tagcloud a:hover {
	background-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sidebar .widget_archive li a:hover, 
.sidebar .widget_categories li a:hover, 
.sidebar .widget_archive li.current a, 
.sidebar .widget_categories li.current a {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sidebar .widget_archive li a:before, 
.sidebar .widget_categories li a:before {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sidebar .widget_archive li a:after, 
.sidebar .widget_categories li a:after {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.styled-pagination .post-page-numbers:hover, 
.styled-pagination .post-page-numbers.current, 
.styled-pagination .page-numbers:hover, .styled-pagination .page-numbers.current {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.styled-pagination .prev:hover, .styled-pagination .next:hover {
	color: <?php echo esc_attr( $citygovt_main_color ); ?> !important;
}
.team_membars.full_page .member_image .team_member_details .upper_block{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.skill_bar .progress-bar {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;		
}
.services-section-two .nav-column .inner{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.services-section-two .image-box{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block .hover-box .icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.alternate .team-block .hover-box .icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block .info li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block .social-links li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block .lower-box:before{
	background: <?php echo esc_attr( $citygovt_main_color ) ; ?> !important;
}
.team-block .lower-box .designation{
	color: <?php echo esc_attr( $citygovt_main_color ) ; ?> !important;
}
.team-carousel .owl-dots .owl-dot.active span {
    background: <?php echo esc_attr( $citygovt_main_color ) ; ?> !important;
    outline-color: <?php echo esc_attr( $citygovt_main_color ) ; ?> !important;
}

.news-block .hover-box .single-link a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block .lower-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block .lower-box .cat-info .fa{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-carousel .owl-nav .owl-next:hover,
.news-carousel .owl-nav .owl-prev:hover{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?> !important;
	color: <?php echo esc_attr( $citygovt_main_color ); ?> !important;
}
.news-carousel .owl-dots .owl-dot.active span{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	outline-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-info-section .info-box .inner:before{
	border-bottom: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-info-section .info-box .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-info-section .info-box .info a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.testimonials-section .slide-item .info .designation{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.testimonials-section .owl-dots .owl-dot.active span{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	outline-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.facts-section .fact-column .fact-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.facts-section .fact-column .fact-box:before{
	border-bottom: 1px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer .links-widget .menu li a:before {
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer .num-widget ul li a .hvr-info:before {
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer .footer-bottom .copyright a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer .social-links li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-three .content-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-three .hover-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-three .more-link{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-three .more-link a:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-links-box .info-header{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-links-box .info li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-links-box .info li .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.welcome-section-two .video-link .link .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.welcome-section-two .video-link .link:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.fluid-section .top-icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.fluid-section .column:nth-child(2) .image-layer:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.departments-section .right-column .bottom-text a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.departments-carousel .owl-nav .owl-next:hover,
.departments-carousel .owl-nav .owl-prev:hover{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;	
}

.sidebar .services-widget .links li a:hover,
.sidebar .services-widget .links li.current a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.sidebar .cat-links li a:before{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.sidebar .cat-links li a:after{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.sidebar .cat-links li a:hover,
.sidebar .cat-links li.current a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.featured-block-four .icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-four h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-four .read-more a span:after{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-four .read-more a:after{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-four .read-more a:hover,
.featured-block-four .inner-box:hover .read-more a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}

.departments-carousel .owl-dots .owl-dot.active span{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	outline-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.departments-section .services-row .image-layer:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.hi-block .upper-info h3:after{
	border-right: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.hi-block .upper-info h3 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.hi-block .image-cap .video-link .link:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.highlights-section .owl-theme .owl-nav .owl-prev:hover,
.highlights-section .owl-theme .owl-nav .owl-next:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block-two .info .designation{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block-two .share-it .share-btn:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block-two .share-it .share-list li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-two .image-box .cat-info .fa{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-two .image-box .hover-link a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-two .lower-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-two .more-link a:before{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-two .more-link a:hover,
.news-block-two .inner-box:hover .more-link a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-three .inner-box{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-four .image-box .date{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-four .hover-box .more-link a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-four .lower-box h2 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-four .lower-box .cat-info .fa{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-four .share-it:hover .share-btn{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.news-block-four .share-it .share-list li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.news-block-five .image-box .date{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-five .hover-box .more-link a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-five .lower-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.news-block-five .lower-box .cat-info .fa{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.reviews-section .review-block:hover .author-thumb:before,
.reviews-section .review-block:hover .author-thumb:after{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.reviews-section .review-block .info .designation{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.reviews-section .review-block .icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.reviews-carousel .owl-nav .owl-next:hover,
.reviews-carousel .owl-nav .owl-prev:hover{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.accordion-box .block .acc-btn.active{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.accordion-box .block:before{
	border-left: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.accordion-box .block .acc-btn.active .icon:before{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.default-form .form-group input[type="text"]:focus,
.default-form .form-group input[type="email"]:focus,
.default-form .form-group input[type="password"]:focus,
.default-form .form-group input[type="tel"]:focus,
.default-form .form-group input[type="url"]:focus,
.default-form .form-group input[type="file"]:focus,
.default-form .form-group input[type="number"]:focus,
.default-form .form-group textarea:focus,
.default-form .form-group select:focus,
.form-group .ui-selectmenu-button.ui-button:focus,
.form-group .ui-selectmenu-button.ui-button:active{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.default-form .check-block label:before{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.default-form .check-block input:checked + label:before{
	content: '\f00c';
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.ui-menu .ui-menu-item-wrapper:hover,
.ui-menu .ui-menu-item-wrapper.ui-state-active{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer-two .twitter-widget .feed a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer-two .twitter-widget .info .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer-two .newsletter-form .form-group input[type="text"]:focus,
.main-footer-two .newsletter-form .form-group input[type="email"]:focus,
.main-footer-two .newsletter-form .form-group input[type="tel"]:focus{
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}

.main-footer-two .footer-bottom .copyright a{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer-two .social-links li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.main-footer-two .footer-links li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.error-section .med-text{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.comming-soon .social-links li a:hover,
.comming-soon .social-links li a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.comming-soon .newsletter-form .instruction span{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.comming-soon .newsletter-form .theme-btn{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.comming-soon .newsletter-form .theme-btn:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.time-counter .time-countdown .counter-column:after{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.faq-tabs .tab-buttons .tab-btn .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-five h3 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-five .read-more a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-five .read-more a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.highlights-section-two .owl-nav .owl-prev:hover, 
.highlights-section-two .owl-nav .owl-next:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}

.ext-info-section .awards-row .image-layer:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.ext-info-section .awards-row .image-layer:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.filter-gallery .filters .filter.active,
.filter-gallery .filters .filter.current{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block .cap-box h3 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block .cap-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block .lower-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block .zoom-btn a:hover{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-two .title-box h4:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-two .title-box .title a:hover,
.gallery-block-two .title-box .category a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-two .link-btn a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-three .link-btn a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-three .zoom-btn a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-four .link-btn a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-four .zoom-btn a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-four .inner-box:hover .lower-box .separator .dot{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.gallery-block-four .inner-box:hover .lower-box .separator .dot:before,
.gallery-block-four .inner-box:hover .lower-box .separator .dot:after{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.styled-pagination li.prev a:hover,
.styled-pagination li.next a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?> !important;
}
.styled-pagination li.prev a:hover,
.styled-pagination li.next a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?> !important;
}
.styled-pagination li a:hover,
.styled-pagination li a.active{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-info-box .info-header{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-info-box .info li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-info-box .info li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.contact-info-box .info li .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.history-section .center-line .dot{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.history-section .center-line .dot:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.history-block:hover .year-box .year-inner{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.history-block:hover .year-box:before,
.history-block:hover .year-box:after{
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.history-block .text-col h6{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-six .content-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-six .content-box .icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.featured-block-six .hvr-dropdown ul li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sidebar .search-box .form-group input:focus{
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.sidebar .search-box .form-group input:focus + button,
.sidebar .search-box .form-group button:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sidebar .services-widget .links li .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sidebar .popular-tags .tags-list li a:hover{
	background-color:<?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.newsletter-box-two .form-group input[type="text"]:focus,
.newsletter-box-two .form-group input[type="email"]:focus,
.newsletter-box-two .form-group input[type="tel"]:focus{
	border-color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.sidebar .recent-posts .title a:hover{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;	
}
.service-details h3:before{
	border-bottom: 2px solid <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.service-details .two-col .owl-theme .owl-nav .owl-next:hover,
.service-details .two-col .owl-theme .owl-nav .owl-prev:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.service-details .service-list li:hover,
.service-details .service-list li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.service-details .service-list li:before{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.service-details .service-list li:after{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.infra-block .icon-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.service-details .download-links ul{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.blog-banner .meta-info .fa{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.blog-banner .other-info .date{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.blog-banner .other-info .tags:before{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.post-details blockquote:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.post-details blockquote .author-title{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.share-post ul li a:hover{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.single-post .author-box{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.post-controls .prev-post:hover .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.post-controls .prev-post .icon:after{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.post-controls .next-post:hover .icon{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
	border-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.post-controls .next-post .icon:after{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.group-title h2 span{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.comments-area .comment-box .info .date{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.comments-area .comment-box .reply-link a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.drop-list-one .dropdown-menu li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-two .inner-box:hover .content-box .date-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-two .content-box .cat-info a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-two .content-box h3 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-two .read-more a:before{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-two .read-more a:hover,
.event-block-two .inner-box:hover .read-more a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-three .inner-box:hover .content-box .date-box{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-three .content-box .cat-info a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-three .content-box h4 a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-three .read-more a:before{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-block-three .read-more a:hover,
.event-block-three .inner-box:hover .read-more a{
	color:<?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-banner .cat-info a{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-details .info-block .inner-box{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.guest-carousel .owl-dots .owl-dot.active span{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
	outline-color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.guest-block .designation{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-details .info-column .title{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-details .contact-box .info li a:hover{
	color: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-details .more-info-box .timings .curve:before{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-details .more-info-box .timings .curve:after{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.event-details .more-info-box .timings .inner{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.loadmore .loadmore-button,
.loadmore .loadmore-less{
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.services-section-two .nav-column ul li:before {
	background: <?php echo esc_attr( $citygovt_main_color ); ?>;
}
.team-block .inner-box:hover .lower-box .designation {
    color: #fff !important;
}.header-top-one .email a:hover{
    color: <?php echo esc_attr( $citygovt_main_color ); ?> !important;
}
		<?php
	}
	$citygovt_custom_css = ob_get_clean();

	return $citygovt_custom_css;
}
