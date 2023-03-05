<?php
namespace CITY_GOVT_CORE\elem_addons\CitygovtcoreElementor;

use CITY_GOVT_CORE\elem_addons\includes\ClassScripts\City_Govt_Core_ClassScripts;

use CITY_GOVT_CORE\elem_addons\includes\ClassStyles\City_Govt_Core_ClassStyles;

use CITY_GOVT_CORE\elem_addons\includes\widgets\ClassElem\City_Govt_Core_ClassElement;

use CITY_GOVT_CORE\elem_addons\includes\ClassFunctions\City_Govt_Core_ClassFunctions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main initiation class
 *
 * @since 1.0.0
 */
class City_Govt_Elementor {

	/**
	 * Add-on Version
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	public $version = '1.0.1';

	/**
	 * Minimum PHP version required
	 *
	 * @var string
	 */
	private $min_php = '5.4.0';

	/**
	 * Constructor for the class
	 *
	 * Sets up all the appropriate hooks and actions
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'auto_deactivate' ) );
		if ( ! $this->is_supported_php() ) {
			return;
		}
		$this->define_constants();
		$this->includes();
		$this->instantiate();
		$this->init_hooks();
	}

	/**
	 * Initializes the class
	 *
	 * Checks for an existing instance
	 * and if it does't find one, creates it.
	 *
	 * @since 1.0.0
	 *
	 * @return object Class instance
	 */
	public static function init() {
		static $instance = false;
		if ( ! $instance ) {
			$instance = new self();
		}
		return $instance;
	}

	/**
	 * Define constants
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function define_constants() {
		define( 'CITY_GOVT_CORE_VERSION', $this->version );
		define( 'CITY_GOVT_CORE_ELEMENTOR_FILE', __FILE__ );
		define( 'CITY_GOVT_CORE_ELEMENTOR_INCLUDES_DIR_PATH', CITY_GOVT_CORE_ELEMENTOR_DIR_PATH . 'includes/' );
		define( 'CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH', CITY_GOVT_CORE_ELEMENTOR_INCLUDES_DIR_PATH . 'widgets/' );

	}

	/**
	 * Include required files
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function includes() {
		include_once CITY_GOVT_CORE_ELEMENTOR_INCLUDES_DIR_PATH . 'city_govt_core_class_scripts.php';
		include_once CITY_GOVT_CORE_ELEMENTOR_INCLUDES_DIR_PATH . 'city_govt_core_class_styles.php';
		include_once CITY_GOVT_CORE_ELEMENTOR_INCLUDES_DIR_PATH . 'city_govt_core_class_elements.php';
		include_once CITY_GOVT_CORE_ELEMENTOR_INCLUDES_DIR_PATH . 'city_govt_core_functions.php';
		include_once CITY_GOVT_CORE_ELEMENTOR_INCLUDES_DIR_PATH . 'masonary-custom-gallery.php';
	}

	/**
	 * Init Hooks
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function init_hooks() {
		// Localize our plugin
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );

		add_action(
			'elementor/init',
			function () {
				\Elementor\Plugin::$instance->elements_manager->add_category(
					'city-govt',
					array(
						'title' => __( 'City Govt', 'citygovt-core' ),
						'icon'  => 'fa fa-plug',
					),
					1
				);
			}
		);

		add_action(
			'elementor/init',
			function () {
				\Elementor\Plugin::$instance->elements_manager->add_category(
					'city-govt-footer',
					array(
						'title' => __( 'City Govt Footer', 'citygovt-core' ),
						'icon'  => 'fa fa-plug',
					),
					1
				);
			}
		);

	}


	/**
	 * Instantiate classes
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function instantiate() {
		new City_Govt_Core_ClassScripts();
		new City_Govt_Core_ClassStyles();
		new City_Govt_Core_ClassElement();
	}

	/**
	 * Plugin action links
	 *
	 * @param array $links
	 *
	 * @return array
	 */
	function plugin_action_links( $links ) {
		// $links[] = '<a href="' . admin_url( 'admin.php?page=' ) . '">' . __( 'Settings', '' ) . '</a>';
		return $links;
	}

	/**
	 * Check if the PHP version is supported
	 *
	 * @return bool
	 */
	public function is_supported_php( $min_php = null ) {
		$min_php = $min_php ? $min_php : $this->min_php;
		if ( version_compare( PHP_VERSION, $min_php, '<=' ) ) {
			return false;
		}
		return true;
	}

	/**
	 * Show notice about PHP version
	 *
	 * @return void
	 */
	public function php_version_notice() {

		if ( $this->is_supported_php() || ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$error  = __( 'Your installed PHP Version is: ', 'citygovt-core' ) . PHP_VERSION . '. ';
		$error .= __( 'The <strong>Team Members for Elementor</strong> plugin requires PHP version <strong>', 'citygovt-core' ) . $this->min_php . __( '</strong> or greater.', 'citygovt-core' );
		?>
		<div class="error">
			<p><?php printf( $error ); ?></p>
		</div>
		<?php
	}

	/**
	 * Bail out if the php version is lower than
	 *
	 * @return void
	 */
	public function auto_deactivate() {
		if ( $this->is_supported_php() ) {
			return;
		}

		deactivate_plugins( plugin_basename( __FILE__ ) );
		$error  = __( '<h1>An Error Occured</h1>', 'citygovt-core' );
		$error .= __( '<h2>Your installed PHP Version is: ', 'citygovt-core' ) . PHP_VERSION . '</h2>';
		$error .= __( 'You should update your PHP software or contact your host regarding this matter.</p>', 'citygovt-core' );
		wp_die( $error, __( 'Plugin Activation Error', 'citygovt-core' ), array( 'back_link' => true ) );
	}

}
return City_Govt_Elementor::init();



