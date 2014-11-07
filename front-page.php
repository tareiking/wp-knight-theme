<?php
/**
 * Static front-page template
 *
 * Designed to show page sections which are specified in the static front-page.
 *
 * @todo Add support for page sections to default page views'
 *
 * @package WP Knight Theme
 */

get_header(); ?>

	<div id="content" class="hfeed site-content container">

	<div id="primary" class="content-area">
		<div class="col-xs-12 col-md-12">

			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'section' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- .col -->
	</div><!-- #primary -->

<?php get_footer(); ?>
