<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Service_Two extends Widget_Base {

	public function get_name() {
		return 'service_two';
	}

	public function get_title() {
		return esc_html__( 'Service Two', 'citygovt-core' );
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
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Explore Online Services', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'item_1_switcher',
			array(
				'label'        => esc_html__( 'Switcher 1', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',

			)
		);
		$this->add_control(
			'item_2_switcher',
			array(
				'label'        => esc_html__( 'Switcher 2', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',

			)
		);
		$this->add_control(
			'item_3_switcher',
			array(
				'label'        => esc_html__( 'Switcher 3', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',

			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item22',
			array(
				'label'     => esc_html__( 'Column 1', 'citygovt-core' ),
				'condition' => array( 'item_1_switcher' => 'yes' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label' => esc_html__( 'Title', 'citygovt-core' ),
				'type'  => Controls_Manager::TEXT,

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

		$this->add_control(
			'items1',
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
			'middle_content',
			array(
				'label'     => esc_html__( 'Column 2', 'citygovt-core' ),
				'condition' => array( 'item_2_switcher' => 'yes' ),
			)
		);

		$this->add_control(
			'item_title1',
			array(
				'label' => esc_html__( 'Title', 'citygovt-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
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
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);

		$this->add_control(
			'item_youtube_link',
			array(
				'label'         => esc_html__( 'Youtube Link', 'citygovt-core' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'item33',
			array(
				'label'     => esc_html__( 'Column 3', 'citygovt-core' ),
				'condition' => array( 'item_3_switcher' => 'yes' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title_1',
			array(
				'label' => esc_html__( 'Title', 'citygovt-core' ),
				'type'  => Controls_Manager::TEXT,
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
			'items_3',
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

		$item_title1 = $settings['item_title1'];

		$item_1_switcher = $settings['item_1_switcher'];
		$item_2_switcher = $settings['item_2_switcher'];
		$item_3_switcher = $settings['item_3_switcher'];

		$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];

		$title = $settings['title'];
		?>

		<?php

		$item_image = ( $settings['item_image']['id'] != '' ) ? wp_get_attachment_url( $settings['item_image']['id'], 'full' ) : $settings['item_image']['url'];
		if ( ! empty( $item_image ) ) {
			$this->add_render_attribute( 'item_image', 'src', $item_image );
			$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['item_image'] ) );
			$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $settings['item_image'] ) );
			$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'item_image' );

		}
				$item_image_id = $settings['item_image']['id'];
				$item_icon     = $settings['item_icon'];

				$item_youtube_title_link     = $settings['item_youtube_link'];
				$item_youtube_title_target   = $settings['item_youtube_link']['is_external'] ? ' target="_blank"' : '';
				$item_youtube_title_nofollow = $settings['item_youtube_link']['nofollow'] ? ' rel="nofollow"' : '';

		?>
<section class="services-section-two">
	<div class="image-layer" style="background-image: url(<?php echo $bg_image; ?>);"></div>
	<div class="auto-container">
		<div class="sec-title light with-separator centered">
			<h2><?php echo $title; ?></h2>
			<div class="separator">
				<span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span>
			</div>
		</div>

		<div class="outer clearfix">
			<?php if ( $item_1_switcher == 'yes' ) : ?>
			<div class="column nav-column">
				<div class="inner">
					<ul>
						<?php
						foreach ( $settings['items1'] as $item ) {
							$item_title = $item['item_title'];

							$item_title_link     = $item['item_title_link'];
							$item_title_target   = $item['item_title_link']['is_external'] ? ' target="_blank"' : '';
							$item_title_nofollow = $item['item_title_link']['nofollow'] ? ' rel="nofollow"' : '';
							?>
						<li><a href="<?php echo esc_url( $item_title_link['url'] ); ?>"
								<?php echo $item_title_target . ' ' . $item_title_nofollow; ?>><?php echo $item_title; ?></a>
						</li>
						<?php } ?>

					</ul>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $item_2_switcher == 'yes' ) : ?>
			<div class="column image-column">
				<div class="inner">
					<div class="image-box">
						<figure class="image">
						<?php
						if ( $item_image != '' ) {
							echo $item_image_image_html; }
						?>
						</figure>
						<div class="over-box">
							<div class="icon-box">
								<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
							</div>
							<h4><?php echo $item_title1; ?></h4>
							
						</div>
						<a href="<?php echo esc_url( $item_youtube_title_link['url'] ); ?>"
							<?php echo $item_youtube_title_target . ' ' . $item_youtube_title_nofollow; ?>
							class="over-link lightbox-image"></a>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $item_3_switcher == 'yes' ) : ?>
			<div class="column nav-column">
				<div class="inner">
					<ul>
						<?php
						foreach ( $settings['items_3'] as $item ) {
							$item_title_1 = $item['item_title_1'];

							$item_title_link_1_link     = $item['item_title_link_1'];
							$item_title_link_1_target   = $item['item_title_link_1']['is_external'] ? ' target="_blank"' : '';
							$item_title_link_1_nofollow = $item['item_title_link_1']['nofollow'] ? ' rel="nofollow"' : '';
							?>
						<li><a href="<?php echo esc_url( $item_title_link_1_link['url'] ); ?>"
								<?php echo $item_title_link_1_target . ' ' . $item_title_link_1_nofollow; ?>><?php echo $item_title_1; ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>



		</div>
	</div>
</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Service_Two() );
