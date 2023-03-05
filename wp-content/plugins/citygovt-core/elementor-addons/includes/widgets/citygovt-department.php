<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Department extends Widget_Base {

	public function get_name() {
		return 'citygovt_department';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Department', 'citygovt-core' );
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
		$this->end_controls_section();

		$this->start_controls_section(
			'upper_content',
			array(
				'label' => esc_html__( 'Upper Content', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Explore Our Departments', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$this->add_control(
			'counter_number_image',
			array(
				'label'     => __( 'Counter Image', 'citygovt-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				'selectors' => array(
					'{{WRAPPER}} .featured-block-four .count-box' => 'background: url({{URL}}) right top repeat',
				),
			)
		);

		$this->add_control(
			'text',
			array(
				'label'     => esc_html__( 'Text', 'citygovt-core' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => __( 'Foresee the pain and trouble that are bound to ensue;', 'citygovt-core' ),
				'condition' => array( 'layout_style' => '1' ),
			)
		);

		$this->add_control(
			'department_title',
			array(
				'label'     => esc_html__( 'Department Title', 'citygovt-core' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'All Department', 'citygovt-core' ),
				'condition' => array( 'layout_style' => '1' ),
			)
		);

		$this->add_control(
			'department_link',
			array(
				'label'         => esc_html__( 'Department Link', 'citygovt-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'citygovt-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'condition'     => array( 'layout_style' => '1' ),

			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Policing & <br>crime department', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_count_number',
			array(
				'label'   => esc_html__( 'Count Number', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '01', 'citygovt-core' ),
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
			'item_title_link',
			array(
				'label'         => esc_html__( 'Title Link', 'citygovt-core' ),
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
			'item_button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'citygovt-core' ),
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

		$this->start_controls_section(
			'lower_section',
			array(
				'label' => esc_html__( 'Lower Content', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'bg_image',
			array(
				'label'   => esc_html__( 'BG Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Explore Our Departments', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'total_item',
			array(
				'label'   => esc_html__( 'Total Item', 'citygovt-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => __( 'Contact Us', 'citygovt-core' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title_1',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Policing & <br>crime department', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_title_link_1',
			array(
				'label'         => esc_html__( 'Title Link', 'citygovt-core' ),
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
			'loweritems_1',
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
		$title      = $settings['title'];
		$title_1    = $settings['title_1'];
		$total_item = $settings['total_item'];
		$style      = $settings['layout_style'];

		$image = ( $settings['image']['id'] != '' ) ? wp_get_attachment_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		if ( ! empty( $image ) ) {
			$this->add_render_attribute( 'image', 'src', $image );
			$this->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
			$this->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );
			$image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image' );

		}

		if ( $style == '1' ) {
			$text             = $settings['text'];
			$department_title = $settings['department_title'];
			$department_link  = $settings['department_link']['url'];
			if ( ! empty( $department_link ) ) {
				$this->add_render_attribute( 'department_link', 'href', $department_link );
				$this->add_render_attribute( 'department_link', 'class', '' );
				if ( $settings['department_link']['is_external'] ) {
					$this->add_render_attribute( 'department_link', 'target', '_blank' );
				}

				if ( ! empty( $settings['department_link']['nofollow'] ) ) {
					$this->add_render_attribute( 'department_link', 'rel', 'nofollow' );
				}
			}
		}
		$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		if ( $style == '1' ) {
		?>
		<section class="departments-section">
			<div class="upper-row">
				<div class="bg-layer"></div>
				<div class="auto-container">
					<div class="row clearfix">
						<div class="image-column col-xl-3 col-lg-12 col-md-12">
							<div class="inner">
								<figure class="image">
								<?php
								if ( $image != '' ) {
									echo $image_image_html; }
								?>
								</figure>
							</div>
						</div>
						<div class="right-column col-xl-9 col-lg-12 col-md-12">
							<div class="inner">
								<div class="sec-title with-separator">
									<h2><?php echo $title; ?></h2>
									<div class="separator">
										<span class="cir c-1"></span>
										<span class="cir c-2"></span>
										<span class="cir c-3"></span>
									</div>
								</div>
								<div class="departments-carousel owl-theme owl-carousel">
									<?php
									foreach ( $settings['items'] as $item ) {
										$item_title        = $item['item_title'];
										$item_count_number = $item['item_count_number'];
										$item_icon         = $item['item_icon'];
										$item_title_link     = $item['item_title_link'];
										$item_title_target   = $item['item_title_link']['is_external'] ? ' target="_blank"' : '';
										$item_title_nofollow = $item['item_title_link']['nofollow'] ? ' rel="nofollow"' : '';
										$item_button_title = $item['item_button_title'];
										$item_button_link     = $item['item_button_link'];
										$item_button_target   = $item['item_button_link']['is_external'] ? ' target="_blank"' : '';
										$item_button_nofollow = $item['item_button_link']['nofollow'] ? ' rel="nofollow"' : '';
										?>
									<div class="featured-block-four">
										<div class="inner-box">
											<div class="count-box"><span><?php echo $item_count_number; ?></span></div>
											<div class="icon-box">
												<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
											</div>
											<div class="content">
												<h4><a href="<?php echo esc_url( $item_title_link['url'] ); ?>"
												<?php echo $item_title_target . ' ' . $item_title_nofollow; ?>><?php echo $item_title; ?></a>
												</h4>
												<div class="read-more"><a
														href="<?php echo esc_url( $item_button_link['url'] ); ?>"
												<?php echo $item_button_target . ' ' . $item_button_nofollow; ?>><span><?php echo $item_button_title; ?></span></a>
												</div>
											</div>
										</div>
									</div> 
									<?php } ?>
								</div>
								<div class="bottom-text"><?php echo $text; ?> 
									<a <?php echo $this->get_render_attribute_string( 'department_link' ); ?>><?php echo $department_title; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="services-row">
				<div class="auto-container">
					<div class="outer-container">
						<div class="image-layer" style="background-image: url(<?php echo esc_url( $bg_image ); ?>);"></div>
						<div class="row clearfix">
							<div class="title-col col-xl-3 col-lg-12 col-md-12">
								<div class="sec-title light with-separator">
									<h2><?php echo $title_1; ?></h2>
									<div class="separator">
										<span class="cir c-1"></span>
										<span class="cir c-2"></span>
										<span class="cir c-3"></span>
									</div>
								</div>
							</div>
							<div class="big-col col-xl-9 col-lg-12 col-md-12">
								<div class="row clearfix">
									<?php
									$count = 1;
									foreach ( $settings['loweritems_1'] as $item ) {
										$item_title_1 = $item['item_title_1'];
										$item_title_link_1_link     = $item['item_title_link_1'];
										$item_title_link_1_target   = $item['item_title_link_1']['is_external'] ? ' target="_blank"' : '';
										$item_title_link_1_nofollow = $item['item_title_link_1']['nofollow'] ? ' rel="nofollow"' : '';
										?>
										<?php if ( $count == '1' ) { ?>
										<div class="link-col col-lg-4 col-md-6 col-sm-12">
											<ul>
												<?php } ?>
												<li><a href="<?php echo esc_url( $item_title_link_1_link['url'] ); ?>"
													<?php echo $item_title_link_1_target . ' ' . $item_title_link_1_nofollow; ?>><?php echo $item_title_1; ?></a>
												</li>
													<?php if ( $count == $total_item ) { ?>
											</ul>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php } elseif ( $style == '2' ) { ?>
			<section class="departments-section">
				<div class="upper-row">
					<div class="bg-layer"></div>
					<div class="auto-container">
						<div class="row clearfix">
							<div class="image-column col-xl-3 col-lg-4 col-md-12">
								<div class="inner">
									<figure class="image"><?php echo $image_image_html; ?></figure>
								</div>
							</div>
							<div class="right-column col-xl-9 col-lg-12 col-md-12">
								<div class="inner">
									<div class="sec-title with-separator">
										<h2><?php echo $title; ?></h2>
										<div class="separator">
											<span class="cir c-1"></span>
											<span class="cir c-2"></span>
											<span class="cir c-3"></span>
										</div>
									</div>
									<div class="row clearfix">
										<?php
										foreach ( $settings['items'] as $item ) {
											$item_title        = $item['item_title'];
											$item_count_number = $item['item_count_number'];
											$item_icon         = $item['item_icon'];
											$item_title_link     = $item['item_title_link'];
											$item_title_target   = $item['item_title_link']['is_external'] ? ' target="_blank"' : '';
											$item_title_nofollow = $item['item_title_link']['nofollow'] ? ' rel="nofollow"' : '';
											$item_button_title = $item['item_button_title'];
											$item_button_link     = $item['item_button_link'];
											$item_button_target   = $item['item_button_link']['is_external'] ? ' target="_blank"' : '';
											$item_button_nofollow = $item['item_button_link']['nofollow'] ? ' rel="nofollow"' : '';
											?>
										<div class="featured-block-four col-lg-4 col-md-6 col-sm-12">
											<div class="inner-box">
												<div class="count-box"><span><?php echo $item_count_number; ?></span></div>
												<div class="icon-box">
													<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
												</div>
												<div class="content">
													<h4>
														<a href="<?php echo esc_url( $item_title_link['url'] ); ?>" <?php echo $item_title_target . ' ' . $item_title_nofollow; ?>><?php echo $item_title; ?></a>
													</h4>
													<div class="read-more">
														<a href="<?php echo esc_url( $item_button_link['url'] ); ?>" <?php echo $item_button_target . ' ' . $item_button_nofollow; ?>><span><?php echo $item_button_title; ?></span></a>
													</div>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="services-row">
					<div class="auto-container">
						<div class="outer-container">
							<div class="image-layer" style="background-image: url(<?php echo esc_url( $bg_image ); ?>);"></div>
							<div class="row clearfix">
								<div class="title-col col-xl-3 col-lg-12 col-md-12">
									<div class="sec-title light with-separator">
										<h2><?php echo $title_1; ?></h2>
										<div class="separator">
											<span class="cir c-1"></span>
											<span class="cir c-2"></span>
											<span class="cir c-3"></span>
										</div>
									</div>
								</div>
								<div class="big-col col-xl-9 col-lg-12 col-md-12">
									<div class="row clearfix">
										<?php
										$count = 1;
										foreach ( $settings['loweritems_1'] as $item ) {
											$item_title_1 = $item['item_title_1'];
											$item_title_link_1_link     = $item['item_title_link_1'];
											$item_title_link_1_target   = $item['item_title_link_1']['is_external'] ? ' target="_blank"' : '';
											$item_title_link_1_nofollow = $item['item_title_link_1']['nofollow'] ? ' rel="nofollow"' : '';
											if ( $count == '1' ) { ?>
										<div class="link-col col-lg-4 col-md-6 col-sm-12">
											<ul>
												<?php } ?>
												<li><a href="<?php echo esc_url( $item_title_link_1_link['url'] ); ?>"
													<?php echo $item_title_link_1_target . ' ' . $item_title_link_1_nofollow; ?>><?php echo $item_title_1; ?></a>
												</li>
												<?php if ( $count == $total_item ) { ?>
											</ul>
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Department() );
