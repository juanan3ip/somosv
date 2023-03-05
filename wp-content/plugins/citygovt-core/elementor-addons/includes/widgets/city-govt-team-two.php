<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_Team_Two extends Widget_Base {


	public function get_name() {
		return 'citygovtteamtwo';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Team Two', 'citygovt-core' );
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
			'bg_image',
			array(
				'label'   => esc_html__( 'BG Image ', 'citygovt-core' ),
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
				'default' => __( 'Meet Council Members', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Meet Council Members', 'citygovt-core' ),

			)
		);

		$this->add_control(
			'button_title_link',
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

		$repeater->add_control(
			'item_name',
			array(
				'label'   => esc_html__( 'Name', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Bertram Irvin', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_designation',
			array(
				'label'   => esc_html__( 'Designation', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'CEO & Founder', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_page_link',
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

		$repeater->add_control(
			'item_facbook_link',
			array(
				'label'         => esc_html__( 'Facbook Link', 'citygovt-core' ),
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
			'item_twitter_link',
			array(
				'label'         => esc_html__( 'Twitter Link', 'citygovt-core' ),
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
			'item_linkedin_link',
			array(
				'label'         => esc_html__( 'Linkedin Link', 'citygovt-core' ),
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
		$title    = $settings['title'];
		$content  = $settings['content'];

		$button_title = $settings['button_title'];

		$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];

		$button_title_link = $settings['button_title_link']['url'];
		if ( ! empty( $button_title_link ) ) {
			$this->add_render_attribute( 'button_title_link', 'href', $button_title_link );
			if ( $settings['button_title_link']['is_external'] ) {
				$this->add_render_attribute( 'button_title_link', 'target', '_blank' );
			}

			if ( ! empty( $settings['button_title_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'button_title_link', 'rel', 'nofollow' );
			}
		}

		?>



<section class="team-section-two">
	<div class="image-layer" style="background-image: url(<?php echo esc_url( $bg_image ); ?>);"></div>

	<div class="auto-container">

		<div class="row clearfix">
			<div class="title-col col-xl-3 col-lg-12 col-md-12">
				<div class="sec-title light with-separator">
					<h2><?php echo $title; ?></h2>
					<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
							class="cir c-3"></span></div>
				</div>
				<div class="text"><?php echo $content; ?></div>
				<div class="link-box"><a class="theme-btn btn-style-one"
		<?php echo $this->get_render_attribute_string( 'button_title_link' ); ?>><span
							class="btn-title"><?php echo $button_title; ?></span></a></div>
			</div>
			<div class="members-col col-xl-9 col-lg-12 col-md-12">
				<div class="row clearfix">
		<?php
		foreach ( $settings['items'] as $item ) {

			$item_image = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];

			if ( ! empty( $item_image ) ) {
				$this->add_render_attribute( 'item_image', 'src', $item_image );
				$this->add_render_attribute( 'item_image', 'alt', \Elementor\Control_Media::get_image_alt( $item['item_image'] ) );
				$this->add_render_attribute( 'item_image', 'title', \Elementor\Control_Media::get_image_title( $item['item_image'] ) );
				$item_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'item_image' );

			}

			$item_name        = $item['item_name'];
			$item_designation = $item['item_designation'];

			$item_page_link     = $item['item_page_link'];
			$item_page_target   = $item['item_page_link']['is_external'] ? ' target="_blank"' : '';
			$item_page_nofollow = $item['item_page_link']['nofollow'] ? ' rel="nofollow"' : '';

			$item_facbook_link     = $item['item_facbook_link'];
			$item_facbook_target   = $item['item_facbook_link']['is_external'] ? ' target="_blank"' : '';
			$item_facbook_nofollow = $item['item_facbook_link']['nofollow'] ? ' rel="nofollow"' : '';

			$item_twitter_link     = $item['item_twitter_link'];
			$item_twitter_target   = $item['item_twitter_link']['is_external'] ? ' target="_blank"' : '';
			$item_twitter_nofollow = $item['item_twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

			$item_linkedin_link     = $item['item_linkedin_link'];
			$item_linkedin_target   = $item['item_linkedin_link']['is_external'] ? ' target="_blank"' : '';
			$item_linkedin_nofollow = $item['item_linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';

			?>


					<div class="team-block-two col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image-box">
								<figure class="image">
								<?php
								if ( $item_image != '' ) {
									echo $item_image_image_html;
								}
								?>
								</figure>
							</div>
							<div class="info">
								<h4><a href="<?php echo esc_url( $item_page_link['url'] ); ?>"
								<?php echo $item_page_target . ' ' . $item_page_nofollow; ?>><?php echo $item_name; ?></a>
								</h4>
								<div class="designation"><?php echo $item_designation; ?></div>
							</div>
							<div class="share-it">
								<a class="share-btn" href="javascript:void(0)"><span
										class="icon flaticon-share"></span></a>
								<div class="share-list">
									<ul>
										<li><a href="<?php echo esc_url( $item_facbook_link['url'] ); ?>"
												<?php echo $item_facbook_target . ' ' . $item_facbook_nofollow; ?>><span
													class="fab fa-facebook-f"></span></a></li>
										<li><a href="<?php echo esc_url( $item_twitter_link['url'] ); ?>"
												<?php echo $item_twitter_target . ' ' . $item_twitter_nofollow; ?>><span
													class="fab fa-twitter"></span></a></li>
										<li><a href="<?php echo esc_url( $item_linkedin_link['url'] ); ?>"
												<?php echo $item_linkedin_target . ' ' . $item_linkedin_nofollow; ?>><span
													class="fab fa-linkedin-in"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

		<?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Team_Two() );
