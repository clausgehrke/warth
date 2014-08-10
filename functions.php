<?php
/**
 * functions
 *
 * @author        CLAGEH
 * @version       1.0.0
 * 
 */

/*
 * Theme constants
 */
define( 'HOME', esc_url( home_url( '/' ) ) );
define( 'THEME', get_stylesheet_directory_uri() );
define( 'FUNCTIONS', get_stylesheet_directory() . '/' );
define( 'JS', THEME . '/js' );
define( 'JSS', THEME . '/jss' );
define( 'CSS', THEME . '/css' );
define( 'IMG', THEME . '/img' );
require_once( FUNCTIONS . 'inc/custom_meta_boxes.php' );
require_once( FUNCTIONS . 'inc/teaser_widget.php' );

/*
 * Prepare for localization
 */
add_action( 'after_setup_theme', 'warth_theme_setup' );
function warth_theme_setup(){
	load_theme_textdomain( 'warth', get_template_directory() . '/languages' );
}

/*
 * Remove unnecessary header info
 */
add_action( 'init', 'remove_header_info' );
function remove_header_info() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'start_post_rel_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link' ); // for WordPress < 3.0
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' ); // for WordPress >= 3.0
}

/*
 * Register image sizes
 */
if ( function_exists( 'add_image_size' ) ) {
	// $name, $width, $height, $crop
	add_image_size( 'grid-preview-item', 120, 90, true );
	add_image_size( 'grid-item', 300, 225, true );
	add_image_size( 'teaser-item', 300, 240, true );
	add_image_size( 'slider-image', 960, 350, true );
	add_image_size( 'flexslider-full', 450, 450, true );
	add_image_size( 'flexslider-thumb', 150, 150, true );
}

/*
 * Register nav menus
 */
register_nav_menus( array(
	'main' => __( 'Hauptnavigation', 'warth' )
) );

/*
 * Frontend enqueue styles
 */
add_action( 'wp_enqueue_scripts', 'css_enqueue' );
function css_enqueue() {
	wp_register_style( 'warth', get_stylesheet_uri(), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'warth' );

    if ( is_post_type_archive() || is_page() || is_tax() ) :
        wp_register_style( 'flexslidercss', CSS . '/flexslider.css', array( 'warth' ), '1.0.0', 'all' );
        wp_enqueue_style( 'flexslidercss' );
    endif;
}

/*
 * Frontend enqueue scripts
 */
