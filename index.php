<?php
/*
 * Template Name: Warth Content
 */

get_header();

get_template_part('content', 'teaser');

?>
<div class="grid main">
	<div class="col-1-1">
		<div class="border_left">
			<div class="border_right">
                <div class="content">
                <?php

                the_title('<h1>', '</h1>');

                if ( have_posts() ) :
	                while ( have_posts() ) : the_post();

		                the_content();

	                endwhile;
                endif;

                ?>
	            </div><!-- /.content -->
            </div><!-- /.border_right -->
        </div><!-- /.border_left -->
	</div><!-- /.col-1-1 -->
</div><!-- /.grid -->
<?php

get_footer();