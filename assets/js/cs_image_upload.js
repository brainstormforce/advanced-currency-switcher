
    jQuery(document).ready(function($){

    $('#clear_image_buttonUSD').click(function(e) {
        $('#upload_imageUSD').val("");
    });
    $('#upload_image_buttonUSD').click(function(e) {
        e.preventDefault();
        var custom_uploaderUSD;
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploaderUSD) {
            custom_uploaderUSD.open();
            return;
        }

        //Extend the wp.media object
        custom_uploaderUSD = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploaderUSD.on('select', function() {
            
            attachment = custom_uploaderUSD.state().get('selection').first().toJSON();
            $('#upload_imageUSD').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploaderUSD.open();

    });
    $('#clear_image_buttonEUR').click(function(e) {
        $('#upload_imageEUR').val("");
    });
    $('#upload_image_buttonEUR').click(function(e) {
        
        e.preventDefault();
        var custom_uploaderEUR;
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploaderEUR) {
            custom_uploaderEUR.open();
            return;
        }

        //Extend the wp.media object
        custom_uploaderEUR = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploaderEUR.on('select', function() {
            console.log(custom_uploaderEUR.state().get('selection').toJSON());
            attachment = custom_uploaderEUR.state().get('selection').first().toJSON();
            $('#upload_imageEUR').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploaderEUR.open();

    });
     $('#clear_image_buttonAUD').click(function(e) {
        $('#upload_imageAUD').val("");
    });
    $('#upload_image_buttonAUD').click(function(e) {
        
        e.preventDefault();
        var custom_uploaderAUR;
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploaderAUR) {
            custom_uploaderAUR.open();
            return;
        }

        //Extend the wp.media object
        custom_uploaderAUR = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploaderAUR.on('select', function() {
            
            attachment = custom_uploaderAUR.state().get('selection').first().toJSON();
            $('#upload_imageAUD').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploaderAUR.open();

    });
     $('#clear_image_buttonINR').click(function(e) {
        $('#upload_imageINR').val("");
    });
       $('#upload_image_buttonINR').click(function(e) {
       
        e.preventDefault();
        var custom_uploaderINR;
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploaderINR) {
            custom_uploaderINR.open();
            return;
        }

        //Extend the wp.media object
        custom_uploaderINR = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploaderINR.on('select', function() {
           
            attachment = custom_uploaderINR.state().get('selection').first().toJSON();
            $('#upload_imageINR').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploaderINR.open();

    });
});
