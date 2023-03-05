<?php
$footer_social_onoff = citygovt_get_options( 'footer_social_onoff' );
$footer_social       = citygovt_get_options( 'footer_social' );
$footer_copyright    = citygovt_get_options( 'footer_copyright' );
$unit_test_onoff     = citygovt_get_options( 'unit_test_on_off' );

if ( $unit_test_onoff ) {
	$page_class = '';
} else {
	$page_class = 'footer-unit-test';
}
?>
<footer class="main-footer <?php echo esc_attr( $page_class ); ?>">
	<?php get_template_part( 'components/footer-widget' ); ?>    
	<!-- Footer Bottom -->
	<div class="footer-bottom">
		<div class="auto-container">
			<div class="inner">
				<div class="copyright">
				<?php
				if ( $footer_copyright ) {
					echo wp_kses( $footer_copyright, 'code_context' );
				} else {
					echo wp_kses( 'Copyrights <a href="#">© 2020 london city govt.</a> All rights reserved.', 'code_context' );
				}
				?>
				</div>
				<?php if ( $footer_social_onoff ) { ?>
				<ul class="social-links clearfix">
					<?php echo wp_kses( $footer_social, 'code_context' ); ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>    
</footer>
