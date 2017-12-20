<?php
/*
 * The template for displaying all pages
	Fullwidth
 */
 //Testing Use (TODO Program add-on for SEO plugin to load the correct business based on SEO
 //$rules = get_option( 'rewrite_rules' );
	//print_r($rules);

if(isset($wp_query->query['name'])) {
	$account_seo = urldecode($wp_query->query['name']);

$account_details = get_account_details($account_seo);
}

 //echo get_permalink();
 //var_dump($wp_query->query_vars);
//print_r($account_details);
get_header();

 ?>
	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

