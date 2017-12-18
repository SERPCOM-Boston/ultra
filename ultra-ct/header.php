<?php
/*
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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
			                <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
			            <?php endif; ?>
			        </div>
					
					
					<form class="top_search_form" role="search" method="get">
					  <div class="form-row align-items-center">
					    <div class="col-auto">
					      <label class="sr-only" for="inlineFormInput">Search photos, manufacturers, & more</label>
					      <input type="search" value="" name="s" title="Search photos, manufacturers, & more:" class="form-control mb-2 mb-sm-0 	d-none d-sm-block" id="inlineFormInput" placeholder="Search photos, manufacturers, & more">
						  <!-- Mobile -->
						  <input type="search" value="" name="s" title="Search photos, manufacturers, & more:" class="form-control mb-2 mb-sm-0 d-block d-sm-none" id="inlineFormInput" placeholder="Search">
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



	</div><!-- End Top Band -->
	
	<div id="content" class="site-content">
		<div class="container-fluid">
			<div class="row">
                <?php endif; ?>
