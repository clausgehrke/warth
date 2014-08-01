<?php
/**
 * Template Name: Warth Ausstellung
 *
 * @author        CLAGEH
 * @version       1.0.0
 *
 */

get_header();

?>
<div class="grid grid-pad slider ">
  <div class="col-1-1" style="height:350px"> 
  <div class="cycle-slideshow">
    <img src="<?php echo IMG; ?>/sliderbild_960x350-3.jpg">
    <img src="<?php echo IMG; ?>/sliderbild_960x350-1.jpg">
    <img src="<?php echo IMG; ?>/sliderbild_960x350-2.jpg">
    </div>
  </div>
</div>
<div class="grid main">
	<div class="col-1-1">
		<div class="border_left">
			<div class="border_right">
        	  <div class="content">
              <h1><?php the_title(); ?></h1>
              <?php $page = get_page_by_title( get_the_title() );
$content = apply_filters('the_content', $page->post_content); 
echo $content;
?>
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
