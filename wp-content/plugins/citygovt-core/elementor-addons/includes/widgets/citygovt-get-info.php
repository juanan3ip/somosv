<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class CityGovt_Info extends Widget_Base {

	public function get_name() {
		return 'citygovt_get_info';
	}

	public function get_title() {
		return esc_html__( 'CityGovt Get Info', 'citygovt-core' );
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
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'The Freedom of Information', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'More Answers', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'button_link',
			array(
				'label'         => esc_html__( 'Button Link', 'citygovt-core' ),
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
				'default' => __( 'Complaint about road parking?', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __(
					'Pleasure and praising pain was born and i will give you a complete
                                        account of the system actual teachings.',
					'citygovt-core'
				),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

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
		$button_title = $settings['button_title'];
		$button_link  = $settings['button_link']['url'];
		if ( ! empty( $button_link ) ) {
						  $this->add_render_attribute( 'button_link', 'href', $button_link );
			if ( $settings['button_link']['is_external'] ) {
					$this->add_render_attribute( 'button_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['button_link']['nofollow'] ) ) {
				  $this->add_render_attribute( 'button_link', 'rel', 'nofollow' );
			}
		} ?>
<section class="get-info-section">
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
		</div>
		<div class="row clearfix">
			<div class="left-col col-lg-6 col-md-12 col-sm-12">
				<div class="inner">
					<div class="accordion-box">
						<?php
						$i = 0;
						foreach ( $settings['items'] as $item ) {
							$activeClass   = '';
							$current_block = '';

							if ( $i == 0 ) {
								$activeClass   = 'active';
								$current_block = 'current active-block';
							}
							$item_title   = $item['item_title'];
							$item_content = $item['item_content'];
							?>
						<div class="accordion block <?php echo $current_block; ?>">
							<div class="acc-btn <?php echo $activeClass; ?>"><?php echo $item_title; ?><div class="icon flaticon-cross">
								</div>
							</div>
							<div class="acc-content">
								<div class="content">
									<div class="text"><?php echo $item_content; ?></div>
								</div>
							</div>
						</div> <?php $i++;} ?>

					</div>
				</div>
			</div>

			<div class="right-col col-lg-6 col-md-12 col-sm-12">
				<div class="inner">
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

		<div class="see-more">
			<a class="theme-btn btn-style-three"
				<?php echo $this->get_render_attribute_string( 'button_link' ); ?>><span
					class="btn-title"><?php echo $button_title; ?></span></a>
		</div>

	</div>
</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \CityGovt_Info() );
