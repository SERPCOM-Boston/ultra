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

// JQuery, Swiper, Unveil
$theme_dir = get_stylesheet_directory_uri();

wp_register_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );
wp_enqueue_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );

wp_register_script( 'swiper', $theme_dir . '/js/swiper.min.js' );
wp_enqueue_script( 'swiper', $theme_dir . '/js/swiper.min.js' );

wp_register_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );
wp_enqueue_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );