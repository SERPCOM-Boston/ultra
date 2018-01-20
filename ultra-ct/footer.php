<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

    <?php get_template_part( 'footer-widget' ); ?>
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
