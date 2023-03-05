<?php
$header_top_onoff               = citygovt_get_options( 'header_top_onoff' );
$header_left_text               = citygovt_get_options( 'header_left_text' );
$header_email                   = citygovt_get_options( 'header_email' );
$header_location                = citygovt_get_options( 'header_location' );
$header_phone                   = citygovt_get_options( 'header_phone' );
$header_office_time             = citygovt_get_options( 'header_office_time' );
$header_language_switcher       = citygovt_get_options( 'header_language_switcher' );
$header_language_switcher_onoff = citygovt_get_options( 'header_language_switcher_onoff' );
$header_social_onoff            = citygovt_get_options( 'header_social_onoff' );
$header_social                  = citygovt_get_options( 'header_social' );
$header_social_mobile           = citygovt_get_options( 'header_social_mobile' );
$header_search_onoff            = citygovt_get_options( 'header_search_onoff' );
$mobile_menu_logo               = citygovt_get_options( 'mobile_menu_logo' );
$country_flag                   = citygovt_get_options( 'country_flag' );
$header_sticky_on_off           = citygovt_get_options( 'header_sticky_on_off' );

if ( $header_sticky_on_off ) {
	$sticky_class = '';
}else{
	$sticky_class = 'header-sticky-off';
}

?>

<!-- Main Header -->
<header class="main-header header-style-two <?php echo esc_attr($sticky_class);?>">
	<!-- Header Top -->
	<?php if ( $header_top_onoff ) { ?>
	<div class="header-top header-top-two">
		<div class="auto-container">
			<div class="inner clearfix">
				<div class="top-left clearfix">
					<?php if ( $header_left_text ) { ?>
					<div class="left-text"><span class="icon flaticon-right-2"></span> <?php echo esc_html( $header_left_text ); ?></div>
					<?php } ?>
					<ul class="info clearfix">
						<li class="phone"><a href="tel:<?php echo esc_attr( $header_phone ); ?>"><span class="icon fa fa-phone-alt"></span><?php esc_html_e( 'call on:', 'citygovt' ); ?> <?php echo esc_html( $header_phone ); ?></a></li>
						<li class="email"><a href="mailto:<?php echo esc_attr( $header_email ); ?>"><span class="icon fa fa-envelope"></span><?php echo esc_html( $header_email ); ?></a></li>
					</ul>    
				</div>
				<div class="top-right clearfix">
					<!--Language-->
					<div class="language">
					<?php if ( $header_language_switcher_onoff ) { ?>
						<div class="language">
						<?php echo wp_kses( $header_language_switcher, 'code_context' ); ?>
						</div>
					<?php } ?>
					</div>
					<!--Social Links-->
					<?php if ( $header_social_onoff ) { ?>
						<div class="social-links-two">
							<ul class="clearfix">
							<?php echo wp_kses( $header_social, 'code_context' ); ?>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Header Upper -->
	<div class="header-upper">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<!--Logo-->
				<div class="logo-box clearfix">
					<div class="logo">
					<?php get_template_part( 'components/header/logo' ); ?>
					</div>
				</div>
				<!--Nav-->
				<div class="nav-outer clearfix">
					<!--Mobile Navigation Toggler-->
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>
					<!-- Main Menu -->
					<nav class="main-menu navbar-expand-md navbar-light">
						<div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
							<?php
							$menu_arguments = array(
								'theme_location'  => 'primary_navigation',
								'container'       => 'div',
								'container_class' => 'collapse navbar-collapse',
								'menu_class'      => 'navigation clearfix',
								'echo'            => true,
								'fallback_cb'     => 'Citygovt_Bootstrap_Navwalker::fallback',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 4,
								'walker'          => new Citygovt_Bootstrap_Navwalker(),
							);
							wp_nav_menu( $menu_arguments );
							?>
						</div>
					</nav>
				</div>
				<!--Search Btn-->
				<div class="search-btn search-btn-one"><button type="button" class="theme-btn search-toggler"><span class="txt"><?php esc_html_e( 'Explore', 'citygovt' ); ?></span> <span class="icon flaticon-loupe-1"></span></button></div>

			</div>
		</div>
	</div>
	<!--End Header Upper-->

	<!-- Sticky Header  -->
	<div class="sticky-header">
		<div class="auto-container clearfix">
			<!--Logo-->
			<div class="logo pull-left">
			<?php get_template_part( 'components/header/logo' ); ?>
			</div>
			<!--Right Col-->
			<div class="pull-right">
				<!-- Main Menu -->
				<nav class="main-menu clearfix">
					<!--Keep This Empty / Menu will come through Javascript-->
				</nav><!-- Main Menu End-->
			</div>
		</div>
	</div><!-- End Sticky Menu -->

	<!-- Mobile Menu  -->
	<div class="mobile-menu">
		<div class="menu-backdrop"></div>
		<div class="close-btn"><span class="icon flaticon-targeting-cross"></span></div>    
		<nav class="menu-box">
			<div class="nav-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					if ( ! empty( $mobile_menu_logo['url'] ) ) {
						?>
						<img src="<?php echo esc_url( $mobile_menu_logo['url'] ); ?>" alt="<?php esc_attr_e( 'mobile logo', 'citygovt' ); ?>" >
					<?php } else { ?>
						<img src="<?php echo CITYGOVT_IMG_URL; ?>nav-logo.png" alt="<?php esc_attr_e( 'mobile logo', 'citygovt' ); ?>" >
					<?php } ?>
				</a>
			</div>
			<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
			<!--Social Links-->
			<?php if ( $header_social_onoff ) { ?>
			<div class="social-links">
				<ul class="clearfix">
				<?php echo wp_kses( $header_social_mobile, 'code_context' ); ?>
				</ul>
			</div>
			<?php } ?>
		</nav>
	</div><!-- End Mobile Menu -->
</header>
<!-- End Main Header -->

