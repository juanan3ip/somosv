<?php
/**
 * citygovt functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package citygovt
 */
require_once 'lib/wp_bootstrap_navwalker.php';

defined( 'CITYGOVT_THEME_URI' ) or define( 'CITYGOVT_THEME_URI', get_template_directory_uri() );
define( 'CITYGOVT_THEME_DRI', get_template_directory() );
define( 'CITYGOVT_IMG_URL', CITYGOVT_THEME_URI . '/assets/images/' );
define( 'CITYGOVT_CSS_URL', CITYGOVT_THEME_URI . '/assets/css/' );
define( 'CITYGOVT_LANGUAGE_URL', CITYGOVT_THEME_URI . '/assets/language-switcher/' );
define( 'CITYGOVT_TIMEPICKER_URL', CITYGOVT_THEME_URI . '/assets/timepicker/' );
define( 'CITYGOVT_NOUISLIDER_URL', CITYGOVT_THEME_URI . '/assets/price-filter/' );
define( 'CITYGOVT_LIGHTBOX_URL', CITYGOVT_THEME_URI . '/assets/html5lightbox/' );
define( 'CITYGOVT_JQUERY_UI_URL', CITYGOVT_THEME_URI . '/assets/jquery-ui-1.11.4/' );

define( 'CITYGOVT_JS_URL', CITYGOVT_THEME_URI . '/assets/js/' );

define( 'CITYGOVT_FRAMEWORK_DRI', CITYGOVT_THEME_DRI . '/framework/' );

require_once CITYGOVT_FRAMEWORK_DRI . 'styles/index.php';
require_once CITYGOVT_FRAMEWORK_DRI . 'scripts/index.php';
require_once CITYGOVT_FRAMEWORK_DRI . 'plugin-list.php';
require_once CITYGOVT_FRAMEWORK_DRI . 'tgm/class-tgm-plugin-activation.php';
require_once CITYGOVT_FRAMEWORK_DRI . 'tgm/config-tgm.php';
require_once CITYGOVT_FRAMEWORK_DRI . '/dashboard/class-dashboard.php';
require_once CITYGOVT_FRAMEWORK_DRI . 'redux/redux-config.php';
require_once CITYGOVT_FRAMEWORK_DRI . 'functions.php';
require_once CITYGOVT_THEME_DRI . '/assets/css/custom-style.php';


/**
 * Theme option compatibility.
 */
if ( ! function_exists( 'citygovt_get_options' ) ) :
	function citygovt_get_options( $key ) {
		global $citygovt_options;
		$opt_pref = 'citygovt_';
		if ( empty( $citygovt_options ) ) {
			$citygovt_options = get_option( $opt_pref . 'options' );
		}
		$index = $opt_pref . $key;
		if ( ! isset( $citygovt_options[ $index ] ) ) {
			return '';
		}
		return $citygovt_options[ $index ];
	}
endif;

/*
 -----------------------------------------------------------------------------
* After Theme Setup
* -------------------------------------------------------------------------- */
add_action( 'after_setup_theme', 'citygovt_support_theme_features' );
function citygovt_support_theme_features() {
	add_theme_support( 'post-thumbnails' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

	register_nav_menus(
		array(
			'primary_navigation' => esc_html__( 'Primary Navigation', 'citygovt' ),
			'sidebar_menu'       => esc_html__( 'Sidebar Service Menu', 'citygovt' ),
		)
	);

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'content_width', 640 );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );
	add_image_size( 'citygovt_blog_post', 770, 400, true ); // 220 pixels wide by 180 pixels tall, hard
	add_image_size( 'citygovt_blog_latest_news', 370, 290, true ); // 220 pixels wide by 180 pixels tall, hard

	add_image_size( 'citygovt_blog_news', 370, 438, true ); // 220 pixels wide by 180 pixels tall, hard
	add_image_size( 'citygovt_blog_news2', 370, 200, true ); // 220 pixels wide by 180 pixels tall, hard
	add_image_size( 'citygovt_blog_latest_news', 370, 240, true ); // 220 pixels wide by 180 pixels tall, hard
	add_image_size( 'citygovt_blog_sidebar', 65, 65, true ); // 220 pixels wide by 180 pixels tall, hard
	add_image_size( 'citygovt_grid_1', 370, 400, true ); // 220 pixels wide by 180 pixels tall, hard
	add_image_size( 'citygovt_grid_2', 370, 320, true ); // 220 pixels wide by 180 pixels tall, hard

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on citygovt, use a find and replace
	* to change 'citygovt' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'citygovt', get_template_directory() . '/languages' );

}


add_action( 'widgets_init', 'citygovt_widgets_callback_function' );
function citygovt_widgets_callback_function() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'citygovt' ),
			'id'            => 'citygovt-blog-sidebar',
			'class'         => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Department Sidebar', 'citygovt' ),
			'id'            => 'citygovt-department-sidebar',
			'class'         => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);

}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * is_blog compatibility.
 */
function is_blog() {
	if ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) {
		return true;
	} else {
		return false;
	}
}

function citygovt_preloader_fun() {     ?>
		 <div class="preloader"><div class="icon"></div></div>
	<?php
}
add_action( 'citygovt_preloader', 'citygovt_preloader_fun' );


function citygovt_add_query_vars_filter( $vars ) {
	$vars[] = 'header_type';
	$vars[] = 'skin_color';
	return $vars;
}

add_filter( 'query_vars', 'citygovt_add_query_vars_filter' );

function citygovt_add_query_vars_filter_blog( $vars ) {
	 $vars[] = 'blog_type';
	return $vars;
}

add_filter( 'query_vars', 'citygovt_add_query_vars_filter_blog' );


function citygovt_back_to_top_fun() {
	?>
	<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon flaticon-up-arrow-angle"></span></div>
	<?php
}
add_action( 'citygovt_back_to_top', 'citygovt_back_to_top_fun' );


// comment field change function
add_filter( 'comment_form_fields', 'citygovt_move_comment_field_to_bottom' );
function citygovt_move_comment_field_to_bottom( $fields ) {
	 $comment_field = $fields['comment'];
	unset( $fields['comment'] );
	unset( $fields['cookies'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


function citygovt_google_gont() {
	$protocol   = is_ssl() ? 'https' : 'http';
	$subsets    = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
	$variants   = ':300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$query_args = array(
		'family' => 'Manjari|Montserrat+Alternates' . $variants,
		'family' => 'Manjari' . $variants . '%7CMontserrat+Alternates' . $variants,
		'subset' => $subsets,
	);
	$font_url   = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );
	wp_enqueue_style( 'citygovt-google-fonts', $font_url, array(), null );
}
add_action( 'init', 'citygovt_google_gont' );


function citygovt_get_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	wp_reset_postdata();
	return $pagearray;
}
$citygovt_custom_inline_style = '';

function citygovt_custom_css() {
	if ( function_exists( 'citygovt_get_custom_styles' ) ) {
		$citygovt_custom_inline_style = citygovt_get_custom_styles();
	}

	wp_add_inline_style( 'citygovt-style', $citygovt_custom_inline_style );

}
add_action( 'wp_enqueue_scripts', 'citygovt_custom_css', 20 );
add_filter( 'wpseo_remove_reply_to_com', '__return_false' );
