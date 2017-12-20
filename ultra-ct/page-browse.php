<?php
/*
Template Name: Browse Template
*/

get_header();
global $wp;
$actual_link = home_url( $wp->request );
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


<?php if(strpos($actual_link, 'find-local-professionals')) { ?>
	<h2>Local Professionals</h2>
<?php } elseif(strpos($actual_link, 'find-local-stores')) { ?>
	<h2>Local Stores</h2>
<?php } elseif(strpos($actual_link, 'find-local-manufacturers')) { ?>
	<h2>Local Manufacturers</h2>
<?php } elseif(strpos($actual_link, 'find-associations')) { ?>
	<h2>Associations</h2>
<?php } ?>

	<div class="media">
		<a href="">
	  	  <img class="mr-3 browse_img unveil_img" src="https://ultraoutdoors.net/stock/blank.gif" data-src="https://ultraoutdoors.net/logos/hess-landscape-architects.jpg" alt="<?php echo $account_details['name']; ?>">
		</a>
	  <div class="media-body">
	    <h4 class="mt-0 mb-0">Hess Landscape Architects, Inc.</h4>
	    <p class="media-city"><i class="fa fa-map-pin" aria-hidden="true"></i> Landscape, PA</p>
		<p>Hess Landscape Architects works with the industry’s top architects, interior designers, and engineers to provide clients with amazing backyards that reflect their own sophisticated styles. Founding Principal Chuck Hess achieves this by listening to every member of the design and construction team, the homeowners, as well as his own instincts. ...</p>
		<p><a href="">See Full Profile »</a></p>
	  </div>
	</div>

	<div class="media">
		<a href="">
	  	  <img class="mr-3 browse_img unveil_img" src="https://ultraoutdoors.net/stock/blank.gif" data-src="https://ultraoutdoors.net/logos/hess-landscape-architects.jpg" alt="<?php echo $account_details['name']; ?>">
		</a>
	  <div class="media-body">
	    <h4 class="mt-0 mb-0">Hess Landscape Architects, Inc.</h4>
	    <p class="media-city"><i class="fa fa-map-pin" aria-hidden="true"></i> Landscape, PA</p>
		<p>Hess Landscape Architects works with the industry’s top architects, interior designers, and engineers to provide clients with amazing backyards that reflect their own sophisticated styles. Founding Principal Chuck Hess achieves this by listening to every member of the design and construction team, the homeowners, as well as his own instincts. ...</p>
		<p><a href="">See Full Profile »</a></p>
	  </div>
	</div>

	<div class="media">
		<a href="">
	  	  <img class="mr-3 browse_img unveil_img" src="https://ultraoutdoors.net/stock/blank.gif" data-src="https://ultraoutdoors.net/logos/hess-landscape-architects.jpg" alt="<?php echo $account_details['name']; ?>">
		</a>
	  <div class="media-body">
	    <h4 class="mt-0 mb-0">Hess Landscape Architects, Inc.</h4>
	    <p class="media-city"><i class="fa fa-map-pin" aria-hidden="true"></i> Landscape, PA</p>
		<p>Hess Landscape Architects works with the industry’s top architects, interior designers, and engineers to provide clients with amazing backyards that reflect their own sophisticated styles. Founding Principal Chuck Hess achieves this by listening to every member of the design and construction team, the homeowners, as well as his own instincts. ...</p>
		<p><a href="">See Full Profile »</a></p>
	  </div>
	</div>

</div><!-- End Browse Entries -->

<!-- Pagination -->
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous »</a></li>
    <li class="page-item"><a class="page-link" href="#">1 »</a></li>
    <li class="page-item"><a class="page-link" href="#">2 »</a></li>
    <li class="page-item"><a class="page-link" href="#">3 »</a></li>
    <li class="page-item"><a class="page-link" href="#">Next »</a></li>
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
				<h4 class="">Find Local Professionals</h4>
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
				<h4 class="">Find Local Stores</h4>
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
				<h4 class="">Find Manufacturers</h4>
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
				<h4 class="">Find Associations</h4>
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