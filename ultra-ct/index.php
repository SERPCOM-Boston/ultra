<?php
/*
 * The template for displaying all pages
	Fullwidth
 */
 //Testing Use (TODO Program add-on for SEO plugin to load the correct business based on SEO
 //$rules = get_option( 'rewrite_rules' );
	//print_r($rules);
if(isset($wp_query->query['name'])) {
	
}
	//check if is a page name in the wp schema
	$page = get_page_by_title($wp_query->query_vars['name']);
	print_r($page);
	$account_seo = urldecode($wp_query->query['name']);
	$account_details = get_account_details($account_seo);
	$account_associations = get_associations($account_details['id']);

//print_r($account_associations);
get_header();

?>


<?php // If a Business Page 
if(isset($wp_query->query['name'])) { ?>
<style>
	#content.site-content {
	    padding-bottom: 0;
	}
</style>

<?php if ($account_details['premium_c']) { ?>
	<!-- Swiper -->
	<div class="swiper-container">
		<div class="swiper-wrapper swiper-splash">
			<?php if ($account_details['splash_image_url_c']) { ?>
		  <div class="swiper-slide" style="background-image:url(<?php echo $account_details['splash_image_url_c']; ?>)"></div>
			<?php } ?>
			<?php if ($account_details['splash_image_url2_c']) { ?>
		  <div class="swiper-slide" style="background-image:url(<?php echo $account_details['splash_image_url2_c']; ?>)"></div>
			<?php } ?>
			<?php if ($account_details['splash_image_url3_c']) { ?>
		  <div class="swiper-slide" style="background-image:url(<?php echo $account_details['splash_image_url3_c']; ?>)"></div>
			<?php } ?>
			<?php if ($account_details['splash_image_url4_c']) { ?>
		  <div class="swiper-slide" style="background-image:url(<?php echo $account_details['splash_image_url4_c']; ?>)"></div>
			<?php } ?>
			<?php if ($account_details['splash_image_url5_c']) { ?>
		  <div class="swiper-slide" style="background-image:url(<?php echo $account_details['splash_image_url5_c']; ?>)"></div>
			<?php } ?>
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
<?php } else { ?>
	<div class="swiper-container">
	  <div class="swiper-wrapper swiper-splash">
	    <div class="swiper-slide" style="background-image:url(<?php echo $account_details['splash_image_url_c']; ?>)"></div>
	  </div>
	</div>
<?php } ?>



<?php // URL Corrections
{ if(strpos($account_details['website'], 'http://') === false && strpos($account_details['website'], 'https://')===false) {$account_details['website_corrected'] = 'http://' . $account_details['website']; }} 

{ if(strpos($account_details['facebook_url_c'], 'http://') === false && strpos($account_details['facebook_url_c'], 'https://')===false) {$account_details['facebook_url_c_corrected'] = 'http://' . $account_details['facebook_url_c']; }} 

{ if(strpos($account_details['instagram_url_c'], 'http://') === false && strpos($account_details['instagram_url_c'], 'https://')===false) {$account_details['instagram_url_c_corrected'] = 'http://' . $account_details['instagram_url_c']; }} 

{ if(strpos($account_details['twitter_url_c'], 'http://') === false && strpos($account_details['twitter_url_c'], 'https://')===false) {$account_details['twitter_url_c_corrected'] = 'http://' . $account_details['twitter_url_c']; }} 

{ if(strpos($account_details['pinterest_url_c'], 'http://') === false && strpos($account_details['pinterest_url_c'], 'https://')===false) {$account_details['pinterest_url_c_corrected'] = 'http://' . $account_details['pinterest_url_c']; }} 	

{ if(strpos($account_details['tumblr_url_c'], 'http://') === false && strpos($account_details['tumblr_url_c'], 'https://')===false) {$account_details['tumblr_url_c_corrected'] = 'http://' . $account_details['tumblr_url_c']; }} 

