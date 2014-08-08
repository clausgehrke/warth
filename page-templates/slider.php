<?php
/**
 * Template Name:  sliderdemo
 * @author        CG
 * @version       1.0.0
 * @todo unused?
 *
 */
get_header();

?>

<!-- Demo CSS TODO: JS und CSS für diese Seite integrieren-->
<!-- TODO: Modernizr -->
<script type="text/javascript" src="<?php echo JS; ?>/modernizr.js"></script>
<div class="grid main">
  <div class="col-1-1">
    <section class="col-1-1" style="margin-bottom:50px;"><!-- class="slider" -->
      <div class="flexslider headerslider">
        <ul class="slides">
          <li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-1.jpg">
          </li>
          <li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-2.jpg">
          </li>
          <li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-3.jpg">
          </li>
          <li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-4.jpg">
          </li>
        </ul>
      </div>
    </section>
    <section class="col-1-2">
      <div class="flexslider gall">
          <ul class="slides">
            <li data-thumb="http://placehold.it/100x100&text=thmb1">
              <img src="http://placehold.it/450x450&text=big1" />
            </li>
            <li data-thumb="http://placehold.it/100x100&text=thmb2">
              <img src="http://placehold.it/450x450&text=big2" />
            </li>
            <li data-thumb="http://placehold.it/100x100&text=thmb3">
              <img src="http://placehold.it/450x450&text=big3" />
            </li>
            <li data-thumb="http://placehold.it/100x100&text=thmb4">
              <img src="http://placehold.it/450x450&text=big4" />
            </li>
           </ul>
        </div>
    </section>
    <section class="col-1-2">
      <div class="flexslider gall">
          <ul class="slides">
            <li data-thumb="<?php echo IMG; ?>/thumb1.png">
              <img src="<?php echo IMG; ?>/bilddetail-lines2_500x500.jpg" />
            </li>
            <li data-thumb="<?php echo IMG; ?>/thumb2.png">
              <img src="<?php echo IMG; ?>/bilddetail-lines3_500x500.jpg" />
            </li>
            <li data-thumb="<?php echo IMG; ?>/thumb3.png">
              <img src="<?php echo IMG; ?>/bilddetail-lines2_500x500.jpg" />
            </li>
            
           </ul>
        </div>
    </section>
  </div>
</div>

<?php
get_footer();