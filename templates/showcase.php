<?php
/**
 * Template Name: Showcase Page
 *
 * Showcase pages combine sections into a smooth flowing, animated single page view.
 *
 * @todo Add support for page sections to default page views'
 *
 * @package WP Knight Theme
 */

get_header(); ?>

	<div id="content" class="hfeed site-content">

	<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'section' ); ?>

				<?php endwhile; // end of the loop. ?>


				<?php
					// Show additional page partials if chosen by user
					if ( $display_options = get_post_meta( get_the_ID(), '_cmb2_show_additional_sections_checkbox', true ) ) {

						if ( in_array( 'show_portfolio', $display_options ) )
							get_template_part( 'content', 'portfolio' );


						if ( in_array( 'show_testimonials', $display_options ) )
							get_template_part( 'content', 'testimonial' );


						if ( in_array( 'show_logobar', $display_options ) )
							get_template_part( 'content', 'logobar' );


						if ( in_array( 'show_team', $display_options ) )
							get_template_part( 'content', 'team' );

					}
				?>

			</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
