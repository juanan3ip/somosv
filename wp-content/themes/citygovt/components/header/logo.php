<?php
if ( has_custom_logo() ) {
	the_custom_logo();
} elseif ( ! has_custom_logo() ) {
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img src="<?php echo esc_url( CITYGOVT_IMG_URL . 'logo.png' ); ?>" alt="<?php esc_attr_e( 'Logo', 'citygovt' ); ?>">
	</a> 
	<?php
} else {

	if ( is_front_page() && is_home() ) :
		?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
	else :
		?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
	endif;
	$citygovt_description = get_bloginfo( 'description', 'display' );
	if ( $citygovt_description || is_customize_preview() ) :
		?>
		<p class="site-description"><?php echo esc_html( $citygovt_description ); /* WPCS: xss ok. */ ?></p>
		<?php
	endif;
}
?>
