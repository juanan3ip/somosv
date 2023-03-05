<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Department_Carosel extends Widget_Base {

	public function get_name() {
		return 'department_carosel';
	}

	public function get_title() {
		return esc_html__( 'Department Carosel', 'citygovt-core' );
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
				'default' => __( 'What We Do', 'citygovt-core' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

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
		?>
		<div class="two-col">
			<div class="row clearfix">
				<div class="image-col col-lg-7 col-md-7 col-sm-12">
					<div class="single-item-carousel owl-theme owl-carousel">
						<?php
						foreach ( $settings['items'] as $item ) {
							$item_image = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
							if ( ! empty( $item_image ) ) {
								$this->add_render_attribute( 'item_image', 'src', $item_image );
								$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_image'] ) );
								$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_image'] ) );
								$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_image' );
							}
							?>
							<figure class="image">
								<?php
								if ( $item_image != '' ) {
									echo $item_image_image_html;
								}
								?>
							</figure>
						<?php } ?>
					</div>
				</div>
				<div class="text-col col-lg-5 col-md-5 col-sm-12">
					<div class="inner">
						<h3><?php echo $title; ?></h3>
						<ul class="service-list">
							<?php echo $content; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Department_Carosel() );
