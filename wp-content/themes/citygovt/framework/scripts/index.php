<?php
class CityGovt_Scripts {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'citygovt_enqueue_scripts' ) );
	}
	public function citygovt_enqueue_scripts() {

		wp_enqueue_script( 'popper', CITYGOVT_JS_URL . 'popper.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'bootstrap', CITYGOVT_JS_URL . 'bootstrap.min.js', null, '', true );
		wp_enqueue_script( 'jquery-ui', CITYGOVT_JS_URL . 'jquery-ui.js', null, '', true );
		wp_enqueue_script( 'jquery-countdown', CITYGOVT_JS_URL . 'jquery.countdown.js', null, '', true );
		wp_enqueue_script( 'jquery-fancybox', CITYGOVT_JS_URL . 'jquery.fancybox.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'owl', CITYGOVT_JS_URL . 'owl.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'mixitup', CITYGOVT_JS_URL . 'mixitup.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'mixitup-loadmore', CITYGOVT_JS_URL . 'mixitup-loadmore.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'isotope', CITYGOVT_JS_URL . 'isotope.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'scrollbar', CITYGOVT_JS_URL . 'scrollbar.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'appear', CITYGOVT_JS_URL . 'appear.js', null, '', true );
		wp_enqueue_script( 'wow', CITYGOVT_JS_URL . 'wow.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'citygovt-custom-script', CITYGOVT_JS_URL . 'custom-script.js', array( 'jquery' ), '', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
}
$CityGovt_Scripts = new CityGovt_Scripts();
