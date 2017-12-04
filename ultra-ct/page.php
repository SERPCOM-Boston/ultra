<?php
/*
 * The template for displaying all pages
	Fullwidth
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">


<h1>Business Name: </h1>
<p>Short Name: </p>
<br>

<p>Account Type:</p>
<p>Categories: (comma-separated list)</p>
<p>Description:</p>
<p>Business Regions: (comma-separated list)</p>
<br>

<h4>Headquarters</h4>
<p>HQ Address Line 1: </p>
<p>HQ Address Line 2: </p>
<p>HQ City:</p>
<p>HQ State:</p>
<p>HQ Country:</p>
<p>HQ Postal Code:</p>
<p>HQ Phone:</p>
<p>Website: </p>
<br>

<p>Logo Image: 
<img src="" alt="echo_business_name">
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

