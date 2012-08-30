<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Boot_s
 * @since Boot_s 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer footer" role="contentinfo" class="row">
		<div class="site-info container span12">
			<?php do_action( 'Boot_s_credits' ); ?>
			<a href="https://github.com/joesnellpdx/Boot_s" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'Boot_s' ); ?>" rel="generator"><?php printf( __( 'Boot_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'Boot_s' ), 'Boot_s', '<a href="http://www.joesnellpdx.com/" rel="designer">Joe Snell</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>