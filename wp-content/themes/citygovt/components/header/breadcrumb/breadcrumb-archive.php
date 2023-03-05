<?php
$breadcrumb_bg = citygovt_get_options( 'blog_header_bg' );
?>
<section class="page-banner">
<?php if ( $breadcrumb_bg ) { ?>
	<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $breadcrumb_bg['url'] ); ?>"></div>
	<?php } else { ?>
		<div class="image-layer"></div>
		<?php } ?>	
	<div class="banner-inner">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<h1><?php echo the_archive_title( '<h1 class="page-title">', '</h1>' );	?></h1>
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
