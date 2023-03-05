<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Banner_Two extends Widget_Base {

	public function get_name() {
		return 'banner_two';
	}

	public function get_title() {
		return esc_html__( 'Banner Two', 'citygovt-core' );
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
			'bg_image_1',
			array(
				'label'   => esc_html__( 'BG Image 1', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'bg_image_2',
			array(
				'label'   => esc_html__( 'BG Image 2', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

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
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Serving Citizen <br>Through Public Policy', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __(
					'Beguiled and demoralized by the charms of pleasure of the moment, so
                                blinded by desire.',
					'citygovt-core'
				),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'item_button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Learn More', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_button_link',
			array(
				'label'         => esc_html__( 'Button Link', 'citygovt-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'citygovt-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),

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

		$bg_image_1 = wp_get_attachment_image_url( $settings['bg_image_1']['id'], 'full' );
		$bg_image_2 = wp_get_attachment_image_url( $settings['bg_image_2']['id'], 'full' );

		?>
<section class="banner-section-two">
	<div class="main-image-layer" style="background-image: url(<?php echo esc_url( $bg_image_1 ); ?>);"></div>
	<div class="main-pattern-layer" style="background-image: url(<?php echo esc_url( $bg_image_2 ); ?>);"></div>
	<div class="banner-carousel-two owl-theme owl-carousel">
		<?php
		foreach ( $settings['items'] as $item ) {
			$item_title        = $item['item_title'];
			$item_content      = $item['item_content'];
			$item_button_title = $item['item_button_title'];

			$item_button_link     = $item['item_button_link'];
			$item_button_target   = $item['item_button_link']['is_external'] ? ' target="_blank"' : '';
			$item_button_nofollow = $item['item_button_link']['nofollow'] ? ' rel="nofollow"' : '';

			?>
		<div class="slide-item">
			<div class="auto-container">
				<div class="content-box">
					<div class="content clearfix">
						<div class="inner">
							<h1><?php echo $item_title; ?></h1>
							<div class="text"><?php echo $item_content; ?></div>
							<div class="links-box clearfix">
								<a href="<?php echo esc_url( $item_button_link['url'] ); ?>"
												<?php echo $item_button_target . ' ' . $item_button_nofollow; ?> class="theme-btn btn-style-two"><span class="btn-title"><?php echo $item_button_title; ?></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <?php } ?>

	</div>
</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Banner_Two() );
