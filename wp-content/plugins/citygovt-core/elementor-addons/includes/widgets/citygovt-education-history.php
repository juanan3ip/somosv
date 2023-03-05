<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class EducationHistory extends Widget_Base {

	public function get_name() {
		return 'EducationHistory';
	}

	public function get_title() {
		return esc_html__( 'Education History', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'general', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Education', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'desc',
			array(
				'label'   => esc_html__( 'Desc', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Welcomed and every pain avoided. But in certain circumstances and owing too the claims off duty bligations of business it will frequently occur that pleasures have to be repudiated & annoyances that accepted wise man therefore always holds indignation', 'citygovt-core' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '1979 – 1983', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Occidental College in LA', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'citygovt-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'citygovt-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'citygovt-core' ),
					),
				),
			)
		);
		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$heading = $settings['heading'];
		$desc    = $settings['desc'];
		?>
		<div class="education_details">
			<h2 class="ed_title"><?php echo $heading; ?></h2>
			<p class="desription"><?php echo $desc; ?></p>
			<div class="educ_box row">
			<?php
			foreach ( $settings['items'] as $item ) {
				$item_title   = $item['item_title'];
				$item_content = $item['item_content'];
				?>	
				<div class="details_list">
					<h6><?php echo $item_title; ?></h6>
					<p><?php echo $item_content; ?> </p>
				</div>
			<?php } ?>
			</div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \EducationHistory() );
