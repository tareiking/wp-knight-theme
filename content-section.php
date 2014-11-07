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
	} ?>


<?php

} else { // load the normal page content

	get_template_part( 'content', 'page' );

} ?>