jQuery(document).ready(function($){

    // upload
    $('.upload_image_button').click(function(e) {

        e.preventDefault();

        var custom_uploader;
        var update = $(this).parent().find('.custom_image');
        var preview = $(this).parent().find('.custom_image_id');


        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Bild hochladen',
            button: {
                text: 'Bild hochladen'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $(update).val(attachment.id);
            $(preview).text(attachment.id);
        });

        //Open the uploader dialog
        custom_uploader.open();

    });

});