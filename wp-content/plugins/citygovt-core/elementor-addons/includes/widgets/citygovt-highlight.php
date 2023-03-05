<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_Highlight extends Widget_Base {

	public function get_name() {
		return 'citygovt_highlight';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Highlight', 'citygovt-core' );
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
			'bg_image',
			array(
				'label'     => esc_html__( 'BG Image', 'citygovt-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array( 'layout_style' => '2' ),

			)
		);

		$this->add_control(
			'title',
			array(
				'label'     => esc_html__( 'Title', 'citygovt-core' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'City Highlights', 'citygovt-core' ),
				'condition' => array( 'layout_style' => '1' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'     => esc_html__( 'Content', 'citygovt-core' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows'      => 0,
				'default'   => __(
					'Denounce with righteous indignation and dislike men who are so beguiled &
                demoralized our power of choice.',
					'citygovt-core'
				),
				'condition' => array( 'layout_style' => '1' ),

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
			'item_title_1',
			array(
				'label'   => esc_html__( 'Title 1', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'The british <br>museum', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_title_2',
			array(
				'label'   => esc_html__( 'Title 2', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'The british museum', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'content2',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __(
					'We denounce with righteus dislike indignation and dislike demoralized by teh
					pleasure moment.',
					'citygovt-core'
				),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'item_count_number_1',
			array(
				'label'   => esc_html__( 'Count Number 1', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '02', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_count_number_2',
			array(
				'label'   => esc_html__( 'Count Number 2', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '02', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_title_link',
			array(
				'label'         => esc_html__( 'Title Link ', 'citygovt-core' ),
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
			'item_video_text',
			array(
				'label'   => esc_html__( 'Video Text', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Video Tour', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_video_link',
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

		$repeater->add_control(
			'item_video_icon',
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
		$title        = $settings['title'];
		$content      = $settings['content'];
		$layout_style = $settings['layout_style'];
		if ( $layout_style == '2' ) {

			$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];

		}

		?>
		<?php if ( $layout_style == '1' ) { ?>
<section class="highlights-section">
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
			<div class="lower-text"><?php echo $content; ?></div>
		</div>
		<div class="carousel-outer">

			<div class="hi-carousel owl-theme owl-carousel">

				<?php
				foreach ( $settings['items'] as $item ) {

					$item_title_1        = $item['item_title_1'];
					$item_title_2        = $item['item_title_2'];
					$item_count_number_1 = $item['item_count_number_1'];
					$item_count_number_2 = $item['item_count_number_2'];

					$item_title_link     = $item['item_title_link'];
					$item_title_target   = $item['item_title_link']['is_external'] ? ' target="_blank"' : '';
					$item_title_nofollow = $item['item_title_link']['nofollow'] ? ' rel="nofollow"' : '';

					$item_video_text = $item['item_video_text'];

					$item_video_link     = $item['item_video_link'];
					$item_video_target   = $item['item_video_link']['is_external'] ? ' target="_blank"' : '';
					$item_video_nofollow = $item['item_video_link']['nofollow'] ? ' rel="nofollow"' : '';

					$item_image = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
					if ( ! empty( $item_image ) ) {
						$this->add_render_attribute( 'item_image', 'src', $item_image );
						$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_image'] ) );
						$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_image'] ) );
						$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_image' );

					}

					$item_video_icon = $item['item_video_icon'];
					?>
				<div class="hi-block">
					<div class="inner-box">
						<div class="upper-info">
							<div class="count"><?php echo $item_count_number_1; ?></div>
							<h3><a href="<?php echo esc_url( $item_title_link['url'] ); ?>"
									<?php echo $item_title_target . ' ' . $item_title_nofollow; ?>>
									<?php echo $item_title_1; ?></a></h3>
						</div>
						<div class="image-box">
							<figure class="image"><a href="<?php echo esc_url( $item_title_link['url'] ); ?>"
									<?php echo $item_title_target . ' ' . $item_title_nofollow; ?>>
											   <?php
												if ( $item_image != '' ) {
													echo $item_image_image_html; }
												?>
									</a>
							</figure>
							<div class="image-cap clearfix">
								<h2><a href="<?php echo esc_url( $item_title_link['url'] ); ?>"><span
											class="num"><?php echo $item_count_number_2; ?></span>
										<?php echo $item_title_2; ?></a></h2>
								<div class="video-link">
									<a href="<?php echo esc_url( $item_video_link['url'] ); ?>"
										<?php echo $item_video_target . ' ' . $item_video_nofollow; ?>
										class="link lightbox-image">
										<?php
										\Elementor\Icons_Manager::render_icon(
											( $item_video_icon ),
											array(
												'aria-hidden' => 'true',
												'class' => 'icon',
											)
										);
										?>
																	<span
											class="txt"><?php echo $item_video_text; ?></span></a>
								</div>
							</div>
						</div>
					</div>
				</div> <?php } ?>

			</div>

		</div>
	</div>
</section>
		<?php } elseif ( $layout_style == '2' ) { ?>

<section class="highlights-section-two">
	<div class="image-layer" style="background-image:url(<?php echo esc_url( $bg_image ); ?>);"></div>
	<div class="auto-container">
		<div class="featured-carousel owl-theme owl-carousel">
			<!--Featured Block -->
					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {

						$item_title_1        = $item['item_title_1'];
						$item_title_2        = $item['item_title_2'];
						$content2            = $item['content2'];
						$item_count_number_1 = $item['item_count_number_1'];
						$item_title_link     = $item['item_title_link'];
						$item_title_target   = $item['item_title_link']['is_external'] ? ' target="_blank"' : '';
						$item_title_nofollow = $item['item_title_link']['nofollow'] ? ' rel="nofollow"' : '';

						$item_video_text = $item['item_video_text'];

						$item_video_link     = $item['item_video_link'];
						$item_video_target   = $item['item_video_link']['is_external'] ? ' target="_blank"' : '';
						$item_video_nofollow = $item['item_video_link']['nofollow'] ? ' rel="nofollow"' : '';

						$item_image = $item['item_image']['url'];
						if ( ! empty( $item_image ) ) {
							$this->add_render_attribute( 'item_image', 'src', $item_image );
							$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_image'] ) );
							$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_image'] ) );
							$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_image' );

						}
						$item_image_id   = $item['item_image']['id'];
						$item_video_icon = $item['item_video_icon'];
						?>

			<div class="featured-block-five">
				<div class="inner-box">
					<div class="count-box"><span><?php echo $item_count_number_1; ?></span></div>
					<div class="content">
						<div class="icon-box">
							<?php \Elementor\Icons_Manager::render_icon( ( $item_video_icon ), array( 'aria-hidden' => 'true' ) ); ?>
						</div>
						<h3><a href="<?php echo esc_url( $item_title_link['url'] ); ?>"
								<?php echo $item_title_target . ' ' . $item_title_nofollow; ?>><?php echo $item_title_1; ?></a>
						</h3>
						<div class="text"><?php echo $content2; ?></div>
						<div class="read-more"><a href="<?php echo esc_url( $item_title_link['url'] ); ?>"
								<?php echo $item_title_target . ' ' . $item_title_nofollow; ?>><span
									class="flaticon-right-2"></span></a></div>
					</div>
					<div class="bottom-text"><?php echo $i; ?>. <?php echo $item_title_2; ?></div>
				</div>
			</div>

			<?php $i++;} ?>

		</div>
	</div>
</section>

			<?php
		}
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Highlight() );
