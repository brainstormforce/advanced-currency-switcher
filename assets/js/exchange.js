
( function ( $ ) {
    $( document ).on('click', '.cs-authenticate', function() {

        var api_key = $('.cs-input-appid').val() || '';
        var btn = $(this);
        btn.addClass('updating-message');
        btn.val('Authenticating..');
        $.ajax({
            url : csExchangeVars.ajax_url,
            type : 'POST',
            data : {
                action : 'ccs_validate',
                api_key : api_key,
                security :csExchangeVars.ajax_nonce
            },
            success : function( response ) {
                if( response.success ) {
                    btn.val(response.data);
                } else {
                    btn.val(response.data);
                }
            }
        });
    });

} )(jQuery);

// function manual_api_form() {

//     if( document.getElementById( "cswp_currency_form" ) !== null ) {

//         var cswp_selectedvalue = document.getElementById( "cswp_currency_form" ).value;
//         if ( cswp_selectedvalue==="apirate" ) {

//             //document.getElementById( "cs-api-display" ).style.display = "block";
//            // document.getElementById( "cs-api-display2" ).style.display = "block";
//            // document.getElementById( "cs-manual-display" ).style.display = "none";

//            } else {

//            // document.getElementById( "cs-manual-display" ).style.display = "block";
//            // document.getElementById( "cs-api-display" ).style.display = "none";
//            // document.getElementById( "cs-api-display2" ).style.display = "none";

//         }
//     }

// }

// window.addEventListener( 'load', function() {

//     manual_api_form();

// } );

//js for hide and display manula and API currency convert value.
function showcurency( selectvalue ) {
    if ( selectvalue ) {

        optionvalue = document.getElementById( "api-currency" ).value;

        if ( optionvalue === selectvalue.value ) {

            //document.getElementById( "cs-manual-display" ).style.display = "none";
           // document.getElementById( "cs-api-display" ).style.display = "block";
           // document.getElementById( "cs-api-display2" ).style.display = "block";
            document.getElementById("cswp-apitext").required = true;
            jQuery(".cs-input-appid").attr('required','required');
          } else {

            //document.getElementById( "cs-manual-display" ).style.display = "block";
            //document.getElementById( "cs-api-display" ).style.display = "none";
            // document.getElementById( "cs-api-display2" ).style.display = "none";
            document.getElementById("cswp-apitext").required = false;
            jQuery(".cs-input-appid").removeAttr('required');
          }
    }
}
