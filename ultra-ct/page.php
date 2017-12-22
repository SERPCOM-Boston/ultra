<?php
/*
 * The template for displaying all pages
	Fullwidth
 */
 //Testing Use (TODO Program add-on for SEO plugin to load the correct business based on SEO
 //$rules = get_option( 'rewrite_rules' );
	//print_r($rules);

get_header();

// If Blog
if ( is_page(74) ) { 
	require('blog.php');
} else { ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					<div class="col-12">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

					</div><!-- End Col -->
				</div><!-- End Row -->
			</div><!-- End Container -->


		</main><!-- #main -->
	</section><!-- #primary -->
<?php } ?>

<?php
get_footer();

