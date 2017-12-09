<?php
/*include 'header.php';

Template Name: Regular Page Template
*/

get_header(); ?>
<style>
	#content.site-content {
	    padding-bottom: 0;
	}
</style>

				</div>
			</div>
		</div>


	<!-- Swiper -->
	<div class="swiper-container">
	  <div class="swiper-wrapper swiper-splash">
	    <div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/lewis-mansion.jpg)"></div>
	    <div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/lewis-aquatech.jpg)"></div>
	    <div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/trex.jpg)"></div>
	    <div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/green.jpg)"></div>
	    <div class="swiper-slide" style="background-image:url(https://ultraoutdoors.net/splash/aura-mike.jpg)"></div>
	  </div>
		<!-- Add Pagination -->
	  <div class="swiper-pagination"></div>
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



	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

        <div class="container profile_section1">
			<div class="row">
				
				<div class="col-sm-2">				
					<div class="logo_img_wrapper">
						<a href="http://hessla.com" target="blank">
						<img src="https://ultraoutdoors.net/stock/blank.gif" data-src="https://ultraoutdoors.net/logos/hess-landscape-architects.jpg" alt="Hess Landscape Architects" class="unveil_img">
						</a>
					</div>
				</div>
				
				<div class="col-sm-6">
					<h1>Hess Landscape Architects</h1>			
					<address>1570A Sumneytown Pike<br>
						Lansdale PA 19446<br>
						215-855-5530<br>
						<a href="http://hessla.com" target="blank">hessla.com</a>
					</address>
					
					<div class="profile_socials">
						<a href="http://hessla.com" target="blank">
						<i class="fab fa-facebook-f"></i>
						</a>
						<a href="http://hessla.com" target="blank">
						<i class="fab fa-twitter"></i>
						</a>
						<a href="http://hessla.com" target="blank">
						<i class="fab fa-instagram"></i>
						</a>
						<a href="http://hessla.com" target="blank">
						<i class="fab fa-pinterest-p"></i>
						</a>
					</div>
					
					<div class="profile_description_wrapper">
						<p>Hess Landscape Architects works with the industry’s top architects, interior designers, and engineers to provide clients with amazing backyards that reflect their own sophisticated styles. Founding Principal Chuck Hess achieves this by listening to every member of the design and construction team, the homeowners, as well as his own instincts. His end goal for each project is to not simply meet client expectations, but to surpass them. “We strive to craft unique spaces tailored to each client's tastes and to each site's singular needs,” says Hess.</p>

						<p>Frequently, Hess is called upon to lead a project from concept to completion. His skilled team is proficient in directing a variety of important functions, from the production of comprehensive design development drawings to the construction of amazingly exquisite projects. “We feel very fortunate to work with the finest craftsmen and artisans, and we take great satisfaction in managing a job, either collaboratively or as the primary consultant."</p>

						<p>Hess manages firm operations and also is lead-designer taking an active role on all projects. He has nurtured his skills for over 20 years by completing substantial residential commissions throughout Pennsylvania, New Jersey, Delaware, New York, West Virginia, and Florida as well as internationally in places like the Bahamas. The diverse variety of scales in which Chuck has practiced landscape architecture inform his methods, enabling design consensus between dynamic, visionary analysis and holistic cogent sensibility. “We aspire to maintain the very highest standards in our industry, and to not simply meet our client's expectations, but to surpass them,” says Hess.</p>
					</div>
				</div>
				
				<div class="col-sm-4 col_profile_right">
					<div class="profile_contact_button">
						<button type="button" class="btn btn-dark btn-lg">Contact Company</button>
					</div>

					<div class="profile_regions">
						<h4>Regions Serviced</h4>
						<p>Pennsylvania, New Jersey, New York</p>
					</div>
					
					<div class="profile_awards">
						<h4>Awards</h4>
						
						<p class="award"><strong>2012 NJ ASLA Chapter Awards Program</strong>
						<br>"Honor Award" Landscape Architectural Design
						Residential/Garden Design – 27th Street</p>

						<p class="award"><strong>2011 Pennsylvania Historic Preservation Awards</strong>
						<br>"Construction Project Award - Single Family Residence"
						- The Jayne House</p>

						<p class="award"><strong>2011 Preservation Alliance</strong>
						<br>"Preservation Achievement Grand Jury Award" - The Jayne House</p>

						<p class="award"><strong>2008 ASLA (American Society of Landscape Architects)</strong>
						<br>"Merit Award" Residential Design - Gladwyne Overlook Residence</p>

						<p class="award"><strong>2007 Pool & Spa</strong> 
						<br>"Masters of Design" - Residential Spa</p>

						<p class="award"><strong>2007 APLD (Association of Professional Landscape Designers)</strong>
						<br>"Gold Award" for the Villanova Residence in the residential category of more than $175K to design /install</p>

						<p class="award"><strong>2007 APLD (Association of Professional Landscape Designers)</strong>
						<br>"Residential Best of Show" for the Villanova Residence</p>
					</div>

					<div class="profile_associations">
						<h4>Association Memberships</h4>
						<p>American Nursery and Landscape Association</p>
					</div>
				</div>
				
			</div>
		</div>











<div class="clearfix"></div>
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

