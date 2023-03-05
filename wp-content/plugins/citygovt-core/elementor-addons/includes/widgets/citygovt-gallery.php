<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Citygovt_Gallery extends Widget_Base {

	public function get_name() {
		return 'masonary_gallery1';
	}

	public function get_title() {
		return __( 'Gallery', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'crs_section_gallery',
			array(
				'label' => __( 'Gallery', 'citygovt-core' ),
			)
		);
		$this->add_control(
			'layout_style',
			array(
				'label'   => __( 'Layout Style', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'citygovt-core' ),
					'2' => __( 'Style 2', 'citygovt-core' ),
					'3' => __( 'Style 3', 'citygovt-core' ),

				),
			)
		);
		$this->add_control(
			'gallery_title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'What We Have Done In Our <br>City Council', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'showposts',
			array(
				'label'   => __( 'Number of Gallary', 'citygovt-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
			)
		);

		$this->add_control(
			'orderby',
			array(
				'label'   => __( 'Order By', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'     => __( 'Date', 'citygovt-core' ),
					'ID'       => __( 'ID', 'citygovt-core' ),
					'title'    => __( 'Title', 'citygovt-core' ),
					'name'     => __( 'Name', 'citygovt-core' ),
					'modified' => __( 'Modified', 'citygovt-core' ),
					'rand'     => __( 'Rand', 'citygovt-core' ),
				),
			)
		);

		$this->add_control(
			'order',
			array(
				'label'   => __( 'Sort Order', 'citygovt-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => __( 'Descending', 'citygovt-core' ),
					'ASC'  => __( 'Ascending', 'citygovt-core' ),
				),
			)
		);
		$this->add_control(
			'show_title',
			array(
				'label'        => __( 'Linked to single page', 'citygovt-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'citygovt-core' ),
				'label_off'    => __( 'Off', 'citygovt-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings();
		$showposts     = $settings['showposts'];
		$orderby       = $settings['orderby'];
		$order         = $settings['order'];
		$gallery_title = $settings['gallery_title'];
		$layout_style  = $settings['layout_style'];

		$prefix = 'citygovt_metabox';

		$test_query = new \WP_Query( "post_type=gallery&showposts={$showposts}&orderby={$orderby}&order={$order}" );

		$filter_content_class = '';?>


		<?php if ( $layout_style == '1' ) { ?>
<section class="portfolio-section loadmore-gallery-one portfolio-mixitup">
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $gallery_title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
		</div>
		<!--Mixit Galery-->
		<div class="mixit-gallery filter-gallery">
			<div class="filters clearfix">
				<ul class="filter-tabs filter-btns clearfix">
					<li class="filter active" data-role="button" data-filter="all">
								<?php echo wp_kses_post( __( 'View All', 'citygovt-core' ) ); ?></li>

							<?php
							$taxonomy = 'gallery-cat';
							$terms    = get_terms(
								$taxonomy,
								array(
									'orderby' => $orderby,
									'order'   => $order,
								)
							);
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								 $filters = array( ' ' );
								foreach ( $terms as $term ) {
									$filters[] = $term->slug;
									echo '<li class="filter" data-role="button" data-filter=".' . $term->slug . '">' . $term->name . '</li>';

								}
							}
							?>

				</ul>
			</div>


					<?php
					if ( $test_query->have_posts() ) :

						echo '<div class="filter-gallery-one row clearfix">';

						while ( $test_query->have_posts() ) :
							$test_query->the_post();
							$post_id = get_the_ID();
							$terms   = get_the_terms( $post_id, 'gallery-cat' );

							$terms        = get_the_terms( get_the_ID(), 'gallery-cat' );
							$filter_class = '';
							if ( $terms && ! is_wp_error( $terms ) ) :
								$filter = array();
								foreach ( $terms as $term ) {
										$filter[] = $term->slug;
								}
								$filter_class = join( ' ', $filter );
							endif;

							?>

			<div class="gallery-block mix all <?php echo esc_attr( $filter_class ); ?> col-lg-4 col-md-6 col-sm-12">
				<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="image-box">
						<figure class="image">
							<?php
								the_post_thumbnail();
								$image_url1 = wp_get_attachment_url( get_post_thumbnail_id() );
							?>
						</figure>
						<div class="zoom-btn">
							<a class="lightbox-image zoom-link" href="<?php echo esc_url( $image_url1 ); ?>"
								data-fancybox="gallery"><span class="icon flaticon-zoom-in"></span></a>
						</div>
						<div class="cap-box">
							<h6><?php the_title(); ?></h6>
							<a href="
							<?php
							$settings = $this->get_settings_for_display();
							if ( 'yes' === $settings['show_title'] ) {
								the_permalink();
							} else {
								echo '#';
							}
							?>
										 " ><h3><span>[</span>
							<?php the_title(); ?> <span>]</span></h3></a>
						</div>
					</div>

				</div>
			</div>

							<?php
				endwhile;
						echo '</div>';
							endif;
					?>

			<div class="loadmore"></div>
		</div>
	</div>
</section>

		<?php } elseif ( $layout_style == '2' ) { ?>
<section class="portfolio-section portfolio-mixitup">
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $gallery_title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
		</div>

		<div class="mixit-gallery filter-gallery">
			<div class="filters clearfix">
				<ul class="filter-tabs filter-btns clearfix">
					<li class="filter" data-role="button" data-filter="all">
						<?php echo wp_kses_post( __( 'View All', 'citygovt-core' ) ); ?></li>

					<?php
					$taxonomy = 'gallery-cat';
					$terms    = get_terms(
						$taxonomy,
						array(
							'orderby' => $orderby,
							'order'   => $order,
						)
					);
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						  $filters = array( '' );
						foreach ( $terms as $term ) {
							$filters[] = $term->slug;
							echo '<li class="filter" data-role="button" data-filter=".' . $term->slug . '">' . $term->name . '</li>';

						}
					}
					?>

				</ul>
			</div>
					<?php
					if ( $test_query->have_posts() ) :
						$rand   = rand( 000000, 999999 );
						$prefix = 'citygovt_metabox';

						echo '<div class="filter-list row clearfix">';

						while ( $test_query->have_posts() ) :
							 $test_query->the_post();
							 $post_id = get_the_ID();
							 $terms   = get_the_terms( $post_id, 'gallery-cat' );

							 $terms        = get_the_terms( get_the_ID(), 'gallery-cat' );
							 $filter_class = '';
							if ( $terms && ! is_wp_error( $terms ) ) :
								$filter = array();
								foreach ( $terms as $term ) {
										  $filter[] = $term->slug;
								}
								$filter_class = join( ' ', $filter );
							endif;

							?>

			<div class="gallery-block mix  <?php echo esc_attr( $filter_class ); ?> col-lg-4 col-md-6 col-sm-12">
				<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="image-box">
						<figure class="image">
							<?php
							the_post_thumbnail( 'citygovt_grid_2' );
							$image_url = wp_get_attachment_url( get_post_thumbnail_id() );
							?>
						</figure>
						<div class="zoom-btn">
							<a class="lightbox-image zoom-link" href="<?php echo esc_url( $image_url ); ?>"
								data-fancybox="gallery"><span class="icon flaticon-zoom-in"></span></a>
						</div>
						<div class="cap-box">
							<h6><?php the_title(); ?></h6>
							<h4><span>[</span>
								<?php the_title(); ?> <span>]</span></h4>
						</div>
					</div>
					<div class="lower-box">
						<h4><?php the_title(); ?></h4>
					</div>
				</div>
			</div>


							<?php
			endwhile;
						echo '</div>';
						endif;
					?>

			<div class="pagination-box text-center">
						<?php
						$the_query = new WP_Query(
							array(
								'posts_per_page' => $showposts,
								'post_type'      => 'gallery',
								'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
							)
						);
						$big       = 999999999;
						?>
				<div class="styled-pagination custom-pagination-style">
					<?php
					echo paginate_links(
						array(
							'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
							'format'    => '?paged=%#%',
							'current'   => max( 1, get_query_var( 'paged' ) ),
							'total'     => $the_query->max_num_pages,
							'prev_text' => '<span class="icon flaticon-left-1"></span>' . __( 'prev' ),
							'next_text' => __( 'next' ) . '<span class="icon flaticon-right-2"></span>',
						)
					);
					?>
				</div>
						<?php
						wp_reset_postdata();

						?>

			</div>

		</div>
	</div>
</section>


		<?php } elseif ( $layout_style == '3' ) { ?>
<section class="portfolio-section portfolio-masonry">
	<div class="auto-container">
		<div class="sec-title with-separator centered">
			<h2><?php echo $gallery_title; ?></h2>
			<div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
					class="cir c-3"></span></div>
		</div>
		<div class="sortable-masonry filter-gallery">
			<div class="filters clearfix">
				<ul class="filter-tabs filter-btns clearfix">
					<li class="filter active" data-role="button" data-filter=".all"><?php esc_html_e( 'View All', 'citygovt-core' ); ?></li>
					<?php
					$taxonomy = 'gallery-cat';
					$terms    = get_terms(
						$taxonomy,
						array(
							'orderby' => $orderby,
							'order'   => $order,
						)
					);
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								$filters = array( '' );
						foreach ( $terms as $term ) {
							$filters[] = $term->slug;
							echo '<li class="filter" data-role="button" data-filter=".' . $term->slug . '">' . $term->name . '</li>';
						}
					}
					?>
				</ul>
			</div>
		<?php
		if ( $test_query->have_posts() ) :
			$rand = rand( 000000, 999999 );
			echo '<div class="items-container row clearfix">';
			while ( $test_query->have_posts() ) :
					$test_query->the_post();
					$post_id      = get_the_ID();
					$terms        = get_the_terms( $post_id, 'gallery-cat' );
					$filter_class = '';
				if ( $terms && ! is_wp_error( $terms ) ) :
					$filter = array();
					foreach ( $terms as $term ) {
						$filter[] = $term->slug;
					}
					$filter_class = join( ' ', $filter );
				endif;
				$portfolio_style_select = get_post_meta( $post_id, "{$prefix}-portfolio_column_select", true );
				?>
					<div class="gallery-block masonry-item all <?php echo esc_attr( $filter_class ); ?> <?php echo $portfolio_style_select; ?> col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="image-box">
								<figure class="image">
									<?php
									$gallery_image = get_post_meta( $post_id, "{$prefix}-gallery", false );
									if ( isset( $gallery_image[0] ) && ! empty( $gallery_image[0] ) ) {
										$image_url = wp_get_attachment_image_url( $gallery_image[0], 'full' );
										echo wp_get_attachment_image( $gallery_image[0], 'full' );
									} else {
										the_post_thumbnail();
										$image_url = get_the_post_thumbnail_url( 'full' );
									}
									?>
								</figure>
								<div class="zoom-btn">
									<a class="lightbox-image zoom-link" href="<?php echo esc_url( $image_url ); ?>"
										data-fancybox="gallery"><span class="icon flaticon-zoom-in"></span></a>
								</div>
								<div class="cap-box">
									<h6><?php the_title(); ?></h6>
									<h3><span>[</span> <?php the_title(); ?><span>]</span></h3>
								</div>
							</div>
						</div>
					</div>
					<?php
					endwhile;
						echo '</div>';
					endif;
					?>
				</div>
			</div>
		</section>
			<?php
		}
	}
}

Plugin::instance()->widgets_manager->register( new \Citygovt_Gallery() );
