<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Citygovt_Event_Subscribe extends Widget_Base {

	public function get_name() {
		return 'citygovt_event_subscribe';
	}

	public function get_title() {
		return esc_html__( 'Citygovt Event Subscribe', 'citygovt-core' );
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
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Upcoming Activities & Events',
			)
		);
		$this->add_control(
			'event_style',
			array(
				'label'   => esc_html__( 'Event Style', 'citygovt-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
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
				'type'        => \Elementor\Controls_Manager::SELECT2,
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
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
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

		$this->end_controls_section();
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
			'icon_image',
			array(
				'label'   => esc_html__( 'Icon Image', 'citygovt-core' ),
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
				'default' => __( 'SUBSCRIBE US', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'content',
			array(
				'label'   => esc_html__( 'Content', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Get latest News, Events Details.', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'event_link_content',
			array(
				'label'   => esc_html__( 'Event Link Content', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Get latest News, Events Details.', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'subscirbe_event',
			array(
				'label'       => esc_html__( 'Select Contact Form', 'uaquescore' ),
				'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'uaquescore' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'label_block' => 1,
				'options'     => city_govt_get_contact_form_7_posts(),
			)
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$heading        = $settings['heading'];
		$event_style    = $settings['event_style'];
		$number_of_post = (int) $settings['number'];
		$order_by       = $settings['order_by'];
		$order          = $settings['order'];

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

		$bg_image = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];

		$icon_image = ( $settings['icon_image']['id'] != '' ) ? wp_get_attachment_url( $settings['icon_image']['id'], 'full' ) : $settings['icon_image']['url'];
		if ( ! empty( $icon_image ) ) {
			$this->add_render_attribute( 'icon_image', 'src', $icon_image );
			$this->add_render_attribute( 'icon_image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['icon_image'] ) );
			$this->add_render_attribute( 'icon_image', 'title', \Elementor\Control_Media::get_image_title( $settings['icon_image'] ) );
			$icon_image_image_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'icon_image' );

		}

		$title = $settings['title'];

		$content       = $settings['content'];
		$content_event = $settings['event_link_content'];

		?>	
		<section class="events-section">
			<div class="auto-container">
				<div class="row clearfix">
					<div class="left-column col-xl-8 col-lg-12 col-md-12 col-sm-12">
						<div class="col-inner">
								<?php if ( ! empty( $heading ) ) { ?>
							<div class="sec-title with-separator">
								<h2><?php echo esc_html( $heading ); ?></h2>
								<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
										class="cir c-3"></span>
								</div>
							</div>
								<?php } ?>
							<div class="carousel-box">
								<!--Event Block-->
								<?php
								if ( $get_posts->have_posts() ) :
									while ( $get_posts->have_posts() ) :
										$get_posts->the_post();
										global $post;
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
														<div class="timing"><span class="fa fa-clock"></span><?php echo tribe_get_start_date( $post->ID, false, 'H:i' ); ?> - <?php echo tribe_get_end_date( $post->ID, false, 'H:i' ); ?></div>
													</li>
												</ul>
												<div class="read-more"><a
														href="<?php esc_url( the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'citygovt-core' ); ?></a>
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
						</div>	
					</div>	
					<div class="right-column col-xl-4 col-lg-12 col-md-12 col-sm-12">	
						<div class="col-inner">
							<div class="newsletter-box">
								<div class="image-box">
									<div class="image-layer" style="background-image: url(<?php echo esc_url( $bg_image ); ?>);"></div>
									<div class="icon-box">
									<?php
									if ( $icon_image != '' ) {
										echo $icon_image_image_image_html; }
									?>
									</div>
									<h3><?php echo $title; ?></h3>
									<div class="text"><?php echo $content; ?></div>
								</div>
								<div class="form-box">
								<?php
								static $v_veriable = 0;
								$settings = $this->get_settings();
								if ( ! empty( $settings['subscirbe_event'] ) ) {
									echo '<div class="elementor-shortcode subscirbe_event-' . $v_veriable . '">';
									echo do_shortcode( '[contact-form-7 id="' . $settings['subscirbe_event'] . '"]' );
									echo '</div>';
								}

								if ( ! empty( $settings['subscirbe_event_redirect_page'] ) || ! empty( $settings['subscirbe_event_redirect_external'] ) ) {
									?>
									<script>
									var theform = document.querySelector('.citygovtcore-subscirbe_event-<?php echo $v_veriable; ?>');
									theform.addEventListener('wpsubscirbe_eventmailsent', function(event) {
										location = '
										<?php
										if ( ! empty( $settings['subscirbe_event_redirect_external'] ) ) {
											echo $settings['subscirbe_event_redirect_external'];
										} else {
											echo get_permalink( $settings['subscirbe_event_redirect_page'] );
										}
										?>
										';
									}, false);
									</script>
									<?php
									$v_veriable++;
								}
								?>
								</div>
							</div>
							<div class="see-all">
								<?php echo wp_kses_post( $content_event ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Event_Subscribe() );
