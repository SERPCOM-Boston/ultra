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

<!-- Top Band -->
<div class="row no-gutters">

	<div class="col-12">
		 <img class="" src="https://ultraoutdoors.net/stock/topband1.jpg" alt="" style="width: 100%;height: auto;z-index: 0;">
	</div>

</div><!-- End Top Band -->

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



<?php 

if ( is_page(15) ) { 

// Function in functions.php: echo display_images_from_media_library();


	$attachments = get_posts( array(
	    'post_type' => 'attachment',
	    'posts_per_page' => 16,
	    'post_status' => null,
	    'post_mime_type' => 'image'
	) );

	foreach ( $attachments as $attachment ) {
	    echo wp_get_attachment_image( $attachment->ID, 'thumbnail' );
	} 
} ?>

					</div><!-- End Col -->
				</div><!-- End Row -->
			</div><!-- End Container -->


		</main><!-- #main -->
	</section><!-- #primary -->
<?php } ?>

<?php
get_footer();

