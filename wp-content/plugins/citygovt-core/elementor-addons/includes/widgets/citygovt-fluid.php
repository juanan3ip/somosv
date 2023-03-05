<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Fluid extends Widget_Base {

	public function get_name() {
		return 'citygovt_fluid';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Fluid', 'citygovt-core' );
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
			'style',
			array(
				'label'   => __( 'Layout Style', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'citygovt-core' ),
					'2' => __( 'Style 2', 'citygovt-core' ),

				),
			)
		);

		$this->add_control(
			'icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

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
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Thinking of <br>living in london city?', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_bg_image',
			array(
				'label'   => esc_html__( 'BG Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Everyone should live in a big <br>city at least once.', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

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
		$settings     = $this->get_settings_for_display();
		$icon         = $settings['icon'];
		$layout_style = $settings['style'];
		if ( $layout_style == '2' ) {
			$style_class = 'alternate-icon';
		} else {
			$style_class = '';
		}
		?>
		<section class="fluid-section <?php echo $style_class; ?>">
			<div class="top-icon-box">
				<?php \Elementor\Icons_Manager::render_icon( ( $icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
			<div class="outer-container">
				<div class="row clearfix">
					<?php
					foreach ( $settings['items'] as $item ) {
						$item_title = $item['item_title'];
						$item_bg_image = ( $item['item_bg_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_bg_image']['id'], 'full' ) : $item['item_bg_image']['url'];
						$item_sub_title = $item['item_sub_title'];
						$item_icon      = $item['item_icon'];
						?>
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<div class="image-layer" style="background-image: url(<?php echo $item_bg_image; ?>);"></div>
						<div class="clearfix">
							<div class="inner">
								<div class="content">
									<div class="upper-title">
										<div class="icon-box">
											<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
										</div>
										<h4><?php echo $item_title; ?></h4>
									</div>
									<h2><?php echo $item_sub_title; ?></h2>
								</div>
							</div>
						</div>
					</div> 
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Fluid() );
