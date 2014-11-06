<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WP Knight Theme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container site-info">
			<div class="footer-logo"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/footer-logo.png" alt=""></a></div>
			<span class="copyright">
				<?php printf( __( 'Theme: %1$s by %2$s.', 'tk-knight' ), 'WP Knight Theme', '<a href="http://tarei.me" rel="designer">Tarei King</a>' ); ?>
			</span>
		</div>
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
