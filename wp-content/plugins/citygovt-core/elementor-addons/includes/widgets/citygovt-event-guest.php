<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Event_Guest extends Widget_Base {

	public function get_name() {
		return 'CitygovtEventGuest';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Event Guest', 'citygovt-core' );
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
				'default' => esc_html__( 'Special Guest', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label' => esc_html__( 'Extra Class', 'citygovt-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'picture',
			array(
				'label'   => esc_html__( 'Picture', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater->add_control(
			'name',
			array(
				'label'   => esc_html__( 'Name', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => wp_kses_post( 'VJ. Herman <br>Gordon', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'designation',
			array(
				'label'   => esc_html__( 'Designation', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mayor', 'citygovt-core' ),
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
				),
			)
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading  = $settings['heading'];
		?>
		 <div class="special-guest">
		 <h2><?php echo esc_html( $heading ); ?></h2>
			<div class="guest-carousel owl-theme owl-carousel">
			<?php
			foreach ( $settings['items'] as $item ) {
				$name        = $item['name'];
				$designation = $item['designation'];
				$picture     = ( $item['picture']['id'] != '' ) ? wp_get_attachment_url( $item['picture']['id'], 'full' ) : $item['picture']['url'];
				?>
				<div class="guest-block">
					<div class="inner-box">
						<div class="inner">
							<figure class="image"><img src="<?php echo esc_url( $picture ); ?>" alt=""></figure>
							<h4><?php echo wp_kses_post( $name ); ?></h4>
							<div class="designation"><?php echo esc_html( $designation ); ?></div>
						</div>
					</div>
				</div>
			<?php } ?>	
			</div>
		</div> 
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Event_Guest() );
