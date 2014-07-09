<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage warth
 * @since Twenty Fourteen 1.0
 */
?>
	<?php wp_footer(); ?>

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
    foreach ( $teaser_headlines as $teaser_headline ) :
    echo '<div class="col-4-12 teaser-item">';
      echo '<h3>'. $teaser_headline .'</h3>';   
      echo '<img class="trans-m" src="' . $teaser_images['url'] . '" alt="' . $teaser_images['alt'] . '" />';
      echo '<a href="'. $teaser_link[$i] .'" class="btn_red btn-teaser">Mehr</a>';
    echo '</div>';
    $i++;
    endforeach;
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
<?php/*Real Footer*/?>
	<div class="grid grid-pad footer">
  <div class="col-2-12">
    <div class="content copyright">
      <p>© 2014 WARTH</p>
    </div>
  </div>
  <div class="col-8-12">
    <br/>  
  </div>
  <div class="col-2-12">
    <div class="content impressum">
      <?php wp_nav_menu( array('menu' => 'footermenu' ) ); ?>
      
    </div>
  </div>
</div>
<!-- TODO:delete Mobil navi 
<script src="<?php get_template_directory_uri(); ?>/jss/classie.js"></script>
<script src=" <?php get_template_directory_uri(); ?>/jss/mlpushmenu.js"></script>
<script>
  new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
</script> -->
</body>

</html>