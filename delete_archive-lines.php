<?php// TODO: Übersichtsseite erste instanz mit discription

get_header();

?>
<?php
	echo '<div id="content" class="content" role="main">';
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif;
	echo '</div><!-- /#content -->';
get_footer();