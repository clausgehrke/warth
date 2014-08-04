<?php
/*
 * single
 */

get_header();

echo '<div class="grid main">';

	while ( have_posts() ) : the_post();
		if (has_post_thumbnail()) :

?>
			<div class="col-5-12">
	            <div class="border_left">
					<?php the_post_thumbnail('medium'); ?>
	            </div><!-- /.border_left -->
	        </div><!-- /.col-5-12 -->

	        <div class="col-7-12 border_right">
	            <div class="content text">
					<?php get_template_part( 'content', get_post_format() ); ?>
	            </div><!-- /.content -->
	        </div><!-- /.col-7-12 -->
	<?php else : ?>
			<div class="col-1-1">
				<div class="border_left">
					<div class="border_right">
				        <div class="content entry-content">
							<?php

							the_title('<h2 class="regcaps">','</h2>');

							echo '<p class="aktuelles italic">'. get_the_content() .'</p>';

							?>
				    	</div><!-- /.content -->
		      		</div><!-- /.border_right -->
		    	</div><!-- /.border_left -->
			</div><!-- /.col-1-1 -->
<?php

		endif;
	endwhile;

echo '</div><!-- /.grid -->';

get_footer();