<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package citygovt
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses citygovt_header_style()
 */
function citygovt_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'citygovt_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'citygovt_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'citygovt_custom_header_setup' );

if ( ! function_exists( 'citygovt_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see citygovt_custom_header_setup().
	 */
	function citygovt_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		if ( ! display_header_text() ) {
			$citygovt_cus_css = '.site-title,
                .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                }';
			wp_add_inline_style( 'citygovt-style', $citygovt_cus_css );
		} else {
			$citygovt_cus_css = '.site-title a,
                .site-description {
                color: #' . esc_attr( $header_text_color ) . '
                }
               ';
			wp_add_inline_style( 'citygovt-style', $citygovt_cus_css );
		}
	}
endif;





