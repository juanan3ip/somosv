<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_About extends Widget_Base {

	public function get_name() {
		return 'citygovt_about';
	}

	public function get_title() {
		return esc_html__( 'Citygovt About', 'citygovt-core' );
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
				'default' => __( 'The Major Voice of <br>City Government, London', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'picture',
			array(
				'label'   => esc_html__( 'Picture', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$this->add_control(
			'video_url',
			array(
				'label' => esc_html__( 'Video URL', 'citygovt-core' ),
				'type'  => Controls_Manager::URL,
			)
		);
		$this->add_control(
			'upper_content',
			array(
				'label'       => esc_html__( 'Upper Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'lower_content',
			array(
				'label'       => esc_html__( 'Lower Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'signature',
			array(
				'label'   => esc_html__( 'Signature', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
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
				'default' => __( 'London city mayor', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'hover_quote_text',
			array(
				'label'   => esc_html__( 'Hover Quote Text', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'My highest priority is keeping Londoners safe from harm', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'btn_url',
			array(
				'label' => esc_html__( 'Button URL', 'citygovt-core' ),
				'type'  => Controls_Manager::URL,
			)
		);
		$this->add_control(
			'btn_text',
			array(
				'label'   => esc_html__( 'Button Text', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Learn More', 'citygovt-core' ),
			)
		);
		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$bg_image_1 = ( $settings['bg_image_1']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_1']['id'], 'full' ) : $settings['bg_image_1']['url'];
		$bg_image_2 = ( $settings['bg_image_2']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_2']['id'], 'full' ) : $settings['bg_image_2']['url'];

		$title         = $settings['title'];
		$picture       = ( $settings['picture']['id'] != '' ) ? wp_get_attachment_url( $settings['picture']['id'], 'full' ) : $settings['picture']['url'];
		$video_url     = $settings['video_url']['url'];
		$upper_content = $settings['upper_content'];
		$lower_content = $settings['lower_content'];
		$content       = $settings['content'];

		$signature = ( $settings['signature']['id'] != '' ) ? wp_get_attachment_url( $settings['signature']['id'], 'full' ) : $settings['signature']['url'];
		if ( ! empty( $signature ) ) {
			$this->add_render_attribute( 'signature', 'src', $signature );
			$this->add_render_attribute( 'signature', 'alt', \Elementor\Control_Media::get_image_alt( $settings['signature'] ) );
			$this->add_render_attribute( 'signature', 'title', \Elementor\Control_Media::get_image_title( $settings['signature'] ) );
			$signature_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'signature' );

		}

		$name             = $settings['name'];
		$designation      = $settings['designation'];
		$hover_quote_text = $settings['hover_quote_text'];
		$btn_url          = $settings['btn_url'];
		$btn_url_target   = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
		$btn_url_nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
		$btn_text         = $settings['btn_text'];

		?>
<section class="about-section">
	<div class="image-layer" style="background-image: url(<?php echo esc_url( $bg_image_1 ); ?>);"></div>
	<div class="pattern-layer" style="background-image: url(<?php echo esc_url( $bg_image_2 ); ?>);"></div>
	<div class="auto-container">
		<div class="content-box">
			<div class="content">
				<div class="sec-title light">
					<h2><?php echo $title; ?></h2>
				</div>
				<div class="content_box clearfix">
					<div class="image_box">
						<img src="<?php echo esc_url( $picture ); ?>" class="img-fluid" alt="amg">
						<div class="icon-box">
							<a href="<?php echo esc_url( $video_url ); ?>" class="over-link lightbox-image"><span class="flaticon-play"></span></a>
						</div>
					</div>
					<div class="text_box">
						<div class="upper-text ">
						<?php echo $upper_content; ?>
						</div>
						<div class="text"><?php echo $lower_content; ?></div>
					</div>
				</div>
				<div class="text"><?php echo $content; ?></div>
				<div class="authour_box clearfix">
					<a href="<?php echo esc_url( $btn_url['url'] ); ?>"  <?php echo $btn_url_target . ' ' . $btn_url_nofollow; ?> class="theme-btn btn-style-one left_float"><span class="btn-title"><?php echo esc_html( $btn_text ); ?></span></a>
					<div class="info left_float">
						<div class="name"><?php echo $name; ?></div>
						<div class="designation"><?php echo $designation; ?></div>
					</div>
					<div class="signature left_float">
						<?php
						if ( $signature != '' ) {
							echo $signature_image_html;
						}
						?>
					</div>
				</div>
			</div>
			<div class="quote-box">
				<div class="round-point">+</div>
				<div class="inner">
					<div class="icon-one"><span class="flaticon-left-quote"></span></div>
					<div class="icon-two"><span class="flaticon-left-quote"></span></div>
					<div class="text"><?php echo $hover_quote_text; ?></div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
}
Plugin::instance()->widgets_manager->register( new \Citygovt_About() );
