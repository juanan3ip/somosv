<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_prefix = 'citygovt_';
$opt_name   = 'citygovt_options';
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'             => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'         => $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'      => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'            => 'menu',
	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'       => true,
	// Show the sections below the admin menu item or not
	'menu_title'           => esc_html__( 'Citygovt Options', 'citygovt' ),
	'page_title'           => esc_html__( 'Citygovt Options', 'citygovt' ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'       => '',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
	// Must be defined to add google fonts to the typography module
	'async_typography'     => true,
	// Use a asynchronous font on the front end or font string
	// 'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar'            => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'       => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'   => 50,
	// Choose an priority for the admin bar menu
	'global_variable'      => '',
	// Set a different name for your global variable other than the opt_name
	'dev_mode'             => false,
	// Show the time the page took to load, etc
	'update_notice'        => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'           => true,
	// Enable basic customizer support
	// 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	// 'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
	// OPTIONAL -> Give you extra features
	'page_priority'        => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'          => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'     => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'            => '',
	// Specify a custom URL to an icon
	'last_tab'             => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'            => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'            => '_options',
	// Page slug used to denote the panel
	'save_defaults'        => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'         => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'         => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'   => true,
	// Shows the Import/Export panel when not used as a field.
	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'           => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'             => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'              => true,
		// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
		// 'compiler'             => true,
);


