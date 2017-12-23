<!-- Home Page -->
<style>
	#content.site-content {
	    padding-bottom: 0;
	}
</style>

	<!-- Swiper -->
	<div class="swiper-container home_swiper">
		<div class="swiper-wrapper swiper-splash">
				<div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/lewis-aquatech.jpg)"></div>
				<div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/trex.jpg)"></div>
				<div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/green.jpg)"></div>
				<div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/aura-mike.jpg)"></div>
			</div>
		<!-- Add Pagination -->
	  	<div class="swiper-pagination"></div>
		<div class="swiper-snipe">
			<p>Search Photos. Get Ideas. Find Products. Meet Local Experts.</p>
			<p>Build Your Dream.</p>
		</div>
	</div>
<script>
	var swiper = new Swiper('.swiper-container', {
		effect: 'fade',
		loop: true,
		grabCursor: true,
        autoplay: {
          delay: 3700,
          disableOnInteraction: false,
        },
		pagination: {
	    	el: '.swiper-pagination',
	   	 	dynamicBullets: true,
			clickable: true
	  	}
	});
</script>


		<?php
		$blog_cat_id = $account_details['blog_category_id_c'];
		add_filter( 'the_title', 'max_title_length');
	    global $post;
	    $args = array( 'category' => 10, 'posts_per_page' => 1 );
	    $myposts = get_posts( $args );
	    foreach( $myposts as $post ) :  setup_postdata($post); ?>
		<!-- Featured Post -->
		<div class="container container_wide">
			<div class="row pt-5 pl-2 pb-0 pr-2">
			<div class="col-12">

				<div class="home_featured_post border pt-3 pr-3 pb-3 pl-3">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
					<div class="home_featured_post_content">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="entry-meta gray"><?php wp_bootstrap_starter_posted_on(); ?></p>
						<div class="home_featured_post_excerpt">
					  		<?php echo excerpt(100); ?>
						</div>
					  	<a href="<?php the_permalink(); ?>" class="card-link">READ MORE »</a>
					</div>
					<div class="clearfix"></div>
				</div>
			
			</div>
			</div>
		</div><!-- End Featured Post -->
		<?php endforeach; ?>




		<!-- Featured Accounts -->
		<div class="container container_wide">
			<div class="row card_section featured_card_section pt-3 pb-5">
			<div class="col-12">

						
			<div class="card">
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/ultra/wp-content/uploads/sites/2/2017/12/download-1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<p class="featured_cat">FEATURED: <span>KITCHEN CABINETS</span></p>
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<p class="featured_cat">FEATURED: <span>SWIMMING POOLS</span></p>
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<p class="featured_cat">FEATURED: <span>DECKS, PERGOLA & GAZEBOS</span></p>
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy3.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<p class="featured_cat">FEATURED: <span>HOT TUBS</span></p>
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy4.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<p class="featured_cat">FEATURED: <span>ARCHITECTS</span></p>
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy5.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<p class="featured_cat">FEATURED: <span>SHADE PRODUCTS</span></p>
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>		


				<div class="clearfix"></div>
			</div>
			</div>
		</div><!-- End Featured Accounts -->

	

		</div><!-- End Container -->

				<div class="clearfix"></div>

				</div>
			</div>
		</div>



<!-- Ad -->
<div class="col-12 no-gutters pl-0 pr-0 text-center">
	<a href="http://qz.com" target="blank">
		<img src="https://ultraoutdoors.net/stock/rolex-quartz-ad.jpg" style="width: 100%;height: auto;">
	</a>
