<?php
/* TODO: Übersichtsseite erste instanz mit discription*/

get_header();?>

<!-- archive werk -->
<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();?>
			<div class="grid main">
				<div class="col-1-1">
					<div class="border_left">
						<div class="border_right">
							<?php get_template_part( 'content', 'werk' );?>
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