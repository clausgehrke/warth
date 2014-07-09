<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="grid grid-pad slider ">
  <div class="col-1-1" style="height:350px"> 
  <div class="cycle-slideshow">
    <img src="<?php echo IMG; ?>/sliderbild_960x350-1.jpg">
    <img src="<?php echo IMG; ?>/sliderbild_960x350-2.jpg">
    <img src="<?php echo IMG; ?>/sliderbild_960x350-3.jpg">
    </div>
  </div>
</div>
<div class="grid main">
  <div class="col-1-1">
    <div class="border_left">
      <div class="border_right">
        <div class="content">
          <h2>WARTH ist Minimalist.</h2>
          <p>Als Farbfeldmaler liegt seine tiefe Intuition in der totalen Reduktion von Form und Farbe. Seine abstrakten Arbeiten besitzen eine Formensprache, die auf Grundstrukturen reduziert ist. Sie tendiert zu Klarheit und Logik, perfekter Ausführung, klarer Linienführung und dynamischen Kompositionen. In der Verbindung scheinbar einfacher Formen und Farbe - Quadrat, Dreieck, Kreuz und Rot, Schwarz, Weiß - gelingt Warth eine elementare Abstraktion, die gerade durch die Vereinfachung zum aktiven Sehen und Fühlen aufruft. Warth fordert von seinem Betrachter ein meditatives Eintauchen in seine Bildwelt - erst im Dialog zwischen Betrachter und Bild findet das Kunstwerk Vollendung.</p>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<!--/main + Teaser-->
<?php
/*get_sidebar();*/
get_footer();
