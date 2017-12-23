<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); 
?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					
					<div class="col-12 mb-5">

						<header class="page-header text-center">
							<h1 class="page-title">It Seems You&rsquo;ve Wandered Off the Path.</h1>
						</header><!-- .page-header -->
    					
						<p class="text-center mt-3 mb-3">We can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
						
						<div class="text-center search_wrapper mb-3">
							<?php get_search_form(); ?>
						</div>
						
						<div class="img_wrapper_wrap">
							<img src="https://ultraoutdoors.net/stock/garden-path.jpg" alt="Garden Path Photo" style="width: 100%;height: auto;">
						</div>

					</div><!-- End Col -->
					
				</div><!-- End Row -->
			</div><!-- End Container -->

		</main><!-- #main -->
	</section><!-- #primary -->



<!-- FW Header -->
<div class="col-12 no-gutters pl-0 pr-0">
	 <div class="fullwidth_header" style="background-image:url(https://ultraoutdoors.net/splash/lewis-aquatech.jpg)">
 		 <h2>News, Ideas & Inspiration for Outdoor Living</h2>
	 </div>
</div>
<!-- End FW Header -->


<!-- Posts -->
<section class="content-area col-sm-12">
		<div class="row card_section blog_card_section blog_card_section_all pt-3 pb-5" style="max-width: 1800px;margin-left: auto;margin-right: auto;">
			<div class="col-12">

			<!-- <h3 class="text-center no_underline">News, Ideas & Inspiration for Outdoor Living</h3> -->

			<?php
			add_filter( 'the_title', 'max_title_length');
	    	global $post;
	    	$args = array( 'posts_per_page' => 4 );
	    	$myposts = get_posts( $args );
	    	foreach( $myposts as $post ) :  setup_postdata($post); ?>
			
			<div class="card">
				<div class="img_wrapper">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
		  		</a>
			</div>
				<div class="card-body">
				  <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				  <p class="entry-meta"><?php wp_bootstrap_starter_posted_on(); ?> | 
				  <?php $categories = get_the_category();
				  $separator = ', ';
				  $output = '';
				  if ( ! empty( $categories ) ) {
				      foreach( $categories as $category ) {
				          $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
				      }
				      echo trim( $output, $separator );
				  } ?>
				  </p>
				  <p class="card-text"><?php echo excerpt(36); ?></p>
				  <a href="<?php the_permalink(); ?>" class="card-link">Read More »</a>
				</div>
			</div>
			
			<?php endforeach; ?>
				<div class="clearfix"></div>
				
			</div>
		</div>
</section>


<?php
get_footer();

