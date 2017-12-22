<?php
/*
Template Name: Browse Template
*/

error_reporting(E_ALL);
ini_set('display_errors', '1');
get_header();
global $wp;
$actual_link = home_url( $wp->request );
if(is_numeric($wp_query->query['page'])) {$page_num = $wp_query->query['page']; } else {$page_num = 1;}
$results_per_page = 20;
if(strpos($actual_link, 'find-local-professionals')) {
	$page_title = "Local Professionals";	
	$accounts = get_accounts('local_professionals', $results_per_page, $page_num);
 } elseif(strpos($actual_link, 'find-local-stores')) {	 
 	$page_title = "Local Stores";	
	$accounts = get_accounts('store', $results_per_page, $page_num);
 } elseif(strpos($actual_link, 'find-manufacturers')) { 
 	$page_title = "Local Manufacturers";	
	$accounts = get_accounts('manufacturer', $results_per_page, $page_num);
 } elseif(strpos($actual_link, 'find-associations')) { 
 	$page_title = "Associations";	
	$accounts = get_accounts('association', $results_per_page, $page_num);
 } 
 
?>


<!-- Top Band -->
<div class="row no-gutters">

	<div class="col-12">
		 <img class="" src="https://ultraoutdoors.net/stock/topband1.jpg" alt="" style="width: 100%;height: auto;z-index: 0;">
	</div>

</div><!-- End Top Band -->


	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">



<div class="container content_container">
	<div class="row">

		<div class="col-md-8">

			<h1 class="mt-0">47,777 RETAILERS THAT PROVIDE YOUR OUTDOOR DESIGN ELEMENTS</h1>

				<p>If you like what you see in the pages of UltraOutdoors, then you can access it through our selection of Retailers. Also linked to many of our featured product Manufacturers, the Retailers we offer carry more than just the individual product or products you're searching for to create your unique outdoor living space; they have thousands of quality outdoor goods, from major furniture to artistic accents. So, relax and let our Retailers help you find the perfect piece for your ideal outdoor lifestyle.</p>


<!-- Browse Entries -->
<div class="entry_list">



	<h2><?php echo $page_title; ?></h2>

	<?php foreach($accounts as $account_details){
	
	?>
	<div class="media">
		<a href="<?php echo site_url() . "/" . $account_details['url_c']; ?>">
	  	  <img class="mr-3 browse_img unveil_img" src="<?php if ($account_details['logo_image_url_c']) { 
							echo $account_details['logo_image_url_c']; } 
							else { echo 'https://ultraoutdoors.net/logos/uo-icon-gray.png'; } ?>" data-src="<?php if ($account_details['logo_image_url_c']) { 
							echo $account_details['logo_image_url_c']; } 
							else { echo 'https://ultraoutdoors.net/logos/uo-icon-gray.png'; } ?>" alt="<?php echo $account_details['name']; ?>">
		</a>
	  <div class="media-body">
		<a href="<?php echo site_url() . "/" . $account_details['url_c']; ?>">
	    	 <h4 class="mt-0 mb-0"><?php echo $account_details['name']; ?></h4>
		</a>
	    <p class="media-city"><img src="http://ultraoutdoors.net/stock/map-marker.png" alt="Map Marker icon" class="icon"> <?php if ($account_details['billing_address_city']) { 
							echo $account_details['billing_address_city'] . ', '; } ?>
						<?php if ($account_details['billing_address_state']) { 
							echo $account_details['billing_address_state'] . ' '; } ?></p>
		<p><?php echo wp_trim_words($account_details['description'], 55, "...");  ?></p>
		<p><a href="<?php echo site_url() . "/" . $account_details['url_c']; ?>">See Full Profile »</a></p>
	  </div>
	</div>
<?php 
	}
?>
</div><!-- End Browse Entries -->

