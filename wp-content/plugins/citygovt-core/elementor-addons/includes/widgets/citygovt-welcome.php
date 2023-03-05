<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_Welcome extends Widget_Base {

	public function get_name() {
		return 'citygovt_welcome';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Welcome', 'citygovt-core' );
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
			'carousel_onoff',
			array(
				'label'        => esc_html__( 'Carousel On Off', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array( 'layout_style' => '1' ),

			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'What are The Today Activities of City Govt of London ', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'We denounce with righteous indignation and dislike men who are so beguiled & demoralized', 'citygovt-core' ),
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
			'item_title',
			array(
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'In Effect', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_sub_title',
			array(
				'label'   => esc_html__( 'Sub Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Alternate side parking in effect', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_sub_title_link',
			array(
				'label'         => esc_html__( 'Sub Title LInk', 'citygovt-core' ),
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
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);

		$repeater->add_control(
			'item_hover_bg_image',
			array(
				'label'   => esc_html__( 'Hover Bg Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_hover_title',
			array(
				'label'   => esc_html__( 'Hover Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Alternate side parking in effect', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'item_hover_title_link',
			array(
				'label'         => esc_html__( 'Hover Title Link', 'citygovt-core' ),
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
			'item_hover_content',
			array(
				'label'       => esc_html__( 'Hover Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'These cases are perfectly simple and easy work to distinguish', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'item_hover_icon_link',
			array(
				'label'         => esc_html__( 'Hover Icon Link', 'citygovt-core' ),
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
			'vertical',
			array(
				'label' => esc_html__( 'Vertical Item', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'contact_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Helplines and <br>emergency services', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title_1',
			array(
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'In Effect', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'contact',
			array(
				'label'       => esc_html__( 'Contact Text', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '+44 888 12 345', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_icon_1',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);

		$this->add_control(
			'items2',
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
		$settings       = $this->get_settings_for_display();
		$title          = $settings['title'];
		$content        = $settings['content'];
		$layout_style   = $settings['layout_style'];
		$carousel_onoff = $settings['carousel_onoff'];

		if ( $layout_style == '2' ) {

			$contact_title = $settings['contact_title'];
		}

		?>
		<?php if ( $layout_style == '1' ) { ?>
<section class="welcome-section">
	<div class="auto-container">
		<div class="sec-title centered">
			<h2><?php echo $title; ?> </h2>
			<div class="lower-text"><?php echo $content; ?>
			</div>
		</div>
			<?php
			if ( $carousel_onoff != 'yes' ) {
					$col = 'col-md-4';
				?>
		<div class="row ">
				<?php
			} else {
				$col = '';
				?>
		<div class="three_items owl-theme owl-carousel">
			<?php } ?>
			<!--Feature Block-->
			<?php
			foreach ( $settings['items'] as $item ) {
				$item_title     = $item['item_title'];
				$item_sub_title = $item['item_sub_title'];

				$item_hover_title_link     = $item['item_hover_title_link'];
				$item_hover_title_target   = $item['item_hover_title_link']['is_external'] ? ' target="_blank"' : '';
				$item_hover_title_nofollow = $item['item_hover_title_link']['nofollow'] ? ' rel="nofollow"' : '';

				$item_sub_title_link     = $item['item_sub_title_link'];
				$item_sub_title_target   = $item['item_sub_title_link']['is_external'] ? ' target="_blank"' : '';
				$item_sub_title_nofollow = $item['item_sub_title_link']['nofollow'] ? ' rel="nofollow"' : '';

				$item_icon = $item['item_icon'];

				$item_hover_bg_image = ( $item['item_hover_bg_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_hover_bg_image']['id'], 'full' ) : $item['item_hover_bg_image']['url'];

				$item_hover_title   = $item['item_hover_title'];
				$item_hover_content = $item['item_hover_content'];

				$item_hover_icon_link     = $item['item_hover_icon_link'];
				$item_hover_icon_target   = $item['item_hover_icon_link']['is_external'] ? ' target="_blank"' : '';
				$item_hover_icon_nofollow = $item['item_hover_icon_link']['nofollow'] ? ' rel="nofollow"' : '';

				?>
			<div class="featured-block <?php echo $col; ?>">
				<div class="inner-box">
					<div class="content-box">
						<div class="icon-box">
							<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
						</div>
						<div class="content">
							<div class="subtitle"><?php echo $item_title; ?></div>
							<h4><a href="<?php echo esc_url( $item_sub_title_link['url'] ); ?>"
									<?php echo $item_sub_title_target . ' ' . $item_sub_title_nofollow; ?>><?php echo $item_sub_title; ?></a>
							</h4>
						</div>
					</div>
					<div class="hover-box">
						<div class="image-layer" style="background-image: url(<?php echo $item_hover_bg_image; ?>);">
						</div>
						<div class="inner">
							<h4><a href="<?php echo esc_url( $item_hover_title_link['url'] ); ?>"
									<?php echo $item_hover_title_target . ' ' . $item_hover_title_nofollow; ?>><?php echo $item_hover_title; ?></a>
							</h4>
							<div class="text"><?php echo $item_hover_content; ?></div>
						</div>
					</div>
					<div class="more-link">
						<a href="<?php echo esc_url( $item_hover_icon_link['url'] ); ?>"
							<?php echo $item_hover_icon_target . ' ' . $item_hover_icon_nofollow; ?>><span
								class="flaticon-right-2"></span></a>
					</div>
				</div>
			</div> 
			<?php } ?>



		</div>
	</div>
</section>
		<?php } elseif ( $layout_style == '2' ) { ?>
<section class="welcome-section-two welcome-content-page">
	<div class="upper-row">
		<div class="auto-container">
			<div class="upper-container">
				<div class="row clearfix">

					<?php
					foreach ( $settings['items'] as $item ) {
						$item_title     = $item['item_title'];
						$item_sub_title = $item['item_sub_title'];

						$item_hover_title_link     = $item['item_hover_title_link'];
						$item_hover_title_target   = $item['item_hover_title_link']['is_external'] ? ' target="_blank"' : '';
						$item_hover_title_nofollow = $item['item_hover_title_link']['nofollow'] ? ' rel="nofollow"' : '';

						$item_sub_title_link     = $item['item_sub_title_link'];
						$item_sub_title_target   = $item['item_sub_title_link']['is_external'] ? ' target="_blank"' : '';
						$item_sub_title_nofollow = $item['item_sub_title_link']['nofollow'] ? ' rel="nofollow"' : '';

						$item_icon           = $item['item_icon'];
						$item_hover_bg_image = ( $item['item_hover_bg_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_hover_bg_image']['id'], 'full' ) : $item['item_hover_bg_image']['url'];

						$item_hover_title   = $item['item_hover_title'];
						$item_hover_content = $item['item_hover_content'];

						$item_hover_icon_link     = $item['item_hover_icon_link'];
						$item_hover_icon_target   = $item['item_hover_icon_link']['is_external'] ? ' target="_blank"' : '';
						$item_hover_icon_nofollow = $item['item_hover_icon_link']['nofollow'] ? ' rel="nofollow"' : '';

						?>

					<div class="featured-block-three col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="content-box">
								<div class="icon-box">
									<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
								</div>
								<div class="content">
									<div class="subtitle"><?php echo $item_title; ?></div>
									<h4><a href="<?php echo esc_url( $item_sub_title_link['url'] ); ?>"
											<?php echo $item_sub_title_target . ' ' . $item_sub_title_nofollow; ?>><?php echo $item_sub_title; ?></a>
									</h4>
								</div>
							</div>
							<div class="hover-box">
								<div class="inner">
									<h4><a href="<?php echo esc_url( $item_hover_title_link['url'] ); ?>"
											<?php echo $item_hover_title_target . ' ' . $item_hover_title_nofollow; ?>><?php echo $item_hover_title; ?></a>
									</h4>
									<div class="text"><?php echo $item_hover_content; ?>
									</div>
								</div>
							</div>
							<div class="more-link">
								<a href="<?php echo esc_url( $item_hover_icon_link['url'] ); ?>"
									<?php echo $item_hover_icon_target . ' ' . $item_hover_icon_nofollow; ?>><span
										class="flaticon-right-2"></span></a>
							</div>
						</div>
					</div>

					<?php } ?>

				</div>

				<div class="contact-links-box">
					<div class="inner">
						<div class="info-header">
							<h4><?php echo $contact_title; ?></h4>
						</div>
						<ul class="info">
							<?php
							$i = 1;
							foreach ( $settings['items2'] as $item ) {
								$item_title_1 = $item['item_title_1'];
								$contact      = $item['contact'];
								$item_icon_1  = $item['item_icon_1'];
								?>
							<li class="clearfix">
								<?php
								\Elementor\Icons_Manager::render_icon(
									( $item_icon_1 ),
									array(
										'aria-hidden' => 'true',
										'class'       => 'icon',
									)
								);
								?>
								<strong><?php echo $item_title_1; ?></strong>
								<?php if ( $i == '1' ) { ?>
								<a class="txt" href="tel:<?php echo $contact; ?>"><?php echo $contact; ?></a>
								<?php } else { ?>
								<a class="txt"><?php echo $contact; ?></a>
								<?php } ?>
							</li>
							<?php $i++;} ?>
						</ul>
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

Plugin::instance()->widgets_manager->register( new \Citygovt_Welcome() );
