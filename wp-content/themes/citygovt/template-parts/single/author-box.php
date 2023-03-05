<?php
global $post;
$display_name = get_the_author_meta( 'display_name', $post->post_author );
$url          = get_the_author_meta( 'url', $post->post_author );
$user_text    = get_the_author_meta( 'user_description', $post->post_author );
$user_avatar  = get_avatar( $post->post_author, 160 );
if ( isset( $user_text ) && ! empty( $user_text ) ) {
	?>
<div class="author-box">
	<div class="inner-box">
		<figure class="thumb"><?php echo wp_kses( $user_avatar, 'author_avatar' ); ?></figure>
		<h4><?php echo esc_html( ucfirst( $display_name ) ); ?>, <span><?php esc_html_e( 'Author', 'citygovt' ); ?></span></h4>
		<?php
		if ( $url ) {
			?>
			<div class="link"><a href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'Visit:', 'citygovt' ); ?> <?php echo esc_html( $url ); ?></a></div><?php } ?>
		<div class="text"><?php echo wp_kses( $user_text, 'code_context' ); ?></div>
		<?php if ( $url ) { ?>
		<div class="follow-me">
			<a href="<?php echo esc_url( $url ); ?>"><span class="icon flaticon-share"></span> <?php esc_html_e( 'Follow Me On', 'citygovt' ); ?></a>
		</div>
		<?php } ?>
	</div>
</div>
	<?php
}