Redux::setArgs( $opt_name, $args );
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Base theme option', 'citygovt' ),
		'id'     => 'base_theme_option',
		'desc'   => esc_html__( 'Chnage Base theme option here', 'citygovt' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'preloader_on_off',
				'type'    => 'switch',
				'title'   => esc_html__( 'Preloader on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'preloader_on_off', '=', '1' ),
				'id'       => $opt_prefix . 'preloader_icon',
				'type'     => 'background',
				'title'    => esc_html__( 'Preloader Icon', 'citygovt' ),
				'output'   => array( '.preloader .icon' ),
			),
			array(
				'id'      => $opt_prefix . 'back_to_top_on_off',
				'type'    => 'switch',
				'title'   => esc_html__( 'Back To Top on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'header_sticky_on_off',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Sticky on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'unit_test_on_off',
				'type'    => 'switch',
				'title'   => esc_html__( 'Unit Test on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'event_time_format',
				'type'    => 'switch',
				'title'   => esc_html__( '24 Hour Event Time Format', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Header option', 'citygovt' ),
		'id'     => 'header_option',
		'desc'   => esc_html__( 'Change header option here', 'citygovt' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'header_style',
				'type'    => 'select',
				'title'   => esc_html__( 'Header style', 'citygovt' ),
				'options' => array(
					'one' => esc_html__( 'Header style one', 'citygovt' ),
					'two' => esc_html__( 'Header style two', 'citygovt' ),
				),
				'default' => 'one',
			),
			array(
				'id'       => $opt_prefix . 'mobile_menu_logo',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Mobile Menu Logo', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload mobile menu logo ', 'citygovt' ),
			),
			array(
				'id'       => $opt_prefix . 'country_flag',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Country Flag', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload country flag ', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'header_top_onoff',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Top on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_top_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_welcome_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Header Welcome Text', 'citygovt' ),
				'default'  => esc_html__( ' London ! Capital of United Kingdom', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_top_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_left_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Header Left Text', 'citygovt' ),
				'default'  => esc_html__( 'Suggestion or Complaint', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_top_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Header Email', 'citygovt' ),
				'default'  => esc_html__( 'support@mygov.com', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_top_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_text_slider',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Header Text Slider', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_top_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone Number', 'citygovt' ),
				'default'  => esc_html__( '1800-123-45-67', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_top_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_office_time',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Header Office Time', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'header_search_onoff',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Search on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'header_language_switcher_onoff',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header language on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_language_switcher_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_language_switcher',
				'type'     => 'editor',
				'title'    => esc_html__( 'Header Language switcher', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'header_social_onoff',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Social on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_social_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_social',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Header social link', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_social_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_social_mobile',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Header social link for mobile view', 'citygovt' ),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Typography', 'citygovt' ),
		'id'               => 'fonts_settings',
		'desc'             => esc_html__( 'Typography', 'citygovt' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-font',
		'fields'           => array(
			array(
				'id'       => 'enable_typography',
				'type'     => 'switch',
				'title'    => esc_html__( 'Typography', 'citygovt' ),
				'subtitle' => esc_html__( 'Enable or Disable Typography', 'citygovt' ),
				'default'  => false,
				'off'      => esc_html__( 'Disable', 'citygovt' ),
				'on'       => esc_html__( 'Enable', 'citygovt' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-body_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'Body Typography', 'citygovt' ),
				'subtitle'   => esc_html__( 'Select body font family, size, line height, color and weight.', 'citygovt' ),
				'text-align' => false,
				'subsets'    => false,
				'output'     => array( 'body' ),

			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-1-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H1 Font', 'citygovt' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'citygovt' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h1' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-2-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H2 Font', 'citygovt' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'citygovt' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h2' ),

			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-3-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H3 Font', 'citygovt' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'citygovt' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h3' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-4-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H4 Font', 'citygovt' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'citygovt' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h4' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-5-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H5 Font', 'citygovt' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'citygovt' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h5' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-6-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H6 Font', 'citygovt' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'citygovt' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h6' ),
			),

		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Blog option', 'citygovt' ),
		'id'     => 'blog_area',
		'desc'   => esc_html__( 'Change blog option here', 'citygovt' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'blog_post_share',
				'type'    => 'switch',
				'title'   => esc_html__( 'blog post share on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_post_author',
				'type'    => 'switch',
				'title'   => esc_html__( 'Blog Post Author on off switch', 'citygovt' ),
				'default' => true,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_page_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Blog page header on off switch', 'citygovt' ),
				'default' => 0,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_page_header', '=', '1' ),
				'id'       => $opt_prefix . 'blog_page_header_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog page header text', 'citygovt' ),
				'default'  => esc_html__( 'Blog Posts', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_page_header', '=', '1' ),
				'id'       => $opt_prefix . 'blog_header_bg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Blog Header Background', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload blog header background ', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_post_style',
				'type'    => 'select',
				'title'   => esc_html__( 'blog style', 'citygovt' ),
				'options' => array(
					'1' => esc_html__( 'One Column style ', 'citygovt' ),
					'2' => esc_html__( 'Two Column style', 'citygovt' ),
				),
				'default' => '1',
			),
			array(
				'id'       => $opt_prefix . 'blog_sidebar_bg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Blog Sidebar Background', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload blog sidebar background ', 'citygovt' ),
			),
			array(
				'id'       => $opt_prefix . 'blog_single_title_bg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Blog Single Title Background', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload blog single title background ', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_single_post_nav',
				'type'    => 'switch',
				'title'   => esc_html__( 'blog single post nav on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_single_post_author_box',
				'type'    => 'switch',
				'title'   => esc_html__( 'blog single post author box on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_sidebar_position',
				'type'    => 'select',
				'title'   => esc_html__( 'Blog Sidebar Position', 'citygovt' ),
				'options' => array(
					'right' => esc_html__( 'Right Side', 'citygovt' ),
					'left'  => esc_html__( 'Left Side', 'citygovt' ),
				),
				'default' => 'right',
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Departments option', 'citygovt' ),
		'id'     => 'departments_area',
		'desc'   => esc_html__( 'Change Departments option here', 'citygovt' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'       => $opt_prefix . 'departments_header_bg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Departments Header Background', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload Departments header background ', 'citygovt' ),
			),
			array(
				'id'       => $opt_prefix . 'departments_sidebar_bg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Departments Sidebar Background', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload departments sidebar background ', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'departments_sidebar_position',
				'type'    => 'select',
				'title'   => esc_html__( 'Departments Sidebar Position', 'citygovt' ),
				'options' => array(
					'right' => esc_html__( 'Right Side', 'citygovt' ),
					'left'  => esc_html__( 'Left Side', 'citygovt' ),
				),
				'default' => 'right',
			),

		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Event option', 'citygovt' ),
		'id'     => 'event_area',
		'desc'   => esc_html__( 'Change event option here', 'citygovt' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'       => $opt_prefix . 'event_single_title_bg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Event Single Title Background', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload event single title background ', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'event_post_share',
				'type'    => 'switch',
				'title'   => esc_html__( 'Event post share on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'id'      => $opt_prefix . 'related_events',
				'type'    => 'switch',
				'title'   => esc_html__( 'Related events on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Color option', 'citygovt' ),
		'id'     => 'citygovt_color_area',
		'desc'   => esc_html__( 'Chnage Color option here', 'citygovt' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'          => $opt_prefix . 'main_color',
				'type'        => 'color',
				'title'       => __( 'Primary Color', 'citygovt' ),
				'subtitle'    => __( 'Pick a color for the theme (default: #00aa55).', 'citygovt' ),
				'validate'    => 'color',
				'transparent' => false,
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Footer option', 'citygovt' ),
		'id'     => 'citygovt_footer_area',
		'desc'   => esc_html__( 'Chnage footer option here', 'citygovt' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'footer_style',
				'type'    => 'select',
				'title'   => esc_html__( 'Footer style', 'citygovt' ),
				'options' => array(
					'one' => esc_html__( 'Footer style one', 'citygovt' ),
					'two' => esc_html__( 'Footer style two', 'citygovt' ),
				),
				'default' => 'one',
			),
			array(
				'id'      => $opt_prefix . 'footer_widget_elementor',
				'type'    => 'select',
				'title'   => esc_html__( 'Footer widget Select', 'citygovt' ),
				'options' => citygovt_get_elementor_library(),
			),
			array(
				'required' => array( $opt_prefix . 'footer_style', '=', 'two' ),
				'id'       => $opt_prefix . 'footer_logo',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Footer Logo', 'citygovt' ),
				'subtitle' => esc_html__( 'Upload footer logo ', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'footer_style', '=', 'two' ),
				'id'       => $opt_prefix . 'private_policy_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Private Policy URL', 'citygovt' ),
				'default'  => '#',
			),
			array(
				'required' => array( $opt_prefix . 'footer_style', '=', 'two' ),
				'id'       => $opt_prefix . 'terms_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Terms of use URL', 'citygovt' ),
				'default'  => '#',
			),
			array(
				'id'      => $opt_prefix . 'footer_copyright',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Copyright text', 'citygovt' ),
				'default' => wp_kses( 'Copyrights <a href="#">© 2020 london city govt.</a> All rights reserved.', 'code_context' ),
			),
			array(
				'id'      => $opt_prefix . 'footer_social_onoff',
				'type'    => 'switch',
				'title'   => esc_html__( 'Footer Social on off switch', 'citygovt' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'citygovt' ),
				'off'     => esc_html__( 'Disable', 'citygovt' ),
			),
			array(
				'required' => array( $opt_prefix . 'footer_social_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'footer_social',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Footer social link', 'citygovt' ),
			),

		),
	)
);
