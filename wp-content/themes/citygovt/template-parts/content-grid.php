<?php
$blog_post_author = citygovt_get_options( 'blog_post_author' );
?>
<div <?php post_class( 'news-block-five col-md-6 col-sm-12 ' ); ?>>
	<div class="inner-box">
		<div class="image-box">
			<figure class="image"><?php the_post_thumbnail( 'citygovt_blog_latest_news' ); ?></figure>
			<div class="date"><span><?php citygovt_posted_on(); ?></span></div>
			<div class="hover-box">
				<div class="more-link"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'citygovt' ); ?></a></div>
			</div>
		</div>
		<div class="lower-box">
			<div class="upper-info">
				<h4><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
				<div class="cat-info">
						<span><span class="fa fa-folder"></span><?php citygovt_category_list(); ?></span>
				</div>
			</div>
			<div class="meta-info clearfix">
			<?php if ( $blog_post_author ) { ?>
				<div class="author-info clearfix">
					<div class="author-icon"><span class="flaticon-user-3"></span></div>
					<div class="author-title"><?php esc_html_e( 'by ', 'citygovt' ) . citygovt_posted_by(); ?></div>
				</div>
			<?php } ?>
				<div class="comments-info">
				<?php citygovt_comments_count(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
