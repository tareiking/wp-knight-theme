<?php
/**
 * The template for displaying all single posts.
 *
 * @package WP Knight Theme
 */

get_header(); ?>

	<div id="content" class="hfeed site-content container">

		<div id="primary" class="content-area ">

			<div class="col-xs-12 col-md-9">

				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php tk_knight_post_nav(); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #inner -->

		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
