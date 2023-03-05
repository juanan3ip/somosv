<?php
class Citygovt_Newsletter_widget extends WP_Widget {

	public $defaults;

	public function __construct() {
		$this->defaults = array(
			'title'     => esc_html__( 'Subscribe Us', 'citygovt-core' ),
			'content'   => 'Subscribe us to get latest news and events detail.',
			'shortcode' => '',

		);
		parent::__construct(
			'citygovt_newsletter_widget', // Base ID
			esc_html__( 'Citygovt Newsletter', 'citygovt-core' ), // Name
			array(
				'description' => esc_html__( 'This widget will Subscribe Newsletter.', 'citygovt-core' ),
			)
		);
	}

	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults );
		if ( ! isset( $instance['url'] ) ) {
			$instance['url'] = '';
		}
		if ( ! isset( $instance['image'] ) ) {
			$instance['image'] = '';
		}

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
		for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php esc_html_e( 'Content', 'citygovt-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'content' ) ); ?>"><?php echo wp_kses_post( $instance['content'] ); ?></textarea>
</p>

<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'shortcode' ) ); ?>"><?php esc_html_e( 'shortcode', 'citygovt-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'shortcode' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'shortcode' ) ); ?>"><?php echo wp_kses_post( $instance['shortcode'] ); ?></textarea>
</p>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php _e( 'Image:', 'citygovt-core' ); ?></label>
	<br />
	<p class="imgpreview"></p>
	<input class="imgph" type="hidden" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>"
		value="<?php echo esc_attr( $instance['image'] ); ?>" />
	<input type="button" class="button btn-primary widgetuploader" value="<?php _e( 'Add Image', 'citygovt-core' ); ?>" />
</p>



		<?php
	}

	function widget( $args, $instance ) {
		global $smof_data;
		$display_image = false;
		if ( $instance['image'] ) {
			$display_image = 1;
			$image_src     = wp_get_attachment_image_src( $instance['image'], 'thumbnail' );
		}
		extract( $args );
		echo wp_kses_post( $before_widget );
		if ( ! empty( $instance['title'] ) ) {
			$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			echo wp_kses_post( $before_title . $title . $after_title );
		};
		?>


<div class="sidebar-widget contact-widget">
	<div class="widget-content">

		<div class="newsletter-box-two">
			<div class="image-box">
			<?php if ( $display_image ) { ?>
				<div class="image-layer" style="background-image: url(<?php echo esc_url( $image_src[0] ); ?>);"></div>
			<?php } ?>
				<?php
				if ( ! empty( $instance['content'] ) ) {
					?>
				<div class="text"><?php echo wp_kses_post( $instance['content'] ); ?></div>
				<?php } ?>
				<?php
				if ( ! empty( $instance['shortcode'] ) ) {
					?>
						<?php echo do_shortcode( $instance['shortcode'] ); ?>
				<?php } ?>

			</div>
		</div>
	</div>
</div>
		<?php
		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance              = $old_instance;
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['content']   = strip_tags( $new_instance['content'] );
		$instance['shortcode'] = $new_instance['shortcode'];
		$instance['image']     = sanitize_text_field( $new_instance['image'] );

		return $instance;
	}

}

function citygovt_register_newsletter_func() {
	register_widget( 'citygovt_newsletter_widget' );
}

add_action( 'widgets_init', 'citygovt_register_newsletter_func' );
