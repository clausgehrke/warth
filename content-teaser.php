<?php
/*
 * content teaser
 */

$show_slider      = rwmb_meta( 'wa_show_slider' );
$slider_images    = rwmb_meta( 'wa_slider_images', 'type=image&size=slider-image');
$slider_frame     = rwmb_meta( 'wa_slider_frame' );
$show_teaser      = rwmb_meta( 'wa_show_teaser' );
$teaser_images    = rwmb_meta( 'wa_teaser_images', 'type=image&size=full');
$teaser_headline  = rwmb_meta( 'wa_teaser_headline' );
$teaser_link      = rwmb_meta( 'wa_teaser_link' );

if ( $show_slider ) :

?>
<div class="grid grid-pad slider <?php if ($slider_frame) { echo 'frame'; } ?>">
	<div class="col-1-1" style="height:350px">
		<div class="cycle-slideshow" data-cycle-prev=".cycle-prev" data-cycle-next=".cycle-next">
			<?php

				$i = 0;
				foreach ( $slider_images as $image ) :
					echo '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $image['alt'] . '" />';
					$i++;
				endforeach;
				if ($i >= 2):
					echo '<div class="cycle-prev trans-f"></div><div class="cycle-next trans-f"></div>';
				endif;

			?>
		</div><!-- /.cycle-slideshow -->
	</div><!-- /.col-1-1 -->
</div><!-- /.grid -->
<?php

endif; // end of $show_slider