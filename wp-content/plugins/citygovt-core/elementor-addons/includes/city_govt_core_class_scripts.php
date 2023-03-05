<?php
namespace CITY_GOVT_CORE\elem_addons\includes\ClassScripts;

class City_Govt_Core_ClassScripts {

	public function __construct() {
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'city_govt_core_required_script' ) );
		add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'city_govt_core_editor_script' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'city_govt_core_widget_scripts' ) );

	}

	public function city_govt_core_required_script( $screen ) {
		wp_enqueue_script( 'city-govt-element-script', CITY_GOVT_CORE_ASSETS_DIR_URL . 'js/elementor-custom.js', array( 'jquery' ), time(), true );

	}

	public function city_govt_core_editor_script() {

		$array = array();
		$array = apply_filters( 'sds_elementor_conditional_array', $array );
		if ( empty( $array ) ) {
			return;
		}
		$scriptfinal  = 'jQuery(document).ready(function () {';
		$script       = '';
		$scriptafter  = '';
		$scriptafter1 = '';
		$scriptadd    = '';
		$scriptfunc   = '';
		$scriptafter2 = '';
		$arrayall     = '';
		$scriptinside = '';
		$scriptfinal .= 'function sds_restarray(a,b){
				
					var uniqueItems = Array.from(new Set(b)); 
					var uniqueItemsall = Array.from(new Set(a));
					var unique1 = uniqueItemsall.filter((o) => uniqueItems.indexOf(o) === -1);
					var unique2 = uniqueItems.filter((o) => uniqueItemsall.indexOf(o) === -1);
					var unique = unique1.concat(unique2);
				
					var hidethis=unique.join();
					
					console.log(hidethis)
					return hidethis;
				}';

		foreach ( $array as $key => $value ) {

			// $scriptinside = '';
			// $scriptafter='';
			// $script='';
			// $scriptafter2='';
			// $scriptafter1='';

			$scriptafter1 .= 'var a=defultall' . $key . '.join(); jQuery(a).closest(".elementor-control").hide();';
			$scriptafter  .= 'var  defultall' . $key . '=[];';
			$scriptafter  .= 'var  defult' . $key . '=[];';

			foreach ( $value as  $k1 => $val ) {

				foreach ( $val['value'] as $k => $v ) {
					$script .= 'if (\'' . $k . '\' == jQuery(this).val()) {';

					foreach ( $v as $item ) {
						$scriptinside .= ' hidarrayall' . $key . '.push(\'' . $item . '\');';
						$scriptafter  .= ' defultall' . $key . '.push(\'' . $item . '\');';
						$script       .= 'jQuery(\'' . $item . '\').closest(".elementor-control").show();';
						$script       .= ' hidarray' . $key . '.push(\'' . $item . '\');';
						$scriptafter  .= ' defult' . $key . '.push(\'' . $item . '\');';
					}

					$scriptafter2 .= 'if (\'' . $k . '\' == jQuery(\'' . $val['hidden'] . '\').val()) {';
					$scriptafter2 .= 'var b=defult' . $key . '.join();
								jQuery(b).closest(".elementor-control").show();';
					$script       .= '}';
					$scriptafter2 .= '} ';
				}
			}

			print_r( $val['hidden'] );
			$scriptadd .= '  var sds_hidethid=sds_restarray(hidarrayall' . $key . ',hidarray' . $key . ');console.log(sds_hidethid);
				console.log(jQuery(sds_hidethid)); console.log(jQuery("[data-setting=\"item_count\"]").val())
							jQuery(sds_hidethid).closest(".elementor-control").hide(); console.log(sds_hidethid);';

			$scriptfinal .= 'elementor.hooks.addAction("panel/open_editor/widget/' . $key . '", function (panel, model, view) {';
			$scriptfinal .= 'jQuery(\'' . $val['hidden'] . '\').on("change", function () {';
			$scriptfinal .= 'var hidarray' . $key . ' = [];';
			$scriptfinal .= 'var hidarrayall' . $key . ' = [];';
			$scriptfinal .= $scriptinside;
			$scriptfinal .= $script . $scriptadd;
			$scriptfinal .= $arrayall;

			$scriptfinal .= '});';
			$scriptfinal .= $scriptafter . $scriptafter1 . $scriptafter2;
			$scriptfinal .= '});';
			$scriptadd    = '';

		}

					$scriptfinal .= '});';

		// wp_enqueue_script( 'pricing-editor-js', plugins_url( '/assets/js/main1.js', __FILE__ ), null, time(), true );
		// wp_add_inline_script( 'pricing-editor-js', $scriptfinal );
	}
	public function city_govt_core_widget_scripts( $screen ) {

		wp_enqueue_media();
		wp_enqueue_script( 'city-govt-media-gallery', CITY_GOVT_CORE_ASSETS_DIR_URL . 'js/media-gallery.js', array( 'jquery' ), time(), true );

	}

}
