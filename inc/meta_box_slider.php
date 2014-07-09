<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'YOUR_PREFIX_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'wa_';
	$meta_boxes[] = array(
		'id'       => 'header_slider',
		'title'    => __( 'SLIDER', 'warth' ),
		'pages'    => array( 'page','post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'only_on'    => array(
			'template' => array( 'std-contnet.php' ),
		),
		'fields'   => array(
			array(
				'name' => __( 'Slider anzeigen', 'warth' ),
				'id'   => "{$prefix}show_slider",
				'type' => 'checkbox',
				'std'  => 0,
			),
			array(
				'name'             => __( 'Slider Bilder max. 5', 'warth' ),
				'id'               => "{$prefix}slider_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 5,
			),
		// FRAME CHECKBOX
			array(
				'name' => __( 'Rahmen für Slider', 'rwmb' ),
				'id'   => "{$prefix}slider_frame",
				'type' => 'checkbox',
				'std'  => 0,
			),

		),
	);
	// TEASER
	$meta_boxes[] = array(
		'id'       => 'teaser_items',
		'title'    => __( 'TEASER', 'warth' ),
		'pages'    => array( 'page','post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name' => __( 'Standard teaser anzeigen', 'warth' ),
				'id'   => "{$prefix}show_standardteaser",
				'type' => 'checkbox',
				'std'  => 1,
			),
			array(
				'name' => __( 'Teaser anzeigen', 'warth' ),
				'id'   => "{$prefix}show_teaser",
				'type' => 'checkbox',
				'std'  => 0,
			),
			array(
				'name'             => __( 'Teaser Bilder max. 3', 'warth' ),
				'id'               => "{$prefix}teaser_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 3,
			),
			array(
				'name'  => __( 'Teaser Überschrift', 'warth' ),
				'id'    => "{$prefix}teaser_headline",
				'desc'  => __( 'Text description', 'warth' ),
				'type'  => 'text',
				'std'   => __( 'Warth', 'warth' ),
				'clone' => true,
			),
			array(
				'name'  => __( 'Teaser Link', 'warth' ),
				'id'    => "{$prefix}teaser_link",
				'desc'  => __( 'Text description', 'warth' ),
				'type'  => 'text',
				'std'   => __( 'warth-art.com', 'warth' ),
				'clone' => true,
			),
		),

	);
	// FILE DOWNLOAD
	$meta_boxes[] = array(
		'id' => 'file_download',
		'title' => __( 'Katalog Download', 'warth' ),
		'pages' => array('page'),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'only_on'    => array(
			'id'       => array( 1 ),
			'template' => array( 'kontakt-template.php'),
		),
		// List of meta fields

		'fields' => array(
			array(
				'name' => __( 'Download Button anzeigen', 'rosenthal' ),
				'id'   => "{$prefix}show_upload_button",
				'type' => 'checkbox',
				'std'  => 0,
			),
			array(
				'name' => __( 'File Upload', 'warth' ),
				'id'   => "{$prefix}file_upload",
				'type' => 'file_advanced',
				'max_file_uploads' => 1,
				'mime_type' => 'application,audio,video', // Leave blank for all file types
			),
		),
	);


	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		// Where the meta box appear: normal (default), advanced, side. Optional.
		// Order of meta box: high (default), low. Optional.
		// Auto save: true, false (default). Optional.

		'id' => 'standard',
		'title' => __( 'bitte noch nichts eintragen', 'rwmb' ),
		'pages' => array('test'),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'only_on'    => array(
			'template' => array( 'demo.php'),
		),
		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}text",
				// Field description (optional)
				'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => true,
			),
			// CHECKBOX
			array(
				'name' => __( 'Checkbox', 'rwmb' ),
				'id'   => "{$prefix}checkbox",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 1,
			),
			// RADIO BUTTONS
			array(
				'name'    => __( 'Radio', 'rwmb' ),
				'id'      => "{$prefix}radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'rwmb' ),
					'value2' => __( 'Label2', 'rwmb' ),
				),
			),
			// SELECT BOX
			array(
				'name'     => __( 'Select', 'rwmb' ),
				'id'       => "{$prefix}select",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'value1' => __( 'Label1', 'rwmb' ),
					'value2' => __( 'Label2', 'rwmb' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select an Item', 'rwmb' ),
			),
			// HIDDEN
			array(
				'id'   => "{$prefix}hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => __( 'Hidden value', 'rwmb' ),
			),
			// PASSWORD
/*			array(
				'name' => __( 'Password', 'rwmb' ),
				'id'   => "{$prefix}password",
				'type' => 'password',
			),
*/			// TEXTAREA
			array(
				'name' => __( 'Textarea', 'rwmb' ),
				'desc' => __( 'Textarea description', 'rwmb' ),
				'id'   => "{$prefix}textarea",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
		'validation' => array(
			'rules' => array(
				"{$prefix}password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"{$prefix}password" => array(
					'required'  => __( 'Password is required', 'rwmb' ),
					'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
				),
			)
		)
	);




	return $meta_boxes;
}

