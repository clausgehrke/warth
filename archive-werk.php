<?php
/* TODO: Übersichtsseite erste instanz mit discription*/

get_header();?>

<!-- archive werk -->
<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();?>
			<div class="grid main">
				<div class="col-1-1">
					<div class="border_left">
						<div class="border_right">
							<?php get_template_part( 'content', 'werk' );?>
					    </div>
					</div>
				</div>
			</div>
			<?php endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif;
// TODO: kleine Vorlage
?>
<div class="grid grid-pad main">
  <div class="col-5-12">
    <div class="border_left">
      <section>
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
    </div>
  </div>
  <div class="col-7-12 border_right">
    <div class="text">
      <h2>Hallo</h2>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
      <a href="galleriedetail.html" class="btn_red btn-cont-text">Mehr</a>
    </div>
  </div>
</div>
<?php

	echo '</div><!-- /#content -->';

get_footer();