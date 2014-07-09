<?php
/*
 * Template name: Produktgruppen
 */

get_header();
?>

<div class="page-wrapper">
	<div class="row">

		<div class="page-inner">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>
		
<?php

$args3 = array(
	'show_option_all'    => '',
	'orderby'            => 'name',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 1,
	'hide_empty'         => 0,
	'child_of'           => 0,
	'hierarchical'       => 1,
	'title_li'           => '',
	'echo'               => 1,
	'depth'              => 1,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'product_cat',
); 

echo '<ul>';
wp_list_categories( $args3 ); 
echo '</ul>';

?>

	  </div><!-- .page-inner -->
  </div><!-- end row -->	
</div><!-- end page-wrapper -->

<?php get_footer(); ?>