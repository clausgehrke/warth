<?php
/**
 * Template Name: Warth Gallerie Werke
 *
 * @todo: überflüssig
 *
 */

get_header();

// breadcrumbs
if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<div class="grid"><div id="breadcrumbs" class="breadcrumbs col-1-1">','</div></div>');
}

$taxonomies = rwmb_meta( 'wa_selected_images', 'type=taxonomy&taxonomy=bilder' );

$werke_args    = array(
	'hide_empty' => 1,
	'child_of' => $taxonomies[0]->term_id, // only children of selected term
	'taxonomy' => 'bilder'
);
$werke = get_categories( $werke_args );

foreach ( $werke as $werk ) :

	echo '<div class="grid grid-pad main">';

	$cat_args = array(
		'post_type' => 'werk',
		'posts_per_page' => 5,
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'bilder',
				'field' => 'slug',
				'terms' => array( $werk->slug )
			),
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-standard', 'post-format-image' )
			)
		)

	);
	$categories = new WP_Query( $cat_args );

	if ( $categories->have_posts() ) :

		echo '<div class="col-5-12">';
			echo '<div class="border_left">';
				echo '<section>';
					echo '<div class="flexslider gall">';
						echo '<ul class="slides">';

							while ( $categories->have_posts() ) : $categories->the_post();
								if ( has_post_thumbnail() ) :
									$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'flexslider-thumb' );
									echo '<li data-thumb="' . $large_image_url[0] . '">';
									the_post_thumbnail( 'flexslider-full' );
									echo '</li>';
								endif;
							endwhile;

							wp_reset_query();

						echo '</ul>';
					echo '</div><!-- /.flexslider -->';
				echo '</section>';
			echo '</div><!-- /.border_left -->';
		echo '</div><!-- /.col-5-1 -->';

	endif;

		echo '<div class="col-7-12 border_right">';
			echo '<div class="text">';
				echo '<h2>' . $werk->name . '</h2>';
				echo '<p>' . $werk->description . '</p>';
				$term_id = $werk->term_id;
				echo '<a href="'. get_term_link( $werk->slug, $werk->taxonomy ) . '" class="btn_red btn-cont-text">';
				_e('Mehr', 'warth');
				echo '</a>';
			echo '</div><!-- /.text -->';
		echo '</div><!-- /.border_right -->';

	echo '</div><!-- /.grid -->';

endforeach;

get_footer();