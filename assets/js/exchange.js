function manual_api_form() {

    if( document.getElementById( "cs_currency_form" ) !== null ) {

        var myselectedvalue = document.getElementById( "cs_currency_form" ).value;
        
        if ( myselectedvalue==="apirate" ) {

            document.getElementById( "cs-api-display" ).style.display = "block";
            document.getElementById( "cs-manual-dispaly" ).style.display = "none";

        } else {

            document.getElementById( "cs-manual-dispaly" ).style.display = "block";
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

            document.getElementById( "cs-manual-dispaly" ).style.display = "none";
            document.getElementById( "cs-api-display" ).style.display = "block";

          } else {

            document.getElementById( "cs-manual-dispaly" ).style.display = "block";
            document.getElementById( "cs-api-display" ).style.display = "none";
            
          }
    }
}
