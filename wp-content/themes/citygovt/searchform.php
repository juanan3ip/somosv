<div class="search-box">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="form-group">
			<input type="text" id="<?php echo esc_attr( uniqid( 'search-form-' ) ); ?>" class="search-field"
					placeholder="<?php esc_attr_e( 'Search...', 'citygovt' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required="required"/>
			<button type="submit"><span class="icon flaticon-magnifying-glass"></span></button>
		</div>
	</form>
</div>
