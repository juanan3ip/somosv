<?php
/**
 * citygovt compatibility.
 */
function citygovt_kses_allowed_html( $tags, $context ) {
	switch ( $context ) {
		case 'code_context':
			$tags = array(
				'div'    => array(
					'class' => array(),
				),
				'ul'     => array(
					'class' => array(),
				),
				'li'     => array(),
				'span'   => array(
					'class' => array(),
				),
				'a'      => array(
					'href'  => array(),
					'class' => array(),
				),
				'i'      => array(
					'class' => array(),
				),
				'p'      => array(),
				'em'     => array(),
				'br'     => array(),
				'strong' => array(),
				'h1'     => array(),
				'h2'     => array(),
				'h3'     => array(),
				'h4'     => array(),
				'h5'     => array(),
				'h6'     => array(),
			);
			return $tags;
		case 'author_avatar':
			$tags = array(
				'img' => array(
					'class'  => array(),
					'height' => array(),
					'width'  => array(),
					'src'    => array(),
					'alt'    => array(),
				),
			);
			return $tags;
		default:
			return $tags;
	}
}

add_filter( 'wp_kses_allowed_html', 'citygovt_kses_allowed_html', 10, 2 );
