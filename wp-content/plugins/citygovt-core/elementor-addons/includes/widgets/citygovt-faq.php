<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Faq extends Widget_Base {


	public function get_name() {
		return 'citygovt_faq';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Faq', 'citygovt-core' );
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
				'default' => __( 'I Have a Question About', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description', 'citygovt-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 0,
				'default'     => __( 'You have the rights to ask any legal questions, so don’t hestitate to ask us here are listed some questions & answers', 'citygovt-core' ),
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
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'The mayor', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'citygovt-core' ),
				'type'  => Controls_Manager::ICONS,

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
		$this->start_controls_section(
			'content_section_list',
			array(
				'label' => __( 'Faq list area', 'citygovt-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'content',
			array(
				'label'       => __( 'Block', 'citygovt-core' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options'     => citygovt_get_elementor_library(),
			)
		);
		$this->add_control(
			'faq_list',
			array(
				'label'   => __( 'About count list', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(),
				),
			)
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings                    = $this->get_settings_for_display();
		$title                       = $settings['title'];
		$description                 = $settings['description'];
		$electrician_pluginElementor = \Elementor\Plugin::instance();
		?>
		<section class="faqs-section">
			<div class="auto-container">
				<div class="sec-title with-separator centered">
					<h2><?php echo $title; ?></h2>
					<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
							class="cir c-3"></span></div>
					<div class="lower-text"><?php echo $description; ?></div>
				</div>
				<div class="tabs-box faq-tabs">
					<div class="tab-buttons">
						<div class="row clearfix">
						<?php
						$i = 1;
						foreach ( $settings['items'] as $item ) {
							$item_title  = $item['item_title'];
							$item_icon   = $item['item_icon'];
							$activeClass = '';
							if ( $i == 1 ) {
								$activeClass = 'active-btn';
							}
							?>
							<div class="col-lg-2 col-md-4 col-md-4 col-sm-6">
								<div class="btn-inner tab-btn <?php echo $activeClass; ?>" data-tab="#tab-<?php echo $i; ?>">
								<?php
								\Elementor\Icons_Manager::render_icon(
									( $item_icon ),
									array(
										'aria-hidden' => 'true',
										'class'       => 'icon',
									)
								);
								?>
									<span class="txt"><?php echo $item_title; ?></span>
								</div>
							</div> 
							<?php
							$i++;
							}
							?>
						</div>
					</div>
					<div class="tabs-content">
						<?php
						if ( ! empty( $settings['faq_list'] ) ) {
							$i = 1;
							foreach ( $settings['faq_list'] as $item1 ) {
								$active = '';
								if ( $i == 1 ) {
									$active = 'active-tab';
								}
								?>
								<div class="tab <?php echo $active; ?>" id="tab-<?php echo $i; ?>">	
								<?php
								echo $electrician_pluginElementor->frontend->get_builder_content( $item1['content'] );
								?>
								</div>
								<?php
								$i++;
							}
						}
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Faq() );
