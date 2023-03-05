<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class TeamMemberForm extends Widget_Base {

	public function get_name() {
		return 'TeamMemberForm';
	}

	public function get_title() {
		return esc_html__( 'Team Member Form', 'citygovt-core' );
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
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'We’re Here to Help You', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'desc',
			array(
				'label'   => esc_html__( 'Sub Heading', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Shoot us a message if you have any question, we’re here to help!.', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'cf722',
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

		$heading = $settings['heading'];
		$desc    = $settings['desc'];
		?>
		<div class="contact_form_outer">
			<div class="row">
				<div class=" col-lg-12 col-md-12 col-sm-12">
					<div class="inner">
						<div class="sec-title with-separator centered">
							<h2><?php echo $heading; ?></h2>
							<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
							<div class="lower-text"><?php echo $desc; ?></div>
						</div>
						<div class="default-form form-box">
						<?php
						static $v_veriable = 0;
						$settings          = $this->get_settings();
						if ( ! empty( $settings['cf722'] ) ) {
							echo '<div class="elementor-shortcode yachercore-cf722-' . $v_veriable . '">';
							echo do_shortcode( '[contact-form-7 id="' . $settings['cf722'] . '"]' );
							echo '</div>';
						}

						if ( ! empty( $settings['cf722_redirect_page'] ) || ! empty( $settings['cf722_redirect_external'] ) ) {
							?>
						<script>
						var theform = document.querySelector('.yachercore-cf722-<?php echo $v_veriable; ?>');
						theform.addEventListener('wpcf722mailsent', function(event) {
							location = ' 
							<?php
							if ( ! empty( $settings['cf722_redirect_external'] ) ) {
								echo $settings['cf722_redirect_external'];
							} else {
								echo get_permalink( $settings['cf722_redirect_page'] );
							}
							?>
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
		<?php
	}
}
Plugin::instance()->widgets_manager->register( new \TeamMemberForm() );
