<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<section class="no-results not-found">
	<header class="page-header text-center">
		<h1 class="page-title">It Seems You&rsquo;ve Wandered Off the Path.</h1>
	</header><!-- .page-header -->

	<div class="page-content">

			<p class="text-center mt-3 mb-3">We can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
			
			<div class="text-center search_wrapper mb-3">
				<?php get_search_form(); ?>
			</div>
			
			<div class="img_wrapper_wrap">
				<img src="https://ultraoutdoors.net/stock/garden-path.jpg" alt="Garden Path Photo" style="width: 100%;height: auto;">
			</div>
			

	</div><!-- .page-content -->
</section><!-- .no-results -->
