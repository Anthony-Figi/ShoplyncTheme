<?php
/**
* Template Name: Full Width
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div><!-- #main -->
	</section><!-- #primary -->
<?php  //do_action( 'shoplync_after_content' ); ?>

<?php if ( is_active_sidebar( 'shoplync_after_content' )  ): ?>
<div class="after-content-block my-3">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'shoplync_after_content' ); ?>
		</div>
	</div>
</div>
<?php endif ?>

<?php
get_footer();
