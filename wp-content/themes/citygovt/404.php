<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package    WordPress
 * @subpackage citygovt
 * @since      1.0.0
 */

get_header();
get_template_part( 'components/header/breadcrumb/breadcrumb-404' );
?>
<div class="error-section">
	<div class="auto-container">
		<div class="content">
			<div class="big-text">
				<span class="num"><?php esc_html_e( '404', 'citygovt' ); ?></span>
				<div class="med-text"><?php esc_html_e( 'Not Found', 'citygovt' ); ?></div>
			</div>
			<h2><?php esc_html_e( 'Something went wrong, try later', 'citygovt' ); ?></h2>
			<div class="text"><?php esc_html_e( 'You may have mistyped the address or the page <br>may have moved.', 'citygovt' ); ?></div>
			<div class="link-box"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><span class="btn-title"><?php esc_html_e( 'Back to Home', 'citygovt' ); ?></span></a></div>
		</div>
	</div>
</div>
<?php
get_footer();
