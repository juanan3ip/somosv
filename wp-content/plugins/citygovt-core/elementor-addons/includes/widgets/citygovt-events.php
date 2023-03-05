<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;

class Citygovt_Events extends Widget_Base {

	public function get_name() {
		return 'citygovt_events';
	}

	public function get_title() {
		return esc_html__( 'Events', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}
	private function get_events_categories() {
		$options  = array();
		$taxonomy = 'tribe_events_cat';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'parent'     => 0,
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						$options[''] = 'Select';
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'event_design_area',
			array(
				'label' => esc_html__( 'event design area', 'citygovt-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'event_style',
			array(
				'label'   => esc_html__( 'Event Style', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'One', 'citygovt-core' ),
					'two' => esc_html__( 'Two', 'citygovt-core' ),
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_program',
			array(
				'label' => esc_html__( 'Content', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'category_id',
			array(
				'type'        => Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Category', 'uaques-core' ),
				'options'     => $this->get_events_categories(),
				'multiple'    => true,
				'label_block' => true,
			)
		);

		$this->add_control(
			'number',
			array(
				'label'   => esc_html__( 'Number of Post', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 3,
			)
		);
		$this->add_control(
			'pagination',
			array(
				'label'        => esc_html__( 'Pagination Show Hide', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',

			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'   => esc_html__( 'Order By', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'_EventStartDate' => esc_html__( '_EventStartDate', 'citygovt-core' ),
					'_EventEndDate'   => esc_html__( '_EventEndDate', 'citygovt-core' ),
					'date'            => esc_html__( 'Date', 'citygovt-core' ),
					'ID'              => esc_html__( 'ID', 'citygovt-core' ),
					'author'          => esc_html__( 'Author', 'citygovt-core' ),
					'title'           => esc_html__( 'Title', 'citygovt-core' ),
					'modified'        => esc_html__( 'Modified', 'citygovt-core' ),
					'rand'            => esc_html__( 'Random', 'citygovt-core' ),
					'comment_count'   => esc_html__( 'Comment count', 'citygovt-core' ),
					'menu_order'      => esc_html__( 'Menu order', 'citygovt-core' ),
				),
			)
		);

		$this->add_control(
			'order',
			array(
				'label'   => esc_html__( 'Order', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => array(
					'desc' => esc_html__( 'DESC', 'citygovt-core' ),
					'asc'  => esc_html__( 'ASC', 'citygovt-core' ),
				),
			)
		);
		$this->add_control(
			'h24',
			array(
				'label'        => esc_html__( '24 Hour Time Format', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',

			)
		);
		$this->add_control(
			'time_text',
			array(
				'label'   => esc_html__( 'Middle Text of Time', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'to', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'read_more',
			array(
				'label'   => esc_html__( 'Read More', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'citygovt-core' ),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$event_style    = $settings['event_style'];
		$number_of_post = (int) $settings['number'];
		$order_by       = $settings['order_by'];
		$order          = $settings['order'];
		$time_text      = $settings['time_text'];
		$read_more      = $settings['read_more'];

		$pagination_show_hide = $settings['pagination'];
		$h24                  = $settings['h24'];

		global $post;

		if ( is_array( $settings['category_id'] ) && ! empty( $settings['category_id'] ) ) {
			$category_arr = array();
			$category_arr = implode( ', ', $settings['category_id'] );
		} else {
			$category_arr = $settings['category_id'];
		}
		if ( $category_arr ) {
			$args = array(
				'post_status'    => 'publish',
				'post_type'      => array( Tribe__Events__Main::POSTTYPE ),
				'posts_per_page' => $number_of_post,
				// order by startdate from newest to oldest
				'meta_key'       => '_EventStartDate',
				'orderby'        => $order_by,
				'order'          => $order,
				// required in 3.x
				'eventDisplay'   => 'custom',
				'tax_query'      => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field'    => 'slug',
						'terms'    => array( $category_arr ),
					),
				),
			);
		} else {
			$args = array(
				'post_status'    => 'publish',
				'post_type'      => array( Tribe__Events__Main::POSTTYPE ),
				'posts_per_page' => $number_of_post,
				// order by startdate from newest to oldest
				'meta_key'       => '_EventStartDate',
				'orderby'        => $order_by,
				'order'          => $order,
				// required in 3.x
				'eventDisplay'   => 'custom',
			);
		}

		$get_posts = null;
		$get_posts = new WP_Query();

		$get_posts->query( $args );

		$time_format    = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
		$start_time     = tribe_get_start_date( $post->ID, false, $time_format );
		$end_time       = tribe_get_end_date( $post->ID, false, $time_format );
		$time_formatted = null;
		if ( $start_time == $end_time ) {
			$time_formatted = esc_html( $start_time );
		} else {
			$time_formatted = esc_html( $start_time . __( 'to' ) . $end_time );
		}
		?>
		<?php if ( $event_style == 'two' ) { ?>
			<section class="events-section-two load-more-section" data-load-number="2">
				<div class="auto-container">
					<div class="row clearfix">
						<!--Event Block-->
						<?php
						if ( $get_posts->have_posts() ) :
							while ( $get_posts->have_posts() ) :
								$get_posts->the_post();
								?>
								<div class="event-block-two col-md-6 col-sm-12">
									<div class="inner-box">
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="image-box">
											<figure class="image">
												<a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
											</figure>
										</div>
									<?php } ?>
										<div class="lower-box">
											<div class="content-box">
												<div class="date-box">
													<div class="date">
														<span class="day"><?php echo tribe_get_start_date( $post->ID, false, 'd' ); ?></span>
														<span class="month"><?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?></span>
													</div>
												</div>
												<div class="content">
													<div class="cat-info">
												<?php
												$cats = get_the_terms( $post->ID, 'tribe_events_cat', ' ' );
												foreach ( $cats as $cat ) {
													echo '<span>' . $cat->name . '</span> ';
												}
												?>
													</div>
													<h3><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
													<div class="location"><?php echo tribe_get_address(); ?></div>
													<div class="read-more">
														<a href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_html( $read_more ); ?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							endwhile;
							endif;
							wp_reset_query();
						?>
					</div>
					<div class="loadmore"></div>
				</div>
			</section>
		<?php } else { ?>
		<div class="sidebar-page-container">
			<div class="auto-container">
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="events-list">
							<!--Event Block-->
							<?php
							if ( $get_posts->have_posts() ) :
								while ( $get_posts->have_posts() ) :
									$get_posts->the_post();
									?>
									<div class="event-block">
										<div class="inner-box">
											<div class="content-box">
												<div class="date-box">
													<div class="date"><span
															class="day"><?php echo tribe_get_start_date( $post->ID, false, 'd' ); ?></span><span
															class="month"><?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?></span>
													</div>
												</div>
												<div class="content">
													<div class="cat-info">
													<?php
													$cats = get_the_terms( $post->ID, 'tribe_events_cat', ' ' );
													foreach ( $cats as $cat ) {
														echo '<span>' . $cat->name . '</span> ';
													}
													?>
													</div>
													<h3><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
													<ul class="notification">
														<li>
															<div class="location"><span class="fa fa-map-marked-alt"></span><?php echo tribe_get_address(); ?></div>
														</li>
														<li>
															<div class="timing"><span class="fa fa-clock"></span>
															<?php if ( $h24 == 'yes' ) { ?>
																<?php echo tribe_get_start_date( $post->ID, false, 'G:i' ); ?> <?php echo $time_text; ?> 
																<?php echo tribe_get_end_date( $post->ID, false, 'G:i' ); ?></div>
															<?php } else { ?>
																<?php echo tribe_get_start_date( $post->ID, false, 'h:i a' ); ?> <?php echo $time_text; ?> 
																<?php echo tribe_get_end_date( $post->ID, false, 'h:i a' ); ?></div>
															<?php } ?>
														</li>
													</ul>
													<div class="read-more"><a
															href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_html( $read_more ); ?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
								endwhile;
								endif;
								wp_reset_query();
							?>
						</div>
						<?php if ( $pagination_show_hide == 'yes' ) : ?>
							<div class="pagination-box text-right">
									<?php
									$the_query = new WP_Query(
										array(
											'posts_per_page' => $number_of_post,
											'post_type'      => array( 'tribe_events' ),
											'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
										)
									);
										$big   = 999999999;
									?>
								<div class="styled-pagination custom-pagination-style">
									<?php
									echo paginate_links(
										array(
											'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
											'format'    => '?paged=%#%',
											'current'   => max( 1, get_query_var( 'paged' ) ),
											'total'     => $the_query->max_num_pages,
											'prev_text' => '<span class="icon flaticon-left-1"></span>' . __( 'prev' ),
											'next_text' => __( 'next' ) . '<span class="icon flaticon-right-2"></span>',
										)
									);
									?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php }
	}
}
Plugin::instance()->widgets_manager->register( new Citygovt_Events() );
