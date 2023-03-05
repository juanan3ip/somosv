<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_Infra_Structure extends Widget_Base {

	public function get_name() {
		return 'infra_structure';
	}

	public function get_title() {
		return esc_html__( 'Infra Structure', 'citygovt-core' );
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
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Cultural Infrastructure', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label' => esc_html__( 'Extra Class', 'citygovt-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Policing & crime', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__( 'Description', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Blinded desire that cannot foresee belongs all shrinking.', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

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
					array(
						'list_title'   => esc_html__( 'Title #2', 'citygovt-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'citygovt-core' ),
					),
				),
			)
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$title       = $settings['title'];
		$extra_class = $settings['extra_class'];
		?>


<div class="infra-structure <?php echo esc_attr( $extra_class ); ?>">
	<h3><?php echo $title; ?></h3>
	<div class="row clearfix">
		<?php
		foreach ( $settings['items'] as $item ) {
			$item_icon        = $item['item_icon'];
			$item_title       = $item['item_title'];
			$item_description = $item['item_description'];
			?>
		<div class="infra-block col-lg-6 col-md-6 col-sm-12">
			<div class="inner-box">
				<div class="icon-box">
			<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
				</div>
				<h4><?php echo $item_title; ?></h4>
				<div class="text"><?php echo $item_description; ?>
				</div>
			</div>
		</div> <?php } ?>

	</div>
</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Infra_Structure() );
