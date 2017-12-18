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

<?php if (is_blog()) { ?>
	<?php require("blog.php"); ?>
<?php } else { ?>


<style>
	#content.site-content {
	    padding-bottom: 0;
	}
</style>

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

<?php // Display Website without http, www
	$clean_url = $account_details['website'];
	$clean_url = preg_replace('#^https?://#', '', rtrim($clean_url,'/'));
	$clean_url = preg_replace('/^(www\.)/i', '', $clean_url);
?>	

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
						
						<a href="<?php echo $account_details['website']; ?>" target="blank"><?php echo $clean_url; ?></a>
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
				
			</div><!-- End Row -->
		</div><!-- End Container -->

<div class="clearfix"></div>
				</div>
			</div>
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php } ?>




		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();

