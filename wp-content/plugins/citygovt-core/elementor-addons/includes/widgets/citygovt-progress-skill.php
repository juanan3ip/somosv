<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class ProgressSkill extends Widget_Base {

	public function get_name() {
		return 'ProgressSkill';
	}

	public function get_title() {
		return esc_html__( 'Progress Skill', 'citygovt-core' );
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
				'default' => __( 'Professional Skills', 'citygovt-core' ),
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
				'default'     => __( 'Crisis Management', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'progress_number',
			array(
				'label'       => esc_html__( 'Progress Number', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '25', 'citygovt-core' ),
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

		<div class="skills">
			<h2 class="ed_title">
			<?php echo $heading; ?>
			</h2>
			<p class="desription"><?php echo $desc; ?></p>
			<?php
			foreach ( $settings['items'] as $item ) {
				$item_title      = $item['item_title'];
				$progress_number = $item['progress_number'];
				?>
					
			<div class="skill_bar">
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progress_number; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress_number; ?></div>
				</div>
				<h2><?php echo $item_title; ?></h2>
			</div>
			<?php } ?>
		
		</div>
		<?php
	}

}

Plugin::instance()->widgets_manager->register( new \ProgressSkill() );
