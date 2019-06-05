( function ( $ ) {

    // console.log( csVars.ajax_url );
    // console.log( csVars.cs_data.api_key );

    $( document ).on('click', '.cs-authenticate', function() {

        // var api_key = csVars.cs_data.api_key || '';
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
                //console.log(response.success)
                if( response.success ) {
                    btn.val('Authenticate Success!');
                    
                    
                    $('#cs-api-fields').removeClass('cswp-key-fail').addClass('cswp-key-pass');

                } else {
                    btn.val('Authenticate Failed!');
                    $('#cs-api-fields').removeClass('cswp-key-pass').addClass('cswp-key-fail');
                }
            }
        });
    });

} )(jQuery);

function manual_api_form() {
// console.log('hello');
    if( document.getElementById( "cs_currency_form" ) !== null ) {

        var myselectedvalue = document.getElementById( "cs_currency_form" ).value;
        
        if ( myselectedvalue==="apirate" ) {

            document.getElementById( "cs-api-display" ).style.display = "block";
            document.getElementById( "cs-manual-display" ).style.display = "none";
           } else {
//console.log('hello');
            document.getElementById( "cs-manual-display" ).style.display = "block";
            document.getElementById( "cs-api-display" ).style.display = "none";
            // document.getElementsByClassName("cswp-key-pass").setAttribute( 'style', 'display:none!important' );
            //document.getElementsByClassName('cswp-key-pass').classList.add("cswp-key-fail");
             // document.getElementsByClassName("cswp-key-pass").style.display = "none";
        }
    }
    
}

window.addEventListener( 'load', function() {

    manual_api_form();

} );

//js for hide and display manula and API currency convert value. 
function showcurency( selectvalue ) {
//console.log('hello2');
    if ( selectvalue ) {

        optionvalue = document.getElementById( "api-currency" ).value;
        
        if ( optionvalue === selectvalue.value ) {

            document.getElementById( "cs-manual-display" ).style.display = "none";
            document.getElementById( "cs-api-display" ).style.display = "block";

          } else {
console.log('hello3');
            document.getElementById( "cs-manual-display" ).style.display = "block";
            document.getElementById( "cs-api-display" ).style.display = "none";
            // document.getElementsByClassName("cswp-key-pass").setAttribute( 'style', 'display:none!important' );
            // document.getElementsByClassName('cswp-key-pass').classList.add("cswp-key-fail");
            document.getElementsByClassName("cswp-key-pass").style.display = "none";
          }
    }
}
