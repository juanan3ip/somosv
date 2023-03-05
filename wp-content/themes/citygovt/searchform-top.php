<?php
/**
 * The template for displaying search results pages
 *
 * @package uaques
 */

$unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>


<!--Search Popup-->
<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="flaticon-targeting-cross"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
		<div class="search-form">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="form-group">
					<fieldset>
						<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="form-control"  placeholder="<?php esc_attr_e( 'Search Here', 'citygovt' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required="required"/>
						<input type="submit" value="<?php echo esc_attr( 'Search Now!', 'citygovt' ); ?>" class="theme-btn">
					</fieldset>
				</div>
			</form>    
		</div>    
	</div>
</div>
