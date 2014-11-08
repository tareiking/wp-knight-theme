<?php
/**
 * The template used for displaying portfolio items in a isotope filter
 *
 * This template currently gets the 5 most popular categories based on post count and shows them :)
 *
 * @package WP Knight Theme
 */
?>

<?php
	// Get uncategorized slug id
	$uncategorized = get_cat_id( 'uncategorized' );

	// Initially, lets  get a loop of posts and use their categories
	$args = array(
		'category__not_in'     => $uncategorized,
		'posts_per_page'       => 10,
		'ignore_sticky_posts'  => 'true',
		'orderby'              => 'count',
		);

	$args = apply_filters( 'tk_knight_filter_portfolio_query', $args );

	$folio_query = new WP_Query( $args );

	$folio_categories = array();
?>

<?php if ( $folio_query->have_posts() ) : ?>

<section class="main-section" id="Portfolio"><!--main-section-start-->
	<div class="container">
		<h2>Portfolio</h2>
		<h6>Fresh portfolio of designs that will keep you wanting more.</h6>
	<div class="portfolioFilter">
		<ul class="Portfolio-nav wow fadeIn delay-02s">
			<li><a href="#" data-filter="*" class="current" >All</a></li>

		<!-- the loop -->
		<?php while ( $folio_query->have_posts() ) : $folio_query->the_post(); ?>

			<?php

			// Let's add all the categories to an array
			$cat =  get_the_category();
			$first_category = $cat[0]->cat_name;
			array_push( $folio_categories, $first_category );
			?>

		<?php endwhile; ?>
		<!-- end of the loop -->

		<?php
			//Let's make a category list from the loop results
			$folio_categories = array_unique( $folio_categories );

			foreach ($folio_categories as $cat_name ) { ?>
				<li>
					<a href="#" data-filter="<?php echo tk_knight_category_to_isotope_string( $cat_name ); ?>"><?php echo $cat_name;  ?></a>
				</li>
			<?php } ?>

		</ul>
	</div>
	</div><!-- .container -->

	<div class="portfolioContainer wow fadeInUp delay-04s">

	<!-- Reset the loop, we are running again for actual items -->
	<?php $folio_query->rewind_posts(); ?>

		<!-- the loop -->
		<?php while ( $folio_query->have_posts() ) : $folio_query->the_post();

			// Let's get the same category information
			$cat =  get_the_category();
			$first_category = $cat[0]->cat_name;

		?>

		<div class="Portfolio-box <?php echo tk_knight_category_to_isotope_string( $first_category, false ); ?>">
			<a href="<?php the_permalink(); ?>">

			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'folio-isotope' ); ?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio-pic1.jpg" alt="">
			<?php } ?>

			</a>
			<h3><?php the_title(); ?></h3>
			<p><?php echo $first_category; ?></p>
		</div>

		<?php endwhile; ?>

	</div>
</section><!--main-section-end-->

<?php wp_reset_postdata(); ?>

<?php endif; ?>