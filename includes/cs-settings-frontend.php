<?php
/**
 * Setting Front End Doc comment
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
 */

$getvalue = get_option( 'cs_data' );

$cs_base_currency = '';
$cs_form_select = '';
$cs_api_key = '';
$cs_frequency_reload = '';
$cs_decimalpoint = '';

if ( isset( $getvalue[ 'base_currency' ] ) ) {
    $cs_base_currency = $getvalue[ 'base_currency' ];
}

if ( isset( $getvalue[ 'form_select' ] ) ) {
    $cs_form_select = $getvalue[ 'form_select' ];
}

if ( isset( $getvalue[ 'api_key'] ) ) {
    $cs_api_key = $getvalue[ 'api_key' ];
}

if ( isset( $getvalue[ 'frequency_reload'] ) ) {
    $cs_frequency_reload = $getvalue[ 'frequency_reload' ];
}

if ( isset( $getvalue[ 'decimalpoint' ] ) ) {
    $cs_decimalpoint=$getvalue['decimalpoint'];
}

$manualrate = get_option( 'manual_rate' );
$cs_usd_rate = '';
$cs_inr_rate = '';
$cs_eur_rate = '';
$cs_aud_rate = '';

if ( isset( $manualrate[ 'usd_rate' ] ) ) {
    $cs_usd_rate = $manualrate[ 'usd_rate' ];
}

if ( isset( $manualrate[ 'inr_rate'] ) ) {
    $cs_inr_rate = $manualrate[ 'inr_rate' ];
}

if ( isset( $manualrate[ 'eur_rate' ] ) ) {
    $cs_eur_rate = $manualrate[ 'eur_rate' ];
}

if ( isset( $manualrate[ 'aud_rate' ] ) ) {
    $cs_aud_rate = $manualrate[ 'aud_rate' ];
}

$convertbtn = get_option( 'currency_button_type' );
$cs_usd_button = '';
$cs_inr_button = '';
$cs_eur_button = '';
$cs_aud_button = '';

if ( isset( $convertbtn[ 'USD' ] ) ) {
    $cs_usd_button = $convertbtn[ 'USD' ];
}

if ( isset( $convertbtn[ 'INR' ] ) ) {
    $cs_inr_button = $convertbtn[ 'INR' ];
}

if ( isset( $convertbtn['EUR'] ) ) {
    $cs_eur_button = $convertbtn[ 'EUR' ];
}

if ( isset( $convertbtn[ 'AUD' ] ) ) {
    $cs_aud_button = $convertbtn[ 'AUD' ];
}
?>
 <!-- Html code for frontend -->
