<?php get_header();
$blog_post_share      = citygovt_get_options( 'blog_post_share' );
$blog_single_post_nav = citygovt_get_options( 'blog_single_post_nav' );
$blog_single_post_author_box = citygovt_get_options( 'blog_single_post_author_box' );
$blog_single_title_bg = citygovt_get_options( 'blog_single_title_bg' );
$blog_sidebar_bg      = citygovt_get_options( 'blog_sidebar_bg' );
$sidebar_position = citygovt_get_options( 'blog_sidebar_position' );
?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		global $post;
		$user_avatar = get_avatar( $post->post_author, 70 );
		?>
<!--Start latest blog area blog-page-->
<section class="blog-banner">
		<?php if ( $blog_single_title_bg ) { ?>
		<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $blog_single_title_bg['url'] ); ?>"></div>
		<?php } else { ?>
	<div class="image-layer"></div>
		<?php } ?>
	<div class="banner-inner">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<div class="meta-info clearfix">
					<span><span class="fa fa-folder"></span><?php citygovt_category_list(); ?></span>  /  <?php citygovt_comments_count(); ?>
				</div>
				<h1><?php the_title(); ?></h1>
				<?php if ( $blog_single_post_author_box ) { ?>
				<div class="author-info">
					<figure class="image"><?php echo wp_kses( $user_avatar, 'author_avatar' ); ?></figure>
					<h6><?php esc_html_e( 'by ', 'citygovt' ) . citygovt_posted_by(); ?></h6>
				</div>
				<?php } ?>
				<div class="other-info clearfix">
					<div class="date"><span><?php citygovt_posted_on(); ?></span></div>
					<?php citygovt_tag_list(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
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
			} ?>

		<?php if ( is_active_sidebar( 'citygovt-blog-sidebar' ) ) { ?>
			<div class="content-side col-lg-8 col-md-12 col-sm-12">
		<?php } else { ?>
			<div class="content-side col-lg-12 col-md-12 col-sm-12">
		<?php } ?>
				<div class="content-inner">    
					<div class="single-post">    
						<div class="post-details">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="main-image-box">
								<figure class="image"><?php the_post_thumbnail( 'citygovt_blog_post' ); ?></figure>
							</div>
						<?php } ?>
							<?php
							the_content();
							wp_link_pages(
								array(
									'before' => '<div class="pagination-box"><div class="styled-pagination">',
									'after'  => '</div></div>',
								)
							);
							?>
						</div>
						<?php
						if ( $blog_post_share ) {
							do_action( 'citygovt_social_share_link' );
						}
						?>
						<?php 
						if ( $blog_single_post_author_box ) {
							get_template_part( 'template-parts/single/author-box' );
						}
						?>
						<?php
						if ( $blog_single_post_nav ) {
							citygovt_posts_nav();
						}
						?>
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
							endif;
						?>
					</div>    
				</div>    
			</div>
			<!--Sidebar Side-->
		<?php
		if($sidebar_position != 'left'){
			if ( is_active_sidebar( 'citygovt-blog-sidebar' ) ) { ?>
					<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
						<div class="sidebar-wrapper">
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
					</div>
			<?php 
			} 
		} ?>    
		</div>
	</div>
</section>
		<?php
	endwhile;
endif;
?>
<?php
get_footer();
