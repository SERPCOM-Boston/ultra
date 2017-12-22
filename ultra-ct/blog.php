<!-- FW Header -->
<div class="col-12 no-gutters pl-0 pr-0">
	 <div class="fullwidth_header" style="background-image:url(https://ultraoutdoors.net/splash/lewis-aquatech.jpg)">
 		 <h2>Featured News From UltraOutdoors</h2>
	 </div>
</div>
<!-- End FW Header -->

<section id="primary" class="content-area col-sm-12">
	<main id="main" class="site-main" role="main">

	<!-- Posts -->
		<div class="row card_section blog_card_section pt-3 pb-5" style="max-width: 1800px;margin-left: auto;margin-right: auto;">
			<div class="col-12">

			<!-- <h3 class="text-center no_underline">Featured News From UltraOutdoors</h3> -->

			<?php
			add_filter( 'the_title', 'max_title_length');
	    	global $post;
	    	$args = array( 'posts_per_page' => 8 );
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
				  <p class="entry-meta"><?php wp_bootstrap_starter_posted_on(); ?></p>
				  <p class="card-text"><?php echo excerpt(36); ?></p>
				  <a href="<?php the_permalink(); ?>" class="card-link">Read More »</a>
				</div>
			</div>
			
			<?php endforeach; ?>
				<div class="clearfix"></div>
			
			<!-- Pagination To Come -->	
			<?php // ?>	
				
			</div>
		</div>


<!-- FW Header -->
<div class="col-12 no-gutters pl-0 pr-0">
	 <div class="fullwidth_header" style="background-image:url(https://ultraoutdoors.net/splash/lewis-aquatech.jpg)">
 		 <h2>News, Ideas & Inspiration for Outdoor Living</h2>
	 </div>
</div>
<!-- End FW Header -->


	<!-- Posts -->
		<div class="row card_section blog_card_section pt-3 pb-5" style="max-width: 1800px;margin-left: auto;margin-right: auto;">
			<div class="col-12">

			<!-- <h3 class="text-center no_underline">News, Ideas & Inspiration for Outdoor Living</h3> -->

			<?php
			add_filter( 'the_title', 'max_title_length');
	    	global $post;
	    	$args = array( 'posts_per_page' => 15 );
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
				  <p class="entry-meta"><?php wp_bootstrap_starter_posted_on(); ?></p>
				  <p class="card-text"><?php echo excerpt(36); ?></p>
				  <a href="<?php the_permalink(); ?>" class="card-link">Read More »</a>
				</div>
			</div>
			
			<?php endforeach; ?>
				<div class="clearfix"></div>
			
			<!-- Pagination To Come -->	
			<?php // ?>	
				
			</div>
		</div>


		</main><!-- #main -->
	</section><!-- #primary -->
