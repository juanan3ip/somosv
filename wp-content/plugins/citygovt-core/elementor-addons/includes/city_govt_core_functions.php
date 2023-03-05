<?php
trait City_Govt_Core_Functions {

	/**
	 * Citygovt_get_contact_form_7_posts gets all the contact forms crated in contact form 7 plugin
	 *
	 * @return void
	 */
	public function city_govt_core_get_contact_form_7_posts() {
		$args    = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		);
		$catlist = array();
		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				(int) $catlist[ $category->ID ] = $category->post_title;
			}
		} else {
			(int) $catlist['0'] = esc_html__( 'No contect From 7 form found', 'citygovt-core' );
		}
		return $catlist;
	}

	/**
	 * citygovt_get_contact_form_id gets all the ids of contatc form 7
	 *
	 * @return void
	 */
	public function city_govt_core_get_contact_form_id() {
		$contact_forms = array();
		$cf7           = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->ID ] = $cform->post_title;
			}
		} else {
			$contact_forms[ __( 'No contact forms found', 'citygovt-core' ) ] = 0;
		}
		return $contact_forms;
	}



	/**
	 * citygovt_core_get_animation_control gets the animation control
	 *
	 * @param mixed $obj
	 * @param mixed $animationClass
	 * @param mixed $animationDelay
	 * @param mixed $animationDuration
	 *
	 * @return void
	 */
	function getAnimationControl( $obj, $animationClass = 'fadeInLeft', $animationDelay = '0', $animationDuration = '1500' ) {

		$obj->add_control(
			'heading',
			array(
				'label'     => __( 'Animation Options', 'loveuscore' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'default',
			)
		);

		$obj->add_control(
			'animation_class',
			array(
				'label'   => __( 'Animation Class', 'loveuscore' ),
				'type'    => \Elementor\Controls_Manager::ANIMATION,
				'default' => $animationClass,
			)
		);

		$obj->add_control(
			'animation_delay_time',
			array(
				'label'   => __( 'Delay Time(ms)', 'loveuscore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => $animationDelay,
			)
		);

		$obj->add_control(
			'animation_duration',
			array(
				'label'   => __( 'Duration Time(ms)', 'loveuscore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => $animationDuration,
			)
		);
	}

	/**
	 * yacher_core_coloumn_control adds a select control to select coloumn
	 *
	 * @param mixed $obj
	 * @param mixed $max
	 * @param mixed $min
	 *
	 * @return void
	 */
	public function city_govt_core_coloumn_control( $obj, $max = 3, $min = 1 ) {

		$option = array();

		for ( $i = $min; $i <= $max; $i++ ) {
			switch ( $i ) {
				case 1:
					$option ['col-lg-12'] = __( '1', 'citygovt-core' );
					break;
				case 2:
					$option ['col-lg-6'] = __( '2', 'citygovt-core' );
					break;
				case 3:
					   $option ['col-lg-4'] = __( '3', 'citygovt-core' );
					break;
				case 4:
					$option ['col-lg-3'] = __( '4', 'citygovt-core' );
					break;
				case 6:
					$option ['col-lg-2'] = __( '6', 'citygovt-core' );
					break;
				case 12:
					$option ['col-lg-1'] = __( '12', 'citygovt-core' );
					break;
			}
		}

		$obj->add_control(
			'number_of_coloumns',
			array(
				'label'     => __( 'Number Of Coloumns', 'citygovt-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $option,
				'default'   => 'col-lg-3',

			)
		);
	}

	/**
	 * yacher_core_coloumn_control_output outputs the coloumn for a section
	 *
	 * @param mixed $obj
	 * @param mixed $settings
	 *
	 * @return void
	 */
	public function city_govt_core_coloumn_control_output( $obj, $settings ) {
		$number_of_coloumns = $settings['number_of_coloumns'];
		echo $number_of_coloumns;
	}


}



if ( ! function_exists( 'city_govt_custom_icon' ) ) {
	function city_govt_custom_icon( $array ) {
		$plugin_url = plugins_url();
		return array(
			'custom-icon' => array(
				'name'          => 'custom-icon',
				'label'         => 'City Govt Icon',
				'url'           => '',
				'enqueue'       => array(
					$plugin_url . '/citygovt-core/assets/css/flaticon-style.css',
				),
				'prefix'        => '',
				'displayPrefix' => '',
				'labelIcon'     => 'fab fa-font-awesome-alt',
				'ver'           => '5.9.0',
				'fetchJson'     => $plugin_url . '/citygovt-core/assets/js/flaticon.js',
				'native'        => 1,
			),
		);
	}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'city_govt_custom_icon' );




if ( ! function_exists( 'city_govt_get_contact_form_7_posts' ) ) :

	function city_govt_get_contact_form_7_posts() {
		$args    = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		);
		$catlist = array();
		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				(int) $catlist[ $category->ID ] = $category->post_title;
			}
		} else {
			(int) $catlist['0'] = esc_html__( 'No contect From 7 form found', 'morriston-core' );
		}
		return $catlist;
	}

