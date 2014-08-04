<?php
/*
 * Template Name: Aktuelles
 */

$news_args = array(
	'post_type' => 'post'
);
$news = new WP_Query( $news_args );

get_header();

get_template_part('content', 'teaser');

if ( $news->have_posts() ) :
	while ( $news->have_posts() ) : $news->the_post();

?>
<div class="grid main">
	<div class="col-1-1">
		<div class="border_left">
			<div class="border_right">
                <div class="content">
                <?php

                    the_title('<h1>', '</h1>');

                    the_content();

                ?>
	            </div><!-- /.content -->
            </div><!-- /.border_right -->
        </div><!-- /.border_left -->
    </div><!-- /.col-1-1 -->
</div><!-- /.grid -->
<?php

	endwhile;
endif;

wp_reset_postdata();

get_footer();