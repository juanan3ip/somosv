<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_Extend_Info extends Widget_Base {

	public function get_name() {
		return 'citygovt_extend_info';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Extend Info', 'citygovt-core' );
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
				'default' => __( 'Thinking of living in london city?', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'Everyone should live in a london city at least once.', 'citygovt-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$this->add_control(
			'button_text',
			array(
				'label'   => esc_html__( 'Button Text', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Contact Us', 'citygovt-core' ),
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
		$this->add_control(
			'column',
			array(
				'label'   => esc_html__( 'Number of Column', 'citygovt-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => array(
					'col-lg-6' => esc_html__( '2', 'citygovt-core' ),
					'col-lg-3' => esc_html__( '4', 'citygovt-core' ),
				),

			)
		);
		$this->add_control(
			'total_item',
			array(
				'label'   => esc_html__( 'Total Item', 'citygovt-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => __( 'Contact Us', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_slash_field',
			array(
				'label'   => esc_html__( 'Slash Field', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '//////', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'City Plantation Award – 1988', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __(
					'Blinded by desire, that they cannot foresee belongs which through
                                    shrinking.',
					'citygovt-core'
				),
				'placeholder' => esc_html__( 'Type your description here', 'citygovt-core' ),

			)
		);

		$repeater->add_control(
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

		$column     = $settings['column'];
		$total_item = $settings['total_item'];

		$bg_image_1 = ( $settings['bg_image_1']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_1']['id'], 'full' ) : $settings['bg_image_1']['url'];

		$bg_image_2 = ( $settings['bg_image_2']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image_2']['id'], 'full' ) : $settings['bg_image_2']['url'];

		$title       = $settings['title'];
		$sub_title   = $settings['sub_title'];
		$button_text = $settings['button_text'];

		$button_link          = $settings['button_link'];
		$button_link_target   = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$button_link_nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
		?>
		<section class="ext-info-section">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url( $bg_image_1 ); ?>);"></div>
			<div class="awards-row">
				<div class="auto-container">
					<div class="outer-container">
						<div class="image-layer" style="background-image: url(<?php echo esc_url( $bg_image_2 ); ?>);"></div>
						<div class="row clearfix">
						<?php
						$count = 1;
						foreach ( $settings['items'] as $item ) {
							$item_slash_field = $item['item_slash_field'];
							$item_title       = $item['item_title'];
							$item_content     = $item['item_content'];

							$item_title_link          = $item['item_title_link'];
							$item_title_link_target   = $item['item_title_link']['is_external'] ? ' target="_blank"' : '';
							$item_title_link_nofollow = $item['item_title_link']['nofollow'] ? ' rel="nofollow"' : '';
							?>
							<?php if ( $count == '1' ) { ?>
									<div class="column <?php echo $column; ?> col-md-12">
							<?php } ?>
										<div class="award-block">
											<div class="inner">
												<span class="slash"><?php echo $item_slash_field; ?></span>
												<h4>
													<a href="<?php echo esc_url( $item_title_link['url'] ); ?>"
														<?php echo $item_title_link_target . ' ' . $item_title_link_nofollow; ?>><?php echo $item_title; ?>
													</a>
												</h4>
												<div class="text"><?php echo $item_content; ?></div>
											</div>
										</div>
							<?php if ( $count == $total_item ) { ?>
									</div>
								<?php
								$count = 0;
							}
							?>
							<?php
							$count++;
						}
						?>
						</div>
					</div>
				</div>
			</div>
			<div class="content-row">
				<div class="auto-container">
					<div class="content">
						<h4><?php echo $title; ?></h4>
						<h2><?php echo $sub_title; ?></h2>
						<div class="link-box">
							<a href="<?php echo esc_url( $button_link['url'] ); ?>"
				<?php echo $button_link_target . ' ' . $button_link_nofollow; ?>
								class="theme-btn btn-style-one"><span class="btn-title"><?php echo $button_text; ?></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Extend_Info() );
