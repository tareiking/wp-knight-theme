<?php
/**
 * The template used for displaying sections which make use of our custom meta boxes
 *
 * @package WP Knight Theme
 */

$sections = get_post_meta( get_the_ID(), '' . '_cmb2_repeat_group', true );

if ( $sections ) { ?>



<?php } else { // load the normal page content

	get_template_part( 'content', 'page' );

} ?>