<?php
/*
Plugin Name: City Govt Core
Plugin URI: https://smartdemowp.com/city-govt/
Description: Core Plugin For City Govt Theme
Version: 2.2
Author: SmartDataSoft
Author URI: http://smartdatasoft.com/
License: GPLv2 or later
Text Domain: citygovt-core
Domain Path: /languages/
*/
define( 'CITY_GOVT_CORE_FILE', __FILE__ );
define( 'CITY_GOVT_CORE_BASENAME', plugin_basename( __FILE__ ) );
define( 'CITY_GOVT_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'CITY_GOVT_CORE_ROOT_URL', plugins_url() . '/citygovt-core/' );
define( 'CITY_GOVT_CORE_ASSETS_DIR_PATH', CITY_GOVT_CORE_ROOT_PATH . 'assets/' );
define( 'CITY_GOVT_CORE_ASSETS_DIR_URL', CITY_GOVT_CORE_ROOT_URL . 'assets/' );
define( 'CITY_GOVT_CORE_ELEMENTOR_DIR_PATH', CITY_GOVT_CORE_ROOT_PATH . 'elementor-addons/' );
define( 'CITY_GOVT_CORE_INCLUDES_DIR_PATH', CITY_GOVT_CORE_ROOT_PATH . 'includes/' );
define( 'CITY_GOVT_CORE_CLASS_DIR_PATH', CITY_GOVT_CORE_INCLUDES_DIR_PATH . 'classes/' );



/*
add_action( 'plugins_loaded', 'citygovt_core_load_textdomain' );
function citygovt_core_load_textdomain() {
	load_plugin_textdomain( 'citygovt-core', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
*/

require_once CITY_GOVT_CORE_CLASS_DIR_PATH . 'city_govt_core_class_init.php';
require_once CITY_GOVT_CORE_ROOT_PATH . '/meta-box/config-meta-box.php';
require_once CITY_GOVT_CORE_ROOT_PATH . '/breadcrumb-navxt/breadcrumb-navxt.php';

require_once CITY_GOVT_CORE_ROOT_PATH . '/social-share/share-link.php';
require_once CITY_GOVT_CORE_ROOT_PATH . '/widgets/latest-posts.php';
require_once CITY_GOVT_CORE_ROOT_PATH . '/widgets/citygovt-newletter-widget.php';
require_once CITY_GOVT_CORE_ROOT_PATH . '/widgets/citygovt-contact-widget.php';
require_once CITY_GOVT_CORE_ROOT_PATH . '/widgets/citygovt-service-sidebar-menu.php';
require_once __DIR__ . '/combine-vc-ele-css/combine-vc-ele-css.php';


// Enqueue Style During Editing
add_action(
	'elementor/editor/before_enqueue_styles',
	function () {
		wp_enqueue_style( 'elementor-stylesheet', plugins_url() . '/citygovt-core/assets/elementor/stylesheets.css', true, time() );
	}
);


// add support link to the WP Toolbar
function citygovt_core_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'support_link',
        'title' => esc_html__('Theme Support & Documentation links','citygovt-core'), 
        'href' => home_url() . '/wp-admin/admin.php?page=envato-theme-license-support', 
        'meta' => array(
            'class' => 'sp_link', 
            'title' => esc_html__('Support','citygovt-core')
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'citygovt_core_toolbar_link', 999);