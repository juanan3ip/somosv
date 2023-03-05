<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Welcome_Two extends Widget_Base {

	public function get_name() {
		return 'welcome_two';
	}

	public function get_title() {
		return esc_html__( 'Welcome Two', 'citygovt-core' );
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
			'layout_style',
			array(
				'label'   => __( 'Blog Style', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'citygovt-core' ),
					'2' => __( 'Style 2', 'citygovt-core' ),

				),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'The Major Voice of <br>City Government, London', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __(
					'Denounce with righteous indignation and dislike men who are so beguiled &
                            demoralized our power of pleasure is to be welcomed.',
					'citygovt-core'
				),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$this->add_control(
			'name',
			array(
				'label'   => esc_html__( 'Name', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Brendon Garrey', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'designation',
			array(
				'label'   => esc_html__( 'Designation', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'mayor', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'date',
			array(
				'label'   => esc_html__( 'Date', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'since 21st Oct,2019', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'video_title',
			array(
				'label'   => esc_html__( 'Video Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'History of <br>london                                     city council', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'video_link',
			array(
				'label'         => esc_html__( 'Video Link', 'citygovt-core' ),
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
			'video_icon',
			array(
				'label' => esc_html__( 'Video Icon', 'citygovt-core' ),
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
			'item_image',
			array(
				'label'   => esc_html__( 'Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
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
		$settings     = $this->get_settings_for_display();
		$title        = $settings['title'];
		$description  = $settings['description'];
		$name         = $settings['name'];
		$designation  = $settings['designation'];
		$layout_style = $settings['layout_style'];

		$date        = $settings['date'];
		$video_title = $settings['video_title'];
		$video_link  = $settings['video_link']['url'];
		if ( ! empty( $video_link ) ) {
				$this->add_render_attribute( 'video_link', 'href', $video_link );
			if ( $settings['video_link']['is_external'] ) {
				$this->add_render_attribute( 'video_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['video_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'video_link', 'rel', 'nofollow' );
			}
		}
		if ( $layout_style == '2' ) {
			$style_class = 'alternate';
		} else {
			$style_class = '';
		}
		$video_icon = $settings['video_icon']; ?>
<section class="welcome-section-two <?php echo $style_class; ?>">

	<div class="lower-row">
		<div class="auto-container">
			<div class="row clearfix">
				<div class="text-col col-xl-5 col-lg-6 col-md-12 col-sm-12">
					<div class="inner">
						<div class="sec-title with-separator">
							<h2><?php echo $title; ?></h2>
							<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
									class="cir c-3"></span></div>
						</div>
						<div class="text"><?php echo $description; ?></div>
						<div class="info">
							<strong><?php echo $name; ?></strong>
							<span class="designation"><?php echo $designation; ?>, <?php echo $date; ?></span>
						</div>
						<div class="video-link">
							<a class="link lightbox-image" <?php echo $this->get_render_attribute_string( 'video_link' ); ?>
								>
								<?php
								\Elementor\Icons_Manager::render_icon(
									( $video_icon ),
									array(
										'aria-hidden' => 'true',
										'class'       => 'icon',
									)
								);
								?>
								<span class="txt"><?php echo $video_title; ?></span></a>
						</div>
					</div>
				</div>

				<div class="image-col col-xl-7 col-lg-6 col-md-12 col-sm-12">
					<div class="images">
						<div class="row clearfix">
							<?php
								$count = 1;
							foreach ( $settings['items'] as $item ) {
								$item_title = $item['item_title'];

								$item_image = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
								if ( ! empty( $item_image ) ) {
									$this->add_render_attribute( 'item_image', 'src', $item_image );
									$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_image'] ) );
									$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_image'] ) );
									$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_image' );

								}

								if ( $count <= 2 ) {
									?>


							<div class="image col-md-6 col-sm-12">
								<a class="lightbox-image" data-fancybox="about-gallery"
									href="<?php echo $item_image; ?>">
													 <?php
														if ( $item_image != '' ) {
															echo $item_image_image_html; }
														?>
									</a>

							</div>
							<?php } else { ?>
							<div class="image col-md-4 col-sm-12">
								<a class="lightbox-image" data-fancybox="about-gallery"
									href="<?php echo $item_image; ?>">
													 <?php
														if ( $item_image != '' ) {
															echo $item_image_image_html; }
														?>
									</a>

							</div>
									<?php
							}

										$count++;}
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
Plugin::instance()->widgets_manager->register( new \Welcome_Two() );
