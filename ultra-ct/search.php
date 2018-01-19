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

					<?php
					if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->

						<div class="mb-3">
							<?php get_search_form(); ?>
						</div>

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
					<?php
					//Search Categories
					global $app_list_strings;
					
					$subcats = array();
					foreach($app_list_strings['category_list'] as $cat_name => $category) {
						if(stripos($cat_name,$_GET['s']) !== false || stripos($category,$_GET['s']) !== false) {
							$category = explode(":",$category);
							
							if(!isset($subcats[$category[0]])) $subcats[$category[0]] = array();
							if(!isset($category[1])) $category[1] = $category[0];
							$subcats[$category[0]][] = array(
								'id' => $cat_name,
								'name' => $category[1],
							);
						}
					}
					if($subcats){
						 echo "<section class='widget'><h4>Categories</h4><ul>";
						if(isset($subcats['Local Professionals'])){
							foreach($subcats['Local Professionals'] as $s){
								echo "<li><a href='" . esc_url( home_url( '/' ) ) ."find-local-professionals/?subcat=". $s['id'] . "'>" . $s['name'] ." »</a></li>";
							}
						}
						if(isset($subcats['Stores'])){
							foreach($subcats['Stores'] as $s){
								echo "<li><a href='" . esc_url( home_url( '/' ) ) ."find-local-stores/?subcat=". $s['id'] . "'>" . $s['name'] ." »</a></li>";
							}
						}
						if(isset($subcats['Manufacturers'])){
							foreach($subcats['Manufacturers'] as $s){
								echo "<li><a href='" . esc_url( home_url( '/' ) ) ."find-local-stores/?subcat=". $s['id'] . "'>" . $s['name'] ." »</a></li>";
							}
						}
						echo "</ul></section>";
					}
					
					//Search accounts
					$accounts = get_accounts("", "", $_GET['s'], 20, 1);
					if($accounts) echo "<section class='widget'><h4>Accounts</h4><ul>";
					foreach($accounts as $a){
						echo "<li><a href='" . esc_url( home_url( '/' ) ) . $a['url_c'] . "/'>{$a['name']}</a></li>
						";
					}
					if($accounts) echo "</ul></section>";
					
					//print_r($accounts);
					//get_sidebar(); ?>
					</div><!-- End Col -->
					
				</div><!-- End Row -->
			</div><!-- End Container -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
