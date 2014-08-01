<?php
/*
 * archives
 */

get_header();

// breadcrumbs
if ( function_exists('nav_breadcrumb') ) :
	nav_breadcrumb();
endif;

?>
	<div class="grid main">
		<div class="col-1-1">
			<div class="border_left">
				<div class="border_right">
					<div class="content">
						<?php

						// back link
						$tax_slug = get_query_var( 'taxonomy' );
						if ( $tax_slug ) :
							echo '<a class="btn_black upper" href="' . home_url( '/'. $tax_slug . '/' ) . '">';
								_e('Zurück', 'warth');
							echo '</a>';
						endif;

						// category intro
						echo '<h1>' . single_cat_title('' , false) . '</h1>';
						echo category_description();

						// category content overview
						if ( have_posts() ) :
							echo '<ul class="archive-postlist">';
							while ( have_posts() ) : the_post();

								if ( has_post_thumbnail() ) :
									echo '<li>';
										echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" class="js_get-post" data-id="' . get_the_ID() . '">';
											the_post_thumbnail( 'thumbnail' );
										echo '</a>';
									echo '</li>';
								endif;

							endwhile;
							echo '</ul>';
						endif;

						// category content
						$cat = get_term_by( 'name', single_cat_title( '', false ), 'werke' );
						$item_query = array(
							'post_type' => 'werk',
							'werke' => $cat->slug,
							'posts_per_page' => 1
						);
						$item = new WP_Query( $item_query );
						if ( $item->have_posts() ) :
							while ( $item->have_posts() ) : $item->the_post();

								echo '<div class="archive-preview">';

									the_title('<h1 class="js_title">', '</h1>');

									echo '<p class="js_content">'. get_the_content() .'</p>';

									echo '<div class="js_image">';
										if ( has_post_thumbnail() ) :
											the_post_thumbnail( 'medium' );
										endif;
									echo '</div>';

									echo '<a class="btn_red btn-cont-text js_contact" href="' . get_permalink( get_page_by_path( 'kontakt' ) ) . '?id=' . get_the_ID() . '">';
										_e('Kaufanfrage', 'warth');
									echo '</a>';

								echo '</div><!-- /.archive-preview -->';

							endwhile;
						endif;

						wp_reset_query();

						?>
					</div><!-- /.content -->
				</div><!-- /.border_right -->
			</div><!-- /.border_left -->
		</div><!-- /.col-1-1 -->
	</div><!-- /.main -->
<?php

get_footer();