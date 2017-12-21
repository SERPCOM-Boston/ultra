<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); 
?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					
					<div class="col-md-9 col_custom_padding1">

						<div class="serp_meta"><em> <strong>Ultra Outdoors</strong> is your source for Everything in Outdoor Living. Find manufacturers, local pros, stores, and inspiration for landscape architecture, landscape design, home builders, architect & architecture ideas, outdoor interior design, luxury swimming pool installation, tree service and more. </em><br><span style="font-family: 'Palanquin', sans-serif;font-weight: 600;border-top: 1px solid #ddd;margin-top: 10px;padding-top: 5px;display: block;">Search Photos. Get Ideas. Find Products. Meet Local Experts. Build Your Dream.</span></div>


					<?php
					while ( have_posts() ) : the_post();
        			
						get_template_part( 'template-parts/content', get_post_format() );
        			
						    // the_post_navigation();
        			
						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						//	comments_template();
						// endif;
        			
					endwhile; // End of the loop.
					?>
					</div><!-- End Col -->
					
					<div class="col-md-3 sidebar">
					<?php get_sidebar(); ?>
					</div><!-- End Col -->
					
				</div><!-- End Row -->
			</div><!-- End Container -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
