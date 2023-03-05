<?php
add_action( 'widgets_init', 'citygovt_latest_post' );

function citygovt_latest_post() {
	 register_widget( 'CitygovtLatestPost' );
}

class CitygovtLatestPost extends WP_Widget {

	private $defaults = array();

	function __construct() {
		$this->defaults = array(
			'title' => esc_html__( 'Latest News', 'citygovt-core' ),
		);
		parent::__construct( 'widget_latest_tags_tab', esc_html__( 'Citygovt Latest News', 'citygovt-core' ) );
	}

	function update( $new_instance, $old_instance ) {
		$defaults           = $this->defaults;
		$instance           = $old_instance;
		$instance['title']  = esc_attr( $new_instance['title'] );
		$instance['number'] = intval( $new_instance['number'] );
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		$title    = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		?>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'citygovt-core' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				value="<?php echo esc_attr( $title ); ?>" class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" />
		</p>
		<p>
		<label for="<?php print esc_attr( $this->get_field_id( 'number' ) ); ?>">
			<?php esc_html_e( 'Number of posts:', 'citygovt-core' ); ?>
			<input class="widefat" id="<?php print esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo isset( $instance['number'] ) ? esc_attr( $instance['number'] ) : ''; ?>" />
		</label>
		</p>
		<?php
	}

	function widget( $args, $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		extract( $args );
		$number = isset( $instance['number'] ) ? $instance['number'] : 2;
		$title  = $instance['title'];
		?>

<div class="sidebar-widget recent-posts">
	<div class="widget-inner">
		<div class="sidebar-title">
			<h4><?php echo $title; ?></h4>
		</div>
		<div class="recent-posts-box">
			<?php
			$query_args = array(
				'post_type'           => 'post',
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
			);
			$query      = new WP_Query( $query_args );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) :
					$query->the_post()
					?>
					<div class="post">
						<div class="inner">
							<figure class="post-thumb">
								<?php the_post_thumbnail( 'full' ); ?>
								<a href="<?php esc_url( the_permalink() ); ?>" class="overlink"><span class="icon flaticon-zoom-in"></span></a>
							</figure>
							<div class="post-date"><?php citygovt_posted_on(); ?></div>
							<h5 class="title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h5>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_query();
			}
			?>
		</div>
	</div>
</div>
		<?php
	}

}
