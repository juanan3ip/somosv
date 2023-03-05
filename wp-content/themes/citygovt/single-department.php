<?php get_header();
$departments_sidebar_bg = citygovt_get_options( 'departments_sidebar_bg' );
$header_bg       = citygovt_get_options( 'departments_header_bg' );
$sidebar_position       = citygovt_get_options( 'departments_sidebar_position' );
?>
<section class="page-banner">
		<?php if ( $header_bg ) { ?>
	<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $header_bg['url'] ); ?>"></div>
		<?php } else { ?>
		<div class="image-layer"></div>
		<?php } ?>
	<div class="banner-inner">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<h1><?php echo esc_html( the_title() );  ?></h1>
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

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

<div class="sidebar-page-container">
	<div class="auto-container">
		<div class="row clearfix">


		<?php 
		if($sidebar_position == 'left'){
			if ( is_active_sidebar( 'citygovt-department-sidebar' ) ) { ?>
				<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar sidebar_left_side">
				<?php if ( ! empty( $departments_sidebar_bg['url'] ) ) { ?>
						<div class="bg-layer">
							<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $departments_sidebar_bg['url'] ); ?>">
							</div>
						</div>
				<?php } ?>
				<?php dynamic_sidebar( 'citygovt-department-sidebar' ); ?>
					</aside>
				</div>
			<?php 
			}
		} 
		?>

			<!--Content Side-->
			<div class="content-side col-lg-8 col-md-12 col-sm-12">
				<div class="content-inner">
					<div class="service-details">
						<h2><?php echo the_title(); ?></h2>    
						<?php the_content(); ?>
					</div>
				</div>
			</div>

			<!--Sidebar Side-->

		<?php 
		if($sidebar_position == 'right'){
			if ( is_active_sidebar( 'citygovt-department-sidebar' ) ) { ?>
				<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar">
				<?php if ( ! empty( $departments_sidebar_bg['url'] ) ) { ?>
						<div class="bg-layer">
							<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $departments_sidebar_bg['url'] ); ?>">
							</div>
						</div>
				<?php } ?>
				<?php dynamic_sidebar( 'citygovt-department-sidebar' ); ?>
					</aside>
				</div>
			<?php 
			}
	 	} 
	 	?>
		</div>
	</div>
</div>
		<?php
	endwhile;
endif;
?>
<?php
get_footer();