<form method="post" name="cca_settings_form">
  <!--  set the html code for select base currency and select currency type -->
     <table class="form-table" >
        <tr>
        <th scope="row">
          <label for="SelectBaseCuurency"> <?php _e('Select Base currency:', 'cs_currencyswitch'); ?></label>
        </th>
        <td>
            <select name="base_currency">
            <?php
            if (isset($cs_base_currency) ) {

                if ('USD' === $cs_base_currency ) {
                    echo '<option selected value="USD">USD</option>';
                } else {
                    echo '<option value="USD">USD</option>';
                }
                if ('INR' === $cs_base_currency ) {
                    echo '<option selected value="INR">INR</option>';
                } else {
                    echo '<option value="INR">INR</option>';
                }
                if ('EUR' === $cs_base_currency ) {
                    echo '<option selected value="EUR">EUR</option>';
                } else {
                    echo '<option value="EUR">EUR</option>';
                }
                if ('AUD' === $cs_base_currency ) {
                    echo '<option selected value="AUD">AUD</option>';
                } else {
                    echo '<option value="AUD">AUD</option>';
                }

            } else {
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
      <label><?php _e('Select Type of Conversion:', 'cs_currencyswitch'); ?></label>
     </th>
      <td>
        <select name="form_select" id="cs_currency_form" onchange="showcurency(this)">
            <?php
            if (isset($cs_form_select) ) {

                if ('manualrate' === $cs_form_select ) { ?>
                    <option id="manual-currency" selected value="manualrate"><?php _e('Manual Currency Rate', 'cs_currencyswitch');?></option>
                    <?php
                } else { ?>
                    <option id="manual-currency" value="manualrate"><?php _e('Manual Currency Rate', 'cs_currencyswitch'); ?></option><?php
                }
                if ('apirate' === $cs_form_select ) { ?>
                    <option id="api-currency" selected value="apirate"> <?php _e('Open Exchange Rate', 'cs_currencyswitch'); ?></option> <?php
                } else { ?>
                    <option id="api-currency" value="apirate"><?php _e('Open Exchange Rate', 'cs_currencyswitch'); ?></option> <?php
                }

            } else {
                ?>
          <option id="manual-currency" selected value="manualrate"><?php _e('Manual Currency Rate', 'cs_currencyswitch'); ?></option>
          <option id="api-currency" value="apirate"><?php _e('Open Exchange Rate', 'cs_currencyswitch'); ?></option>
          
            <?php } ?>
       </select>
      </td>
    </tr>
  </table>

  <!--  set the html code for put manual currancy rate -->
  <table class="form-table" id="cs-manual-dispaly">
     <th><?php _e('Currency Convertor Settings', 'cs_currencyswitch'); ?></th>
      <tr>
      <th><label for="USD"><?php _e('United States Dollar(USD):', 'cs_currencyswitch'); ?></label></th>
      <td>
        <input type="text" name="usd"  value="<?php  echo $cs_usd_rate; ?>" placeholder="<?php _e('Enter the USD value', 'cs_currencyswitch'); ?>" ><b>$</b>
      </td>
      </tr>
      <tr>
      <th><label for="INR"><?php _e('Indian Rupee(INR):', 'cs_currencyswitch'); ?></label></th>
       <td>
        <input type="text" name="inr" value="<?php echo $cs_inr_rate; ?>" placeholder="<?php _e('Enter the INR value', 'cs_currencyswitch'); ?>"><b>₹</b>
       </td>
      </tr>
      <tr>
      <th><label><?php _e('European Union(EUR):', 'cs_currencyswitch'); ?></label></th>
       <td>
        <input type="text" name="eur"  value="<?php echo $cs_eur_rate; ?>" placeholder="<?php _e('Enter the EURO value', 'cs_currencyswitch'); ?>"><b>€</b>
       </td>
      </tr>
      <tr>
      <th><label><?php _e('Australian Dollar(AUD):', 'cs_currencyswitch'); ?></label></th>
       <td>
        <input type="text" name="aud"  value="<?php echo $cs_aud_rate;?>" placeholder="<?php _e('Enter the AUD value', 'cs_currencyswitch'); ?>"><b>A$</b>
       </td>
      </tr>
  </table>

  <!--  set the html code for Apikey value and frequency update time -->
  <table class="form-table" id="cs-api-display" >
        <tr>
        <th scope="row">
          <label for="ApiKey"> <?php _e('App ID(Api Key):', 'cs_currencyswitch'); ?></label>
        </th>
           <td>
            <input type="text" name="appid" class="regular-text" value="<?php echo  $cs_api_key;?>">
                
                  <p class="description"><?php _e('Enter Your OpenExchangeRate App ID:', 'cs_currencyswitch'); ?> &nbsp;
          <a href="https://openexchangerates.org/" target="_blank">https://openexchangerates.org/</a>&nbsp;
             [ <?php _e('If you dont have then get it from OpenExchangeRates.', 'cs_currencyswitch'); ?> ]
            </p>  
          </td>
        </tr>
        <tr>
            <th scope="row">
              <label for="UpdateExchangeRate"><?php _e('Frequency to Update Exchange Rate:', 'cs_currencyswitch'); ?></label>
            </th>
            <td>
                <select name="frequency_reload">
                  <option value="hourly" <?php selected( $cs_frequency_reload, 'hourly') ?>>Hourly</option>
                  <option value="daily" <?php selected( $cs_frequency_reload, 'daily') ?>>Daily</option>
                  <option value="weekly" <?php selected( $cs_frequency_reload, 'weekly') ?>>Weekly</option>
                  <option value="manual" <?php selected( $cs_frequency_reload, 'manual') ?>>Manual</option>
                    </select> 
            </td>
        </tr>
    </table>
    <!--  set the html code select currency to convert and put to set decimal point after conversion -->
    <table class="form-table">
        <tr>
            <th scope="row">
              <label for="AvailableCurrencytoConvert"><?php _e('Available Currency to Convert:', 'cs_currencyswitch'); ?></label>
            </th>
            <td>
            <?php 
            //Apply conditions for show checked checkbox after save also
             $convertbtn = get_option('currency_button_type');

            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cs_usd_button) ) {

                        if ('USD' === $cs_usd_button ) {
                            echo'<label for="ForCurrencyButton">
                     <input type="checkbox" checked name="currency_button[]" value="USD">
                     USD</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                     <input type="checkbox"  name="currency_button[]" value="USD">
                     USD</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="USD">
                 USD</label><br> ';
                    }

                    if (isset($cs_inr_button) ) {

                        if ('INR' === $cs_inr_button ) {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox" checked name="currency_button[]" value="INR">
                 INR</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="INR">
                 INR</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="INR">
                 INR</label><br> ';
                    }

                    if (isset($cs_eur_button) ) {

                        if ('EUR' === $cs_eur_button ) {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox" checked name="currency_button[]" value="EUR">
                 EUR</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="EUR">
                 EUR</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="EUR">
                 EUR</label><br> ';
                    }
                    if (isset($cs_aud_button) ) {

                        if ('AUD' === $cs_aud_button ) {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox" checked name="currency_button[]" value="AUD">
                 AUD</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="AUD">
                 AUD</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="AUD">
                 AUD</label><br> ';
                    }

                } else {
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="USD">
                 USD</label><br> ';
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="INR">
                 INR</label><br> ';
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="EUR">
                 EUR</label><br> ';
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="AUD">
                 AUD</label><br> ';
                }
            }
            ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
              <label for="DecimalPlaces"><?php _e('Decimal Places:', 'cs_currencyswitch'); ?></label>
            </th>
            <td>
                <input type="number" name="decimal" placeholder="2" class="small-text"
                value="<?php echo $cs_decimalpoint;?>">
            </td>
        </tr>
          <tr>
        <th>
            <?php wp_nonce_field( 'cs-form-nonce', 'cs-form' ); ?>
            <input type="submit" name="submit" value="<?php _e('Submit', 'cs_currencyswitch'); ?>" class="bt button button-primary">
        </th>
      </tr>    
    </table>
</form>

<?php
$getvalue=get_option('cs_data');
var_dump($getvalue);