<?php
add_filter( 'rwmb_meta_boxes', 'citygovt_meta_box' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function citygovt_meta_box( $meta_boxes ) {
	 $prefix = 'citygovt_metabox';

	$posts_page = get_option( 'page_for_posts' );
	if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {
		$meta_boxes[] = array(
			'id'       => $prefix . '_post_meta_box',
			'title'    => esc_html__( 'Design Settings', 'citygovt-core' ),
			'pages'    => array(
				'post',
				'department',
			),
			'context'  => 'normal',
			'priority' => 'core',
			'fields'   => array(
				array(
					'id'      => "{$prefix}_show_breadcrumb",
					'name'    => esc_html__( 'Show Breadcrumb', 'citygovt-core' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'Yes',
						'off' => 'No',
					),
				),
				array(
					'name' => esc_html__( 'Sidebar Service Icon', 'citygovt-core' ),
					'id'   => "{$prefix}_sidebar_service_icon",
					'type' => 'text',
				),

			),
		);
	}

	$meta_boxes[] = array(
		'id'        => $prefix . '_page_meta_box',
		'title'     => esc_html__( 'Design Settings', 'citygovt-core' ),
		'pages'     => array(
			'page',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'id'      => "{$prefix}_show_breadcrumb",
				'name'    => esc_html__( 'Show Breadcrumb', 'citygovt-core' ),
				'desc'    => '',
				'type'    => 'radio',
				'std'     => 'on',
				'options' => array(
					'on'  => 'Yes',
					'off' => 'No',
				),
			),
			array(
				'name'            => 'Footer Style',
				'id'              => $prefix . '_footer_style_select',
				'type'            => 'select',
				'options'         => array(
					'one' => 'One',
					'two' => 'Two',

				),
				'multiple'        => false,
				'placeholder'     => 'Select',
				'select_all_none' => true,
			),
			array(
				'name'    => 'Footer Widget Elementor',
				'id'      => $prefix . '_footer_widget_elementor_mata',
				'type'    => 'select',
				'options' => citygovt_get_elementor_library(),
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => $prefix . '_event_settings',
		'title'     => esc_html__( 'Event Settings', 'citygovt-core' ),
		'pages'     => array(
			'tribe_events',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Booking Form Title', 'citygovt-core' ),
				'id'   => "{$prefix}_booking_form_title",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Booking Form', 'citygovt-core' ),
				'id'   => "{$prefix}_booking_form",
				'type' => 'text',
			),

			array(
				'name' => esc_html__( 'Facebook Link', 'citygovt-core' ),
				'id'   => "{$prefix}_facebook_link",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Twitter Link', 'citygovt-core' ),
				'id'   => "{$prefix}_twitter_link",
				'type' => 'text',
			),

		),
	);

	// new gallery metabox

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-gallery',
		'title'     => esc_html__( 'Manage Gallery Meta Fields', 'citygovt-core' ),
		'pages'     => array(
			'gallery',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name'             => esc_html__( 'Upload Gallery masonary', 'citygovt-core' ),
				'id'               => "{$prefix}-gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 24,
			),

			array(
				'name'            => 'Column Select for masonary',
				'id'              => "{$prefix}-portfolio_column_select",
				'type'            => 'select',
				'options'         => array(
					'col-lg-4' => 'col-lg-4',
					'col-lg-8' => 'col-lg-8',

				),
				'multiple'        => false,
				'placeholder'     => 'Select column',
				'select_all_none' => true,
			),

		),
	);

	return $meta_boxes;
}