<!-- Pagination -->
<nav aria-label="Page navigation example">
  <ul class="pagination">
   <?php if($page_num > 1) { 
   ?><li class="page-item"><a class="page-link" href="<?php echo "../" . $page_num-1; ?>">Previous »</a></li> <?php } ?>
   <?php for($i=1;$i< $page_num;$i++) { ?>   
	 <li class="page-item"><a class="page-link" href="<?php echo "../" . $i;  ?>"><?php echo $i; ?> »</a></li>
 <?php 
   }
 if(count($accounts) == $results_per_page) { 
 ?>  <li class="page-item"><a class="page-link" href="<?php if($page_num == 1) { echo "2/"; } else { echo "../" . $page_num+1; } ?>">Next »</a></li> <?php } ?>
  </ul>
</nav>

		</div><!-- End Col -->

		<!-- Sidebar -->
		<div class="col-md-3 offset-md-1">

			<div class="side_block">
				<form class="" role="search" method="get">
				  <div class="form-row align-items-center">
				    <div class="col-auto">
				      <label class="sr-only" for="inlineFormInput">Search</label>
				      <input type="search" value="" name="s" title="Search:" class="form-control mb-2 mb-sm-0" id="side_account_search" placeholder="Search">
				    </div>
				    <div class="col-auto">
				      <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
				    </div>
				  </div>
				</form>
			</div>


			<div class="side_block side_browse_block">
				<h4 class="<?php echo esc_url( home_url( '/' ) ); ?>find-local-professionals">Find Local Professionals</h4>
				<ul>
					<li><a href="">All Local Professionals »</a></li>
					<li><a href="">Architects »</a></li>
					<li><a href="">Builders & Remodelers »</a></li>
					<li><a href="">Interior Designers »</a></li>
					<li><a href="">Kitchen Designers & Builders »</a></li>
					<li><a href="">Landscape Architects & Designers »</a></li>
					<li><a href="">Landscape Contractors »</a></li>
					<li><a href="">Landscape Design-Build Firms »</a></li>
					<li><a href="">Swimming Pool Designers & Builders »</a></li>
					<li><a href="">Tree Surgeons & Arborists »</a></li>
				</ul>
			</div>
			
			<div class="side_block side_browse_block">
				<h4 class="<?php echo esc_url( home_url( '/' ) ); ?>find-local-stores">Find Local Stores</h4>
				<ul>
					<li><a href="">All Local Stores »</a></li>
					<li><a href="">Appliance & Grills »</a></li>
					<li><a href="">Fences, Sheds, & Playground »</a></li>
					<li><a href="">Hot Tubs & Swim Spas »</a></li>
					<li><a href="">Nurseries & Garden Centers »</a></li>
					<li><a href="">Outdoor Furniture Stores »</a></li>
					<li><a href="">Outdoor Lighting Stores »</a></li>
					<li><a href="">Swimming Pool Supplies »</a></li>
					<li><a href="">Tile & Countertops »</a></li>
					<li><a href="">Windows & Doors »</a></li>
					<li><a href="">Appliance & Grills »</a></li>
				</ul>
			</div>
			
			<div class="side_block side_browse_block">
				<h4 class="<?php echo esc_url( home_url( '/' ) ); ?>find-manufacturers">Find Manufacturers</h4>
				<ul>
					<li><a href="">All Manufacturers »</a></li>
					<li><a href="">Appliance & Grill »</a></li>
					<li><a href="">Deck, Pergola & Gazebo »</a></li>
					<li><a href="">Garden Ornaments »</a></li>
					<li><a href="">Glass Enclosed Structures »</a></li>
					<li><a href="">Hot Tubs & Swim Spa »</a></li>
					<li><a href="">Kitchen Cabinets »</a></li>
					<li><a href="">Outdoor Furniture »</a></li>
					<li><a href="">Outdoor Lighting »</a></li>
					<li><a href="">Shade Products »</a></li>
					<li><a href="">Stone & Pavers »</a></li>
				</ul>
			</div>
			
			<div class="side_block side_browse_block">
				<h4 class="<?php echo esc_url( home_url( '/' ) ); ?>find-associations">Find Associations</h4>
				<ul>
					<li><a href="">All Associations »</a></li>
				</ul>
			</div>

		</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->









			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();