<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Faq_Template extends Widget_Base {

	public function get_name() {
		return 'citygovt_faq_template';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Faq Template', 'citygovt-core' );
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
		$this->add_control(
			'total_item',
			array(
				'label'   => esc_html__( 'Total Item', 'citygovt-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => __( '3', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Complaint about road parking?', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__( 'Description', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Pleasure and praising pain was born and i will give you a complete account of the system actual teachings.', 'citygovt-core' ),
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
		$settings   = $this->get_settings_for_display();
		$total_item = $settings['total_item'];
		?>
		<div class="row clearfix">
		<?php
		$count = 1;
		foreach ( $settings['items'] as $item ) {
			$item_title       = $item['item_title'];
			$item_description = $item['item_description'];
			?>
			<?php if ( $count == 1 ) { ?>
				<div class="tab-col col-lg-6 col-md-12 col-sm-12">
					<div class="inner">
						<div class="accordion-box">
							<?php } ?>
							<div class="accordion block">
								<div class="acc-btn"><?php echo $item_title; ?><div class="icon flaticon-cross"></div>
								</div>
								<div class="acc-content">
									<div class="content">
										<div class="text"><?php echo $item_description; ?></div>
									</div>
								</div>
							</div>
							<?php if ( $count == $total_item ) { ?>
						</div>
					</div>
				</div>
				<?php
				$count = 0;
			}
			?>
			<?php
			$count++;
		}
		?>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Faq_Template() );
