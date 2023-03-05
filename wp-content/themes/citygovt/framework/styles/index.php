<?php
class CityGovt_Style {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'citygovt_enqueue_style' ) );
	}
	public function citygovt_enqueue_style() {
		wp_enqueue_style( 'bootstrap', CITYGOVT_CSS_URL . 'bootstrap.css', false, '1' );
		wp_enqueue_style( 'jquery-ui', CITYGOVT_CSS_URL . 'jquery-ui.css', false, '1' );
		wp_enqueue_style( 'owl', CITYGOVT_CSS_URL . 'owl.css', false, '1' );
		wp_enqueue_style( 'fontawesome-all', CITYGOVT_CSS_URL . 'fontawesome-all.css', false, '1' );
		wp_enqueue_style( 'line-awesome', CITYGOVT_CSS_URL . 'line-awesome.css', false, '1' );
		wp_enqueue_style( 'flaticon', CITYGOVT_CSS_URL . 'flaticon.css', false, '1' );
		wp_enqueue_style( 'animate', CITYGOVT_CSS_URL . 'animate.css', false, '1' );
		wp_enqueue_style( 'jquery-fancybox', CITYGOVT_CSS_URL . 'jquery.fancybox.min.css', false, '1' );
		wp_enqueue_style( 'scrollbar', CITYGOVT_CSS_URL . 'scrollbar.css', false, '1' );
		wp_enqueue_style( 'hover', CITYGOVT_CSS_URL . 'hover.css', false, '1' );
		wp_enqueue_style( 'custom-animate', CITYGOVT_CSS_URL . 'custom-animate.css', false, '1' );
		wp_enqueue_style( 'citygovt-style', CITYGOVT_CSS_URL . 'style.css', false, time() );
		wp_enqueue_style( 'citygovt-responsive', CITYGOVT_CSS_URL . 'responsive.css', false, time() );
	}

}
$CityGovt_Style = new CityGovt_Style();
