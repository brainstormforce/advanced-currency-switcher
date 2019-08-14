
    jQuery(document).ready(function($){

    // console.log(document);
    
    // var upload_image_button = '#upload_image_button';
    // var upload_image = '#upload_image';
    // console.log( cswp_image_upload_vars.cswp_get_button_value.USD );
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
//     jQuery(document).ready(function($){

//         // console.log( $(upload_image+cswp_image_upload_vars.cswp_get_button_value.AUD) );
//     var custom_uploader;
//     var upload_image_button = '#upload_image_button';
//     var upload_image = '#upload_image';
//     // console.log( cswp_image_upload_vars.cswp_get_button_value.USD );
//     $(upload_image_button+cswp_image_upload_vars.cswp_get_button_value.USD).click(function(e) {
//         //console.log(custom_uploader);
//         e.preventDefault();

//         //If the uploader object has already been created, reopen the dialog
//         if (custom_uploader) {
//             custom_uploader.open();
//             return;
//         }

//         //Extend the wp.media object
//         custom_uploader = wp.media.frames.file_frame = wp.media({
//             title: 'Choose Image',
//             button: {
//                 text: 'Choose Image'
//             },
//             multiple: false
//         });

//         //When a file is selected, grab the URL and set it as the text field's value
//         custom_uploader.on('select', function() {
//             console.log(custom_uploader.state().get('selection').toJSON());
//             attachment = custom_uploader.state().get('selection').first().toJSON();
//             $(upload_image+cswp_image_upload_vars.cswp_get_button_value.USD).val(attachment.url);
//         });

//         //Open the uploader dialog
//         custom_uploader.open();

//     });
//     $(upload_image_button+cswp_image_upload_vars.cswp_get_button_value.EUR).click(function(e) {

//         e.preventDefault();

//         //If the uploader object has already been created, reopen the dialog
//         if (custom_uploader) {
//             custom_uploader.open();
//             return;
//         }

//         //Extend the wp.media object
//         custom_uploader = wp.media.frames.file_frame = wp.media({
//             title: 'Choose Image',
//             button: {
//                 text: 'Choose Image'
//             },
//             multiple: false
//         });

//         //When a file is selected, grab the URL and set it as the text field's value
//         custom_uploader.on('select', function() {
//             console.log(custom_uploader.state().get('selection').toJSON());
//             attachment = custom_uploader.state().get('selection').first().toJSON();
//             $(upload_image+cswp_image_upload_vars.cswp_get_button_value.EUR).val(attachment.url);
//         });

//         //Open the uploader dialog
//         custom_uploader.open();

//     });
//     $(upload_image_button+cswp_image_upload_vars.cswp_get_button_value.AUD).click(function(e) {

//         e.preventDefault();

//         //If the uploader object has already been created, reopen the dialog
//         if (custom_uploader) {
//             custom_uploader.open();
//             return;
//         }

//         //Extend the wp.media object
//         custom_uploader = wp.media.frames.file_frame = wp.media({
//             title: 'Choose Image',
//             button: {
//                 text: 'Choose Image'
//             },
//             multiple: false
//         });

//         //When a file is selected, grab the URL and set it as the text field's value
//         custom_uploader.on('select', function() {
//             console.log(custom_uploader.state().get('selection').toJSON());
//             attachment = custom_uploader.state().get('selection').first().toJSON();
//             $(upload_image+cswp_image_upload_vars.cswp_get_button_value.AUD).val(attachment.url);
//         });

//         //Open the uploader dialog
//         custom_uploader.open();

//     });
//        $(upload_image_button+cswp_image_upload_vars.cswp_get_button_value.INR).click(function(e) {
//         //console.log(custom_uploader);
//         e.preventDefault();

//         //If the uploader object has already been created, reopen the dialog
//         if (custom_uploader) {
//             custom_uploader.open();
//             return;
//         }

//         //Extend the wp.media object
//         custom_uploader = wp.media.frames.file_frame = wp.media({
//             title: 'Choose Image',
//             button: {
//                 text: 'Choose Image'
//             },
//             multiple: false
//         });

//         //When a file is selected, grab the URL and set it as the text field's value
//         custom_uploader.on('select', function() {
//             console.log(custom_uploader.state().get('selection').toJSON());
//             attachment = custom_uploader.state().get('selection').first().toJSON();
//             $(upload_image+cswp_image_upload_vars.cswp_get_button_value.INR).val(attachment.url);
//         });

//         //Open the uploader dialog
//         custom_uploader.open();

//     });


// });