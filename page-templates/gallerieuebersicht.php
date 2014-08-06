<?php
/**
 * Template Name: Warth Gallerie Übersicht
 *
 * @author        CLAGEH
 * @version       1.0.0
 *
 */

get_header();

?>
<!-- <script src="js/jquery.min.js"></script>
<script src="js/imagelightbox.min.js"></script>
<script>
    $( function()
    {
        $( 'a' ).imageLightbox();
    });
</script> -->
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
  <div class="grid main">
    <div class="col-1-1">
      <div class="border_left">
        <div class="border_right">
          <div class="content">
            <h2>Diese Seite befindet sich im Aufbau.</h2>
            <p>Als Farbfeldmaler liegt seine tiefe Intuition in der totalen Reduktion von Form und Farbe. Seine abstrakten Arbeiten besitzen eine Formensprache, die auf Grundstrukturen reduziert ist. Sie tendiert zu Klarheit und Logik, perfekter Ausführung, klarer Linienführung und dynamischen Kompositionen. In der Verbindung scheinbar einfacher Formen und Farbe - Quadrat, Dreieck, Kreuz und Rot, Schwarz, Weiß - gelingt Warth eine elementare Abstraktion, die gerade durch die Vereinfachung zum aktiven Sehen und Fühlen aufruft. Warth fordert von seinem Betrachter ein meditatives Eintauchen in seine Bildwelt - erst im Dialog zwischen Betrachter und Bild findet das Kunstwerk Vollendung.</p>
            </div>
            </div>
        </div>
        <!--<div class="st first"></div>
        <div class="st last"></div>-->
    </div>
  </div>
<?php
get_footer();