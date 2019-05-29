
( function ( $ ) {

    $(document).on(
        'click', '.cs-currency-name', function () {
            var currency_name = $(this).attr('data-currency-name') || '';
            // console.log( currency_name );
            // console.log( csVars.actual_currency_rates );

            if(currency_name ) {
                //console.log( csVars.actual_currency_rates[ currency_name ] );
                if(currency_name==='INR') {
                    var symb='₹';

                } else if(currency_name==='USD') {
                    var symb='$';
            
                } else if(currency_name==='AUD') {
                    var symb='A$';
                
                } else if(currency_name==='EUR') {
                    var symb='€';
                
                }

                var decimalpoint = mydecimal.decimaldata;
                var myarray = [];
                var rate_inr = csVars.actual_currency_rates[ currency_name ];
    
                jQuery('.cs-convertor-wrap-data').each(
                    function () {
                        var mydata = ( jQuery(this).attr("valuemy") );
                        myarray.push(mydata);
                        var arrayLength = myarray.length;
                        for ( var i = 0; i < arrayLength; i++ ) {
                            //console.log(myarray[i]);
                            var converted_value = myarray[i] * rate_inr;
                            converted_value = converted_value.toFixed(decimalpoint);
                            var spans = document.querySelectorAll(".cs-convertor-wrap-data");// get all the elements with id=cs-converter-wrap-1
                            for ( var j = i; j <= i; j++ ) {
                                spans[j].textContent = converted_value; //set the textContent as hello
                            }
                            var symbol = document.querySelectorAll(".cs-convertor-wrap-symbol");
                            for ( var k = i; k <= i; k++ ) {
                                symbol[k].textContent = symb; //set the Currency Symbol
                            }
                        }    
                    } 
                );

            }

        }
    );
} )(jQuery);

