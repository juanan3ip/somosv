<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Team extends Widget_Base {

	public function get_name() {
		return 'citygovtteam';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Team', 'citygovt-core' );
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
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Meet Council Members', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __(
					'Denounce with righteous indignation and dislike men who are so beguiled &
                demoralized our power of choice.',
					'citygovt-core'
				),
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
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Get Touch With Me', 'citygovt-core' ),
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
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);

		$repeater->add_control(
			'item_name',
			array(
				'label'   => esc_html__( 'Name', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Bertram Irvin', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_designation',
			array(
				'label'   => esc_html__( 'Designation', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'CEO & Founder', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'item_page_link',
			array(
				'label'         => esc_html__( 'Page Link', 'citygovt-core' ),
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
			'item_facbook_link',
			array(
				'label'         => esc_html__( 'Facbook Link', 'citygovt-core' ),
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
			'item_twitter_link',
			array(
				'label'         => esc_html__( 'Twitter Link', 'citygovt-core' ),
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
			'item_linkedin_link',
			array(
				'label'         => esc_html__( 'Linkedin Link', 'citygovt-core' ),
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
			'item_phone_number',
			array(
				'label'   => esc_html__( 'Phone Number', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '+44 800 123 45', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_email',
			array(
				'label'   => esc_html__( 'Email', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'elvina@citygov.com', 'citygovt-core' ),
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
			$style3 = 'alternate';

		} else {
			$style3 = '';
		}

		?>
		<?php if ( $layout_style == '1' || $layout_style == '2' ) { ?>
		<section class="team-section <?php echo $style3; ?>">
			<div class="auto-container">
				<div class="sec-title with-separator centered">
					<h2><?php echo $title; ?></h2>
					<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
							class="cir c-3"></span></div>
					<div class="lower-text"><?php echo $content; ?></div>
				</div>
				<div class="team-carousel owl-theme owl-carousel">
					<!--Team Block-->
					<?php
					foreach ( $settings['items'] as $item ) {
						$item_icon  = $item['item_icon'];
						$item_title = $item['item_title'];
						$item_image = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
						if ( ! empty( $item_image ) ) {
							$this->add_render_attribute( 'item_image', 'src', $item_image );
							$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_image'] ) );
							$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_image'] ) );
							$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_image' );
						}

						$item_name        = $item['item_name'];
						$item_designation = $item['item_designation'];

						$item_page_link     = $item['item_page_link'];

						$item_facbook_link     = $item['item_facbook_link'];
						$item_facbook_target   = $item['item_facbook_link']['is_external'] ? ' target="_blank"' : '';
						$item_facbook_nofollow = $item['item_facbook_link']['nofollow'] ? ' rel="nofollow"' : '';

						$item_twitter_link     = $item['item_twitter_link'];
						$item_twitter_target   = $item['item_twitter_link']['is_external'] ? ' target="_blank"' : '';
						$item_twitter_nofollow = $item['item_twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

						$item_phone_number = $item['item_phone_number'];

						$item_email = $item['item_email'];

						$item_linkedin_link     = $item['item_linkedin_link'];
						$item_linkedin_target   = $item['item_linkedin_link']['is_external'] ? ' target="_blank"' : '';
						$item_linkedin_nofollow = $item['item_linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
						?>
					<div class="team-block">
						<div class="inner-box">
							<div class="image-box">
								<figure class="image">
								<?php
								if ( $item_image != '' ) {
									echo $item_image_image_html; }
								?>
								</figure>
								<div class="hover-box">
									<div class="hover-inner">
										<div class="hover-upper">
											<div class="icon-box">
												<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
											</div>
											<h6><?php echo $item_title; ?></h6>
										</div>
										<div class="hover-lower">
											<ul class="info">
												<li><a href="tel:<?php echo str_replace( ' ', '', $item_phone_number ); ?>"><?php echo $item_phone_number; ?></a></li>
												<li><a href="mailto:<?php echo esc_attr( $item_email ); ?>"><?php echo $item_email; ?></a></li>
											</ul>
											<ul class="social-links clearfix">
												<li><a href="<?php echo esc_url( $item_facbook_link['url'] ); ?>"
														<?php echo $item_facbook_target . ' ' . $item_facbook_nofollow; ?>><span
															class="fab fa-facebook-f"></span></a></li>
												<li><a href="<?php echo esc_url( $item_twitter_link['url'] ); ?>"
														<?php echo $item_twitter_target . ' ' . $item_twitter_nofollow; ?>><span
															class="fab fa-twitter"></span></a></li>
												<li><a href="<?php echo esc_url( $item_linkedin_link['url'] ); ?>"
														<?php echo $item_linkedin_target . ' ' . $item_linkedin_nofollow; ?>><span
															class="fab fa-linkedin-in"></span></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="lower-box">
								<h4><a href="<?php echo esc_url( $item_page_link['url'] ); ?>"
										<?php echo $this->get_render_attribute_string( 'item_page_link' ); ?>><?php echo $item_name; ?></a>
								</h4>
								<div class="designation"><?php echo $item_designation; ?></div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php }
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Team() );
