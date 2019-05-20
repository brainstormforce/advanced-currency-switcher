<?php
/**
 * Setting Front End Doc comment
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Convertor_Addon
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
*/

 ?>
 <!-- Html code for frontend -->
<h1>Currency Convertor Settings</h1>
<form action="" method="post" name="bsf_rt_settings_form">
	 <table class="form-table" >

		<tr>
	        <th scope="row">
	          <label for="SelectBaseCuurency">Select Base currency:</label>
	        </th>
	        <td>
	        	<select name="base_currency">
					<option value="USD">USD</option>
					<option value="INR">INR</option>
					<option value="EUR">EUR</option>
					<option value="AUD">AUD</option>
				</select>
	        </td>
    	</tr>
    	<tr>
	        <th scope="row">
	          <label for="ApiKey">App ID(Api Key):</label>
	        </th>
	        <td>
	        	<input type="text" name="appid" class="regular-text" value="<?php $options=get_option('cca_data'); echo $options["api_key"];?>">
	        	
				<p class="description">
         			Enter Your OpenExchangeRate App ID: [ If you dont have then get from <a>https://openexchangerates.org/</a>
         		</p>  
	        </td>
    	</tr>
    	<tr>
	        <th scope="row">
	          <label for="UpdateExchangeRate">Frequency to Update Exchange Rate:</label>
	        </th>
	        <td>
	        	<select name="frequency_reload">
	        		 <?php 
	        		 //Apply conditions for show selected option after save also
	        		 $options=get_option('cca_data');
            if (isset($options['frequency_reload'])) {
            	if ('1 Hour' === $options['frequency_reload']) {
                    echo '<option selected value="1 Hour">1 Hour</option>';
                } else {
                    echo '<option value="1 Hour">1 Hour</option>';
                }
                if ('1 Day' === $options['frequency_reload']) {
                    echo '<option selected value="1 Day">1 Day</option>';
                } else {
                    echo '<option value="1 Day">1 Day</option>';
                }
                if ('1 Week' === $options['frequency_reload']) {
                    echo '<option selected value="1 Week">1 Week</option>';
                } else {
                    echo '<option value="1 Week">1 Week</option>';
                }
                if ('1 Month' === $options['frequency_reload']) {
                    echo '<option selected value="1 Month">1 Month</option>';
                } else {
                    echo '<option value="1 Month">1 Month</option>';
                }
             } else {
                echo '<option  selected value="none">None</option>';
                echo '<option value="1 Hour">1 Hour</option>';
                 echo '<option value="1 Day">1 Day</option>';
                 echo '<option value="1 Week">1 Week</option>';
                 echo '<option value="1 Month">1 Month</option>';
            	}         
            	?>
				</select> 
	        </td>
    	</tr>
    	<tr>
	        <th scope="row">
	          <label for="AvailableCurrencytoConvert">Available Currency to Convert:</label>
	        </th>
	        <td>
	        	<?php 
	        	//Apply conditions for show checked checkbox box after save also
	        	if (isset($options) ){
                    if ("USD"===$options['0']) {
                        echo'<label for="ForPostType">
                   <input type="checkbox" checked name="currency_button[]" value="USD">
                   UAD</label><br> ';
                    } else {
                        echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="USD">
                   USD</label><br> ';
                    }
                    if ("INR"===$options['1']) {
                        echo'<label for="ForPostType">
                   <input type="checkbox" checked name="currency_button[]" value="INR">
                   UAD</label><br> ';
                    } else {
                        echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="INR">
                   INR</label><br> ';
                    }
                    if ("EUR"===$options['2']) {
                        echo'<label for="ForPostType">
                   <input type="checkbox" checked name="currency_button[]" value="EUR">
                   UAD</label><br> ';
                    } else {
                        echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="EUR">
                   EUR</label><br> ';
                    }
                    if ("AUD"===$options['3']) {
                        echo'<label for="ForPostType">
                   <input type="checkbox" checked name="currency_button[]" value="AUD">
                   UAD</label><br> ';
                    } else {
                        echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="AUD">
                   AUD</label><br> ';
                    }
                } else {
                	echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="USD">
                   USD</label><br> ';
                	echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="INR">
                   INR</label><br> ';
                	 echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="EUR">
                   EUR</label><br> ';
                	echo'<label for="ForPostType">
                   <input type="checkbox"  name="currency_button[]" value="AUD">
                   AUD</label><br> ';
          
                }
                ?>
	        </td>
    	</tr>
    	<tr>
	        <th scope="row">
	          <label for="DecimalPlaces">Decimal Places:</label>
	        </th>
	        <td>
	        	<input type="number" name="decimal" placeholder="2" class="small-text"
	        	value="<?php $options=get_option('cca_data
	        	'); echo $options['decimalpoint'];?>">
	        </td>
    	</tr>
		<tr>
          <th>
          	<input type="submit" name="submit" value="Submit" class="bt button button-primary">
          </th>
       	</tr>
	
</form>
</table>
<?php 

//store form value input in variables
$base_currency=$_POST['base_currency'];
 $api_key=$_POST['appid'];
 $frequency_reload=$_POST['frequency_reload'];
 $decimalpoint=$_POST['decimal'];

 if ( isset( $_POST['currency_button'] ) ) {
		foreach ( $_POST['currency_button'] as $currencybutton ) {
			$currency_button_type[] = $currencybutton;
		}
	}

update_option('currency_button_type',$currency_button_type);
//var_dump(get_option('currency_button_type'));

//Store values in array
 $update_options = array(
 	'base_currency'=>$base_currency,
 	'api_key'=>$api_key,
 	'frequency_reload'=>$frequency_reload,
 	'decimalpoint'=>$decimalpoint,

 );

//Merging both array 
if ( isset( $currency_button_type ) ) {
	$update_options= array_merge($update_options,$currency_button_type);
}

//Store $update_option array value in database option table
 update_option('cca_data', $update_options);

$get_currency_rate='https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$base_currency.'';
//If condition for remove file get content warning
if($get_currency_rate===''){
	$data=file_get_contents($get_currency_rate);
}


$data=json_decode($data);

$inr=$data->rates->INR;
if( $inr ) {
	update_option('inr',$inr);
}

$eur=$data->rates->EUR;
if( $eur ) {
	update_option('eur',$eur);
}

$usd=$data->rates->USD;
if($usd){
	update_option('usd',$usd);
}

$aud=$data->rates->AUD;
if($aud){
	update_option('aud',$aud);
}

// error_log('ok');