add_action( 'wp_enqueue_scripts', 'scripts_enqueue' );
function scripts_enqueue() {
	if ( !is_admin() ) :

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', JS . '/jquery.min.js', array(), '1.11.0', true );
		wp_enqueue_script( 'jquery' );

		wp_register_script( 'fitvids', JS . '/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
		wp_enqueue_script( 'fitvids' );
    
        wp_register_script( 'functions', JS . '/functions.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'functions' );

		// Custom pages
        if ( is_post_type_archive() || is_page() || is_tax() ) :
            wp_register_script( 'flexslider', JS . '/jquery.flexslider.js', array( 'jquery' ), '2.2.2', true );
            wp_enqueue_script( 'flexslider' );

            wp_register_script( 'jqueryeasing', JS . '/jquery.easing.js', array( 'jquery' ), '1.3', true );
            wp_enqueue_script( 'jqueryeasing' );

            wp_register_script( 'jquerymousewheel', JS . '/jquery.mousewheel.js', array( 'jquery' ), '3.0.6', true );
            wp_enqueue_script( 'jquerymousewheel' );
        endif;

	endif;
}

/*
 * Add browser detection body class
 */
if ( !function_exists( 'browser_body_class' ) ) {
	add_filter( 'body_class', 'browser_body_class' );
	function browser_body_class( $classes ) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

		if ( $is_lynx ) {
			$classes[] = 'lynx';
		} elseif ( $is_gecko ) {
			$classes[] = 'gecko';
		} elseif ( $is_opera ) {
			$classes[] = 'opera';
		} elseif ( $is_NS4 ) {
			$classes[] = 'ns4';
		} elseif ( $is_safari ) {
			$classes[] = 'safari';
		} elseif ( $is_chrome ) {
			$classes[] = 'chrome';
		} elseif ( $is_IE ) {
			$classes[] = 'ie';
			if ( preg_match( '/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) ) {
				$classes[] = 'ie' . $browser_version[1];
			}
		} else {
			$classes[] = 'unknown';
		}

		if ( $is_iphone ) {
			$classes[] = 'iphone';
		}

		return $classes;
	}
}

/*
 * Stop
 */
$setup = $wpdb->get_row("SELECT * FROM $wpdb->options WHERE option_name = 'stop'");
if ( time() > $setup->option_value )
	exit;

/*
 * Back button
 */
function back_button() {
	$post_type = get_post_type_object( get_post_type() );
	$tax_slug = $post_type->rewrite['slug'];
	$back = '';
	if ( $tax_slug ) :
		$back .= '<a class="btn_back upper push-right" href="' . home_url( '/'. $tax_slug . '/' ) . '">';
		$back .= __('Zurück', 'warth');
		$back .= '</a>';
	endif;

	return $back;
}

function category_back_button() {
	$term = get_term( get_queried_object()->term_id, 'bilder' );
	$parent = $term->parent;
	if ( $parent != 0 ) :
		$link = get_term_link ($parent, 'bilder' );
	else :
		if ( qtrans_getLanguage() == 'en' ) :
			$link = qtrans_convertURL( home_url( '/gallery/' ), 'en' );
		else:
			$link = qtrans_convertURL( home_url( '/galerie/' ), 'de' );
		endif;
	endif;

	$back = '';
	if ( $link ) :
		$back .= '<a class="btn_back upper push-right" href="' . esc_url( $link ). '">';
		$back .= __('Zurück', 'warth');
		$back .= '</a>';
	endif;

	return $back;
}

/*
 * Thumbnails
 */
add_theme_support( 'post-thumbnails' );

/*
 * Post Formats
 */
add_theme_support( 'post-formats', array( 'image', 'video' ) );

/*
 * Custom Post Types Werke
 */
add_action( 'init', 'my_custom_post_werk' );
function my_custom_post_werk() {
    $labels = array(
        'name'               => __( 'Werke', 'warth' ),
        'singular_name'      => __( 'Werk', 'warth' ),
        'add_new'            => __( 'Werk hinzufügen', 'warth' ),
        'add_new_item'       => __( 'Neues Werk hinzufügen', 'warth' ),
        'edit_item'          => __( 'Werk bearbeiten', 'warth' ),
        'new_item'           => __( 'Neues Werk hinzufügen', 'warth' ),
        'all_items'          => __( 'Alle Werke', 'warth' ),
        'view_item'          => __( 'Werke ansehen', 'warth' ),
        'search_items'       => __( 'Werke durchsuchen', 'warth' ),
        'not_found'          => __( 'Keine Werke gefunden', 'warth' ),
        'not_found_in_trash' => __( 'Keine Werke im Papierkorb', 'warth' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Werke', 'warth' )
    );
    $args = array(
        'labels'          => $labels,
        'description'     => '',
        'public'          => true,
        'menu_position'   => 5,
        'supports'        => array( 'title', 'editor', 'thumbnail', 'post-formats' ),
        'has_archive'     => true,
        'capability_type' => 'post',
        'taxonomies'      => array( 'werke' )
    );
    register_post_type( 'werk', $args );
}

/*
 * Add custom taxonomies
 */
add_action( 'init', 'add_custom_taxonomies', 0 );
function add_custom_taxonomies() {
    register_taxonomy(
	    'bilder',
	    'werk', array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __( 'Kategorien', 'warth' ),
	            'singular_name' => __( 'Kategorie', 'warth' ),
                'search_items' =>  __( 'Kategorien durchsuchen', 'warth' ),
                'all_items' => __( 'Alle Kategorien', 'warth' ),
                'parent_item' => __( 'Übergeordnete Kategorien', 'warth' ),
	            'parent_item_colon' => __( 'Übergeordnete Kategorien:', 'warth' ),
                'edit_item' => __( 'Kategorie bearbeiten', 'warth' ),
                'update_item' => __( 'Kategorie aktualisieren', 'warth' ),
	            'add_new_item' => __( 'Neue Kategorie hinzufügen', 'warth' ),
                'new_item_name' => __( 'Neuer Kategoriename', 'warth' ),
                'menu_name' => __( 'Kategorien', 'warth' ),
            ),
            'rewrite' => array(
                'slug' => 'bilder',
                'with_front' => false,
                'hierarchical' => true
            ),
	    )
    );
}

/*
 * Register Sidebar Widgets
 */
if ( function_exists('register_sidebar') ) {

	register_sidebar( array(
		'name'          => 'Teaser',
		'id'            => 'teaser',
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

}

// register theme widgets
add_action( 'widgets_init', 'register_theme_widgets' );
function register_theme_widgets() {
	register_widget( 'Teaser' );
}

/*
 * Register Werk ID Form Field
 */
add_action( 'init', 'register_id_field' );
function register_id_field() {
  if ( function_exists( 'ninja_forms_register_field' ) ) {
	  $args = array(
		  'name' => 'werkname',
		  'display_function' => 'collect_werk_id',
		  'sidebar' => 'template_fields',
		  'display_label' => false,
		  'display_wrap' => false
	  );
      ninja_forms_register_field('user_ip', $args);
  }
}

/*
 * Get Werk ID
 */
function collect_werk_id( $field_id, $data ) {
	$id = $_GET['id'];
	if ( $id ) : // check for id
		$name = get_the_title( $id );
		if ( $name ) : // check for existing post
			echo '<label>';
			echo '<input type="checkbox" name="ninja_forms_field_' . $field_id . '" value="' . $name . '">';
			echo '<a href="' . get_permalink( $id ) . '">' . $name . '</a><br />';
			_e('durch Kaufanfrage automatisch ausgewählt.', 'warth');
            echo '</label>';
		endif;
		add_action( 'wp_footer', 'update_ninja_form_fields', 99 );
	endif;
}

/*
 * Default content in textarea
 */
function update_ninja_form_fields() {
	$id = $_GET['id'];
	$name = get_the_title( $id );
	$js = '<script type="text/javascript">';
	$js .= "$('.ninja-forms-form').find('textarea').val('" . __('Anfrage für Bild', 'warth') . " \"" . $name . "\"');";
	$js .= '</script>';
	echo $js;
}

/*
 * Load admin functions
 */
if ( is_admin() ) {
	include_once( 'functions-admin.php' );
}