{ if(strpos($account_details['youtube_url_c'], 'http://') === false && strpos($account_details['youtube_url_c'], 'https://')===false) {$account_details['youtube_url_c_corrected'] = 'http://' . $account_details['youtube_url_c']; }} 

{ if(strpos($account_details['google_plus_url_c'], 'http://') === false && strpos($account_details['google_plus_url_c'], 'https://')===false) {$account_details['google_plus_url_c_corrected'] = 'http://' . $account_details['google_plus_url_c']; }} 

{ if(strpos($account_details['linkedin_url_c'], 'http://') === false && strpos($account_details['linkedin_url_c'], 'https://')===false) {$account_details['linkedin_url_c_corrected'] = 'http://' . $account_details['linkedin_url_c']; }} 	
?>	

<?php // Display Website without http, www
	$clean_url = $account_details['website'];
	$clean_url = preg_replace('#^https?://#', '', rtrim($clean_url,'/'));
	$clean_url = preg_replace('/^(www\.)/i', '', $clean_url);
?>	

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

        <div class="container profile_section1">
			<div class="row">

				<div class="col-12 col-md-2">				
					<div class="logo_img_wrapper">
						<img src="https://ultraoutdoors.net/stock/blank.gif" data-src="
						<?php if ($account_details['logo_image_url_c']) { 
							echo $account_details['logo_image_url_c']; } 
							else { echo 'https://ultraoutdoors.net/logos/uo-icon-gray.png'; } ?>
							" alt="<?php echo $account_details['name']; ?>" class="unveil_img">
					</div>
				</div>
				
				<div class="col-12 col-md-7 profile_main_col">
					<h1><?php echo $account_details['name']; ?></h1>			
					<address>
						<?php if ($account_details['billing_address_street_1_c']) { 
							echo $account_details['billing_address_street_1_c'] . '<br>'; } ?>
						<?php if ($account_details['billing_address_street_2_c']) { 
							echo $account_details['billing_address_street_2_c'] . '<br>'; } ?>
						<?php if ($account_details['billing_address_city']) { 
							echo $account_details['billing_address_city'] . ', '; } ?>
						<?php if ($account_details['billing_address_state']) { 
							echo $account_details['billing_address_state'] . ' '; } ?>
						<?php if ($account_details['billing_address_postalcode']) { 
							echo $account_details['billing_address_postalcode']; } ?>
						<br>
						<?php if ($account_details['phone_office']) { 
							echo $account_details['phone_office'] . '<br>'; } ?>
						<?php if ($account_details['website']) { 
							echo '<a href="' . $account_details['website_corrected'] . '" target="blank">' . $clean_url . '</a>'; } ?>
					</address>
					
					<div class="profile_socials">
						<?php if ($account_details['facebook_url_c']) { ?>
						<a href="<?php echo $account_details['facebook_url_c_cleaned']; ?>" target="blank">
						<i class="fab fa-facebook-f"></i>
						</a>
						<?php } ?>
						<?php if ($account_details['instagram_url_c']) { ?>
						<a href="<?php echo $account_details['instagram_url_c_corrected']; ?>" target="blank">
						<i class="fab fa-instagram"></i>
						</a>
						<?php } ?>
						<?php if ($account_details['twitter_url_c']) { ?>
						<a href="<?php echo $account_details['twitter_url_c_corrected']; ?>" target="blank">
						<i class="fab fa-twitter"></i>
						</a>
						<?php } ?>
						<?php if ($account_details['pinterest_url_c']) { ?>
						<a href="<?php echo $account_details['pinterest_url_c_corrected']; ?>" target="blank">
						<i class="fab fa-pinterest-p"></i>
						</a>
						<?php } ?>
						<?php if ($account_details['tumblr_url_c']) { ?>
						<a href="<?php echo $account_details['tumblr_url_c_corrected']; ?>" target="blank">
						<i class="fab fa-tumblr"></i>
						</a>
						<?php } ?>
						<?php if ($account_details['youtube_url_c']) { ?>
						<a href="<?php echo $account_details['youtube_url_c_corrected']; ?>" target="blank">
						<i class="fab fa-youtube"></i>
						</a>
						<?php } ?>
						<?php if ($account_details['google_plus_url_c']) { ?>
						<a href="<?php echo $account_details['google_plus_url_c_corrected']; ?>" target="blank">
						<i class="fab fa-google-plus-g"></i>
						</a>
						<?php } ?>
						<?php if ($account_details['linkedin_url_c']) { ?>
						<a href="<?php echo $account_details['linkedin_url_c_corrected']; ?>" target="blank">
						<i class="fab fa-linkedin-in"></i>
						</a>
						<?php } ?>
					</div>
					
					<div class="profile_description_wrapper">
						<?php echo nl2br($account_details['description']); ?>
					</div>
				</div>
				
				<div class="col-12 col-md-3 col_profile_right">

					<?php if ($account_details['premium_c']) { ?>
					<div class="profile_contact_button">
						<button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#modal-contact-company" onclick="this.blur();">Contact Company</button>
					</div>
					<?php } ?>

					<div class="profile_regions">
						<h4>Regions Serviced</h4>
						<p><?php echo $account_details['regions_c']; ?></p>
					</div>


					<?php if ($account_details['award_textarea_c']) { ?>
					<div class="profile_awards">
						<h4>Awards</h4>
						<?php echo nl2br($account_details['award_textarea_c']); ?>
					</div>
					<?php } ?>


					<?php if(isset($account_associations['associations']) && count($account_associations['associations']) > 0) { ?>
					<div class="profile_associations">
						<h4>Association Memberships</h4>
						<?php foreach($account_associations['associations'] as $a) { 
							echo "<p class='award'><a href='" . get_site_url() . "/" . $a['url_c'] . "' >" . $a['name'] . "</a></p>
							";
						} ?>
					</div>
					<?php } ?>

				</div>
				
			</div><!-- End Row -->
		</div><!-- End Container -->

				<div class="clearfix"></div>

				</div>
			</div>
		</div>


	<?php if (($account_details['gallery_1_shortcode_c']) && ($account_details['premium_c'])) { ?>
	<!-- FW Header -->
	<div class="row no-gutters">
		<div class="col-12">
			 <div class="fullwidth_header" style="background-image:url(<?php echo $account_details['splash_image_url_c']; ?>)">
		 		 <h2>Featured Galleries</h2>
			 </div>
		</div>
	</div><!-- End FW Header -->

	<!-- Galleries -->
			
		<?php if ($account_details['gallery_1_shortcode_c']) { ?>
		<div class="row no-gutters pt-5 pb-5 pl-5 pr-5">
			<div class="col-md-3 profile_gallery_info profile_gallery_info_right">
				<?php if (($account_details['gallery_1_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<h3 class="underline_headline mt-0"><?php echo $account_details['gallery_1_title_c']; ?></h3>
					<p><?php echo $account_details['gallery_1_description_c']; ?></p>
				<?php } ?>
			</div>

			<div class="col-md-9">
				<?php if (($account_details['gallery_1_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<?php echo do_shortcode($account_details['gallery_1_shortcode_c']); ?>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
			
		<?php if ($account_details['gallery_2_shortcode_c']) { ?>
		<div class="row no-gutters pt-5 pb-5 pl-5 pr-5" style="background-color: #f8f8f8;">
			<div class="col-md-9 order-md-1 order-2">
				<?php if (($account_details['gallery_2_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<?php echo do_shortcode($account_details['gallery_2_shortcode_c']); ?>
				<?php } ?>
			</div>

			<div class="col-md-3 profile_gallery_info profile_gallery_info_left order-md-2 order-1">
				<?php if (($account_details['gallery_2_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<h3 class="underline_headline mt-0"><?php echo $account_details['gallery_2_title_c']; ?></h3>
					<p><?php echo $account_details['gallery_2_description_c']; ?></p>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
			
		<?php if ($account_details['gallery_3_shortcode_c']) { ?>
		<div class="row no-gutters pt-5 pb-5 pl-5 pr-5">
			<div class="col-md-3 profile_gallery_info profile_gallery_info_right">
				<?php if (($account_details['gallery_3_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<h3 class="underline_headline mt-0"><?php echo $account_details['gallery_3_title_c']; ?></h3>
					<p><?php echo $account_details['gallery_3_description_c']; ?></p>
				<?php } ?>
			</div>

			<div class="col-md-9">
				<?php if (($account_details['gallery_3_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<?php echo do_shortcode($account_details['gallery_3_shortcode_c']); ?>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
			
		<?php if ($account_details['gallery_4_shortcode_c']) { ?>
		<div class="row no-gutters pt-5 pb-5 pl-5 pr-5" style="background-color: #f8f8f8;">
			<div class="col-md-9 order-md-1 order-2">
				<?php if (($account_details['gallery_4_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<?php echo do_shortcode($account_details['gallery_4_shortcode_c']); ?>
				<?php } ?>
			</div>

			<div class="col-md-3 profile_gallery_info profile_gallery_info_left order-md-2 order-1">
				<?php if (($account_details['gallery_4_shortcode_c']) && ($account_details['premium_c'])) { ?>
					<h3 class="underline_headline mt-0"><?php echo $account_details['gallery_4_title_c']; ?></h3>
					<p><?php echo $account_details['gallery_4_description_c']; ?></p>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
			
	<?php } ?>



	<?php if (($account_details['blog_category_id_c']) && ($account_details['premium_c'])) { ?>
	<!-- FW Header -->
	<div class="row no-gutters">
		<div class="col-12" style="background-color: rgba(0,0,0,0.4);">
			 <div class="fullwidth_header" style="background-image:url(<?php echo $account_details['splash_image_url_c']; ?>)">
		 		 <h2>News From <?php echo $account_details['name']; ?></h2>
			 </div>
		</div>
	</div><!-- End FW Header -->

	<!-- Posts -->
		<div class="container container_wide">
		<div class="row card_section pt-5 pb-5">
			<div class="col-12">

			<?php
			$blog_cat_id = $account_details['blog_category_id_c'];
			
			add_filter( 'the_title', 'max_title_length');
	    	global $post;
	    	$args = array( 'category' => $blog_cat_id, 'posts_per_page' => 6 );
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
			</div>
		</div>
		</div>

		<div class="row no-gutters">
			<div class="col-12 text-center mb-5">
				<p><a href="https://ultraoutdoors.net/ultra/index.php?cat=<?php echo $blog_cat_id; ?>">More News From <?php echo $account_details['name']; ?> »</a></p>
			</div>
		</div>	
	<?php } ?>



	<?php if ($account_details['premium_c']) { ?>
	<div class="row no-gutters" style="background: #272525;">
		<div class="col-12 pt-5">
			<div class="profile_contact_button text-center">
				<button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#modal-contact-company" onclick="this.blur();">Contact Company</button>
			</div>
		</div>
	</div>
	<?php } ?>



		</main><!-- #main -->
	</section><!-- #primary -->



<!-- Ad -->
<div class="col-12 no-gutters pt-5 pl-0 pr-0 pb-5 text-center d-none d-xl-block">
	<a href="http://www.atlanticpediatricdentistry.com/" target="blank">
		<img src="https://ultraoutdoors.net/stock/728ad-1.gif" style="width: 728px;height: 90px;">
	</a>
</div>
<!-- End Ad -->




<?php include("modal-contact-company.php"); ?>
<script>
	jQuery(document).ready(function($) {
		$('#modal-contact-company').on('shown.bs.modal', function () {
		  $('#input_1_1').trigger('focus')
		})
		$('.btn').mouseup(function() { this.blur() })
	});
</script>

<?php // If Home  
} elseif ( is_home() ) { 
	require('home-page-content.php');
} 
// Otherwise, it goes to page.php 
?>


<?php
get_footer();
