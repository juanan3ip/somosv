<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Slider_Banner extends Widget_Base {

	public function get_name() {
		return 'slider_banner';
	}

	public function get_title() {
		 return esc_html__( 'Slider Banner', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'General',
			array(
				'label' => esc_html__( 'General', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'layout_style',
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
			'bg_image_1',
			array(
				'label'     => esc_html__( 'BG Image 1', 'citygovt-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array( 'layout_style' => '2' ),

			)
		);

		$this->add_control(
			'bg_image_2',
			array(
				'label'     => esc_html__( 'BG Image 2', 'citygovt-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array( 'layout_style' => '2' ),

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
				'default' => __( 'London is <br>Best Town on <br>Earth', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'item_button_text_1',
			array(
				'label'   => esc_html__( 'Button Text 1', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Learn More', 'citygovt-core' ),

			)
		);
		$repeater->add_control(
			'button_1_link',
			array(
				'label'         => esc_html__( 'Button Link 1', 'citygovt-core' ),
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

		$repeater->add_control(
			'item_button_text_2',
			array(
				'label'   => esc_html__( 'Button Text 2', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Visit Museum', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'button_2_link',
			array(
				'label'         => esc_html__( 'Button Link 2', 'yacher-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'yacher-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),

			)
		);

		$repeater->add_control(
			'item_slider_image',
			array(
				'label'   => esc_html__( 'Slider Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_count_number',
			array(
				'label'   => esc_html__( 'Count Number', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '02', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_count_text',
			array(
				'label'   => esc_html__( 'Count Text', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Save time , pay your tax online', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);
		$repeater->add_control(
			'item_icon_switcher',
			array(
				'label'        => esc_html__( 'Video Icon Switcher', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',

			)
		);

		$repeater->add_control(
			'item_icon2',
			array(
				'label'     => esc_html__( 'Icon 2', 'citygovt-core' ),
				'type'      => Controls_Manager::ICONS,
				'condition' => array( 'item_icon_switcher' => 'yes' ),

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
		$layout_style = $settings['layout_style'];
		if ( $layout_style == '2' ) {
			$bg_image_1 = ( $settings['bg_image_1']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_1']['id'], 'full' ) : $settings['bg_image_1']['url'];
			$bg_image_2 = ( $settings['bg_image_2']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_2']['id'], 'full' ) : $settings['bg_image_2']['url'];
		}
		?>
		<?php if ( $layout_style == '1' ) { ?>
		<section class="banner-section banner-one">
			<div class="banner-carousel owl-theme owl-carousel">
				<!-- Slide Item -->
					<?php
					foreach ( $settings['items'] as $item ) {
						$item_icon_switcher = $item['item_icon_switcher'];
						$item_title         = $item['item_title'];
						$item_sub_title     = $item['item_sub_title'];
						$item_button_text_1 = $item['item_button_text_1'];
						$item_button_text_2 = $item['item_button_text_2'];
						$item_slider_image  = ( $item['item_slider_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_slider_image']['id'], 'full' ) : $item['item_slider_image']['url'];
						$item_count_number  = $item['item_count_number'];
						$item_count_text    = $item['item_count_text'];
						$item_icon          = $item['item_icon'];
						if ( $item_icon_switcher == 'yes' ) {
							$lightbox = 'lightbox-image';
						}
						$item_icon2 = $item['item_icon2'];

						$button_1_link = $item['button_1_link'];
						$target        = $item['button_1_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow      = $item['button_1_link']['nofollow'] ? ' rel="nofollow"' : '';

						$button_2_link = $item['button_2_link'];
						$target2       = $item['button_2_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow2     = $item['button_2_link']['nofollow'] ? ' rel="nofollow"' : '';
						?>
				<div class="slide-item">
					<div class="image-layer" style="background-image: url(<?php echo esc_url( $item_slider_image ); ?>);"></div>
					<div class="auto-container">
						<div class="content-box">
							<div class="content clearfix">
								<div class="inner">
									<h1><?php echo $item_title; ?></h1>
									<div class="text"><?php echo wp_kses_post( $item_sub_title ); ?></div>
									<div class="links-box clearfix">
									<?php if ( $item_button_text_1 != '' ) { ?>
										<a href="<?php echo esc_url( $button_1_link['url'] ); ?>"
											<?php echo $target . ' ' . $nofollow; ?> class="theme-btn btn-style-one"><span
												class="btn-title"><?php echo wp_kses_post( $item_button_text_1 ); ?></span></a>
									<?php } ?>
									<?php if ( $item_button_text_2 != '' ) { ?>
										<a href="<?php echo esc_url( $button_2_link['url'] ); ?>"
											<?php echo $target2 . ' ' . $nofollow2; ?>
											class="theme-btn btn-style-two <?php echo $lightbox; ?>"><span class="btn-title">
												<?php
												if ( $item_icon_switcher == 'yes' ) {
													\Elementor\Icons_Manager::render_icon(
														( $item_icon2 ),
														array(
															'aria-hidden' => 'true',
															'class' => 'icon',
														)
													);
												}
												?>
											<?php echo wp_kses_post( $item_button_text_2 ); ?></span></a>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="next-slide">
						<div class="inner">
							<div class="count"><?php echo wp_kses_post( $item_count_number ); ?></div>
							<div class="text"><?php echo wp_kses_post( $item_count_text ); ?></div>
							<div class="arrow">
								<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
							</div>
						</div>
					</div>
				</div> 
				<?php } ?>
			</div>
		</section>
		<?php } elseif ( $layout_style == '2' ) { ?>
		<section class="banner-section-two">
			<div class="main-image-layer" style="background-image: url(<?php echo esc_url( $bg_image_1 ); ?>);"></div>
			<div class="main-pattern-layer" style="background-image: url(<?php echo esc_url( $bg_image_2 ); ?>);"></div>
			<div class="banner-carousel-two owl-theme owl-carousel">
				<?php
				foreach ( $settings['items'] as $item ) {
					$item_icon_switcher = $item['item_icon_switcher'];
					$item_title     = $item['item_title'];
					$item_sub_title = $item['item_sub_title'];
					$item_button_text_1 = $item['item_button_text_1'];
					$button_1_link = $item['button_1_link'];
					$target        = $item['button_1_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow      = $item['button_1_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
				<div class="slide-item">
					<div class="auto-container">
						<div class="content-box">
							<div class="content clearfix">
								<div class="inner">
									<h1><?php echo $item_title; ?></h1>
									<div class="text"><?php echo wp_kses_post( $item_sub_title ); ?></div>
									<div class="links-box clearfix">
										<a href="<?php echo esc_url( $button_1_link['url'] ); ?>"
									<?php echo $target . ' ' . $nofollow; ?> class="theme-btn btn-style-two"><span
												class="btn-title"><?php echo $item_button_text_1; ?></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php } ?>
			</div>
		</section>


			<?php
		}
	}
}

Plugin::instance()->widgets_manager->register( new \Slider_Banner() );
