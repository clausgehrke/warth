<?php
/**
 * functions
 *
 * @author        CLAGEH
 * @version       1.0.0
 * 
 */

// theme constants
define( 'HOME', esc_url( home_url( '/' ) ) );
define( 'THEME', get_stylesheet_directory_uri() );
define( 'FUNCTIONS', get_stylesheet_directory() . '/' );
define( 'JS', THEME . '/js' );
define( 'JSS', THEME . '/jss' );
define( 'CSS', THEME . '/css' );
define( 'IMG', THEME . '/img' );
require_once( FUNCTIONS . 'inc/meta_box_slider.php' );

// prepare for localization
add_action( 'after_setup_theme', 'warth_theme_setup' );
function warth_theme_setup(){
	load_theme_textdomain( 'warth', get_template_directory() . '/languages' );
}

// remove unnecessary header info
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
// META BOXES 

//http://www.deluxeblogtips.com/meta-box/register-single-meta-box/
// register image sizes
// TODO thumbnails etc. festlengen
if ( function_exists( 'add_image_size' ) ) {
	// $name, $width, $height, $crop
	add_image_size( 'grid-preview-item', 120, 90, true ); // no
	add_image_size( 'grid-item', 300, 225, true ); // no
	add_image_size( 'teaser-item', 300, 240, true ); // cropped
	add_image_size( 'slider-image', 960, 350, true ); 
}

// register nav menus
register_nav_menus( array(
	'main' => __( 'Hauptnavigation', 'warth' )
) );

// frontend enqueue styles
add_action( 'wp_enqueue_scripts', 'css_enqueue' );
function css_enqueue() {
	// load global styles TODO: rosenthal?
	wp_register_style( 'warth', get_stylesheet_uri(), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'warth' );

	/*custom frontpage scripts*/
	/*if ( is_page('home') || is_front_page() ) :
		wp_register_style( 'simpleGrid', CSS . '/simpleGrid.css', array( 'rosenthal' ), '1.0.0', 'all' );
		wp_enqueue_style( 'simpleGrid' );
	endif;*/
  if ( is_post_type_archive() || is_page()) :
    wp_register_style( 'flexslidercss', CSS . '/flexslider.css', array( 'warth' ), '1.0.0', 'all' );
    wp_enqueue_style( 'flexslidercss' );
  endif;
}

// frontend enqueue scripts
add_action( 'wp_enqueue_scripts', 'scripts_enqueue' );
function scripts_enqueue() {
	if ( ! is_admin() ) :

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', JS . '/jquery.min.js', array(), '1.11.0', true );
		wp_enqueue_script( 'jquery' );
    // TODO: add Modernizer
    wp_register_script( 'functions', JS . '/functions.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'functions' );
		// only on single product pages
		/*if ( is_singular( 'product' ) ) :
			wp_register_script( 'detail', JS . '/detail.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'detail' );
		endif;*/
				
		// Für Spezielle Seiten
    if ( is_post_type_archive() || is_page()) :
      wp_register_script( 'flexslider', JS . '/jquery.flexslider.js', array( 'jquery' ), '1.0.0', true );
      wp_enqueue_script( 'flexslider' );
      wp_register_script( 'jqueryeasing', JS . '/jquery.easing.js', array( 'jquery' ), '1.0.0', true );
      wp_enqueue_script( 'jqueryeasing' );
      wp_register_script( 'jquerymousewheel', JS . '/jquery.mousewheel.js', array( 'jquery' ), '1.0.0', true );
      wp_enqueue_script( 'jquerymousewheel' );
    endif;

	endif;
}

// add browser detection body class
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
 * Back button
 */
function back_button() {
	$post_type = get_post_type_object( get_post_type() );
	$tax_slug = $post_type->rewrite['slug'];
	$back = '';
	if ( $tax_slug ) :
		$back .= '<a class="btn_black upper push-right" href="' . home_url( '/'. $tax_slug . '/' ) . '">';
		$back .= __('Zurück', 'warth');
		$back .= '</a>';
	endif;

	return $back;
}

/*
 * Breadcrumbs
 */
function nav_breadcrumb() {
 
  $delimiter = '<span class="breadcrumb-divider"></span>';  
  $home = 'Home'; 
  $before = '<span class="current">'; 
  $after = '</span>'; 
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 	echo '<div class="grid">';
    echo '<div id="breadcrumb" class="col-1-1">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . single_cat_title('', false) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	    $post_type = get_post_type_object( get_post_type() );
	    $tax_slug = $post_type->rewrite['slug'];
	    if ( $tax_slug ) {
	    echo '<a href="' . home_url( '/' . $tax_slug . '/' ) . '">' . $post_type->labels->name . '</a> ' . $delimiter . ' ';
	    echo $before . single_cat_title( '', false ) . $after;
	    } else {
		    echo $before . $post_type->labels->singular_name . $after;
	    }
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    }  elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } /*elseif ( is_search() ) {
      echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;
    } elseif ( is_tag() ) {
      echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Beiträge veröffentlicht von ' . $userdata->display_name . $after;
    }*/ 
    elseif ( is_404() ) {
      echo $before . 'Fehler 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo ': ' . __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</div>'; 
    echo '</div>';
 }
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
 * Custom Post Types
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
        'not_found'          => __( 'keine Werke gefunden', 'warth' ),
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
 * Custom Post Types Atilier
 */

add_action( 'init', 'my_custom_post_atelier' );
function my_custom_post_atelier() {
    $labels = array(
        'name'               => __( 'Atelier', 'warth' ),
        'singular_name'      => __( 'Atelier', 'warth' ),
        'add_new'            => __( 'Atelierbild hinzufügen', 'warth' ),
        'add_new_item'       => __( 'Neues Atelierbild hinzufügen', 'warth' ),
        'edit_item'          => __( 'Atelierbild bearbeiten', 'warth' ),
        'new_item'           => __( 'Neues Atelier hinzufügen', 'warth' ),
        'all_items'          => __( 'Alle Atelierbilder', 'warth' ),
        'view_item'          => __( 'Atelierbilder ansehen', 'warth' ),
        'search_items'       => __( 'Atelier durchsuchen', 'warth' ),
        'not_found'          => __( 'keine  Atelierbilder gefunden', 'warth' ),
        'not_found_in_trash' => __( 'Keine Atelierbilder im Papierkorb', 'warth' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Atelier'
    );
    $args = array(
        'labels'          => $labels,
        'description'     => '',
        'public'          => true,
        'menu_position'   => 5,
        'supports'        => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'     => true,
        'capability_type' => 'post',
        'taxonomies'      => array( 'werke' )
    );
    register_post_type( 'atelier', $args );
}



/*
 * Add custom taxonomies
 */
add_action( 'init', 'add_custom_taxonomies', 0 );
function add_custom_taxonomies() {
    register_taxonomy(
	    'werke',
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
                'slug' => 'werke',
                'with_front' => false,
                'hierarchical' => true
            ),
	    )
    );
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

// load admin functions
if ( is_admin() ) {
	include_once( 'functions-admin.php' );
}