<?php
$footer_social_onoff = citygovt_get_options( 'footer_social_onoff' );
$footer_social       = citygovt_get_options( 'footer_social' );
$footer_copyright    = citygovt_get_options( 'footer_copyright' );
$private_policy_url  = citygovt_get_options( 'private_policy_url' );
$terms_url           = citygovt_get_options( 'terms_url' );
$footer_logo         = citygovt_get_options( 'footer_logo' );
?>
<footer class="main-footer-two">
	<div class="auto-container">
		<div class="upper-logo-box">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php esc_attr_e( 'footer logo', 'citygovt' ); ?>"></a>
			</div>
		</div>
	</div>
	<?php get_template_part( 'components/footer-widget' ); ?>   
	<!-- Footer Bottom -->
	<div class="footer-bottom">
		<div class="auto-container">
			<div class="inner clearfix">
				<?php if ( $footer_social_onoff ) { ?>
				<ul class="social-links clearfix">
					<li><span class="social-title"><?php esc_html_e( 'Connect with:', 'citygovt' ); ?></span></li>
					<?php echo wp_kses( $footer_social, 'code_context' ); ?>
				</ul>
				<?php } ?>
				<div class="copyright">
				<?php
				if ( $footer_copyright ) {
					echo wp_kses( $footer_copyright, 'code_context' );
				} else {
					echo wp_kses( 'Copyrights <a href="#">© 2020 london city govt.</a> All rights reserved.', 'code_context' );
				}
				?>
				</div>
				<ul class="footer-links clearfix">
					<?php if ( ! empty( $private_policy_url ) ) { ?>
					<li><a href="<?php echo esc_url( $private_policy_url ); ?>"><?php esc_html_e( 'Private policy', 'citygovt' ); ?></a></li>
					<?php } ?>
					<?php if ( ! empty( $terms_url ) ) { ?>
					<li><a href="<?php echo esc_url( $terms_url ); ?>"><?php esc_html_e( 'Terms of use', 'citygovt' ); ?></a></li>
					<?php } ?>
				</ul>

			</div>
		</div>
	</div>    
</footer>
