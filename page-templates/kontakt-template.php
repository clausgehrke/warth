<?php
/**
 * Template Name: Warth Kontakt
 *
 * @author        CLAGEH
 * @version       1.0.0
 *
 */

$file_upload      = rwmb_meta( 'wa_file_upload' );
$show_upload_button = rwmb_meta( 'wa_show_upload_button' );

get_header();

get_template_part('content', 'teaser');

?>
<div class="grid main">
  <div class="col-1-1">
    <div class="border_left">
      <div class="border_right">
        <div class="content">
            <?php

            if ( have_posts() ) :
	            while ( have_posts() ) : the_post();

		            the_content();

	            endwhile;
            endif;

            if ( $show_upload_button ) :
	        ?>
                <div class="btn download-area">
	                <p><?php _e('Der Katalog von 2007 "reduced pictures" kann als PDF heruntergeladen werden.', 'warth'); ?></p>
	                <a href="<?php echo wp_get_attachment_url( $file_upload ); ?>" target="_blank" download alt="<?php _e('Download Katalog', 'warth'); ?>">
                    <button type="button" name="download" class="btn_red caps button download-button">
	                    <?php _e('Download', 'warth'); ?>
                    </button>
                    </a>
                </div><!-- /.btn -->
            <?php endif;?>
        </div><!-- /.content -->
      </div><!-- /.border_right -->
    </div><!-- /.border_left -->
  </div><!-- /.col-1-1 -->
</div><!-- /.grid -->
<?php

get_footer();