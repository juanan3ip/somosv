<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package City govt
 */

$preloader_on_off = citygovt_get_options( 'preloader_on_off' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<div class="page-wrapper">
	<!-- Preloader -->
	<?php
	if ( isset( $preloader_on_off ) && ( $preloader_on_off == 1 ) ) :
		do_action( 'citygovt_preloader' );
	endif;
	?>

	<?php
	$header_type = get_query_var( 'header_type' );
	if ( ! $header_type ) {
		$header_type = citygovt_get_options( 'header_style' );
	}

	if ( ! $header_type ) {
		$header_type = 'one';
	}

	?>

	<!-- Main Header -->

	<?php get_template_part( 'components/header/header', $header_type ); ?>

	<!-- End Main Header -->

	<?php get_template_part( 'searchform-top' ); ?>
