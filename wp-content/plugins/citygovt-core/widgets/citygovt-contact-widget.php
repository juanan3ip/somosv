<?php
class Citygovt_Contact_Widget extends WP_Widget {

	public $defaults;

	public function __construct() {
		$this->defaults = array(
			'title'              => esc_html__( 'Get In Touch', 'citygovt-core' ),
			'mobile_phone'       => '+4488812345',
			'office_icon'        => 'flaticon-city-hall-1',
			'emergency_num'      => '911 (Tool Free)',
			'emergency_icon'     => 'flaticon-city-hall-1',
			'non_emergency_num'  => '311 (Tool Free)',
			'non_emergency_icon' => 'flaticon-city-hall-1',

		);
		parent::__construct(
			'citygovt_contact_widget', // Base ID
			esc_html__( 'Citygovt Contact', 'citygovt-core' ), // Name
			array(
				'description' => esc_html__( 'This widget will Contact.', 'citygovt-core' ),
			)
		);
	}

	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
		<p>

<label
	for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'citygovt-core' ); ?></label>
<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
	name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
	value="<?php echo esc_attr( $instance['title'] ); ?>" />
</p>

<p>

	<label
		for="<?php echo esc_attr( $this->get_field_id( 'mobile_phone' ) ); ?>"><?php esc_html_e( 'Mobile Phone', 'citygovt-core' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mobile_phone' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'mobile_phone' ) ); ?>"
		value="<?php echo esc_attr( $instance['mobile_phone'] ); ?>" />
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'office_icon' ) ); ?>"><?php esc_html_e( 'Office Icon', 'citygovt-core' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'office_icon' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'office_icon' ) ); ?>"
		value="<?php echo esc_attr( $instance['office_icon'] ); ?>" />
</p>

<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'emergency_num' ) ); ?>"><?php esc_html_e( 'Emergency Number', 'citygovt-core' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'emergency_num' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'emergency_num' ) ); ?>"
		value="<?php echo esc_attr( $instance['emergency_num'] ); ?>" />
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'emergency_icon' ) ); ?>"><?php esc_html_e( 'Emergency Icon', 'citygovt-core' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'emergency_icon' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'emergency_icon' ) ); ?>"
		value="<?php echo esc_attr( $instance['emergency_icon'] ); ?>" />
</p>

<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'non_emergency_num' ) ); ?>"><?php esc_html_e( 'Non Emergency Number', 'citygovt-core' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'non_emergency_num' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'non_emergency_num' ) ); ?>"
		value="<?php echo esc_attr( $instance['non_emergency_num'] ); ?>" />
</p>

<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'non_emergency_icon' ) ); ?>"><?php esc_html_e( 'Non Emergency Icon', 'citygovt-core' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'non_emergency_icon' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'non_emergency_icon' ) ); ?>"
		value="<?php echo esc_attr( $instance['non_emergency_icon'] ); ?>" />
</p>
		<?php
	}

	function widget( $args, $instance ) {
		global $smof_data;
		extract( $args );
		echo wp_kses_post( $before_widget );
		if ( ! empty( $instance['title'] ) ) {
			$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			echo wp_kses_post( $before_title . $title . $after_title );
		};
		?>


<div class="sidebar-widget contact-widget">
	<div class="widget-content">
		<div class="contact-links-box">
			<div class="inner">
				<ul class="info">
				<?php
				if ( ! empty( $instance['mobile_phone'] ) && ! empty( $instance['office_icon'] ) ) {
					?>
					<li class="clearfix">
						<span class="icon <?php echo esc_attr( $instance['office_icon'] ); ?>"></span>
						<strong><?php echo esc_html( 'Mayor office', 'citygovt-core' ); ?></strong>
						<a class="txt" href="tel:<?php echo esc_attr( $instance['mobile_phone'] ); ?>"><?php echo wp_kses_post( $instance['mobile_phone'] ); ?></a>
					</li>
				<?php } ?>
					<?php
					if ( ! empty( $instance['emergency_num'] ) && ! empty( $instance['emergency_icon'] ) ) {
						?>
					<li class="clearfix">
						<span class="icon <?php echo esc_attr( $instance['emergency_icon'] ); ?>"></span>
						<strong><?php echo esc_html( 'Emergency', 'citygovt-core' ); ?></strong>
						<span class="txt"><?php echo wp_kses_post( $instance['emergency_num'] ); ?></span>
					</li>
					<?php } ?>
					<?php
					if ( ! empty( $instance['non_emergency_num'] ) && ! empty( $instance['non_emergency_icon'] ) ) {
						?>
					<li class="clearfix">
						<span class="icon <?php echo esc_attr( $instance['non_emergency_icon'] ); ?>"></span>
						<strong><?php echo esc_html( 'Non emergency', 'citygovt-core' ); ?></strong>
						<span class="txt"><?php echo wp_kses_post( $instance['non_emergency_num'] ); ?></span>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
					<?php
					echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {

		$instance                        = $old_instance;
		$instance['title']               = strip_tags( $new_instance['title'] );
		$instance['office_title']        = strip_tags( $new_instance['office_title'] );
		$instance['office_icon']         = $new_instance['office_icon'];
		$instance['mobile_phone']        = $new_instance['mobile_phone'];
		$instance['emergency_title']     = $new_instance['emergency_title'];
		$instance['emergency_num']       = $new_instance['emergency_num'];
		$instance['emergency_icon']      = $new_instance['emergency_icon'];
		$instance['non_emergency_title'] = $new_instance['non_emergency_title'];
		$instance['non_emergency_num']   = $new_instance['non_emergency_num'];
		$instance['non_emergency_icon']  = $new_instance['non_emergency_icon'];

		return $instance;
	}

}

function citygovt_register_contact_func() {
	register_widget( 'citygovt_contact_widget' );
}

add_action( 'widgets_init', 'citygovt_register_contact_func' );
