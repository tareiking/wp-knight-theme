<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */
if ( file_exists(  __DIR__ .'/cmb2/init.php' ) ) {
	require_once  __DIR__ .'/cmb2/init.php';
} elseif ( file_exists(  __DIR__ .'/CMB2/init.php' ) ) {
	require_once  __DIR__ .'/CMB2/init.php';
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb2_';

	/**
	 * Repeatable Field Groups
	 */
	$meta_boxes['field_group'] = array(
		'id'           => 'field_group',
		'title'        => __( 'Page Sections', 'tk-knight' ),
		'object_types' => array( 'page', ),
		'fields'       => array(
			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => __( 'Sections with animated left / right image + content. Must have an image, no full-width items are avaialble here', 'tk-knight' ),
				'options'     => array(
					'group_title'   => __( 'Section {#}', 'tk-knight' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Section', 'tk-knight' ),
					'remove_button' => __( 'Remove Section', 'tk-knight' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Title',
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => 'Sub-Title',
						'description' => 'Displays under the title. Leave blank if not needed.',
						'id'   => 'description',
						'type' => 'text',
					),
					array(
						'name' => 'Image',
						'id'   => 'image',
						'type' => 'file',
					),
					array(
						'name' => 'Image Alignment',
						'id'   => 'imagealignment',
						'desc'    => 'Select an option',
						'type'    => 'select',
						'options' => array(
							'alignright'   => __( 'Align Right', 'tk-knight' ),
							'alignleft'    => __( 'Align Left', 'tk-knight' ),
						),
						'default' => 'alignright',
					),
					array(
						'name'    => __( 'Content', 'tk-knight' ),
						'id'      => $prefix . 'content',
						'type'    => 'wysiwyg',
						'options' => array( 'textarea_rows' => 10, ),
					),
				),
			),
		),
	);

	/**
	 * Repeatable Field Groups
	 */
	$meta_boxes['page_options'] = array(
		'id'           => 'page_options',
		'title'        => __( 'Page options', 'tk-knight' ),
		'object_types' => array( 'page', ),
		'context'      => 'side',
		'priority'     => 'default',
		'fields'      => array(
			array(
				'name'    => __( 'Show the following sections', 'cmb2' ),
				'id'      => $prefix . 'show_additional_sections_checkbox',
				'type'    => 'multicheck',
				'select_all_button' => false,
				'options' => array(
					'show_portfolio' => __( 'Portfolio', 'cmb2' ),
					'show_testimonials' => __( 'Testimonials', 'cmb2' ),
					'show_logobar' => __( 'Logo Bar', 'cmb2' ),
					'show_team' => __( 'Team', 'cmb2' ),
			),
		),
		),
	);

	return $meta_boxes;
}