endif;

function city1_govt_kses_allowed_html( $tags, $context ) {
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
					'href' => array(),
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

add_filter( 'wp_kses_allowed_html', 'city1_govt_kses_allowed_html', 10, 2 );

if ( ! function_exists( 'city_govt_comments_count1' ) ) :
	function city_govt_comments_count1() {
		if ( get_comments_number( get_the_ID() ) == 0 ) {
			$comments_count = '<a class="blog-one__meta-item" href="' . esc_url( get_permalink() ) . '" ><span class="flaticon-speech-bubbles-comment-option"></span>' . get_comments_number( get_the_ID() ) . ' comments' . '</a>';
		} elseif ( get_comments_number( get_the_ID() ) > 1 ) {
			$comments_count = '<a class="blog-one__meta-item" href="' . esc_url( get_permalink() ) . '" ><span class="flaticon-speech-bubbles-comment-option"></span>' . get_comments_number( get_the_ID() ) . ' comments' . '</a>';
		} else {
			$comments_count = '<a class="blog-one__meta-item" href="' . esc_url( get_permalink() ) . '#comments" >' . get_comments_number( get_the_ID() ) . ' comment' . '</a>';
		}
		echo sprintf( esc_html( '%s' ), $comments_count ); // WPCS: XSS OK.
	}
endif;

// css individual Load
add_filter( 'combine_vc_ele_css_pb_build_css_assets_css_path', 'citygovt_css_list' );
function citygovt_css_list( $citygovt_addons_css_path ) {
	$citygovt_addons_css_path = plugin_dir_path( __DIR__ ) . 'assets/css/';
	return $citygovt_addons_css_path;
}

add_filter( 'combine_vc_ele_css_pb_build_css_assets_css_url', 'citygovt_css_list_url' );
function citygovt_css_list_url() {
	$product_addons_css_path = plugin_dir_url( __DIR__ ) . 'assets/css/';
	return $product_addons_css_path;

}

add_filter( 'combine_vc_ele_css_pb_sc_list_array', 'citygovt_array_list' );
function citygovt_array_list( $citygovt_addons_css_array ) {
	$citygovt_addons_css_array = array(
		'slider_banner'            => array(
			'css'      => array( 'slider_banner' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_welcome'         => array(
			'css'      => array( 'citygovt_welcome' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_about'           => array(
			'css'      => array( 'citygovt_about' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_service'         => array(
			'css'      => array( 'citygovt_service' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_event_subscribe' => array(
			'css'      => array( 'citygovt_event_subscribe' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'service_two'              => array(
			'css'      => array( 'service_two' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovtteam'             => array(
			'css'      => array( 'citygovtteam' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'city_govt_blogs'          => array(
			'css'      => array( 'city_govt_blogs' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'contact_info'             => array(
			'css'      => array( 'contact_info' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_testimonial'     => array(
			'css'      => array( 'citygovt_testimonial' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_facts'           => array(
			'css'      => array( 'citygovt_facts' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'welcome_two'              => array(
			'css'      => array( 'welcome_two' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_fluid'           => array(
			'css'      => array( 'citygovt_fluid' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_department'      => array(
			'css'      => array( 'citygovt_department' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_highlight'       => array(
			'css'      => array( 'citygovt_highlight' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovtteamtwo'          => array(
			'css'      => array( 'citygovtteamtwo' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_get_info'        => array(
			'css'      => array( 'citygovt_get_info' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_extend_info'     => array(
			'css'      => array( 'citygovt_extend_info' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_history'         => array(
			'css'      => array( 'citygovt_history' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'masonary_gallery1'        => array(
			'css'      => array( 'masonary_gallery1' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_faq'             => array(
			'css'      => array( 'citygovt_faq' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_faq_template'    => array(
			'css'      => array( 'citygovt_faq' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'comming_soon'             => array(
			'css'      => array( 'comming_soon' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'citygovt_events'          => array(
			'css'      => array( 'citygovt_events' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'contact'                  => array(
			'css'      => array( 'contact' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'CitygovtProgramSchedule'  => array(
			'css'      => array( 'CitygovtProgramSchedule' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'CitygovtEventGuest'       => array(
			'css'      => array( 'CitygovtEventGuest' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'TeamBanner'               => array(
			'css'      => array( 'TeamBanner' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'EducationHistory'         => array(
			'css'      => array( 'citygovt_history_skill' ),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
	);
	return $citygovt_addons_css_array;

}