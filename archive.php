<?php
/* Achiv für alles
TODO: Übersichtsseite erste instanz mit decsription
*/

get_header();?>
<!-- archive allgemein -->
<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();?>
			<div class="grid main">
				<div class="col-1-1">
					<div class="border_left">
						<div class="border_right">
							<?php get_template_part( 'content', get_post_format() );?>
					    </div>
					</div>
				</div>
			</div>
			<?php endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif;
	echo '</div><!-- /#content -->';

get_footer();