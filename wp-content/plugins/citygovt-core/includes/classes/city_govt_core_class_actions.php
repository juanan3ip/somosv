<?php
class City_Govt_Core_ClassActions {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$this->register_actions();
	}

	/**
	 * Register_actions All Actions
	 *
	 * @return void
	 */
	private function register_actions() {

		add_action( 'plugins_loaded', array( 'City_Govt_Core_ClassInits', 'city_govt_core_load_textdomain' ) );

	}
}
