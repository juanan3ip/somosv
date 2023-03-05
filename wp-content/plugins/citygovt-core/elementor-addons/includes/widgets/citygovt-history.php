<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_History extends Widget_Base {

	public function get_name() {
		return 'citygovt_history';
	}

	public function get_title() {
		return esc_html__( 'Citygovt History', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array(
			'city-govt',
		);
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

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Most Memorable Movements', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Denounce with righteous indignation and dislike men who are so beguiled & demoralized our power of choice . ', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

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
			'item_year',
			array(
				'label'   => esc_html__( 'Year', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '1745', 'citygovt-core' ),
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
			'item_tagline',
			array(
				'label'   => esc_html__( 'Tagline', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'London City', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__( 'Description', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Blinded by desire thety cannot foresee belongs to which through shrinking which is the same as saying shrinking from toil and pain . ', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'item_header',
			array(
				'label'   => esc_html__( 'Header', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Council founded', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_header_link',
			array(
				'label'         => esc_html__( 'Header Link', 'citygovt-core' ),
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
				'label'   => esc_html__( 'Repeater list', 'citygovt-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title // 1', 'citygovt-core' ),
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

		$bg_image_1 = ( $settings['bg_image_1']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_1']['id'], 'full' ) : $settings['bg_image_1']['url'];

		$bg_image_2 = ( $settings['bg_image_2']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_2']['id'], 'full' ) : $settings['bg_image_2']['url'];

		$title   = $settings['title'];
		$content = $settings['content']; ?>
<section class="history-section">
	<div class="image-layer" style="background-image:url(<?php echo $bg_image_1; ?>);"></div>
	<div class="pattern-layer" style="background-image: url(<?php echo $bg_image_2; ?>);"></div>
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
			<div class="lower-text"><?php echo $content; ?></div>
		</div>

		<div class="history-container">
			<div class="center-line"><span class="dot upper-dot"></span><span class="dot lower-dot"></span></div>
			<div class="history-content">
				<!--Block-->
				<?php
				$total = 1;
				foreach ( $settings['items'] as $item ) {

					$item_year = $item['item_year'];

					$item_image = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
					if ( ! empty( $item_image ) ) {
						$this->add_render_attribute( 'item_image', 'src', $item_image );
						$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_image'] ) );
						$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_image'] ) );
						$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_image' );

					}

					$item_tagline     = $item['item_tagline'];
					$item_description = $item['item_description'];
					$item_header      = $item['item_header'];

					$item_header_link     = $item['item_header_link'];
					$item_header_target   = $item['item_header_link']['is_external'] ? ' target="_blank"' : '';
					$item_header_nofollow = $item['item_header_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
					<?php if ( $total % 2 > 0 ) { ?>
				<div class="history-block">
					<div class="row clearfix">
						<div class="image-col col-lg-6 col-md-12 col-sm-12">
							<div class="inner">
								<div class="year-box">
									<div class="year-inner"><span><?php echo $item_year; ?></span></div>
								</div>
								<div class="image-box">
									<figure class="image">
									<?php
									if ( $item_image != '' ) {
										echo $item_image_image_html; }
									?>
									</figure>
								</div>
							</div>
						</div>
						<div class="text-col col-lg-6 col-md-12 col-sm-12">
							<div class="inner">
								<h6><?php echo $item_tagline; ?></h6>
								<h3><a href="<?php echo esc_url( $item_header_link['url'] ); ?>"
										<?php echo $item_header_target . ' ' . $item_header_nofollow; ?>><?php echo $item_header; ?></a>
								</h3>
								<div class="text"><?php echo $item_description; ?></div>
							</div>
						</div>
					</div>
				</div>
				<?php } elseif ( $total % 2 == 0 ) { ?>

				<div class="history-block alternate">
					<div class="row clearfix">
						<div class="image-col col-lg-6 col-md-12 col-sm-12">
							<div class="inner">
								<div class="year-box">
									<div class="year-inner"><span><?php echo $item_year; ?></span></div>
								</div>
								<div class="image-box">
									<figure class="image">
									<?php
									if ( $item_image != '' ) {
										echo $item_image_image_html; }
									?>
									</figure>
								</div>
							</div>
						</div>
						<div class="text-col col-lg-6 col-md-12 col-sm-12">
							<div class="inner">
								<h6><?php echo $item_tagline; ?></h6>
								<h3><a href="<?php echo esc_url( $item_header_link['url'] ); ?>"
										<?php echo $item_header_target . ' ' . $item_header_nofollow; ?>><?php echo $item_header; ?></a></h3>
								<div class="text"><?php echo $item_description; ?></div>
							</div>
						</div>
					</div>
				</div>
						<?php

				}
				$total++;
				}
				?>


			</div>
		</div>
	</div>
</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_History() );
