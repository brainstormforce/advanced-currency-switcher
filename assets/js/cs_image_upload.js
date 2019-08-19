
    jQuery(document).ready(function($){
    $('#upload_image_buttonUSD').click(function(e) {
       console.log($('#upload_image_buttonUSD').attr('id'));
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
            console.log(custom_uploaderUSD.state().get('selection').toJSON());
            attachment = custom_uploaderUSD.state().get('selection').first().toJSON();
            $('#upload_imageUSD').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploaderUSD.open();

    });
    $('#upload_image_buttonEUR').click(function(e) {
        console.log($('#upload_image_buttonEUR').attr('id'));
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
    $('#upload_image_buttonAUD').click(function(e) {
        console.log($('#upload_image_buttonAUD').attr('id'));
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
            console.log(custom_uploaderAUR.state().get('selection').toJSON());
            attachment = custom_uploaderAUR.state().get('selection').first().toJSON();
            $('#upload_imageAUD').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploaderAUR.open();

    });
       $('#upload_image_buttonINR').click(function(e) {
        console.log($('#upload_image_buttonINR').attr('id'));
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
            console.log(custom_uploaderINR.state().get('selection').toJSON());
            attachment = custom_uploaderINR.state().get('selection').first().toJSON();
            $('#upload_imageINR').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploaderINR.open();

    });
});
