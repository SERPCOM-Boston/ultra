<?php
/*
 * The template for displaying all pages
	Fullwidth
 */
 //Testing Use (TODO Program add-on for SEO plugin to load the correct business based on SEO
 
 
if(isset($wp_query->query_vars['business_id'])) {
	$account_seo = urldecode($wp_query->query_vars['business_id']);
}
else {
	echo "no account found";
	$account_seo = 'ams-landscape-design-studios-inc';
}
 echo get_permalink();
 var_dump($wp_query->query_vars);
 
$account_details = get_account_details($suitecrm_link, $account_seo);
//print_r($account_details);
get_header();

 ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

<?php 

//print_r($account_details);
?>
<h1>Business Name: <?php echo $account_details['name']; ?></h1>
<p>Short Name: <?php echo $account_details['short_name_c']; ?></p>
<br>

<p>Account Type: <?php echo $account_details['name']; ?></p>
<p>Categories:  <?php echo $account_details['name']; ?>(comma-separated list)</p>
<p>Description: <?php echo $account_details['name']; ?></p>
<p>Business Regions:  <?php echo $account_details['name']; ?>(comma-separated list)</p>
<br>

<h4>Headquarters</h4>
<p>HQ Address Line 1: <?php echo $account_details['name']; ?> </p>
<p>HQ Address Line 2: <?php echo $account_details['name']; ?> </p>
<p>HQ City: <?php echo $account_details['name']; ?></p>
<p>HQ State: <?php echo $account_details['name']; ?></p>
<p>HQ Country: <?php echo $account_details['name']; ?></p>
<p>HQ Postal Code: <?php echo $account_details['name']; ?></p>
<p>HQ Phone: <?php echo $account_details['name']; ?></p>
<p>Website: <?php echo $account_details['name']; ?> </p>
<br>

<p>Logo Image: 
<img src="<?php echo $account_details['name']; ?>" alt="echo_business_name">
<br>

<p>Splash Image #1:</p>
<img src="" alt="">
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

