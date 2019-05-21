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
<form action="<?php echo "?page=cca&tab=cca_settings_backend"; ?>" method="post" name="cca_settings_form">
	 <table class="form-table" >
		<tr>
    	<th scope="row">
	      <label for="SelectBaseCuurency">Select Base currency:</label>
	    </th>
        <td>
        	<select name="base_currency">
            <?php
             $options=get_option('cca_data');
             if (isset($options['base_currency'])) {
                if ('USD' === $options['base_currency']) {
                    echo '<option selected value="USD">USD</option>';
                } else {
                    echo '<option value="USD">USD</option>';
                }
                if ('INR' === $options['base_currency']) {
                    echo '<option selected value="INR">INR</option>';
                } else {
                    echo '<option value="INR">INR</option>';
                }
                if ('EUR' === $options['base_currency']) {
                    echo '<option selected value="EUR">EUR</option>';
                } else {
                    echo '<option value="EUR">EUR</option>';
                }
                if ('AUD' === $options['base_currency']) {
                    echo '<option selected value="AUD">AUD</option>';
                } else {
                    echo '<option value="AUD">AUD</option>';
                }

             }
             else {
             ?>
  					<option selected value="USD">USD</option>
  					<option value="INR">INR</option>
  					<option value="EUR">EUR</option>
  					<option value="AUD">AUD</option>
          <?php }?>
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
	        		 //Apply conditions for show selected option value after save also
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
	        	//Apply conditions for show checked checkbox after save also
	        	if (isset($options) ){
                if ('USD'===$options['0']) {
                    echo'<label for="ForPostType">
               <input type="checkbox" checked name="currency_button[]" value="USD">
               USD</label><br> ';
                } else {
                    echo'<label for="ForPostType">
               <input type="checkbox"  name="currency_button[]" value="USD">
               USD</label><br> ';
                }
                if ('INR'===$options['1']) {
                    echo'<label for="ForPostType">
               <input type="checkbox" checked name="currency_button[]" value="INR">
               INR</label><br> ';
                } else {
                    echo'<label for="ForPostType">
               <input type="checkbox"  name="currency_button[]" value="INR">
               INR</label><br> ';
                }
                if ('EUR'===$options['2']) {
                    echo'<label for="ForPostType">
               <input type="checkbox" checked name="currency_button[]" value="EUR">
               EUR</label><br> ';
                } else {
                    echo'<label for="ForPostType">
               <input type="checkbox"  name="currency_button[]" value="EUR">
               EUR</label><br> ';
                }
                if ('AUD'===$options['3']) {
                    echo'<label for="ForPostType">
               <input type="checkbox" checked name="currency_button[]" value="AUD">
               AUD</label><br> ';
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
    </table>
</form>

