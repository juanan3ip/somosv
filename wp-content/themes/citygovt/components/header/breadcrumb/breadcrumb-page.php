<?php
$header_bg       = get_the_post_thumbnail_url();
$show_breadcrumb = get_post_meta( get_the_ID(), 'citygovt_metabox_show_breadcrumb', true );
?>
<?php
if ( ! is_front_page() ) {
	if ( $show_breadcrumb != 'off' ) {
		?>
<section class="page-banner">
		<?php if ( $header_bg ) { ?>
	<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $header_bg ); ?>"></div>
	<?php } else { ?>
		<div class="image-layer"></div>
	<?php } ?>
	<div class="banner-inner">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<h1><?php echo esc_html( the_title() ); ?></h1>
				<?php if ( function_exists( 'bcn_display' ) ) : ?>
				<div class="page-nav">
					<ul class="bread-crumb clearfix">
					<?php bcn_display(); ?> 
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
		<?php
	}
}
?>
