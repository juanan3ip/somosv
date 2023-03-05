<?php
get_header();
$sidebar_position = 'right';
$blog_sidebar_bg = citygovt_get_options( 'blog_sidebar_bg' );
$sidebar_position = citygovt_get_options( 'blog_sidebar_position' );

$blog_type = get_query_var( 'blog_type' );
if ( ! $blog_type ) {
	$blog_type = citygovt_get_options( 'blog_post_style' );
}
if ( ! $blog_type ) {
	$blog_type = '1';
}

if ( is_archive() ) {
	get_template_part( 'components/header/breadcrumb/breadcrumb-archive' );
} elseif ( is_search() ) {
	get_template_part( 'components/header/breadcrumb/breadcrumb-search' );
} else {
	get_template_part( 'components/header/breadcrumb/breadcrumb-blog' );
}
?>
<!--Start latest blog area blog-page-->
<section class="sidebar-page-container">
	<div class="auto-container">
		<div class="row clearfix">
		<?php
			if($sidebar_position == 'left'){
				if ( is_active_sidebar( 'citygovt-blog-sidebar' ) ) { ?>
				<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar sidebar_left_side">
						<div class="bg-layer">
					<?php if ( ! empty( $blog_sidebar_bg['url'] ) ) { ?>
							<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $blog_sidebar_bg['url'] ); ?>"></div>
					<?php } else { ?>
								<div class="image-layer"></div>
					<?php } ?>
						</div>
					<?php dynamic_sidebar( 'citygovt-blog-sidebar' ); ?>
					</aside>
				</div>
				<?php 
				} 
			} 
			?>

		<?php if ( is_active_sidebar( 'citygovt-blog-sidebar' ) ) { ?>
			<div class="content-side col-lg-8 col-md-12 col-sm-12">
		<?php } else { ?>
			<div class="content-side col-lg-12 col-md-12 col-sm-12">
		<?php } ?>
			<div class="content-inner">
				<div class="blog-posts">    
				<?php if ( $blog_type == '2' ) { ?>
						<div class="row clearfix">
					<?php
				}
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();

						if ( $blog_type == '2' ) {
							get_template_part( 'template-parts/content', 'grid' );
						} else {
							get_template_part( 'template-parts/content' );
						}

					endwhile;
					wp_reset_postdata();

					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
			<?php
			if ( $blog_type == '2' ) {
				?>
				</div>
			<?php } ?>
				</div>
				<?php
				global $wp_query;
				$total_pages = $wp_query->max_num_pages;
				if ( $total_pages > 1 ) {
					$current_page = max( 1, get_query_var( 'paged' ) );
					echo '<div class="pagination-box text-center"><div class="styled-pagination"> ';
					echo paginate_links(
						array(
							'current'   => $current_page,
							'total'     => $total_pages,
							'prev_text' => '<span class="icon flaticon-arrows-1"></span>' . esc_html__( 'prev', 'citygovt' ),
							'next_text' => esc_html__( 'next', 'citygovt' ) . '<span class="icon flaticon-right-2"></span>',
						)
					);
					echo '</div></div>';
				}
				?>
			</div>
			</div>
			<!--Start sidebar Wrapper-->
			<?php
			if($sidebar_position != 'left'){
				if ( is_active_sidebar( 'citygovt-blog-sidebar' ) ) { ?>
				<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar">
						<div class="bg-layer">
					<?php if ( ! empty( $blog_sidebar_bg['url'] ) ) { ?>
							<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $blog_sidebar_bg['url'] ); ?>"></div>
					<?php } else { ?>
								<div class="image-layer"></div>
					<?php } ?>
						</div>
					<?php dynamic_sidebar( 'citygovt-blog-sidebar' ); ?>
					</aside>
				</div>
				<?php 
				} 
			} ?>
		</div>
	</div>
</section>
<?php
get_footer();
