<?php
/**
 * Template Name: Warth Gallerie Werke
 *
 * @author        KESHCG
 * @version       1.0.0
 *
 */

get_header();
?>
<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
<div class="grid grid-pad main">
  <div class="col-5-12">
    <div class="border_left">
      <div class="content galimg">
        <a href="<?php echo IMG; ?>/galueb.png" data-imagelightbox="b">
          <img src="<?php echo IMG; ?>/galueb.png">
        </a>
        <div class="galslider">
          <a><img src="<?php echo IMG; ?>/thumb1.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb3.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb1.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb3.png"></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-7-12 border_right">
    <div class="content text">
      <h2>Hallo</h2>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
      <a href="galleriedetail.html" class="btn_red btn-cont-text">Mehr</a>
    </div>
  </div>
</div>

<div class="grid grid-pad main">
  <div class="col-5-12">
    <div class="border_left">
      <div class="content galimg">
        <img src="<?php echo IMG; ?>/galueb.png">
        <div class="galslider">
          <a><img src="<?php echo IMG; ?>/thumb1.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb3.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb2.png"></a>
          <a><img src="<?php echo IMG; ?>/thumb3.png"></a>
        </div> 
      </div>
    </div>
  </div>
  <div class="col-7-12 border_right">
    <div class="content text">
      <h2>Hallo</h2>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Stet clita kasd gubergren, no sea takimata sanctus est gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    </div>
  </div>
</div>  
<?php
get_footer();