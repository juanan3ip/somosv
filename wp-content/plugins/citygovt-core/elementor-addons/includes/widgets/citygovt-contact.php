<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Contact extends Widget_Base {

	public function get_name() {
		return 'contact';
	}

	public function get_title() {
		return esc_html__( 'CityGovt Contact', 'citygovt-core' );
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
				'label' => esc_html__( 'Left Content', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'image_1',
			array(
				'label'   => esc_html__( 'Image 1', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'image_2',
			array(
				'label'   => esc_html__( 'Image 2', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Quick contact', 'citygovt-core' ),
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
			'item_sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Call on', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_contact',
			array(
				'label'       => esc_html__( 'Contact', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '+44 888 12 345', 'citygovt-core' ),
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
			'right_content',
			array(
				'label' => esc_html__( 'Right Content', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'contact_title',
			array(
				'label'       => esc_html__( 'Contact Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'We’re Here to Help You', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Shoot us a message if you have any question, we’re here to help!.', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);
		$this->add_control(
			'cf7',
			array(
				'label'       => esc_html__( 'Select Contact Form', 'uaquescore' ),
				'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'uaquescore' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'label_block' => 1,
				'options'     => city_govt_get_contact_form_7_posts(),
			)
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$image_1 = ( $settings['image_1']['id'] != '' ) ? wp_get_attachment_url( $settings['image_1']['id'], 'full' ) : $settings['image_1']['url'];

		if ( ! empty( $image_1 ) ) {
			$this->add_render_attribute( 'image_1', 'src', $image_1 );
			$this->add_render_attribute( 'image_1', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image_1'] ) );
			$this->add_render_attribute( 'image_1', 'title', \Elementor\Control_Media::get_image_title( $settings['image_1'] ) );
			$image_1_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image_1' );

		}

		 $image_2 = ( $settings['image_2']['id'] != '' ) ? wp_get_attachment_url( $settings['image_2']['id'], 'full' ) : $settings['image_2']['url'];

		if ( ! empty( $image_2 ) ) {
			$this->add_render_attribute( 'image_2', 'src', $image_2 );
			$this->add_render_attribute( 'image_2', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image_2'] ) );
			$this->add_render_attribute( 'image_2', 'title', \Elementor\Control_Media::get_image_title( $settings['image_2'] ) );
			$image_2_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image_2' );

		}

		$contact_title = $settings['contact_title'];
		$sub_title     = $settings['sub_title']; 
		?>
		<section class="contact-section">
			<div class="auto-container">
				<div class="row clearfix">
					<div class="left-col col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box">
							<div class="images clearfix">
							<?php if ( $image_1 != '' ) { ?>
								<figure class="image"><?php echo $image_1_image_html; ?></figure>
							<?php } ?>
							<?php if ( $image_2 != '' ) { ?>
								<figure class="image"><?php echo $image_2_image_html; ?></figure>
								<?php } ?>
							</div>
							<div class="contact-info-box">
								<div class="inner">
									<ul class="info">
										<?php
										$count = 1;
										foreach ( $settings['items'] as $item ) {
											$item_title     = $item['item_title'];
											$item_icon      = $item['item_icon'];
											$item_sub_title = $item['item_sub_title'];
											$item_contact   = $item['item_contact'];
											?>
											<?php
											if ( $count == '1' ) {
												?>
										<li class="clearfix">
											<h4><?php echo $item_title; ?></h4>
											<div class="content">
												<?php
												\Elementor\Icons_Manager::render_icon(
													( $item_icon ),
													array(
														'aria-hidden' => 'true',
														'class' => 'icon',
													)
												);
												?>
												<span><?php echo $item_sub_title; ?></span><br>
												<a class="txt"
													href="tel:<?php echo $item_contact; ?>"><?php echo $item_contact; ?></a>
											</div>
										</li>
										<?php } elseif ( $count == '2' ) { ?>
										<li class="clearfix">
											<h4><?php echo $item_title; ?></h4>
											<div class="content">
												<?php
												\Elementor\Icons_Manager::render_icon(
													( $item_icon ),
													array(
														'aria-hidden' => 'true',
														'class' => 'icon',
													)
												);
												?>
												<span><?php echo $item_sub_title; ?></span><br>
												<a class="txt"
													href="mailto:<?php echo $item_contact; ?>"><?php echo $item_contact; ?></a>
											</div>
										</li>
										<?php } else { ?>
										<li class="clearfix">
											<h4><?php echo $item_title; ?></h4>
											<div class="content">
												<?php
												\Elementor\Icons_Manager::render_icon(
													( $item_icon ),
													array(
														'aria-hidden' => 'true',
														'class' => 'icon',
													)
												);
												?>
												<span class="txt"><?php echo $item_contact; ?></span>
											</div>
										</li>
										<?php } $count++;} ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="right-col col-lg-6 col-md-12 col-sm-12">
						<div class="inner">
							<div class="sec-title with-separator">
								<h2><?php echo $contact_title; ?></h2>
								<div class="separator">
									<span class="cir c-1"></span>
									<span class="cir c-2"></span>
									<span class="cir c-3"></span>
								</div>
								<div class="lower-text"><?php echo $sub_title; ?></div>
							</div>
							<div class="default-form form-box">
								<?php
								static $v_veriable = 0;
								$settings = $this->get_settings();
								if ( ! empty( $settings['cf7'] ) ) {
									echo '<div class="elementor-shortcode yachercore-cf7-' . $v_veriable . '">';
									echo do_shortcode( '[contact-form-7 id="' . $settings['cf7'] . '"]' );
									echo '</div>';
								}

								if ( ! empty( $settings['cf7_redirect_page'] ) || ! empty( $settings['cf7_redirect_external'] ) ) { ?>
								<script>
								var theform = document.querySelector('.citygovtcore-cf7-<?php echo $v_veriable; ?>');
								theform.addEventListener('wpcf7mailsent', function(event) {
									location = ' <?php
									if (!empty($settings['cf7_redirect_external'])) {
										echo $settings['cf7_redirect_external'];
									} else {
										echo get_permalink($settings['cf7_redirect_page']);
									} ?>
									';
								}, false);
								</script>
								<?php
								$v_veriable++;
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Contact() );
