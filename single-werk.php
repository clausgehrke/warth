<?php
/*
 * single werk
 */

get_header();

?>
<div class="grid main">
	<div class="col-1-1">
		<div class="border_left">
			<div class="border_right">
				<div id="content" class="content">
					<?php

						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content', 'werk' );
							endwhile;
						endif;

					?>
				</div><!-- /.content -->
			</div><!-- /.border_right -->
		</div><!-- /.border_left -->
	</div><!-- /.col-1-1 -->
</div><!-- /.main -->
<?php

get_footer();