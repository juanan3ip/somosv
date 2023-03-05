<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Citygovt_Program_Schedule extends Widget_Base {

	public function get_name() {
		return 'CitygovtProgramSchedule';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Program Schedule', 'citygovt-core' );
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
			'extra_class',
			array(
				'label' => esc_html__( 'Extra Class', 'citygovt-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'date',
			array(
				'label'   => esc_html__( 'Date', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '9am - 10am', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Welcome speech from mayor', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'content',
			array(
				'label'   => esc_html__( 'Content', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Pleasure and praising pain was born and give you a complete.', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'open',
			array(
				'label'        => esc_html__( 'Open', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'citygovt-core' ),
				'label_off'    => esc_html__( 'No', 'citygovt-core' ),
				'return_value' => 'yes',
				'default'      => 'no',
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
		?>
		<div class="more-info-box">
			<div class="inner-box">
				<div class="timings">
					<div class="curve"></div>
					<div class="inner">
						<ul>
					<?php
					foreach ( $settings['items'] as $item ) {
						$date = $item['date'];
						?>
							<li><?php echo esc_html( $date ); ?></li>
					<?php } ?>
						</ul>
					</div>
				</div>
				<div class="toggle-box">
					<div class="accordion-box">
					<?php
					foreach ( $settings['items'] as $item ) {
						$title   = $item['title'];
						$content = $item['content'];
						$open    = $item['open'];

						$open_class   = '';
						$active_class = '';
						if ( $open == 'yes' ) {
							$open_class   = 'current';
							$active_class = 'active';
						}
						?>
						<!--Block-->
						<div class="accordion block <?php echo esc_attr( $open_class ); ?>">
							<div class="acc-btn <?php echo esc_attr( $active_class ); ?>"><?php echo esc_html( $title ); ?><div class="icon flaticon-cross"></div></div>
							<div class="acc-content">
								<div class="content">
									<div class="text"><?php echo esc_html( $content ); ?></div>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div> 
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Program_Schedule() );
