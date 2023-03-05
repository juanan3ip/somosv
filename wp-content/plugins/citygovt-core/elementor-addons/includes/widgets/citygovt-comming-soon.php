<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Comming_Soon extends Widget_Base {

	public function get_name() {
		return 'comming_soon';
	}

	public function get_title() {
		return esc_html__( 'Comming Soon', 'citygovt-core' );
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
			'logo_image',
			array(
				'label'   => esc_html__( 'Logo Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'page_link',
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

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Christmas Celebration', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'countdown_date',
			array(
				'label'   => esc_html__( 'CountDown Date', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '2020/3/17', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'comming_cf7',
			array(
				'label'       => esc_html__( 'Select Contact Form', 'citygovt-core' ),
				'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'citygovt-core' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'label_block' => 1,
				'options'     => city_govt_get_contact_form_7_posts(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'social',
			array(
				'label' => esc_html__( 'Social', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'facebook_link',
			array(
				'label'         => esc_html__( 'Facebook Link', 'citygovt-core' ),
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
			'twitter_link',
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

		$this->add_control(
			'linkedin_link',
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

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];

		$logo_image = ( $settings['logo_image']['id'] != '' ) ? wp_get_attachment_url( $settings['logo_image']['id'], 'full' ) : $settings['logo_image']['url'];

		if ( ! empty( $logo_image ) ) {
			$this->add_render_attribute( 'logo_image', 'src', $logo_image );
			$this->add_render_attribute( 'logo_image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['logo_image'] ) );
			$this->add_render_attribute( 'logo_image', 'title', \Elementor\Control_Media::get_image_title( $settings['logo_image'] ) );
			$logo_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'logo_image' );

		}

		$page_link = $settings['page_link']['url'];
		if ( ! empty( $page_link ) ) {
			$this->add_render_attribute( 'page_link', 'href', $page_link );
			$this->add_render_attribute( 'page_link', 'class', '' );
			if ( $settings['page_link']['is_external'] ) {
				$this->add_render_attribute( 'page_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['page_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'page_link', 'rel', 'nofollow' );
			}
		}
		$title          = $settings['title'];
		$countdown_date = $settings['countdown_date'];
		$facebook_link  = $settings['facebook_link']['url'];
		if ( ! empty( $facebook_link ) ) {
			$this->add_render_attribute( 'facebook_link', 'href', $facebook_link );
			$this->add_render_attribute( 'facebook_link', 'class', '' );
			if ( $settings['facebook_link']['is_external'] ) {
				$this->add_render_attribute( 'facebook_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['facebook_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'facebook_link', 'rel', 'nofollow' );
			}
		}
		$twitter_link = $settings['twitter_link']['url'];
		if ( ! empty( $twitter_link ) ) {
							$this->add_render_attribute( 'twitter_link', 'href', $twitter_link );
							$this->add_render_attribute( 'twitter_link', 'class', '' );
			if ( $settings['twitter_link']['is_external'] ) {
				$this->add_render_attribute( 'twitter_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['twitter_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'twitter_link', 'rel', 'nofollow' );
			}
		}
		$linkedin_link = $settings['linkedin_link']['url'];
		if ( ! empty( $linkedin_link ) ) {
												$this->add_render_attribute( 'linkedin_link', 'href', $linkedin_link );
												$this->add_render_attribute( 'linkedin_link', 'class', '' );
			if ( $settings['linkedin_link']['is_external'] ) {
				$this->add_render_attribute( 'linkedin_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['linkedin_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'linkedin_link', 'rel', 'nofollow' );
			}
		} ?>
<section class="comming-soon" style="background-image:url(<?php echo esc_url( $bg_image ); ?>)">
	<div class="outer-container">
		<div class="content">
			<div class="content-inner">
				<div class="auto-container">
					<div class="logo-box">
						<div class="logo"><a
								<?php echo $this->get_render_attribute_string( 'page_link' ); ?>>
									<?php
									if ( $logo_image != '' ) {
										echo $logo_image_image_html;}
									?>
								</a>
						</div>
					</div>
					<h1><?php echo $title; ?></h1>
					<div class="time-counter">
						<div class="time-countdown clearfix" data-countdown="<?php echo $countdown_date; ?>"></div>
					</div>
					<div class="newsletter-form">
						<?php

						static $v_veriable = 0;

						$settings = $this->get_settings();
						if ( ! empty( $settings['comming_cf7'] ) ) {
							echo '<div class="elementor-shortcode yachercore-comming_cf7-' . $v_veriable . '">';
							echo do_shortcode( '[contact-form-7 id="' . $settings['comming_cf7'] . '"]' );
							echo '</div>';
						}

						if ( ! empty( $settings['comming_cf7_redirect_page'] ) || ! empty( $settings['comming_cf7_redirect_external'] ) ) {
							?>
						<script>
						var theform = document.querySelector('.yachercore-comming_cf7-<?php echo $v_veriable; ?>');
						theform.addEventListener('wpcomming_cf7mailsent', function(event) {
							location = '<?php
							if (!empty($settings['comming_cf7_redirect_external'])) {
								echo $settings['comming_cf7_redirect_external'];
							} else {
								echo get_permalink($settings['comming_cf7_redirect_page']);
							} ?>
							';
						}, false);
						</script>
							<?php
							$v_veriable++;
						}

						?>
						<div class="instruction"><span>*</span> <?php echo esc_html( 'Subscribe us and get updates to your inbox.', 'citygovt-core' ); ?></div>
					</div>

					<div class="social-links">
						<ul class="clearfix">
							<li><a <?php echo $this->get_render_attribute_string( 'facebook_link' ); ?>><span
										class="fab fa-facebook-f"></span></a></li>
							<li><a <?php echo $this->get_render_attribute_string( 'twitter_link' ); ?>><span
										class="fab fa-twitter"></span></a></li>
							<li><a <?php echo $this->get_render_attribute_string( 'linkedin_link' ); ?>><span
										class="fab fa-linkedin-in"></span></a></li>
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

Plugin::instance()->widgets_manager->register( new \Comming_Soon() );
