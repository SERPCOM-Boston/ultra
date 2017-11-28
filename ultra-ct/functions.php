<?php 
// Social Icons
add_shortcode( 'social_icons', 'social_icons' );
function social_icons( $atts ) {

	/* Turn on buffering */
	ob_start();
	
	include('includes/social_icons.php');	

	/* Get the buffered content into a var */
	$social_icons = ob_get_contents();

	/* Clean buffer */
	ob_end_clean();

	/* Return the content as usual */
	return $social_icons;

};