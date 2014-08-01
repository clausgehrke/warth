<?php
/*
 * archives
 */

get_header();

?>
	<div class="grid main">
		<div class="col-1-1">
			<div class="border_left">
				<div class="border_right">
					<div class="content">
						<?php

						// category intro
						echo '<h1>' . single_cat_title('' , false) . '</h1>';
						echo category_description();

						// category content overview
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();

								echo '<ul class="archive-postlist">';
								if ( has_post_thumbnail() ) :
									echo '<li>';
									the_post_thumbnail( 'thumbnail' );
									echo '</li>';
								endif;
								echo '</ul>';

							endwhile;
						endif;

						// category content
						$item_query = array(
							'post_type' => 'werk',
							'werke' => 'flying-triangles',
							'posts_per_page' => 1
						);
						$item = new WP_Query( $item_query );
						if ( $item->have_posts() ) :
							while ( $item->have_posts() ) : $item->the_post();

								echo '<div class="archive-preview">';

									the_title('<h1>', '</h1>');

									the_content();

									if ( has_post_thumbnail() ) :
										the_post_thumbnail( 'medium' );
									endif;

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