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

<!-- content.php -->
 <article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="col-5-12">
		<?php 
		if ( has_post_thumbnail() ) :
			echo '<div class="img-arrow">';
	 		the_post_thumbnail('medium', $image_attr); 
			echo '</div>';
		endif;?>
	</header>
	<div class="col-7-12 text entry-content">
		<?php the_title('<h2 class="regcaps">','</h2>'); ?>
		<?php echo the_terms( $post->ID, 'werke'); ?>
		<?php echo '<p class="aktuelles italic">'. get_the_content() .'</p>'; ?>
		<a class="btn_red btn-cont-text" href="<?php echo get_permalink( get_page_by_path('kontakt')) ?>?id=<?php the_ID()?>">Bild Anfragen</a>
	</div><!-- .entry-content -->
</article> <?php /*

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
	*/ ?>