<?php
class City_Govt_Core_ClassInits {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$this->city_govt_core_require_all();
		$this->city_govt_core_actions();

	}

	/**
	 * Sds_require_all require all files
	 *
	 * @return void
	 */
	private function city_govt_core_require_all() {

		include_once CITY_GOVT_CORE_CLASS_DIR_PATH . 'city_govt_core_class_actions.php';
		require_once CITY_GOVT_CORE_ELEMENTOR_DIR_PATH . 'city_govt_elementor.php';

	}

	/**
	 * Sds_actions redirect to acttion class
	 *
	 * @return void
	 */
	private function city_govt_core_actions() {

		new City_Govt_Core_ClassActions();
	}

	public static function city_govt_core_load_textdomain() {
		load_plugin_textdomain( 'citygovt-core', false, dirname( __FILE__ ) . '/languages' );
	}

}

new City_Govt_Core_ClassInits();
