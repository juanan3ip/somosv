<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Facts extends Widget_Base {

	public function get_name() {
		return 'citygovt_facts';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Facts', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_count_number',
			array(
				'label'   => esc_html__( 'Count Number', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '850k', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'People lived in <br>our city', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Foresee the pain and trouble that are bound ensue equal blame belongs.', 'citygovt-core' ),
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
		$settings = $this->get_settings_for_display();
		?>
		<section class="facts-section">
			<div class="auto-container">
				<div class="row clearfix">
					<?php
					foreach ( $settings['items'] as $item ) {
						$item_count_number = $item['item_count_number'];
						$item_title        = $item['item_title'];
						$item_content      = $item['item_content'];
						?>
					<div class="fact-column col-lg-4 col-md-4 col-sm-12">
						<div class="inner">
							<div class="fact-box">
								<span class="count-box"><?php echo $item_count_number; ?></span>
							</div>
							<h4 class="fact-title"><?php echo $item_title; ?></h4>
							<div class="text"><?php echo $item_content; ?></div>
						</div>
					</div> 
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Facts() );
