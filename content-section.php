<?php
/**
 * The template used for displaying sections which make use of our custom meta boxes
 *
 * @package WP Knight Theme
 */

$sections = get_post_meta( get_the_ID(), '' . '_cmb2_repeat_group', true );

	if ( $sections ) {

		foreach ( (array) $sections as $key => $section ) {

			$img = $title = $desc = $content = $imagealignment = '';

			if ( isset( $section['title'] ) )
				$title = esc_html( $section['title'] );

			if ( isset( $section['description'] ) )
				$desc = wpautop( $section['description'] );

			if ( isset( $section['imagealignment'] ) )
				$imagealignment = $section['imagealignment'];

			if ( isset( $section['image_id'] ) ) {
				$img = wp_get_attachment_image( $section['image_id'], 'share-pick', null, array(
					'class' => $imagealignment,
				) );
			}
			if ( isset( $section['_cmb2_content'] ) )
				$content = $section['_cmb2_content'];
		?>

		<?php if ( $imagealignment == 'alignright' ) { ?>

		<section class="main-section content-section"><!--main-section-start-->
			<div class="container">
				<h2 class="text-center"><?php echo $title; ?></h2>
				<h6 class="text-center"><?php echo $desc; ?></h6>

				<div class="row">
					<div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
						<?php echo $content; ?>
					</div>
					<figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
						<?php echo $img; ?>
					</figure>
				</div>

			</div>
		</section>

		<?php } else { ?>

		<section class="main-section content-section">
			<div class="container">
				<div class="row">
					<figure class="col-lg-5 col-sm-4 wow fadeInLeft">
						<?php echo $img; ?>
					</figure>
					<div class="col-lg-7 col-sm-8 featured-work">
						<h2><?php echo $title; ?></h2>

						<div class="content--wrapper wow fadeInRight delay-02s">
							<p class="content--description">
								<?php echo $desc; ?>
							</p>

							<div class="content--inner wow fadeInRight delay-06s">
								<?php echo $content; ?>
							</div>
						</div>
				</div>
			</div>
		</section><!--end section-->

		<?php } ?>

	<?php } ?>

<?php } else { // load the normal page content

	get_template_part( 'content', 'page' );

} ?>