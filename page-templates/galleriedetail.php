<?php
/**
 * Template Name: Warth Gallerie Detail
 *
 * @author        KERCLA
 * @version       1.0.0
 *
 */

get_header();

?>

<!-- TODO:  add Lightbox-->
<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
<div class="grid main">
  <div class="col-1-1">
    <div class="border_left">
      <div class="border_right">
      
        <div class="content text">
          <a class="btn_grey btn-back" href="<?php get_back_href() ?>" title="">zurück</a>
    <?php //echo '<div>'. get_the_term_list($post->ID, 'werk', 'Werke: ',',','').'</div>' ; ?>
    <?php //echo '<p>'. the_terms($post->ID, 'werk', 'Werke: ',',','').'</p>' ;//geht nicht ?>

          <h2>Hallo</h2>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 
          tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero 
          eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea 
          takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur 
          sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna 
          aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea 
          rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
          <div class="galimg">
<!--TODO:  thumbnails size in functions php-->            
            <div class="galslider">
              <a><img src="<?php echo IMG; ?>/thumb1.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb3.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb1.png"></a>
              <a><img src="<?php echo IMG; ?>/thumb3.png"></a>
            </div>
            <h3 class="img_title">Triangles with lines</h3>
            <p class="img_attributes">fiberboard pencil</p>
            <a href="<?php echo IMG; ?>/galueb.png" data-imagelightbox="b">
              <img src="<?php echo IMG; ?>/galueb.png">
            </a>
          </div>
          <a href="werkdetail.html" class="btn_red btn-cont-text">Kaufanfrage</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();