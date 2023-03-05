<?php
$footer_widget_elementor      = citygovt_get_options( 'footer_widget_elementor' );
$footer_widget_elementor_mata = get_post_meta( get_the_ID(), 'citygovt_metabox_footer_widget_elementor_mata', true );

if ( class_exists( '\\Elementor\\Plugin' ) ) {
	$pluginElementor              = \Elementor\Plugin::instance();
	$footer_widget_elementor      = $pluginElementor->frontend->get_builder_content( $footer_widget_elementor );
	$footer_widget_elementor_mata = $pluginElementor->frontend->get_builder_content( $footer_widget_elementor_mata );
}
?>
<?php if ( class_exists( '\\Elementor\\Plugin' ) ) { ?>
	<div class="widgets-section">
		<div class="auto-container">
		<?php
		if ( $footer_widget_elementor_mata ) {
			echo sprintf( '%s', $footer_widget_elementor_mata );
		} else {
			echo sprintf( '%s', $footer_widget_elementor );
		}
		?>
		</div>
	</div>
	<?php
}
