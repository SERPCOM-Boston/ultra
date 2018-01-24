<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

    <?php // get_template_part( 'footer-widget' ); ?>
	<div id="footer-widget" class="row m-0 border border-white">

		<div class="col-12 col-md-4 p-5 pbx-0 bg-light">
			<section id="nav_menu-2" class="widget widget_nav_menu">
				<div class="menu-footer-menu-1-container">
					<ul id="menu-footer-menu-1" class="menu nav flex-column">
						<li><a href="https://ultraoutdoors.net/ultra/home/" class="nav-link">Home</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/photos/" class="nav-link">Photos</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/find-local-professionals/" class="nav-link">Find Local Professionals</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/find-local-stores/" class="nav-link">Find Local Stores</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/find-manufacturers/" class="nav-link">Find Manufacturers</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/find-associations/" class="nav-link">Find Associations</a></li>
					</ul>
				</div>
			</section>
		</div>


		<div class="col-12 col-md-4 p-5 pbtx-0 bg-light">
			<section id="nav_menu-3" class="widget widget_nav_menu">
				<div class="menu-footer-menu-2-container">
					<ul id="menu-footer-menu-2" class="menu nav flex-column">
						<li><a href="https://ultraoutdoors.net/ultra/about-us/" class="nav-link">About Us</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/privacy-policy/" class="nav-link">Privacy Policy</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/terms-of-use/" class="nav-link">Terms of Use</a></li>
						<li><a href="https://ultraoutdoors.net/ultra/advertising-information/" class="nav-link">Advertising Information</a></li>
					</ul>
				</div>
			</section>
		</div>


		<div class="col-12 col-md-4 p-5 ptx-0 bg-light">
			<section id="nav_menu-4" class="widget widget_nav_menu">
				<div class="menu-footer-menu-3-container">
					<ul id="menu-footer-menu-3" class="menu nav flex-column">
						<li><a href="https://ultraoutdoors.net/ultra/contact-us/" class="nav-link">Contact Us</a></li>
						
						<?php if ( !is_user_logged_in() ) { ?>
							<li class="nav_highlight"><a href="https://ultraoutdoors.net/ultra/wp-login.php" class="nav-link">Log In</a></li>
						<?php } ?>

						<?php
						global $theuser;
						if(isset($wp_query->query['name'])) {

						//check if is a page name in the wp schema
						$page = get_page_by_title($wp_query->query_vars['name']);
						print_r($page);
						if(isset($wp_query->query['name'])){
							$account_seo = urldecode($wp_query->query['name']);
							$account_details = get_account_details($account_seo);
							$account_associations = get_associations($account_details['id']);
							$account_groups = get_groups($account_details['id']);
						}
						if(isset($theuser['accounts']) && $theuser['accounts']){
							 foreach($theuser['accounts'] as $a){
								if($a['id'] == $account_details['id']) {
									//This is one of the users account and we can edit it.
						?>
							<li class="nav_highlight"><a href="<?php echo esc_url( home_url( '/' )) . "edit-profile/?business_id=" . $account_details['id']; ?>">Edit Your Business</a></li>
					<?php }	} }	} ?>
						
					</ul>
				</div>
			</section>
		</div>
                    
	</div>
	
	
	
	<?php if ( is_user_logged_in() ) { ?>
		
	<?php } ?>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		
		
		<div class="profile_socials footer_socials">
			<a href="http://facebook.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-facebook-f" data-fa-transform="shrink-9"></i>
				</span>
			</a>
			<a href="http://instagram.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-instagram" data-fa-transform="shrink-9"></i>
				</span>
			</a>
			<a href="http://twitter.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-twitter" data-fa-transform="shrink-9"></i>
				</span>
			</a>
			<a href="http://pinterest.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-pinterest-p" data-fa-transform="shrink-9"></i>
				</span>
			</a>
			<a href="http://tumblr.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-tumblr" data-fa-transform="shrink-9"></i>
				</span>
			</a>
			<a href="http://youtube.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-youtube" data-fa-transform="shrink-9"></i>
				</span>
			</a>
			<a href="http://google.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-google-plus-g" data-fa-transform="shrink-9"></i>
				</span>
			</a>
			<a href="http://linkedin.com" target="blank">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle"></i>
					<i class="fa-inverse fab fa-linkedin-in" data-fa-transform="shrink-9"></i>
				</span>
			</a>
		</div>
		
		
		<div class="container-fluid p-3 p-md-5">
            <div class="site-info text-center">
                &copy; <?php echo date('Y'); ?> <a class="credits" href="https://www.rmsmg.com/" target="_blank">RMS Media Group, Inc.</a> and <a class="credits" href="https://ultraoutdoors.com">ultraoutdoors.com</a>. All Rights Reserved.<br>Use of our website is subject to our Terms of Use and Privacy Policy. Website by <a class="credits" href="https://serpcom.com" target="_blank">SERPCOM</a>.
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->

<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
