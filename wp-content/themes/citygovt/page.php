<?php
get_header();
$unit_test_onoff = citygovt_get_options( 'unit_test_on_off' );

if ( $unit_test_onoff ) {
	$page_class = 'page-content';
} else {
	$page_class = 'sidebar-page-container container unit-test';
}
if ( ! is_singular( 'tribe_events' ) ) {
	get_template_part( 'components/header/breadcrumb/breadcrumb-page' );
}
?>
<div class="<?php echo esc_attr( $page_class ); ?>">            
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="pagination-box"><div class="styled-pagination">',
						'after'  => '</div></div>',
					)
				);
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

				<?php
			endwhile;
		endif;
		?>
</div>
<?php
get_footer();
