<?php if (!is_paged()) { ?>
<!-- FW Header -->
<div class="col-12 no-gutters pl-0 pr-0">
	 <div class="fullwidth_header" style="background-image:url(https://ultraoutdoors.net/splash/lewis-aquatech.jpg)">
 		 <h2>Featured News From UltraOutdoors</h2>
	 </div>
</div>
<!-- End FW Header -->


<!-- Featured Posts -->
<section id="primary" class="content-area col-sm-12">
		<div class="row card_section blog_card_section blog_card_section_featured pt-3 pb-5" style="max-width: 1800px;margin-left: auto;margin-right: auto;">
			<div class="col-12">

			<?php
			$btpgid=get_queried_object_id();
		
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args = array( 'posts_per_page' => 10, 'paged' => $paged, 'category__in' => array(10) );
			$postslist = new WP_Query( $args );
			
			if ( $postslist->have_posts() ) :
        	while ( $postslist->have_posts() ) : 
			$postslist->the_post(); 
			//print_r($postslist);
			?>
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
			<?php
         		endwhile; 
				wp_reset_postdata();
			    endif;
			?>
			<div class="clearfix"></div>

			</div>
		</div>
</section>
	


<!-- Ad -->
<div class="col-12 no-gutters pl-0 pr-0 text-center">
	<a href="http://qz.com" target="blank">
		<img src="https://ultraoutdoors.net/stock/rolex-quartz-ad.jpg" style="width: 100%;height: auto;">
	</a>
</div>
<!-- End Ad -->
<?php } ?>


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

			<?php
			$btpgid=get_queried_object_id();
		
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args = array( 'posts_per_page' => 16, 'paged' => $paged );
			$postslist = new WP_Query( $args );
			
			if ( $postslist->have_posts() ) :
        	while ( $postslist->have_posts() ) : 
			$postslist->the_post(); 
			//print_r($postslist);
			?>
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
			<?php
         		endwhile;  
			?>
			<div class="clearfix"></div>
			
			<div class="text-center mt-3">
			<!-- Pagination -->	
			<?php next_posts_link( ' &laquo; Older Entries', $postslist->max_num_pages );
				previous_posts_link( 'Next Entries &raquo;' ); 
				wp_reset_postdata();
			    endif;
			?>
			</div>
				
			</div>
		</div>
</section>




<!-- Ad -->
<div class="col-12 no-gutters pl-0 pr-0 text-center d-none d-xl-block">
	<a href="http://www.atlanticpediatricdentistry.com/" target="blank">
		<img src="https://ultraoutdoors.net/stock/728ad-1.gif" style="width: 728px;height: 90px;">
	</a>
