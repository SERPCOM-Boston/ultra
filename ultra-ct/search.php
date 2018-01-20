<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					
					<div class="col-md-9">

						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: &ldquo;%s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '&rdquo;</span>' ); ?></h1>
						</header><!-- .page-header -->

						<div class="d-none d-xs-block d-md-none mb-3">
							<?php get_search_form(); ?>
						</div>

<?php

// Return Accounts
$accounts = get_accounts("", "", $_GET['s'], 20, 1);
if($accounts) echo "<h2 class='search_subhead'>Results in Professionals, Stores & Manufacturers:</h2>";
foreach($accounts as $a){
	echo "
		<div class='browse_search_result'>
			<a href='" . esc_url( home_url( '/' ) ) . $a['url_c'] . "/'>
				<img src='https://ultraoutdoors.net/stock/blank.gif' data-src='" . $a['logo_image_url_c'] . "' class='unveil_img' alt='" . $a['name'] . "'>
			</a>
			<header class='entry-header'>
				<h2><a href='" . esc_url( home_url( '/' ) ) . $a['url_c'] . "/'>{$a['name']}</a></h2>
				<p>" . wp_trim_words($a['description'], 55, "...") . "</p>
			</header>
			<div class='clearfix'></div>
		</div>
	";
}
if($accounts) echo "<h2 class='search_subhead'>More Results</h2>";

?>


				<?php
				// WordPress Search Results
				if ( have_posts() ) : 
				?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
					
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
