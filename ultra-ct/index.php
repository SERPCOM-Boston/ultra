<?php
/*
 * The template for displaying all pages
	Fullwidth
 */
 //Testing Use (TODO Program add-on for SEO plugin to load the correct business based on SEO
 //$rules = get_option( 'rewrite_rules' );
	//print_r($rules);
 
if(isset($wp_query->query_vars['seovar2'])) {
	$account_seo = urldecode($wp_query->query_vars['seovar2']);
	
}
else {
	//Load homepage
	//echo "no account found";
	$account_seo = 'ams-landscape-design-studios-inc';
}
$account_details = get_account_details($suitecrm_link, $account_seo);
 //echo get_permalink();
 //var_dump($wp_query->query_vars);
//print_r($account_details);
get_header();

?>

				</div>
			</div>
		</div>

<style>
	#content.site-content {
	    padding-bottom: 0;
	}
</style>

<?php 
//print_r($account_details);
?>

	<!-- Swiper -->
	<div class="swiper-container">
	  <div class="swiper-wrapper swiper-splash">
	    <div class="swiper-slide" style="background-image:url(<?php echo $account_details['splash_image_url_c']; ?>)"></div>
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

<?php // Web URL Correction
{ if(strpos($account_details['website'], 'http://') === false && strpos($account_details['website'], 'https://')===false) {$account_details['website'] = 'http://' . $account_details['website']; }} ?>	

	<section id="primary" class="content-area col-sm-12 shadow_above">
		<main id="main" class="site-main" role="main">

        <div class="container profile_section1">
			<div class="row">

				<div class="col-12 col-md-2">				
					<div class="logo_img_wrapper">
						<a href="<?php echo $account_details['website']; ?>" target="blank">
						<img src="https://ultraoutdoors.net/stock/blank.gif" data-src="<?php echo $account_details['logo_image_url_c']; ?>" alt="<?php echo $account_details['name']; ?>" class="unveil_img">
						</a>
					</div>
				</div>
				
				<div class="col-12 col-md-7">
					<h1><?php echo $account_details['name']; ?></h1>			
					<address><?php echo $account_details['billing_address_street_1_c']; ?><br>
						<?php if ($account_details['billing_address_street_2_c']) { ?>
						<?php echo $account_details['billing_address_street_2_c']; ?><br>
						<?php } ?>
						<?php echo $account_details['billing_address_city']; ?>, <?php echo $account_details['billing_address_state']; ?> <?php echo $account_details['billing_address_postalcode']; ?><br>
						<?php echo $account_details['phone_office']; ?><br>
						

						
						<a href="<?php echo $account_details['website']; ?>" target="blank"><?php echo $account_details['website']; ?></a>
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
						<?php echo nl2br($account_details['description']); ?>
					</div>
				</div>
				
				<div class="col-12 col-md-3 col_profile_right">
					<div class="profile_contact_button">
						<button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#modal-contact-company" onclick="this.blur();">Contact Company</button>
					</div>

					<div class="profile_regions">
						<h4>Regions Serviced</h4>
						<p><?php echo $account_details['regions_c']; ?></p>
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


<h1>Business Name: <?php echo $account_details['name']; ?></h1>
<p>Short Name: <?php echo $account_details['short_name_c']; ?></p>
<br>

<p>Account Type: <?php echo $account_details['account_type']; ?></p>
<p>Categories:  <?php echo $account_details['category_c']; ?></p>
<p>Description: <?php echo $account_details['description']; ?></p>
<p>Business Regions:  <?php echo $account_details['regions_c']; ?></p>
<br>

<h4>Headquarters</h4>
<p>HQ Address Line 1: <?php echo $account_details['billing_address_street_1_c']; ?> </p>
<p>HQ Address Line 2: <?php echo $account_details['billing_address_street_2_c']; ?> </p>
<p>HQ City: <?php echo $account_details['billing_address_city']; ?></p>
<p>HQ State: <?php echo $account_details['billing_address_state']; ?></p>
<p>HQ Country: <?php echo $account_details['billing_address_country']; ?></p>
<p>HQ Postal Code: <?php echo $account_details['billing_address_postalcode']; ?></p>
<p>HQ Phone: <?php echo $account_details['phone_office']; ?></p>
<p>Website: <?php echo $account_details['website']; ?> </p>
<br>

<p>Logo Image: 
<img src="<?php echo $account_details['logo_image_url_c']; ?>" alt="<?php echo $account_details['name']; ?>">
<br>

<p>Splash Image #1:</p>
<img src="<?php echo $account_details['splash_image_url_c']; ?>" alt="Splash Image">
<br>

<h4>Galleries:</h4>
<p>Gallery #1 Title: </p>
<p>Gallery #1 Description: </p>
<p>Gallery #1 Shortcode: </p>


<h4>Locations</h4>
<p><em>If part of a Group or Chain, we want to output a list of these Business. I just need a query written that I can work with, one that will loop thru and output each Business Name, hyperlinked to their individual page.</em></p>

<h4>Awards</h4>
<p><em>If the Account has Awards, we want to output a list of these Awards. I just need a query written that will loop thru and output each Award Title and Award Description.</em></p>

<h4>Associations</h4>
<p><em>1. If the Account Type is an Association, and it has Members (i.e. Accounts that are linked as Members in the Association Membership), we want to output a list of these Members. I just need a query written that will loop thru and output each Business Name, hyperlinked to their individual page.</em></p>

<p><em>2. It's similar, but a bit different, for all other Account Type. We want to check if they're members of an Association (account type), and if so, output a list of the Associations they belong to, output with the same parameters (Business Name, hyperlinked to their page). </em></p>



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