</div>
<!-- End Ad -->



		<!-- Browse Links -->
		<div class="container container_wide mt-5 mb-5">
			<div class="row pl-3 pr-3">
				<div class="col-12">
					<div class="row underline browse_link_row">
						<div class="col-sm-9" style="padding: 0;">
							<h3 class="browse_link_row_headline">Categories</h3>
						</div>
						<div class="col-sm-3" style="padding: 0;">

						</div>
					</div>
				</div>
			</div>
			
			<div class="row pl-3 pr-3">
				<div class="col-md-4">
					<ul class="browse_links">
						<li><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals" class="dark_link">Local Professionals »</a></strong></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/architects-architect-architecture-firms-project-architect" class="dark_link">Architects »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/builders-remodelers-home-remodeling-contractors" class="dark_link">Builders & Remodelers »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/interior-designers-home-design-interior-design-interior-designer-luxury-interior-design" class="dark_link">Interior Designers »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/kitchen-designers-builders-kitchen-remodel-kitchen-makeovers-kitchen-planner-luxury-kitchen-kitchen-remodeling-contractors" class="dark_link">Kitchen Designers & Builders »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/landscape-architects-designers-landscaping-companies-backyard-landscaping-landscaping-services-landscape-contractors-pool-landscaping-patio-landscaping" class="dark_link">Landscape Architects & Designers »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/landscape-design-build-firms-landscape-architecture-backyard-designs-landscape-designer-garden-design" class="dark_link">Landscape Design-Build Firms »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/swimming-pool-designers-builders-swimming-pool-pool-designs-pool-installation-pool-builders-pool-contractors" class="dark_link">Swimming Pool Designers & Builders »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-professionals/tree-surgeons-arborists-tree-service-tree-removal-arborist-tree-removal-service-tree-trimming-service" class="dark_link">Tree Surgeons & Arborists »</a></li>
					</ul>
				</div>
				
				<div class="col-md-4">
					<ul class="browse_links">
						<li><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores" class="dark_link">Local Stores »</a></strong></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/appliance-grills-charcoal-grill-gas-grill-outdoor-kitchen-pizza-oven" class="dark_link">Appliance & Grills »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/local-stores/fences-sheds-playground-playgrounds" class="dark_link">Fences, Sheds, & Playground »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/hot-tubs-swim-spas-hot-tub-dealers-hot-tub-installation-spa-dealers" class="dark_link">Hot Tubs & Swim Spas »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/nurseries-garden-centers" class="dark_link">Nurseries & Garden Centers »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/outdoor-furniture-stores-patio-furniture-patio-set-patio-chairs" class="dark_link">Outdoor Furniture Stores »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/outdoor-lighting-stores-solar-lights-landscape-lighting-flood-lights-motion-sensor-light" class="dark_link">Outdoor Lighting Stores »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/swimming-pool-supplies-pool-vacuum-pool-covers-pool-heater" class="dark_link">Swimming Pool Supplies »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/tile-countertops-swimming-pool-tiles-glass-tile-backsplashes-pool-tiles-swimming-pool-tiles" class="dark_link">Tile & Countertops »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/stores/windows-doors-front-doors-french-doors-replacement-windows-exterior-doors-sliding-doors" class="dark_link">Windows & Doors »</a></li>
					</ul>
				</div>
				
				<div class="col-md-4">
					<ul class="browse_links">

						<li><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers" class="dark_link">Manufacturers »</a></strong></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/appliance-grill-manufacturers-refrigerator-dishwasher-kitchen-appliances-convection-oven" class="dark_link">Appliance & Grill »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/deck-pergola-gazebo-manufacturers-outdoor-canopy-pergola-covers-grill-gazebo-patio-canopy" class="dark_link">Deck, Pergola & Gazebo »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/garden-ornaments-manufacturers-garden-statues-garden-decor-garden-fountains-outdoor-clock-solar-fountain" class="dark_link">Garden Ornaments »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/glass-enclosed-structures-manufacturers-glass-enclosed-structures-green-house-green-house-manufacturers" class="dark_link">Glass Enclosed Structures »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/hot-tubs-swim-spa-manufacturers-hot-tub-jacuzzi-swim-spa-jacuzzi-tub-thermospa" class="dark_link">Hot Tubs & Swim Spa »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/kitchen-cabinets-manufacturers-kitchen-cabinets-kitchen-cabinet-doors-modern-kitchen-cabinets-custom-kitchen-cabinets" class="dark_link">Kitchen Cabinets »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/outdoor-furniture-manufacturers-patio-furniture-outdoor-furniture-patio-set-patio-chairs-outdoor-patio-furniture" class="dark_link">Outdoor Furniture »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/outdoor-lighting-manufacturers-outdoor-lighting-solar-lights-landscape-lighting-flood-lights-motion-sensor-light-patio-lights" class="dark_link">Outdoor Lighting »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/shade-products-manufacturers-shade-canopy-canopy-cover-backyard-canopy-grill-canopy-gazebo-covers-gazebo-curtains-outside-canopy" class="dark_link">Shade Products »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/stone-pavers-manufacturers-landscaping-bricks-landscape-pavers-landscape-retaining-wall-landscape-wall" class="dark_link">Stone & Pavers »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/swimming-pool-equipment-supplies-pool-vacuum-pool-covers-pool-heater-pool-pump" class="dark_link">Swimming Pool Equipment & Supplies »</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/outdoor-living/manufacturers/window-door-manufacturers-door-company-front-door-design" class="dark_link">Window & Door Manufacturers »</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end Browse Links -->

