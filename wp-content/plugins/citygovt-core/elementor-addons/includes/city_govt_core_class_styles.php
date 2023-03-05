<?php
namespace CITY_GOVT_CORE\elem_addons\includes\ClassStyles;

class City_Govt_Core_ClassStyles {
	public function __construct() {
		add_action( 'elementor/editor/after_register_styles', array( $this, 'required_assets' ) );
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'required_assets' ) );
		add_action( 'elementor/preview/after_register_styles', array( $this, 'required_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'required_assets' ) );
	}

	public function required_assets() {

	}

}
