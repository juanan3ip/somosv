<?php
$back_to_top_on_off = citygovt_get_options( 'back_to_top_on_off' );
$footer_style       = citygovt_get_options( 'footer_style' );


if ( !$footer_style ) {
	$footer_style = 'one';
}

get_template_part( 'components/footer/footer', $footer_style );

?>

</div>
<!--End pagewrapper-->
<?php
if ( $back_to_top_on_off == '1' ) :
	do_action( 'citygovt_back_to_top' );
endif;
?>
<?php wp_footer(); ?>

</body>
</html>
