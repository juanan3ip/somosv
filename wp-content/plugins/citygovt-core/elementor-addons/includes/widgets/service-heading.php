<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Service_Heading extends Widget_Base {

	public function get_name() {
		return 'service_heading';
	}

	public function get_title() {
		return esc_html__( 'Service Heading', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Heading',
			array(
				'label' => esc_html__( 'Service Heading', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Awesome City Services', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __(
					'Denounce with righteous indignation and dislike men who are so beguiled &
                demoralized our power of choice.',
					'citygovt-core'
				),
			)
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$title = $settings['title'];

		$description = $settings['description'];
		?>
<section class="service-header-padding services-section-three">
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
			<div class="lower-text"><?php echo $description; ?></div>
		</div>
	</div>
</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Service_Heading() );
