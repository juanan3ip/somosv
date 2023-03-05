<?php
namespace CITY_GOVT_CORE\elem_addons\includes\widgets\ClassElem;

class City_Govt_Core_ClassElement {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_widget_categories' ) );
		add_action( 'elementor/widgets/register', array( $this, 'city_govt_core_require_addons' ) );

	}

	/**
	 * Kcore_require_addons requires the addons files.
	 *
	 * @return void
	 */
	public function city_govt_core_require_addons() {
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {

			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'city-govt-slider-banner-one.php';

			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-welcome.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-about.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-service.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-service-two.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-team.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-blog.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-contact-info.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-testimonial.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-facts.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-banner-two.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-fluid.php';

			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-department.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-highlight.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-get-info.php';

			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-extend-info.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-history.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'service-heading.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-service-three.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-welcome-two.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-comming-soon.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-infra-structure.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-contact.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-faq.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-faq-template.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-download-source.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-department-carosel.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-gallery.php';

			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-program-schedule.php';
			if ( is_plugin_active( 'the-events-calendar/the-events-calendar.php' ) ) {
				include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-event-subscribe-widget.php';
				include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-events.php';
				include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-event-guest.php';
			}
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'city-govt-team-two.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-team-banner.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-education-history.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-progress-skill.php';
			include_once CITY_GOVT_CORE_ELEMENTOR_WIDGETS_DIR_PATH . 'citygovt-team-member-form.php';

		}
	}

	function add_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'city-govt',
			array(
				'title' => __( 'Citizen', 'citygovt-core' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}

}
