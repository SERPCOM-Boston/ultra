<?php
/*
Template Name: Isotope Browse Template
*/

get_header();

?>

<script>
	jQuery(document).ready(function($) {
	
		// filter functions
		var filterFns = {
		  // show if number is greater than 50
		  numberGreaterThan50: function() {
		    var number = $(this).find('.number').text();
		    return parseInt( number, 10 ) > 50;
		  }
		};

		function getHashFilter() {
		  // get filter=filterName
		  var matches = location.hash.match( /filter=([^&]+)/i );
		  var hashFilter = matches && matches[1];
		  return hashFilter && decodeURIComponent( hashFilter );
		}

		// init Isotope
		var $grid = $('.grid').isotope({
		  // options
		});
		// layout Isotope after each image loads
		$grid.imagesLoaded().progress( function() {
		  $grid.isotope('layout');
		});
		// filter items on button click
		$('.filter-button-group').on( 'click', 'button', function() {
		  var filterValue = $(this).attr('data-filter');
		  $grid.isotope({
			  	filter: filterValue, 
	  			itemSelector: '.grid-item',
	    		percentPosition: true,
	    		masonry: {
	    		  	columnWidth: '.grid-sizer'
	    		}
		  });
		});

		// bind filter button click
		var $filterButtonGroup = $('.filter-button-group');
		$filterButtonGroup.on( 'click', 'button', function() {
		  var filterAttr = $( this ).attr('data-filter');
		  // set filter in hash
		  location.hash = 'filter=' + encodeURIComponent( filterAttr );
		});

		var isIsotopeInit = false;

		function onHashchange() {
		  var hashFilter = getHashFilter();
		  if ( !hashFilter && isIsotopeInit ) {
		    return;
		  }
		  isIsotopeInit = true;
		  // filter isotope
		  $grid.isotope({
		  itemSelector: '.grid-item',
		  layoutMode: 'fitRows',
		    // use filterFns
		    filter: filterFns[ hashFilter ] || hashFilter
		  });
		  // set selected class on button
		  if ( hashFilter ) {
		    $filterButtonGroup.find('.is-checked').removeClass('is-checked');
		    $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
		  }
		}

		$(window).on( 'hashchange', onHashchange );

		// trigger event handler to init Isotope
		onHashchange();
	
	});
</script>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

<div class="sort_buttons">

	<h4 class="sort">Sort Directory:</h4>
	<div class="button-group filter-button-group">
		<button data-filter="*">All</button>
		<button data-filter=".architect">Architects</button>
		<button data-filter=".builder">Builders & Remodelers</button>
		<button data-filter=".interior">Interior Designers</button>
		<button data-filter=".kitchen">Kitchen Designers & Builders</button>
		<button data-filter=".landscape_arc">Landscape Architects & Designers</button>
		<button data-filter=".landscape_con">Landscape Contractors</button>
		<button data-filter=".landscape_firm">Landscape Design-Build Firms</button>
		<button data-filter=".pool">Swimming Pool Designers & Builders</button>
		<button data-filter=".tree">Tree Surgeons & Arborists</button>
	</div>

</div>
<div class="clearfix"></div>


<!-- Directory Grid -->
<div class="grid">

<div class="grid-sizer"></div>


  <div class="grid-item architect landscape_arc">
	 <a href="https://ultraoutdoors.net/ultra/hess-landscape-architects">
  		<img src="https://ultraoutdoors.net/stock/blank.gif" data-src="https://ultraoutdoors.net/splash/lewis-aquatech.jpg" alt="<?php echo $account_details['name']; ?>" class="unveil_img">
	</a>
  </div>

  <div class="grid-item landscape_con">
	 <a href="https://ultraoutdoors.net/ultra/hess-landscape-architects">
  		<img src="https://ultraoutdoors.net/stock/blank.gif" data-src="https://ultraoutdoors.net/splash/lewis-aquatech.jpg" alt="<?php echo $account_details['name']; ?>" class="unveil_img">
	</a>
  </div>

  <div class="grid-item pool tree">
	 <a href="https://ultraoutdoors.net/ultra/hess-landscape-architects">
  		<img src="https://ultraoutdoors.net/stock/blank.gif" data-src="https://ultraoutdoors.net/splash/lewis-aquatech.jpg" alt="<?php echo $account_details['name']; ?>" class="unveil_img">
	</a>
  </div>




</div>
<!-- End Grid -->








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