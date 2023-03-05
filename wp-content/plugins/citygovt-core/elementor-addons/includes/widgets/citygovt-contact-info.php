<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Contact_Info extends Widget_Base {

	public function get_name() {
		return 'contact_info';
	}

	public function get_title() {
		return esc_html__( 'Contact Info', 'citygovt-core' );
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
				'default' => __( 'Suggestion and Complaints', 'citygovt-core' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'LN 311', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_contact_text',
			array(
				'label'       => esc_html__( 'Contact Text', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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

	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = $settings['title'];
		$content  = $settings['content'];

		$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		?>
		<section class="contact-info-section">
			<div class="image-layer" style="background-image: url(<?php echo esc_url( $bg_image ); ?>);">
			</div>
			<div class="auto-container">
				<div class="sec-title with-separator centered">
					<h2><?php echo $title; ?></h2>
					<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
							class="cir c-3"></span></div>
					<div class="lower-text"><?php echo $content; ?></div>
				</div>
				<div class="info-outer clearfix">
					<?php
					foreach ( $settings['items'] as $item ) {
						$item_icon         = $item['item_icon'];
						$item_title        = $item['item_title'];
						$item_contact_text = $item['item_contact_text'];
						?>
					<div class="info-box">
						<div class="inner">
							<div class="icon">
								<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
							</div>
							<strong><?php echo $item_title; ?></strong>
							<div class="info"><?php echo wp_kses_post( $item_contact_text ); ?></div>
						</div>
					</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Contact_Info() );
