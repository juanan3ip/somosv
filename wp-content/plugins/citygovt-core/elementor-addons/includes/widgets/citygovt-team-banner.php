<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class TeamBanner extends Widget_Base {

	public function get_name() {
		return 'TeamBanner';
	}

	public function get_title() {
		return esc_html__( 'Team Banner', 'citygovt-core' );
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
			'image',
			array(
				'label'   => esc_html__( 'Image', 'citygovt-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$this->add_control(
			'name',
			array(
				'label'   => esc_html__( 'Name', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Herman Gordon', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'designation',
			array(
				'label'   => esc_html__( 'Designation', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Director', 'citygovt-core' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Email :', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'hermangordon@gmail.com', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'extra_class',
			array(
				'label'       => esc_html__( 'Extra Class', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
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
		$image = ( $settings['image']['id'] != '' ) ? wp_get_attachment_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		?>
		<div class="member_image">
			<img src="<?php echo esc_url( $image ); ?>" class="img-fluid" alt="img" />
			<div class="team_member_details">
				<div class="upper_block">
					<h2><?php echo $settings['name']; ?></h2>
					<p><?php echo $settings['designation']; ?></p>
				</div>
				<div class="lower_block">
				<?php
				foreach ( $settings['items'] as $item ) {
					$item_title   = $item['item_title'];
					$item_content = $item['item_content'];
					$extra_class  = $item['extra_class'];
					?>
					<div class="box_in <?php echo esc_attr( $extra_class ); ?>">
						<h6><?php echo $item_title; ?> </h6>
						<p><?php echo $item_content; ?> </p>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \TeamBanner() );
