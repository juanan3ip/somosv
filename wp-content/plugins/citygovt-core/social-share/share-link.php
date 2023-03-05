<?php
add_action( 'citygovt_social_share_link', 'citygovt_social_share_post_link' );

function citygovt_social_share_post_link() {
	global $post;
	?>
	<?php if ( is_single() ) { ?>
	<div class="share-post">
		<strong><?php esc_html_e( 'Share this post with your friends', 'citygovt-core' ); ?></strong>
		<ul class="links clearfix">
			<li class="facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink( $post ); ?>"><span class="icon fab fa-facebook-f"></span><span class="txt"><?php esc_html_e( 'Facebook', 'city-govt-core' ); ?></span></a></li>
			<li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink( $post ); ?>"><span class="icon fab fa-twitter"></span><span class="txt"><?php esc_html_e( 'Twitter', 'city-govt-core' ); ?></span></a></li>
			<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink( $post ); ?>"><span class="icon fab fa-linkedin-in"></span><span class="txt"><?php esc_html_e( 'Linkedin', 'city-govt-core' ); ?></span></a></li>
			<li class="pinterest"><a href="https://www.pinterest.com/pin/find/?url=<?php echo get_the_permalink( $post ); ?>"><span class="icon fab fa-pinterest-p"></span><span class="txt"><?php esc_html_e( 'Pinterest', 'city-govt-core' ); ?></span></a></li>
		</ul>
	</div>
	<?php } else { ?>
		<div class="share-it">
			<div class="share-btn"><span class="icon flaticon-share"></span></div>
			<div class="share-list">
				<ul>
					<li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink( $post ); ?>"><span class="fab fa-facebook-f"></span></a></li>
					<li><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink( $post ); ?>"><span class="fab fa-twitter"></span></a></li>
					<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink( $post ); ?>"><span class="fab fa-linkedin-in"></span></a></li>
				</ul>
			</div>
		</div>
	<?php } ?>

	<?php
}
