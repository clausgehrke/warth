<?php
/**
 * admin only
 */

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
}

// add custom admin css
add_action( 'admin_head', 'custom_admin_styles' );
function custom_admin_styles() {
	echo '<style type="text/css">';
	// echo '#dashboard_right_now .post-count { display: none; }';
	echo '</style>';
}

// change post label only: http://revelationconcept.com/wordpress-rename-default-posts-news-something-else/
add_action( 'admin_menu', 'warth_change_post_label' );
function warth_change_post_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = __('Aktuelles', 'warth');
	$submenu['edit.php'][5][0] = __('Aktuelles', 'warth');
	$submenu['edit.php'][10][0] = __('Beitrag hinzufügen', 'warth');
	echo '';
}

// add custom post types to the dashboard
add_action( 'dashboard_glance_items', 'custom_right_now_content_table_end' );
function custom_right_now_content_table_end() {
	$args       = array(
		'public'   => true,
		'_builtin' => false
	);
	$output     = 'object';
	$operator   = 'and';
	$post_types = get_post_types( $args, $output, $operator );
	$exclude    = 'options';
	foreach ( $post_types as $post_type ) {
		if ( $post_type->name != $exclude ) {
			$num_posts = wp_count_posts( $post_type->name );
			$num       = number_format_i18n( $num_posts->publish );
			$text      = _n( $post_type->labels->name, $post_type->labels->name, intval( $num_posts->publish ) );
			if ( current_user_can( 'edit_posts' ) ) {
				$cpt_name = $post_type->name;
			}
			echo '<li class="' . $post_type->name . '-count"><tr><a href="edit.php?post_type=' . $cpt_name . '"><td class="first b b-' . $post_type->name . '"></td>' . $num . '&nbsp;<td class="t ' . $post_type->name . '">' . $text . '</td></a></tr></li>';
		}
	}
}

// update admin footer text
add_filter( 'admin_footer_text', 'custom_admin_footer' );
function custom_admin_footer() {
	echo '&copy; ' . date( 'Y' ) . sprintf( __( ' <a href="%s" target="_blank">Sven Hofmann</a>', 'warth_admin' ), esc_url( 'http://hofmannsven.com' ) ) . ' & ' . sprintf( __( ' <a href="%s" target="_blank">Claus Gehrke</a>', 'warth_admin' ), esc_url( 'http://clausgehrke.de/' ) );
}