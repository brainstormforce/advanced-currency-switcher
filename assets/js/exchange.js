( function ( $ ) {


    $( document ).on('click', '.cs-authenticate', function() {

        var api_key = $('.cs-input-appid').val() || '';
        var btn = $(this);
        btn.addClass('updating-message');
        btn.val('Authenticating..');
        $.ajax({
            url : csVars.ajax_url,
            type : 'POST',
            data : {
                action : 'ccs_validate',
                api_key : api_key
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

function manual_api_form() {

    if( document.getElementById( "cswp_currency_form" ) !== null ) {

        var myselectedvalue = document.getElementById( "cswp_currency_form" ).value;

        if ( myselectedvalue==="apirate" ) {

            document.getElementById( "cs-api-display" ).style.display = "block";
            document.getElementById( "cs-manual-display" ).style.display = "none";
           } else {

            document.getElementById( "cs-manual-display" ).style.display = "block";
            document.getElementById( "cs-api-display" ).style.display = "none";

        }
    }

}

window.addEventListener( 'load', function() {

    manual_api_form();

} );

//js for hide and display manula and API currency convert value.
function showcurency( selectvalue ) {
    if ( selectvalue ) {

        optionvalue = document.getElementById( "api-currency" ).value;

        if ( optionvalue === selectvalue.value ) {

            document.getElementById( "cs-manual-display" ).style.display = "none";
            document.getElementById( "cs-api-display" ).style.display = "block";

          } else {
            document.getElementById( "cs-manual-display" ).style.display = "block";
            document.getElementById( "cs-api-display" ).style.display = "none";
          }
    }
}
