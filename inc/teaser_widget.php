<?php
/*
* Plugin Name: Featured Link
* Description: This widget displays a single teaser.
* Version: 0.1
* Author: Sven Hofmann
*/

add_action( 'widgets_init', create_function( '', 'register_widget("Teaser");' ) );

class Teaser extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'teaser',
            'description' => __('Dieses Widget auswählen, um einen neuen Teaser im Footer anzulegen.', 'warth')
        );

        parent::__construct( 'teaser', 'Teaser', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
    }

    public function upload_scripts() {
        wp_enqueue_media();
        wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/js/upload-media.js');
    }

    public function upload_styles() {
        wp_enqueue_style('thickbox');
    }

    public function widget( $args, $instance ) {
        $title = apply_filters('widget_title', $instance['title'] );
        $link = $instance['link'];
        $image_id = $instance['image_id'];


	    echo '<div class="col-4-12 teaser-item">';
	    echo '<h3>'. $title .'</h3>';
	    if ( $image_id ) {
		    $image_attributes = wp_get_attachment_image_src( $image_id, 'teaser-item' );
		    echo '<img class="trans-m" src="' . $image_attributes[0] . '" width="' . $image_attributes[1] . '" height="' . $image_attributes[2] . '">';
	    }
	    if ( $link ) {
	        echo '<a href="'. get_permalink( $link ) .'" class="btn_red btn-teaser">' . __('Mehr', 'warth') . '</a>';
	    }
	    echo '</div>';

    }

    public function update( $new_instance, $old_instance ) {
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    public function form( $instance ) {
        if(isset($instance['title'])) {
            $title = $instance['title'];
        }

        if(isset($instance['link'])) {
            $link = $instance['link'];
        }

        if(isset($instance['image_id'])) {
            $image_id = $instance['image_id'];
        }

    ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Überschrift:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link' ); ?>"><?php _e( 'Link:' ); ?></label><br />
	        <div class="js_select_page">
	        <?php
	            $args = array(
		            'id' => $this->get_field_id('link'),
		            'name' => $this->get_field_name('link'),
		            'selected' => $instance['link']
	            );
	            wp_dropdown_pages( $args );
	        ?>
		    <input class="js_link" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="hidden" value="<?php echo esc_attr( $link ); ?>" />
	        </div>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image_id' ); ?>"><?php _e( 'Bild-ID:' ); ?> <span class="custom_image_id"><?php echo esc_attr( $image_id ); ?></span></label><br />
            <input class="custom_image widefat" id="<?php echo $this->get_field_id( 'image_id' ); ?>" name="<?php echo $this->get_field_name( 'image_id' ); ?>" type="text" value="<?php echo esc_attr( $image_id ); ?>" style="display:none;" />
            <input class="upload_image_button button button-primary" type="button" value="Upload" style="margin-top: 10px;" />
        </p>

    <?php
    }
}