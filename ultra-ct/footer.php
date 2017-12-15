<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		
		
		<div class="footer_socials">
			<a href="http://facebook.com" target="blank">
			<i class="fab fa-facebook-f"></i>
			</a>
			<a href="http://twitter.com" target="blank">
			<i class="fab fa-twitter"></i>
			</a>
			<a href="http://instagram.com" target="blank">
			<i class="fab fa-instagram"></i>
			</a>
			<a href="http://pinterest.com" target="blank">
			<i class="fab fa-pinterest-p"></i>
			</a>
			<a href="http://linkedin.com" target="blank">
			<i class="fab fa-linkedin-in"></i>
			</a>
			<a href="http://tumblr.com" target="blank">
			<i class="fab fa-tumblr"></i>
			</a>
			<a href="http://google.com" target="blank">
			<i class="fab fa-google-plus-g"></i>
			</a>
			<a href="http://youtube.com" target="blank">
			<i class="fab fa-youtube"></i>
			</a>			
		</div>
		
		
		<div class="container-fluid p-3 p-md-5">
            <div class="site-info text-center">
                &copy; <?php echo date('Y'); ?> RMS Media Group, Inc. and ultraoutdoors.com. All Rights Reserved.<br>Use of our website is subject to our Terms of Use and Privacy Policy. Website by <a class="credits" href="https://serpcom.com" target="_blank">SERPCOM</a>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->

<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<?php include("modal-contact-company.php"); ?>
<script>
	jQuery(document).ready(function($) {
		$('#modal-contact-company').on('shown.bs.modal', function () {
		  $('#input_1_1').trigger('focus')
		})
		$('.btn').mouseup(function() { this.blur() })
	});
</script>

</body>
</html>
