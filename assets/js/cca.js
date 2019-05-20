// Function call onclick of INR button
function changetoINR()
{           
            var pricemy=price1.pricevalue;
            //console.log(pricemy);
            var actualrate=mydatarate.actualrate;
            var myarray=[];
            var rate_inr=actualrate;
            //console.log(rate_inr);
            jQuery(".cca-convertor-wrap-data-1").each(function ( index ) {    
                    var mydata=(jQuery(this).text() );
                    myarray.push(mydata);
                    var arrayLength = myarray.length;
                    for (var i = 0; i < arrayLength; i++) {
                        //console.log(myarray[i]);
                        var converted_value = myarray[i] * rate_inr;
                       converted_value=converted_value.toFixed(2);
                       var spans = document.querySelectorAll(".cca-convertor-wrap-data-1");// get all the elements with id=cca-converter-wrap-1
                        for (var j = i; j <= i; j++) {
                            spans[j].textContent = converted_value; //set the textContent as hello
                        }
                    }    
                });
}
 
// Function call onclick of EUR button   
function changetoEUR()
{
    var actualrate=mydatarate1.actualrate1;
            var myarray=[];
            var rate_inr=actualrate;
              // console.log(rate_inr);
            jQuery(".cca-convertor-wrap-data-1").each(function ( index ) {    
                    var mydata=(jQuery(this).text() );
                    myarray.push(mydata);
                    var arrayLength = myarray.length;
                    for (var i = 0; i < arrayLength; i++) {
                        //console.log(myarray[i]);
                        var converted_value = myarray[i] * rate_inr;
                       converted_value=converted_value.toFixed(2);
                       var spans = document.querySelectorAll(".cca-convertor-wrap-data-1");// get all the elements with id=cca-converter-wrap-1
                        for (var j = i; j <= i; j++) {
                            spans[j].textContent = converted_value; //set the textContent as hello
                        }
                    }    
                });
}

// Function call onclick of USD button
function changetoUSD()
{
     var actualrate=mydatarate2.actualrate2;
            var myarray=[];
            var rate_inr=actualrate;
               //console.log(rate_inr);
            jQuery(".cca-convertor-wrap-data-1").each(function ( index ) {    
                    var mydata=(jQuery(this).text() );
                    myarray.push(mydata);
                    var arrayLength = myarray.length;
                    for (var i = 0; i < arrayLength; i++) {
                        //console.log(myarray[i]);
                        var converted_value = myarray[i] * rate_inr;
                       converted_value=converted_value.toFixed(2);
                       var spans = document.querySelectorAll(".cca-convertor-wrap-data-1");// get all the elements with id=cca-converter-wrap-1
                        for (var j = i; j <= i; j++) {
                            spans[j].textContent = converted_value; //set the textContent as hello
                        }
                    }    
                });
}

// Function call onclick of AUD button
function changetoAUD()
{
     var actualrate=mydatarate3.actualrate3;
            var myarray=[];
            var rate_inr=actualrate;
               //console.log(rate_inr);
            jQuery(".cca-convertor-wrap-data-1").each(function ( index ) {    
                    var mydata=(jQuery(this).text() );
                    myarray.push(mydata);
                    var arrayLength = myarray.length;
                    for (var i = 0; i < arrayLength; i++) {
                        //console.log(myarray[i]);
                        var converted_value = myarray[i] * rate_inr;
                       converted_value=converted_value.toFixed(2);
                       var spans = document.querySelectorAll(".cca-convertor-wrap-data-1");// get all the elements with id=cca-converter-wrap-1
                        for (var j = i; j <= i; j++) {
                            spans[j].textContent = converted_value; //set the textContent as hello
                        }
                    }    
                });
}