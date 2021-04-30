<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			<!--</div> .row -->
		<!--</div> .container -->
	</div><!-- #content -->
<div class="footer-container">	
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info text-center text-white">
                &copy; Copyright <?php echo date('Y'); ?> <?php echo get_bloginfo('name').'.'; ?> All Rights Reserved
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
</div>
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>