<?php
$blog_page_header      = citygovt_get_options( 'blog_page_header' );
$blog_page_header_text = citygovt_get_options( 'blog_page_header_text' );
$blog_header_bg        = citygovt_get_options( 'blog_header_bg' );
?>

<section class="page-banner">
	<?php if ( $blog_header_bg ) { ?>
	<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $blog_header_bg['url'] ); ?>"></div>
	<?php } else { ?>
		<div class="image-layer"></div>
	<?php } ?>
	<div class="banner-inner">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<h1>
				<?php
				if ( $blog_page_header_text ) {
					echo esc_html( $blog_page_header_text );
					
				} else {
					esc_html_e( 'Blog Posts', 'citygovt' );
				}
				?>
				</h1>
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

