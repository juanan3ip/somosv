<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_Service extends Widget_Base {

	public function get_name() {
		return 'citygovt_service';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Service', 'citygovt-core' );
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
				'default' => __( 'Explore Our Service Departments', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'All Departments', 'citygovt-core' ),
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
			'item_page_title',
			array(
				'label'   => esc_html__( 'Page Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Policing & <br>crime department', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_page_title_link',
			array(
				'label'         => esc_html__( 'Page Title Link', 'citygovt-core' ),
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
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
			'item_button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_button_title_link',
			array(
				'label'         => esc_html__( 'Button Title Link', 'citygovt-core' ),
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
		}

		?>
<section class="services-section">
	<div class="auto-container">
		<div class="sec-title  with-separator centered">
			<h2><?php echo $title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
			<div class="more-link"><a href="<?php echo esc_url( $button_link ); ?>"><?php echo $button_title; ?><span class="flaticon-right-2"></span></a></div>
		</div>
		<div class="row clearfix">
			<?php
			foreach ( $settings['items'] as $item ) {
				$item_page_title            = $item['item_page_title'];
				$item_icon                  = $item['item_icon'];
				$item_button_title_link     = $item['item_button_title_link'];
				$item_button_title_target   = $item['item_button_title_link']['is_external'] ? ' target="_blank"' : '';
				$item_button_title_nofollow = $item['item_page_title_link']['nofollow'] ? ' rel="nofollow"' : '';

				$item_page_title_link     = $item['item_page_title_link'];
				$item_page_title_target   = $item['item_page_title_link']['is_external'] ? ' target="_blank"' : '';
				$item_page_title_nofollow = $item['item_page_title_link']['nofollow'] ? ' rel="nofollow"' : '';

				$item_content      = $item['item_content'];
				$item_button_title = $item['item_button_title'];
				?>
			<div class="featured-block-two col-lg-4 col-md-6 col-sm-12">
				<div class="inner-box">
					<div class="content-box">
						<div class="icon-box">
							<?php
							\Elementor\Icons_Manager::render_icon(
								( $item_icon ),
								array(
									'aria-hidden' => 'true',
									'class'       => 'icon',
								)
							);
							?>
						</div>
						<div class="content">
							<h4><a href="<?php echo esc_url( $item_page_title_link['url'] ); ?>"
									<?php echo $item_page_title_target . ' ' . $item_page_title_nofollow; ?>><?php echo $item_page_title; ?></a>
							</h4>
							<div class="text"><?php echo $item_content; ?></div>
							<div class="read-more"><a
									href="<?php echo esc_url( $item_button_title_link['url'] ); ?>"
									<?php echo $item_button_title_target . ' ' . $item_button_title_nofollow; ?>><?php echo $item_button_title; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>

		</div>

	</div>

</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Service() );
