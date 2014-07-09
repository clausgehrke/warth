<?php
/**
 * Template Name:  sliderdemo
 * @author        CG
 * @version       1.0.0
 *
 */
get_header();

?>

  <!-- Demo CSS TODO: JS und CSS für diese seite integrieren-->
<!-- 	
<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />

 -->  
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo CSS; ?>/flexslider.css" type="text/css" media="screen" />
<!-- Modernizr -->
<script type="text/javascript" src="<?php echo JS; ?>/modernizr.js"></script>
<div class="grid main">
  <div class="col-1-1">
    <section ><!-- class="slider" -->
      <div class="flexslider">
        <ul class="slides">
          <li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-1.jpg">
	    		</li>
	    		<li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-1.jpg">
	    		</li>
	    		<li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-1.jpg">
	    		</li>
	    		<li>
            <img alt="Warth Logo" src="<?php echo IMG; ?>/sliderbild_960x350-1.jpg">
	    		</li>
        </ul>
      </div>
    </section>
  </div>
  </div>
  <!-- jQuery -->
<!--   <script src="js/jquery.min.js"></script>
 -->  <!-- <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
   --><!-- FlexSlider -->
  <script defer type="text/javascript" src="<?php echo JS; ?>/jquery.flexslider.js"></script>
  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  <!-- Syntax Highlighter -->
  <script src="<?php echo JS; ?>/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo JS; ?>/shCore.js"></script>
  <script type="text/javascript" src="<?php echo JS; ?>/shBrushXml.js"></script>
  <script type="text/javascript" src="<?php echo JS; ?>/shBrushJScript.js"></script>
  <!-- Optional FlexSlider Additions -->
  <script type="text/javascript" src="<?php echo JS; ?>/jquery.easing.js"></script>
  <script type="text/javascript" src="<?php echo JS; ?>/jquery.mousewheel.js"></script>
  <script defer src="<?php echo JS; ?>/demo.js"></script>

<?php
get_footer();