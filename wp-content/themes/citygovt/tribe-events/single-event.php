<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package goodsoul
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_time_format = citygovt_get_options( 'event_time_format' );


$time_format          = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
$start_datetime       = tribe_get_start_date();
$start_date           = tribe_get_start_date( null, false, 'd F Y' );
$start_time           = tribe_get_start_date( null, false, $time_format );
$start_ts             = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
$end_datetime         = tribe_get_end_date();
$end_date             = tribe_get_display_end_date( null, false );
$end_time             = tribe_get_end_date( null, false, $time_format );
$end_ts               = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
$time_formatted       = null;
if($event_time_format){
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( date("G:i", strtotime($start_time)) );
} else {
	$time_formatted = esc_html( date("G:i", strtotime($start_time)) . $time_range_separator . date("G:i", strtotime($end_time)) );
}}else{
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}}
$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();
$event_id              = get_queried_object_id();
$date_event_counter    = get_post_meta( get_queried_object_id(), 'citygovt_metabox_date_event_counter', true );



$website      = tribe_get_event_website_link();
$phone        = tribe_get_organizer_phone();
$email        = tribe_get_organizer_email();
$organizer_id = tribe_get_organizer_id();
$name         = get_the_title( $organizer_id );

$booking_form_title  = get_post_meta( get_the_ID(), 'citygovt_metabox_booking_form_title', true );
$booking_form        = get_post_meta( get_the_ID(), 'citygovt_metabox_booking_form', true );
$post_img_url        = get_the_post_thumbnail_url();
$book_facebook_url   = get_post_meta( get_the_ID(), 'citygovt_metabox_facebook_link', true );
$booking_twitter_url = get_post_meta( get_the_ID(), 'citygovt_metabox_twitter_link', true );
$booking_form_title  = get_post_meta( get_the_ID(), 'citygovt_metabox_booking_form_title', true );
$booking_form        = get_post_meta( get_the_ID(), 'citygovt_metabox_booking_form', true );
$post_img_url        = get_the_post_thumbnail_url();

$event_single_title_bg = citygovt_get_options( 'event_single_title_bg' );
$event_post_share      = citygovt_get_options( 'event_post_share' );
$related_events        = citygovt_get_options( 'related_events' );
?>
<!--Page Banner-->
<section class="event-banner">
	<?php if ( $event_single_title_bg['url'] ) { ?>
		<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $event_single_title_bg['url'] ); ?>"></div>
	<?php } else { ?>
		<div class="image-layer bg_image" data-image-src="<?php echo esc_url( $post_img_url ); ?>"></div>
	<?php } ?>
	<div class="banner-inner">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<div class="cat-info clearfix">
				<?php
				$cats = get_the_terms( get_the_ID(), 'tribe_events_cat', ' ' );
				foreach ( $cats as $cat ) {
					echo '<span>' . $cat->name . '</span> ';
				}
				?>
				</div>
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
<section class="event-details-section">
	<div class="auto-container">
		<div class="event-details">
			<div class="row clearfix">
				<div class="content-column col-lg-8 col-md-12 col-sm-12">
					<div class="content-inner">
						<div class="info-blocks">
							<div class="row clearfix">
								<div class="info-block col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon"><span class="flaticon-circular-clock"></span></div>
										<h4><?php esc_html_e( 'Date &amp; Time', 'citygovt' ); ?></h4>
										<ul>
											<li><?php echo esc_html( $start_date ); ?></li>
											<li><?php echo esc_html( $time_formatted ); ?></li>
										</ul>
									</div>
								</div>
								<div class="info-block col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon"><span class="flaticon-map"></span></div>
										<h4><?php esc_html_e( 'Location', 'citygovt' ); ?></h4>
										<ul>
											<li><?php echo tribe_get_full_address(); ?></li>
										</ul>
									</div>
								</div>
							</div>
						</div>    
						<div class="main-image">
							<figure class="image"><?php echo tribe_event_featured_image( $event_id, 'full', false ); ?></figure>
						</div>
						<?php the_content(); ?>
						
						<?php
						if ( $event_post_share ) {
							do_action( 'citygovt_social_share_link' );
						}
						?>
						<?php
						if ( $related_events ) {
							citygovt_related_event();
						}
						?>
					</div>
				</div>
				<div class="info-column col-lg-4 col-md-12 col-sm-12">
					<div class="info-inner">
						<div class="title"><h4><?php esc_html_e( 'Contact Details', 'citygovt' ); ?></h4></div>
						<div class="content">
							<div class="contact-box">
								<div class="info">
									<ul>
										<?php if ( ! empty( $name ) ) { ?>
										<li class="clearfix"><span class="ttl"><?php esc_html_e( 'Organizer:', 'citygovt' ); ?></span> <span class="dtl"><?php echo esc_html( $name ); ?></span></li>
										<?php } ?>
										<?php if ( ! empty( $phone ) ) { ?>
										<li class="clearfix"><span class="ttl"><?php esc_html_e( 'Phone:', 'citygovt' ); ?></span> 
										<span class="dtl"><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></span></li>
										<?php } ?>
										<?php if ( ! empty( $email ) ) { ?>
										<li class="clearfix"><span class="ttl"><?php esc_html_e( 'Email:', 'citygovt' ); ?></span> <span class="dtl"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></span></li>
										<?php } ?>
										<?php if ( ! empty( $book_facebook_url ) || ! empty( $booking_twitter_url ) ) { ?>
										<li class="clearfix"><span class="ttl">
											<?php esc_html_e( 'Social connect:', 'citygovt' ); ?></span> <span class="dtl">
											<?php if ( ! empty( $book_facebook_url ) ) { ?>
										<a href="<?php echo esc_url( $book_facebook_url ); ?>"><?php esc_html_e( 'Facebook', 'citygovt' ); ?></a>
										<?php }  if ( ! empty( $booking_twitter_url ) ) { ?>
										<a href="<?php echo esc_url( $booking_twitter_url ); ?>"><?php esc_html_e( 'Twitter', 'citygovt' ); ?></a></span>
										<?php } ?>
										 </li>
										<?php } ?>
										<?php if ( ! empty( $website ) ) { ?>
										<li class="clearfix"><span class="ttl"><?php esc_html_e( 'Website', 'citygovt' ); ?></span> <span class="dtl"><?php echo wp_kses_post( $website ); ?></span></li>
										<?php } ?>
									</ul>
								</div>
								<div class="location-box">
									<div class="map-canvas">
										<?php
										$event_map = tribe_get_embedded_map();
										if ( empty( $event_map ) ) {
											return;
										}
										echo sprintf( '%s', $event_map );
										?>
									</div> 
								</div> 
								<div class="default-form booking-form">
									<h4><?php echo esc_html( $booking_form_title ); ?></h4>
								  <?php echo do_shortcode( $booking_form ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
