<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;


class Service_Three extends Widget_Base {


	public function get_name() {
		return 'service_three';
	}

	public function get_title() {
		return esc_html__( 'Service Three', 'citygovt-core' );
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
				'label' => esc_html__( 'Service Three', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'item_bg_image',
			array(
				'label'   => esc_html__( 'BG Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Service', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'item_sub_title',
			array(
				'label'   => esc_html__( 'Sub Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'For Residents', 'citygovt-core' ),
			)
		);

		$this->add_control(
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
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

			)
		);
		$this->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Foresee the pain and trouble that are bound to ensue;and equal.', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_page_title',
			array(
				'label'   => esc_html__( 'Page Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Healthcare', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_page_link',
			array(
				'label'         => esc_html__( 'Page Link ', 'citygovt-core' ),
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

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$item_bg_image = ( $settings['item_bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['item_bg_image']['id'], 'full' ) : $settings['item_bg_image']['url'];

		$item_title      = $settings['item_title'];
		$item_sub_title  = $settings['item_sub_title'];
		$item_title_link = $settings['item_title_link']['url'];
		if ( ! empty( $item_title_link ) ) {
			$this->add_render_attribute( 'item_title_link', 'href', $item_title_link );
			$this->add_render_attribute( 'item_title_link', 'class', '' );
			if ( $settings['item_title_link']['is_external'] ) {
				$this->add_render_attribute( 'item_item_title_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['item_title_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'item_item_title_link', 'rel', 'nofollow' );
			}
		}
		$item_icon    = $settings['item_icon'];
		$item_content = $settings['item_content'];
		?>
		
<section class="services-section-three service-padding-content">
	<div class="auto-container">
	
		<div class="row clearfix">
			<div class="featured-block-six">
				<div class="inner-box">
					<div class="content-box">
						<div class="image-layer" style="background-image: url(<?php echo $item_bg_image; ?>);">
						</div>
						<div class="content">
							<div class="icon-box">
								<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
							</div>
							<div class="subtitle"><?php echo $item_title; ?></div>
							<h4><a href="#"><?php echo $item_sub_title; ?></a></h4>
						</div>
						<div class="text"><?php echo $item_content; ?></div>
					</div>
					<div class="hvr-dropdown">
						<ul>
		<?php
		foreach ( $settings['items1'] as $item ) {

			$item_page_title = $item['item_page_title'];

			$item_page_link     = $item['item_page_link'];
			$item_page_target   = $item['item_page_link']['is_external'] ? ' target="_blank"' : '';
			$item_page_nofollow = $item['item_page_link']['nofollow'] ? ' rel="nofollow"' : '';

			?>
							<li><a href="<?php echo esc_url( $item_page_link['url'] ); ?>"
			<?php echo $item_page_target . ' ' . $item_page_nofollow; ?>><?php echo $item_page_title; ?></a>
							</li>
		<?php } ?>
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

Plugin::instance()->widgets_manager->register( new \Service_Three() );