</div>
<!-- End Ad -->




	<!-- FW Header -->
	<div class="row no-gutters">
		<div class="col-12">
			 <div class="fullwidth_header" style="background-image:url(https://ultraoutdoors.net/splash/lewis-aquatech.jpg)">
		 		 <h2>Manufacturers</h2>
			 </div>
		</div>
	</div><!-- End FW Header -->

		<!-- Featured Accounts -->
		<div class="container container_wide">
			<div class="row card_section featured_card_section pt-5 pb-2">
			<div class="col-12">

			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy6.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy7.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy8.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy9.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy11.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
					
				<div class="clearfix"></div>
			</div>
			</div>
		</div><!-- End Featured Accounts -->


		<!-- Browse Links -->
		<div class="container container_wide mb-5">
			<div class="row pl-3 pr-3">
				<div class="col-12">
					<div class="row underline browse_link_row">
						<div class="col-sm-9" style="padding: 0;">
							<h3 class="browse_link_row_headline">Browse Manufacturers by Category</h3>
						</div>
						<div class="col-sm-3" style="padding: 0;">
							<p class="browse_link_all"><a href="<?php echo esc_url( home_url( '/' ) ); ?>find-manufacturers">See All »</a></p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row pl-3 pr-3">
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Glass Enclosed Structures Manufacturers »</a></li>
					<li><a href="">Appliance & Grill Manufacturers »</a></li>
					<li><a href="">Deck, Pergola & Gazebo Manufacturers »</a></li>
					<li><a href="">Garden Ornaments Manufacturers »</a></li>
					<li><a href="">Hot Tubs & Swim Spa Manufacturers »</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Kitchen Cabinets Manufacturers »</a></li>
					<li><a href="">Outdoor Furniture Manufacturers »</a></li>
					<li><a href="">Outdoor Lighting Manufacturers »</a></li>
					<li><a href="">Shade Products Manufacturers »</a></li>
					<li><a href="">Stone & Pavers Manufacturers »</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Swimming Pool Equipment & Supplies »</a></li>
					<li><a href="">Window & Door Manufacturers »</a></li>
					<li><a href="">Swimming Pool Accessories »</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end Browse Links -->


	<!-- FW Header -->
	<div class="row no-gutters">
		<div class="col-12">
			 <div class="fullwidth_header" style="background-image:url(https://ultraoutdoors.net/splash/green.jpg)">
		 		 <h2>Local Professionals</h2>
			 </div>
		</div>
	</div><!-- End FW Header -->

		<!-- Featured Accounts -->
		<div class="container container_wide">
			<div class="row card_section featured_card_section pt-5 pb-2">
			<div class="col-12">

						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy3.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy4.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy5.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy6.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy7.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>


				<div class="clearfix"></div>
			</div>
			</div>
		</div><!-- End Featured Accounts -->


		<!-- Browse Links -->
		<div class="container container_wide mb-5">
			<div class="row pl-3 pr-3">
				<div class="col-12">
					<div class="row underline browse_link_row">
						<div class="col-sm-9" style="padding: 0;">
							<h3 class="browse_link_row_headline">Browse Local Professionals by Category</h3>
						</div>
						<div class="col-sm-3" style="padding: 0;">
							<p class="browse_link_all"><a href="<?php echo esc_url( home_url( '/' ) ); ?>find-local-professionals">See All »</a></p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row pl-3 pr-3">
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Landscape Architects & Designers »</a></li>
					<li><a href="">Landscape Design-Build Firms »</a></li>
					<li><a href="">Landscape Contractors »</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Swimming Pool Designers & Builders »</a></li>
					<li><a href="">Builders & Remodelers »</a></li>
					<li><a href="">Tree Surgeons & Arborists »</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Architects »</a></li>
					<li><a href="">Kitchen Designers & Builders »</a></li>
					<li><a href="">Interior Designers »</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end Browse Links -->


	<!-- FW Header -->
	<div class="row no-gutters">
		<div class="col-12">
			 <div class="fullwidth_header" style="background-image:url(https://ultraoutdoors.net/splash/aura-mike.jpg)">
		 		 <h2>Stores</h2>
			 </div>
		</div>
	</div><!-- End FW Header -->

		<!-- Featured Accounts -->
		<div class="container container_wide">
			<div class="row card_section featured_card_section pt-5 pb-2">
			<div class="col-12">

						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy8.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy9.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy10.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy11.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
						
			<div class="card">						
				<div class="img_wrapper">
					<a href="">
						<img width="640" height="580" src="https://ultraoutdoors.net/stock/dummy2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />		  			</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">Conservatories Collection</h4>
				  	<p class="card-text gray"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> WINDSOR, PA</p>
					<p class="card-text featured_card_cats gray">Conservatories, Fountains, Decks</p>
				  	<a href="" class="card-link">VIEW PROFILE »</a>
				</div>
			</div>
			
				<div class="clearfix"></div>
			</div>
			</div>
		</div><!-- End Featured Accounts -->


		<!-- Browse Links -->
		<div class="container container_wide mb-5">
			<div class="row pl-3 pr-3">
				<div class="col-12">
					<div class="row underline browse_link_row">
						<div class="col-sm-9" style="padding: 0;">
							<h3 class="browse_link_row_headline">Browse Local Stores by Category</h3>
						</div>
						<div class="col-sm-3" style="padding: 0;">
							<p class="browse_link_all"><a href="<?php echo esc_url( home_url( '/' ) ); ?>find-local-stores">See All »</a></p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row pl-3 pr-3">
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Appliance & Grills »</a></li>
					<li><a href="">Fences, Sheds, & Playground »</a></li>
					<li><a href="">Hot Tubs & Swim Spas »</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Nurseries & Garden Centers »</a></li>
					<li><a href="">Outdoor Furniture Stores »</a></li>
					<li><a href="">Outdoor Lighting Stores »</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<ul class="browse_links">
					<li><a href="">Swimming Pool Supplies »</a></li>
					<li><a href="">Tile & Countertops »</a></li>
					<li><a href="">Windows & Doors »</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end Browse Links -->












		</main><!-- #main -->
	</section><!-- #primary -->