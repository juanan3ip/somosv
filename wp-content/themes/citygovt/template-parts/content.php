<!--Start single blog post Style4-->
<?php
$blog_post_share  = citygovt_get_options( 'blog_post_share' );
$blog_post_author = citygovt_get_options( 'blog_post_author' );
$blog_type        = get_query_var( 'blog_type' );
if ( ! $blog_type ) {
	$blog_type = citygovt_get_options( 'blog_post_style' );
}

if ( ! $blog_type ) {
	$blog_type = '1';
}

if ( $blog_type == '2' ) {
	$blog_type = 'news-block-five col-md-6 col-sm-12';
} else {
	$blog_type = 'news-block-four';
}
?>
<div <?php post_class( 'news-block-four ' ); ?>>
	<div class="inner-box">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="image-box">
			<figure class="image"><?php the_post_thumbnail( 'citygovt_blog_post' ); ?></figure>
			<div class="date"><span><?php citygovt_posted_on(); ?></span></div>
			<div class="hover-box">
				<div class="more-link"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'citygovt' ); ?></a></div>
			</div>
		</div>
		<?php endif; ?>
		<div class="lower-box">
				<?php
				if ( is_sticky() ) {
					echo '<div class="sticky_post_icon" title="' . esc_attr__( 'Sticky Post', 'citygovt' ) . '"><i class="fa fa-map-pin"></i></div>';
				}
				?>
			<div class="upper-info">
				<h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
				<div class="cat-info">
					<span><span class="fa fa-folder"></span><?php citygovt_category_list(); ?></span>  /  
					<?php citygovt_comments_count(); ?>
				</div>
			</div>
			<div class="text"><?php the_excerpt(); ?></div>
			<div class="meta-info clearfix">
				<?php if ( $blog_post_author ) { ?>
				<div class="author-info clearfix">
					<div class="author-icon"><span class="flaticon-user-3"></span></div>
					<div class="author-title"><?php esc_html_e( 'by ', 'citygovt' ) . citygovt_posted_by(); ?></div>
				</div>
				<?php } ?>
				<?php
				if ( $blog_post_share ) {
					do_action( 'citygovt_social_share_link' );
				}
				?>
			</div>
		</div>
	</div>
</div>
