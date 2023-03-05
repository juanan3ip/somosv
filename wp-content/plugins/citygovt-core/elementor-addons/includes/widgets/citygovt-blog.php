<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class City_Govt_Blogs extends Widget_Base {


	public function get_name() {
		return 'city_govt_blogs';
	}

	public function get_title() {
		return esc_html__( 'Blog', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}

	private function get_blog_categories() {
		$options  = array();
		$taxonomy = 'category';
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
			'section_blogs',
			array(
				'label' => esc_html__( 'Blogs', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'style',
			array(
				'label'   => __( 'Blog Style', 'citygovt-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'citygovt-core' ),
					'2' => __( 'Style 2', 'citygovt-core' ),

				),
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => esc_html__( 'Title', 'citygovt-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => wp_kses_post( 'checkout news', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'category_id',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Category', 'citygovt-core' ),
				'options' => $this->get_blog_categories(),
			)
		);

		$this->add_control(
			'number',
			array(
				'label'   => esc_html__( 'Number of Post', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 2,
			)
		);

		$this->add_control(
			'column',
			array(
				'label'   => esc_html__( 'Number of Column', 'citygovt-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => array(
					'col-xl-12' => esc_html__( '1', 'citygovt-core' ),
					'col-xl-6'  => esc_html__( '2', 'citygovt-core' ),
					'col-xl-4'  => esc_html__( '3', 'citygovt-core' ),
					'col-xl-3'  => esc_html__( '4', 'citygovt-core' ),
				),

			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'   => esc_html__( 'Order By', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'          => esc_html__( 'Date', 'citygovt-core' ),
					'ID'            => esc_html__( 'ID', 'citygovt-core' ),
					'author'        => esc_html__( 'Author', 'citygovt-core' ),
					'title'         => esc_html__( 'Title', 'citygovt-core' ),
					'modified'      => esc_html__( 'Modified', 'citygovt-core' ),
					'rand'          => esc_html__( 'Random', 'citygovt-core' ),
					'comment_count' => esc_html__( 'Comment count', 'citygovt-core' ),
					'menu_order'    => esc_html__( 'Menu order', 'citygovt-core' ),
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
	}

	protected function render() {
		$settings       = $this->get_settings();
		$posts_per_page = $settings['number'];

		$title_1 = $settings['title_1'];

		$style = $settings['style'];

		$order_by = $settings['order_by'];
		$order    = $settings['order'];
		$pg_num   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$args     = array(
			'post_type'      => array( 'post' ),
			'post_status'    => array( 'publish' ),
			'nopaging'       => false,
			'paged'          => $pg_num,
			'posts_per_page' => $posts_per_page,
			'category_name'  => $settings['category_id'],
			'orderby'        => $order_by,
			'order'          => $order,
		);
		$query    = new WP_Query( $args );

		$column = $settings['column'];

		?>


		<?php if ( $style == '1' ) { ?>
<section class="news-section">
	<div class="auto-container">
		<div class="sec-title with-separator">
			<h2><?php echo $title_1; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
		</div>

		<div class="carousel-box">
			<div class="news-carousel owl-theme owl-carousel">
				<!--News Block-->
			<?php
			$i = 0;

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					global $post;
					$url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'citygovt_blog_latest_news' );
					?>


				<div class="news-block">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image">
							<?php
							if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'citygovt_blog_latest_news' );
							}
							?>
							</figure>
							<div class="hover-box">
								<div class="link zoom-link">
									<a href="<?php echo $url; ?>" class="lightbox-image"><span
											class="icon flaticon-zoom-in"></span></a>
								</div>
								<div class="link single-link">
									<a href="<?php echo esc_url( get_permalink() ); ?>"><span
											class="icon flaticon-link-4"></span></a>
								</div>
							</div>
						</div>
						<div class="lower-box">
							<div class="upper-info">
								<div class="cat-info">
									<span class="fa fa-folder"></span><?php citygovt_category_list(); ?>
								</div>
								<h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
							</div>
							<div class="meta-info clearfix">
								<div class="author-info clearfix">
									<div class="author-icon"><span class="flaticon-user-3"></span></div>
									<div class="author-title"><?php echo get_the_author(); ?></div>
									<div class="date"><?php echo get_the_date( 'd.m.Y' ); ?></div>
								</div>
								<div class="comments-info">
								<?php citygovt_comments_count_two(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php
					$i++;

				}
				wp_reset_postdata();
			}
			?>

			</div>

		</div>
	</div>
</section>

		<?php } elseif ( $style == '2' ) { ?>
<section class="news-section-two">
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $title_1; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
		</div>

		<div class="row clearfix">
			<?php
			$total = 1;
			$i     = 0;

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					global $post;
					$url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'citygovt_blog_latest_news' );

					?>
					<?php if ( $total % 2 > 0 ) { ?>
			<div class="column col-lg-4 col-md-6 col-sm-12">

				<div class="news-block-two">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'citygovt_blog_news' );
						}
						?>
							</figure>
							<div class="cat-info"><span class="fa fa-folder"></span><?php citygovt_category_list(); ?></div>
							<div class="hover-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><span
										class="arrow flaticon-right-2"></span><?php echo esc_html( 'Read More', 'citygovt-core' ); ?></a></div>
						</div>
						<div class="lower-box">
							<div class="upper-title">
								<h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
								</h4>
							</div>
							<div class="post-info"><?php echo esc_html( 'By', 'citygovt-core' ); ?> <?php echo get_the_author(); ?> _ <?php echo get_the_date( 'M d, Y' ); ?></div>
							<div class="text"><?php the_excerpt(); ?></div>
							<div class="more-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( 'Read More', 'citygovt-core' ); ?></a></div>
						</div>
					</div>
				</div>

			</div>
					<?php } elseif ( $total % 2 == 0 ) { ?>
			<div class="column col-lg-4 col-md-6 col-sm-12">
				<div class="news-block-three">
					<div class="inner-box">
						<div class="cat-info"><span class="fa fa-folder"></span><?php citygovt_category_list(); ?></div>
						<div class="text"><?php the_excerpt(); ?></div>
						<div class="post-info"><?php echo esc_html( 'By', 'citygovt-core' ); ?> <?php echo get_the_author(); ?> _ <?php echo get_the_date( 'M d, Y' ); ?></div>
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="over-link"></a>
					</div>
				</div>
				<div class="news-block-two">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'citygovt_blog_news2' );
						}
						?>
							</figure>
							<div class="cat-info"><span class="fa fa-folder"></span><?php citygovt_category_list(); ?></div>
							<div class="hover-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><span
										class="arrow flaticon-right-2"></span><?php echo esc_html( 'Read More', 'citygovt-core' ); ?></a></div>
						</div>
						<div class="lower-box">
							<div class="upper-title">
								<h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
							</div>
							<div class="post-info"><?php echo esc_html( 'By', 'citygovt-core' ); ?> <?php echo get_the_author(); ?> _ <?php echo get_the_date( 'M d, Y' ); ?></div>
						</div>
					</div>
				</div>

			</div>
				<?php } 
					$i++;
					$total++;
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</section>
		<?php } 
	}
}

Plugin::instance()->widgets_manager->register( new City_Govt_Blogs() );
