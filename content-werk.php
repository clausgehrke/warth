<?php
/*
 * content werk
 */

?>
 <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'grid', 'single-item' ) ); ?>>
	<header class="col-5-12">
		<?php

			if ( has_post_thumbnail() ) :
				echo '<div class="img-arrow">';
	 		        the_post_thumbnail('medium', array( 'class'	=> 'aktuelles-img js_image' ) );
				echo '</div>';
			endif;

		?>
	</header>
	<div class="col-7-12 text entry-content">
		<?php

			the_title('<h2 class="regcaps"><span class="js_title">','</span></h2>');

			if (the_terms( $post->ID, 'werke')) :
				echo '<p class="catlable">' . __('Werkkategorie', 'warth') . ':</p>';
				echo the_terms( $post->ID, 'werke');
			endif;

			echo '<p class="aktuelles italic"><span class="js_content">'. get_the_content() .'</span></p>';

			echo '<a class="btn_red btn-cont-text" href="' . get_permalink( get_page_by_path( 'kontakt' ) ) . '?id=' . get_the_ID() . '">';
				_e('Kaufanfrage', 'warth');
			echo '</a>';

		?>
	</div><!-- .entry-content -->
</article>