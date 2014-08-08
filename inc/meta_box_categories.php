<?php
/**
 * Metabox Plugin
 * @link http://www.deluxeblogtips.com/meta-box/
 * @docs https://github.com/rilwis/meta-box/blob/master/demo/demo.php
 */

$prefix = 'wa_';

global $meta_boxes;

$meta_boxes = array();

/*
 * Only on: Warth Gallerie Werke
 */
$meta_boxes[] = array(
	'id'       => 'image_taxonomy',
	'title'    => __( 'Kategorie-Übersichtsseite', 'warth' ),
	'pages'    => array( 'page' ),
	'context'  => 'normal',
	'priority' => 'high',
	'autosave' => true,
	'only_on'    => array(
		'template' => array( 'page-templates/galleriewerke.php' )
	),
	'fields' => array(
		array(
			'name'    => __( 'Eltern-Kategorie', 'warth' ),
			'id'      => "{$prefix}selected_images",
			'type'    => 'taxonomy',
			'options' => array(
				'taxonomy' => 'bilder',
				'type' => 'select',
				'args' => array()
			),
		),
	)
);

/**
 * Register meta boxes
 *
 * @return void
 */
function custom_template_register_meta_boxes()  {
	global $meta_boxes;

	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! custom_template_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}

			new RW_Meta_Box( $meta_box );
		}
	}
}

add_action( 'admin_init', 'custom_template_register_meta_boxes' );

/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function custom_template_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = intval( $_GET['post'] );
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = intval( $_POST['post_ID'] );
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
				break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
				break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
				break;
			case 'category': //post must be saved or published first
				$categories = get_the_category( $post->ID );
				$catslugs = array();
				foreach ( $categories as $category )
				{
					array_push( $catslugs, $category->slug );
				}
				if ( array_intersect( $catslugs, $v ) )
				{
					return true;
				}
				break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) )
				{
					return true;
				}
				break;
		}
	}

	// If no condition matched
	return false;
}