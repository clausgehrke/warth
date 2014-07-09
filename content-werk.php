<?php
/**
 * content
 *  TODO
 * @author        CLAKER
 * @version       1.0.0
 */

$classes = array( 'grid', 'single-item' );
$image_attr = array(
	'class'	=> "aktuelles-img",
);
?>
 <article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="col-5-12">
		<?php 
		echo get_the_term_list( $post->ID);
		if ( has_post_thumbnail() ) :
			echo '<div class="img-arrow">';
	 		the_post_thumbnail('medium', $image_attr); 
			echo '</div>';
		endif;?>
	</header>
	<div class="col-7-12 text entry-content">
		
		<?php the_title('<h2 class="regcaps">','</h2>'); ?>
		<?php 
		if (the_terms( $post->ID, 'werke')) :
			echo '<p class="catlable">Werkkategorie:</p>';
			echo the_terms( $post->ID, 'werke');
		endif;
		?>
		<?php echo '<p class="aktuelles italic">'. get_the_content() .'</p>'; ?>
		<a class="btn_red btn-cont-text" href="<?php echo get_permalink( get_page_by_path('kontakt')) ?>?id=<?php the_ID()?>">Kaufanfrage</a>	
		

	</div><!-- .entry-content -->
</article>