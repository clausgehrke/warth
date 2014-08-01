<?php

get_header();

/*$header_args = array(
	'infobar' => false,
	'size'    => 'small',
	'lang'  => false,
	'top'     => false,
	'close'   => false
);*/

echo '<div id="content" class="content">';
echo '<p>single werk</p>';
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'werk' );
	endwhile;
endif;
echo '</div><!-- /#content -->';

get_footer();