<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


<div class="grid main">

<?php while ( have_posts() ) : the_post(); ?>
	<?php if (has_post_thumbnail()) :?>
	  <div class="col-5-12">
	    <div class="border_left">
		<?php the_post_thumbnail('medium'); ?>
	    </div>
	  </div>
	  <div class="col-7-12 border_right">
	    <div class="content text">
		<?php get_template_part( 'content', get_post_format() ); ?>
	    </div>
	  </div>
	<?php else : ?>
			<div class="col-1-1">
				<div class="border_left">
					<div class="border_right">
				        <div class="content">
							<?php get_template_part( 'content', get_post_format() ); ?>				
				    	</div>
		      		</div>
		    	</div>
			</div>
	<?php endif; ?>
<?php endwhile; // end of the loop. ?>
</div>
<?php/* get_sidebar(); */?>
<?php get_footer(); ?>