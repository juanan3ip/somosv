<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Testimonial extends Widget_Base {

	public function get_name() {
		return 'citygovt_testimonial';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Testimonial', 'citygovt-core' );
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
			'testimonial_title',
			array(
				'label'     => esc_html__( 'Title', 'citygovt-core' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'Lucian manroe', 'citygovt-core' ),
				'condition' => array( 'layout_style' => '2' ),
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
			'item_author_image',
			array(
				'label'   => esc_html__( 'Author Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_name',
			array(
				'label'   => esc_html__( 'Name', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Lucian manroe', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_designation',
			array(
				'label'   => esc_html__( 'Designation', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Citizen', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __(
					'“Loves or pursues desires to obtain pain of itself, because pain because occasionally circumstances occur in which toil and pain can procure him some great
                            pleasure.”',
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
		$settings          = $this->get_settings_for_display();
		$layout_style      = $settings['layout_style'];
		$testimonial_title = $settings['testimonial_title'];
		$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		?>
		<?php if ( $layout_style == '1' ) { ?>
		<section class="testimonials-section">
			<div class="image-layer" style="background-image: url(<?php echo $bg_image; ?>);"></div>
			<div class="auto-container">
				<div class="carousel-box">
					<div class="icon-box"><span><?php echo esc_html( 'Q', 'citygovt-core' ); ?></span></div>
					<div class="testimonial-carousel owl-theme owl-carousel">
					<?php
					foreach ( $settings['items'] as $item ) {
						$item_author_image = ( $item['item_author_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_author_image']['id'], 'full' ) : $item['item_author_image']['url'];
						if ( ! empty( $item_author_image ) ) {
							$this->add_render_attribute( 'item_author_image', 'src', $item_author_image );
							$this->add_render_attribute( 'item_author_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_author_image'] ) );
							$this->add_render_attribute( 'item_author_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_author_image'] ) );
							$item_author_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_author_image' );
						}
						$item_name        = $item['item_name'];
						$item_designation = $item['item_designation'];
						$item_content     = $item['item_content'];
						?>
						<div class="slide-item">
							<div class="inner">
								<div class="info clearfix">
									<div class="author-thumb">
									<?php
									if ( $item_author_image != '' ) {
										echo $item_author_image_image_html; }
									?>
									</div>
									<div class="name"><?php echo $item_name; ?></div>
									<div class="designation"><?php echo $item_designation; ?></div>
								</div>
								<div class="text"><?php echo $item_content; ?></div>
							</div>
						</div> 
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
<?php } elseif ( $layout_style == '2' ) { ?>
<section class="reviews-section">
	<div class="pattern-layer" style="background-image: url(<?php echo $bg_image; ?>);"></div>
	<div class="auto-container">
		<div class="sec-title with-separator">
			<h2><?php echo $testimonial_title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
		</div>
		<div class="carousel-box">
			<div class="reviews-carousel owl-theme owl-carousel">
			<?php
			foreach ( $settings['items'] as $item ) {

				$item_author_image = ( $item['item_author_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_author_image']['id'], 'full' ) : $item['item_author_image']['url'];
				$item_author_image = $item['item_author_image']['url'];
				if ( ! empty( $item_author_image ) ) {
					$this->add_render_attribute( 'item_author_image', 'src', $item_author_image );
					$this->add_render_attribute( 'item_author_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_author_image'] ) );
					$this->add_render_attribute( 'item_author_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_author_image'] ) );
					$item_author_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_author_image' );
				}
				$item_name        = $item['item_name'];
				$item_designation = $item['item_designation'];
				$item_content     = $item['item_content'];
				?>
				<div class="review-block">
					<div class="inner">
						<div class="icon-box"><span class="flaticon-left-quote"></span></div>
						<div class="author-thumb">
							<?php
							if ( $item_author_image != '' ) {
								echo $item_author_image_image_html; }
							?>
						</div>
						<div class="text"><?php echo $item_content; ?></div>
						<div class="info">
							<div class="name"><?php echo $item_name; ?></div>
							<div class="designation"><?php echo $item_designation; ?></div>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php }
	}
}
Plugin::instance()->widgets_manager->register( new \Citygovt_Testimonial() );
