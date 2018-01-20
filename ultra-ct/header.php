<?php
/*
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
 
 //if(us_user_logged_in()){
	 //load account details if they have any
	 // $user = wp_get_current_user();
	 // print_r($user);
//}

global $account_details;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php // If a Business Page 
$og_name = str_replace(array('\'', '"'), '', $account_details['name']); 
$og_description = str_replace(array('\'', '"'), '', $account_details['description']); 
if(isset($wp_query->query['name'])) { ?>
<meta property="og:title" content="<?php echo $og_name; ?>" />  
<meta property="og:description" content="<?php echo $og_description; ?>" />  
<meta property="og:image" content="<?php if ($account_details['splash_image_url_c']) { echo $account_details['splash_image_url_c'];} elseif ($account_details['logo_image_url_c']) { echo $account_details['logo_image_url_c']; } else { echo 'https://hulafrog.com/hulastock/hula_share.jpg'; } ?>" />
<meta property="og:image:alt" content="<?php echo $account_details['name']; ?>" />
<meta property="og:url" content="<?php echo home_url( $wp->request ); ?>" />  
<meta property="og:type" content="website" />  
<?php } ?>

<?php wp_head(); ?>
<script>
	jQuery(document).ready(function() {
	  jQuery(".unveil_img").unveil(600, function() {
	    jQuery(this).load(function() {
	      this.style.opacity = 1;
	    });
	  });
	});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>

        <div class="container-fluid">
			<div class="row">
				<div class="col top_bar text-center">
					<p>The World’s Source for Everything in Outdoor Living.</p>
				</div>
			</div>
		</div>

    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top" role="banner">
		
		
        <div class="container">
			<div class="navbar navbar-expand-lg navbar-light p-0">
			        <div class="navbar-brand">
			            <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
			                <a href="<?php echo esc_url( home_url( '/' )); ?>">
			                    <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			                </a>
			            <?php else : ?>
			                <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php if(isset($account_details['name'])) {echo $account_details['name']; } else {esc_url(bloginfo('name')); } ?></a>
			            <?php endif; ?>
			        </div>
					
					
					<form class="top_search_form d-none d-sm-block" role="search" method="get" action="<?php echo esc_url( home_url( '/' )); ?>">
					  <div class="form-row align-items-center">
					    <div class="col-auto">
					      <label class="sr-only" for="inlineFormInput">Search photos, manufacturers, & more</label>
					      <input type="search" value="" name="s" title="Search photos, manufacturers, & more:" class="form-control mb-2 mb-sm-0 d-none d-sm-block" id="inlineFormInput" placeholder="Search photos, manufacturers, & more">
						  <!-- Mobile -->
						  <!--<input type="search" value="" name="s" title="Search photos, manufacturers, & more:" class="form-control mb-2 mb-sm-0 d-block d-sm-none" id="inlineFormInput" placeholder="Search">!-->
					    </div>
					    <div class="col-auto">
					      <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
					    </div>
					  </div>
					</form>
					
					
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			</div>
		</div>

		
		
            <nav class="navbar navbar-expand-lg navbar-light p-0">

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => '',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>

	</header><!-- #masthead -->

	<?php if (is_single()) { 
	    /* grab the url for the full size featured image */
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
	?>
		<!-- Top Band -->
		<div class="row no-gutters">

			<div class="col-12">
				 <div class="post_band" style="background-image:url(<?php echo esc_url($featured_img_url); ?>);"></div>
			</div>

		</div><!-- End Top Band -->
	<?php } ?>
	
	<div id="content" class="site-content">
		<div class="container-fluid">
			<div class="row">
                <?php endif; ?>
