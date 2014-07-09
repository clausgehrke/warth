<?php
/**
 * Template Name: Warth Kontakt
 *
 * @author        CLAGEH
 * @version       1.0.0
 *
 */

get_header();

?>
<?php

get_header();
$show_slider      = rwmb_meta( 'wa_show_slider' );
$slider_images    = rwmb_meta( 'wa_slider_images', 'type=image&size=slider-image');
$slider_frame     = rwmb_meta( 'wa_slider_frame' );
$show_teaser      = rwmb_meta( 'wa_show_teaser' );
$teaser_images    = rwmb_meta( 'wa_teaser_images', 'type=image&size=full');
$teaser_headline  = rwmb_meta( 'wa_teaser_headline' );
$teaser_link      = rwmb_meta( 'wa_teaser_link' );
$file_upload      = rwmb_meta( 'wa_file_upload' );
$show_upload_button = rwmb_meta( 'wa_show_upload_button' );

?>
<?php if ($show_slider) :?>
<div class="grid grid-pad slider <?php if ($slider_frame) :
  echo 'frame';
endif;?>">
  <div class="col-1-1" style="height:350px">
    <div class="cycle-slideshow" data-cycle-prev=".cycle-prev"
        data-cycle-next=".cycle-next">
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
    </div>
  </div>
</div>
<?php 
  endif;
?>
<div class="grid main">
  <div class="col-1-1">
    <div class="border_left">
      <div class="border_right">
        <div class="content">
          <h1><?php the_title(); ?></h1>
            <?php 
            $page = get_page_by_title( get_the_title() );
            $content = apply_filters('the_content', $page->post_content); 
            echo $content;
            ?>
            <?php if ($file_upload && $show_upload_button): ?>
              <div class="btn">
                <a href="<?php echo wp_get_attachment_url( $file_upload ); ?>" target="_blank" alt="Download Katalog">
                  <button type="button" name="download" class="btn_red caps button">Katalog&nbsp;herunterladen</button>
                </a>
              </div>
            <?php endif;?>
            <?php// print_r(get_the_title($_GET['id'])); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php /*
<div class="grid slider frame">
  <div class="col-1-1 kontakt-img">
    <img src="<?php echo IMG; ?>/kontakt_bild.jpg">
  </div>
</div>
<div class="grid main">
  <div class="col-1-1">
    <div class="border_left">
      <div class="border_right">
        <div class="content text">
          <!-- <a class="btn_grey btn-back" href="#" title="">zurück</a> -->
          <form name="interaction" id="interaction" action="#" enctype="multipart/form-data" method="post">
          <fieldset class="pad-grid">
            <legend class=" form-legend col-1-1">Kontaktformular für Anfragen zu Bildern aus der Galerie und fragen an den Künstler</legend>
            <div class="form-element col-1-2">
              <label class="" for="name">Vorname<span class="red"> *</span></label>
              <input type="text" id="name" name="name" class="name" size="10">
            </div>
            <div class="form-element col-1-2">
              <label class="" for="name">Nachname<span class="red"> *</span></label>
              <input type="text" id="name" name="name" class="name" size="10">
            </div>              
            <div class="form-element col-1-2">
              <label class="" for="address">Strasse, Nr.</label>
              <input type="text" id="address" name="address" class="address italic" size="10">
            </div>
            <div class="form-element col-1-2">
              <label class="" for="zip">Postleitzahl, Ort</label>
              <input type="text" id="zip" name="zip" class="zip" size="10">
            </div>
            <div class="form-element col-1-2">
              <label class="" for="country">Land</label>
              <input type="text" id="country" name="country" class="country" size="10" value="Deutschland">
            </div>
            <div class="form-element col-1-2">
              <label class="" for="mail">E-Mail<span class="red"> *</span></label>
              <input type="email" id="mail" name="mail" class="mail" size="10">
            </div>
            <div class="form-element col-1-1">
              <label class="" for="message">Textfeld für Anfrage</label>
              <textarea id="message" name="message" cols="40" rows="3"></textarea>
            </div>
            <div class="form-element col-1-2">
              <input type="checkbox" id="via" name="via" class="via" value="post">
              <label class="checkbox red" for="via">Square Bild Geodreieck</label><!-- TODO:  ausgewältes Bild mit Namen einfügen -->
            </div>
            <div class="form-element col-1-1">
              <p class="red">Mit<span class="red"> *</span> gekennzeichnete Felder müssen ausgefüllt werden.</p>
              <div class="btn">
                <button type="submit" id="submit" name="submit" class="btn_red caps button submit">Anfrage Absenden</button>
              </div>
            </div>
          </fieldset>
          </form>
          <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
          <a class="btn_red" href="pdf.pdf" title="">Download</a>
        </div>
      </div>
    </div>
  </div>
</div> */ ?>
<?php
get_footer();
