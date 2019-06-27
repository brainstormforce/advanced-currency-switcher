( function ( $ ) {

    $(document).ready(function(){
        $( '.cs-convertor-wrap-symbol' ).html( csVars.base_currency_symbol );

        cs_currency_calculations( csVars.base_currency );

        if( $( '.cs-currency-name' ).length ) {
            $( '.cs-currency-name' ).hide();
            $( '.cs-currency-name' ).eq(0).show();
            //$( '.cs-convertor-wrap-symbol' ).html( csVars.base_currency_symbol );
        }
    });


    function cs_currency_calculations( currency_name ) {

        if( currency_name ) {

            //console.log( csVars.actual_currency_rates[ currency_name ] );
            if(currency_name==='INR') {
                var symb=csVars.currency_symbol_add['inr-symbol'];

            } else if(currency_name==='USD') {
                var symb=csVars.currency_symbol_add['usd-symbol'];;


            } else if(currency_name==='AUD') {
                var symb=csVars.currency_symbol_add['aud-symbol'];;

            } else if(currency_name==='EUR') {
                var symb=csVars.currency_symbol_add['eur-symbol'];;
            }
            
            var decimalpoint = csVars.decimal_point;
            var myarray = [];
            var rate_inr = csVars.actual_currency_rates[ currency_name ];

            jQuery('.cs-convertor-wrap-data').each(
                function () {
                    var mydata = ( jQuery(this).attr("valuemy") );
                    myarray.push(mydata);
                    var arrayLength = myarray.length;
                    for ( var i = 0; i < arrayLength; i++ ) {
                        var converted_value = myarray[i] * rate_inr;

                        if(0 == decimalpoint) {
                            converted_value = converted_value.toFixed(decimalpoint);
                        } else {
                        converted_value = converted_value.toFixed(decimalpoint).replace(/\.?0+$/, '');
                        }
                        var spans = document.querySelectorAll(".cs-convertor-wrap-data");// get all the elements with id=cs-converter-wrap-1
                        for ( var j = i; j <= i; j++ ) {
                            spans[j].innerHTML = converted_value; //set the innerHTML as hello
                        }
                        var symbol = document.querySelectorAll(".cs-convertor-wrap-symbol");
                        for ( var k = i; k <= i; k++ ) {
                            symbol[k].innerHTML = symb; //set the Currency Symbol
                        }
                    }
                }
            );

        }
    }

    $(document).on( 'click', '.cs-currency-name', function () {

            $( '.cs-currency-name' ).hide();
            if( undefined == $(this).next().attr('data-currency-name') ) {
                $( '.cs-currency-name' ).eq(0).show();
            } else {
                $( '.cs-currency-name' ).eq( $(this).next().index() ).show();
            }

            var currency_name = $(this).attr('data-currency-name') || '';

            cs_currency_calculations( currency_name );
    }
    );


    $('.cs-currency-name-dropdown').change(function () {
          //console.log($('.cs-currency-name-dropdown').val());
          //console.log(csVars.actual_currency_rates.INR);
          var currency_name = $('.cs-currency-name-dropdown').val() || '';
          cs_currency_calculations( currency_name );
    });


} )(jQuery);
