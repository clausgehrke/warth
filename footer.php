<?php
/*
 * footer
 */
?>


  <?php 
  $show_standardteaser = rwmb_meta( 'wa_show_standardteaser' );
  $show_teaser      = rwmb_meta( 'wa_show_teaser' );
 ?>
  <?php if ($show_standardteaser) :

    
    $teaser_images = rwmb_meta( 'wa_teaser_images', $args = array(), $post_id = 83 );
    $teaser_headlines = rwmb_meta( 'wa_teaser_headline', $args = array(), $post_id = 83 );
    $teaser_link = rwmb_meta( 'wa_teaser_link', $args = array(), $post_id = 83 );
    /*echo '<pre>';
    print_r($teaser_images[0]) ;
    print_r($teaser_images[1]) ;
    print_r($teaser_images[2]) ;
    print_r($teaser_link) ;
    print_r($teaser_headline) ;
    echo '</pre>';
    */
// TODO: Teaser Bilder werden noch nicht eingebunden
    echo '<div class="grid grid-pad teaser">';
    $i = 0;
	if ( $teaser_headlines ) :
        foreach ( $teaser_headlines as $teaser_headline ) :
            echo '<div class="col-4-12 teaser-item">';
            echo '<h3>'. $teaser_headline .'</h3>';
            echo '<img class="trans-m" src="' . $teaser_images['url'] . '" alt="' . $teaser_images['alt'] . '" />';
            echo '<a href="'. $teaser_link[$i] .'" class="btn_red btn-teaser">Mehr</a>';
	        echo '</div>';
            $i++;
        endforeach;
	endif;
    echo  '</div>';
endif;?>
<?php if ($show_teaser) : 
  $teaser_images    = rwmb_meta( 'wa_teaser_images', 'type=image&size=teaser-item');
  $teaser_headline  = rwmb_meta( 'wa_teaser_headline' );
  $teaser_link      = rwmb_meta( 'wa_teaser_link' );
  echo '<div class="grid grid-pad teaser">';
  $i = 0;
  foreach ( $teaser_images as $image ) :
  echo '<div class="col-4-12 teaser-item">';
    echo '<h3>'. $teaser_headline[$i] .'</h3>';   
    echo '<img class="trans-m" src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
    echo '<a href="'. $teaser_link[$i] .'" class="btn_red btn-teaser">Mehr</a>';
  echo '</div>';
  $i++;
  endforeach;
  echo  '</div>';
endif;?>
<?php /* Real Footer */ ?>

<div class="footer">
	<div class="grid grid-pad">
        <div class="col-1-2">
            <div class="copyright">
                <p>© <?php echo date( 'Y' ); ?> WARTH</p>
            </div><!-- /.copyright -->
        </div><!-- /.col-1-2 -->
        <div class="col-1-2 last">
            <div class="impressum">
                <?php wp_nav_menu( array('menu' => 'footermenu' ) ); ?>
            </div><!-- /.impressum -->
        </div><!-- /.col-1-2 -->
	</div><!-- /.grid -->
</div><!-- /.footer -->

<?php wp_footer(); ?>

</body>
</html>