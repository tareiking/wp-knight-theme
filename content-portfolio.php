<?php
/**
 * The template used for displaying portfolio items in a isotope filter
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
		);

	$folio_query = new WP_Query( $args );
?>

<?php if ( $folio_query->have_posts() ) : ?>

<section class="main-section" id="Portfolio"><!--main-section-start-->
	<div class="container">
		<h2>Portfolio</h2>
		<h6>Fresh portfolio of designs that will keep you wanting more.</h6>
	<div class="portfolioFilter">
		<ul class="Portfolio-nav wow fadeIn delay-02s">
			<li><a href="#" data-filter="*" class="current" >All</a></li>
			<li><a href="#" data-filter=".branding" >Branding</a></li>
			<li><a href="#" data-filter=".webdesign" >Web design</a></li>
			<li><a href="#" data-filter=".printdesign" >Print design</a></li>
			<li><a href="#" data-filter=".photography" >Photography</a></li>
		</ul>
	</div>

	</div>
	<div class="portfolioContainer wow fadeInUp delay-04s">
		<div class=" Portfolio-box printdesign">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio-pic1.jpg" alt=""></a>	
			<h3>Foto Album</h3>
			<p>Print Design</p>
		</div>
		<div class="Portfolio-box webdesign">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio-pic2.jpg" alt=""></a>	
			<h3>Luca Theme</h3>
			<p>Web Design</p>
		</div>
		<div class=" Portfolio-box branding">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio-pic3.jpg" alt=""></a>	
			<h3>Uni Sans</h3>
			<p>Branding</p>
		</div>
		<div class=" Portfolio-box photography" >
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio-pic4.jpg" alt=""></a>	
			<h3>Vinyl Record</h3>
			<p>Photography</p>
		</div>
		<div class=" Portfolio-box branding">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio-pic5.jpg" alt=""></a>	
			<h3>Hipster</h3>
			<p>Branding</p>
		</div>
		<div class=" Portfolio-box photography">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio-pic6.jpg" alt=""></a>	
			<h3>Windmills</h3>
			<p>Photography</p>
		</div>
	</div>
</section><!--main-section-end-->

<?php endif; ?>