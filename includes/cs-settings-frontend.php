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


//Store form inputs values in variable.
$cswp_get_form_value =  CS_Loader::cswp_load_all_data();
$cs_basecurency='';
$cswp_form_select_value = '';
$cs_api_key = '';
$api_key_status = '';
$cs_frequency_reload = '';
$cs_decimalpoint = '';

if ( isset( $cswp_get_form_value[ 'basecurency' ] ) ) {
    $cs_basecurency = $cswp_get_form_value[ 'basecurency' ];
}

if ( isset( $cswp_get_form_value[ 'cswp_form_select' ] ) ) {
    $cswp_form_select_value = $cswp_get_form_value[ 'cswp_form_select' ];
}

if ( isset( $cswp_get_form_value[ 'api_key'] ) ) {
    $cs_api_key = $cswp_get_form_value[ 'api_key' ];
}

if ( isset( $cswp_get_form_value[ 'api_key_status'] ) ) {
    $cs_api_key = $cswp_get_form_value[ 'api_key_status' ];
}

if ( isset( $cswp_get_form_value[ 'frequency_reload'] ) ) {
    $cs_frequency_reload = $cswp_get_form_value[ 'frequency_reload' ];
}

if ( isset( $cswp_get_form_value[ 'decimalpoint' ] ) ) {
    $cs_decimalpoint=$cswp_get_form_value['decimalpoint'];
}

//Store Manual rate values in variable.
$cswp_manualrate =  CS_Loader::cswp_load_manual_data();
$cs_usd_rate = '';
$cs_inr_rate = '';
$cs_eur_rate = '';
$cs_aud_rate = '';

if ( isset( $cswp_manualrate[ 'usd_rate' ] ) ) {
    $cs_usd_rate = $cswp_manualrate[ 'usd_rate' ];
}

if ( isset( $cswp_manualrate[ 'inr_rate'] ) ) {
    $cs_inr_rate = $cswp_manualrate[ 'inr_rate' ];
}

if ( isset( $cswp_manualrate[ 'eur_rate' ] ) ) {
    $cs_eur_rate = $cswp_manualrate[ 'eur_rate' ];
}

if ( isset( $cswp_manualrate[ 'aud_rate' ] ) ) {
    $cs_aud_rate = $cswp_manualrate[ 'aud_rate' ];
}

//Store Switcher Button value.

$convertbtn = CS_Loader::cswp_load_currency_button_data();
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


//Store OpenExchangeRate value in a variable
$cswp_apirate_values = CS_Loader::cswp_load_apirate_values_data();
$apitext_inr = '';
$apitext_usd = '';
$apitext_eur = '';
$apitext_aud = '';

if ( isset( $cswp_apirate_values[ 'inr' ] ) ) {
    $apitext_inr = $cswp_apirate_values[ 'inr' ];
}

if ( isset( $cswp_apirate_values[ 'usd' ] ) ) {
    $apitext_usd = $cswp_apirate_values[ 'usd' ];
}

if ( isset( $cswp_apirate_values['eur'] ) ) {
    $apitext_eur = $cswp_apirate_values[ 'eur' ];
}

if ( isset( $cswp_apirate_values[ 'aud' ] ) ) {
    $apitext_aud = $cswp_apirate_values[ 'aud' ];
}


?>
 <!-- Html code for frontend -->
<form method="post" name="cca_settings_form">
  <!--  set the html code for select base currency and select currency type -->
     <table class="form-table" >
    <tr>
     <th scope="row">
      <label><?php _e('Select Type of Conversion', 'cs_currencyswitch'); ?></label>
     </th>
      <td>
        <select name="cswp_form_select" id="cs_currency_form" onchange="showcurency(this)">
        <option id="manual-currency" value="manualrate" <?php selected( $cswp_form_select_value, 'manualrate') ?>>Manual Currency Rate</option>
        <option id="api-currency" value="apirate" <?php selected( $cswp_form_select_value, 'apirate') ?>>Open Exchange Rate</option>
    </select> 
      </td>
    </tr>
  </table>

  <!--  set the html code for put manual currancy rate -->

   <table class="form-table ccatable" id="cs-manual-display">

      <tr>
        <th class="cca-column" >Base Currency</th>
        <th class="cca-column" style="padding-left: 10px;">Currency</th> 
        <th class="cca-column" style="padding-left: 10px;">Currency Display</th>
        <th class="cca-column" style="padding-left: 10px;">Rate</th>
      </tr>

      <tr>
        <td ><label class="currency-switcher-switch">
           <?php
            if (isset($cs_basecurency) ) {
                if ('USD' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="USD" name="basecurency" class="cca_hidden" checked="checked" />
               <?php } else {?>
                <input type="radio"  value="USD" name="basecurency" class="cca_hidden" />
           <?php } 
            }else { ?>
             <input type="radio"  value="USD" name="basecurency" class="cca_hidden" />

         <?php } ?>

        <span class="currency-switcher-slider round"></span></label></td>

        <td><label for="USD"><?php _e('United States Dollar(USD)', 'cs_currencyswitch'); ?></label></td>

        <td><label class="currency-switcher-switch">
        <!-- <input type="checkbox"  name="currency_button[]" value="USD" class="cca_hidden"> -->
         <?php
         $convertbtn = CS_Loader::cswp_load_currency_button_data();
            if (isset($convertbtn) ) {

                if ($convertbtn !== '') {

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
                  } else {
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="USD">
                 USD</label><br> ';
                  }
                }
                ?>
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="usd"  value="<?php  echo $cs_usd_rate; ?>" placeholder="<?php _e('Enter the USD value', 'cs_currencyswitch'); ?>" >
      </td>
      </tr>

      <tr>
        <td><label class="currency-switcher-switch">
            <?php
            if (isset($cs_basecurency) ) {
                if ('INR' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="INR" name="basecurency" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="INR" name="basecurency" class="cca_hidden" />
            <?php }
            } else {?>
             <input type="radio"  value="INR" name="basecurency" class="cca_hidden" />

         <?php } ?>
        
        <span class="currency-switcher-slider round">
        </span></label></td>
        <td><label for="INR"><?php _e('Indian Rupee(INR)', 'cs_currencyswitch'); ?></label></td>
        <td> <label class="currency-switcher-switch">  
        <!-- <input type="checkbox"  name="currency_button[]" value="INR" class="cca_hidden"> -->
         <?php
        

            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

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
                  } else {
                    
                 echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="INR">
                 INR</label><br> ';
                
                  }
                }
                ?>
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="inr" value="<?php echo $cs_inr_rate; ?>" placeholder="<?php _e('Enter the INR value', 'cs_currencyswitch'); ?>">
       </td>
      </tr>
      <tr>
         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cs_basecurency) ) {
                if ('EUR' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="EUR" name="basecurency" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="EUR" name="basecurency" class="cca_hidden"/>
            <?php }
            } else {?>
             <input type="radio"  value="EUR" name="basecurency" class="cca_hidden"/>

         <?php } ?>
       

        <span class="currency-switcher-slider round"></span></label>

        </td>
        <td><label for="EUO"><?php _e('European Union(EUR)', 'cs_currencyswitch'); ?></label></td>
        <td > <label class="currency-switcher-switch">  
        <!-- <input type="checkbox"  name="currency_button[]" value="EURO" class="cca_hidden"> -->
         <?php
        

            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

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
                  } else {
                    
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="EUR">
                 EUR</label><br> ';
                }
            }
                ?>
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="eur"  value="<?php echo $cs_eur_rate; ?>" placeholder="<?php _e('Enter the EURO value', 'cs_currencyswitch'); ?>">
       </td>
      </tr>
      <tr>
         <td><label class="currency-switcher-switch">
            <?php
            if (isset($cs_basecurency) ) {
                if ('AUD' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="AUD" name="basecurency" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="AUD" name="basecurency" class="cca_hidden"/>
            <?php }
            } else {?>
             <input type="radio"  value="AUD" name="basecurency" class="cca_hidden"/>

         <?php } ?>
        <span class="currency-switcher-slider round"></span></label></td>
        <td><label for="AUD"><?php _e('Australian Dollar(AUD)', 'cs_currencyswitch'); ?></td>
        <td > <label class="currency-switcher-switch"> 
        <!-- <input type="checkbox"  name="currency_button[]" value="AUD" class="cca_hidden"> -->
         <?php
         

            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

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
                 <input type="checkbox"  name="currency_button[]" value="AUD">
                 AUD</label><br> ';
                  }

                }
                ?>
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="aud"  value="<?php echo $cs_aud_rate;?>" placeholder="<?php _e('Enter the AUD value', 'cs_currencyswitch'); ?>">
      </tr>
      <tr></tr>
    </table>

  <!--  set the html code for Apikey value and frequency update time -->
  <table class="form-table" id="cs-api-display" >
        <tr>
        <th scope="row">
          <label for="ApiKey"> <?php _e('App ID(Api Key)', 'cs_currencyswitch'); ?></label>
        </th>
           <td>
            <input type="text" name="appid" class="cs-input-appid regular-text" value="<?php echo  $cs_api_key;?>">
                
          </td>
           <td><input type="button" name="Authenticate" value="Authenticate" class="cs-authenticate bt button button-secondary"></td>
           <td>           
           </td>
        </tr>
        <tr>
            <th scope="row">
              <label for="UpdateExchangeRate"><?php _e('Frequency to Update', 'cs_currencyswitch'); ?></label>
            </th>
            <td>
                <select name="frequency_reload">
                  <option value="hourly" <?php selected( $cs_frequency_reload, 'hourly') ?>>Hourly</option>
                  <option value="daily" <?php selected( $cs_frequency_reload, 'daily') ?>>Daily</option>
                  <option value="weekly" <?php selected( $cs_frequency_reload, 'weekly') ?>>Weekly</option>
                  <option value="manual" <?php selected( $cs_frequency_reload, 'manual') ?>>Manual</option>
                  <!--   </select> <span class="dashicons dashicons-image-rotate"></span> -->
            </td>
          </tr>
      <tr>
        <th class="cca-column" >Base Currency</th>
        <th class="cca-column" style="padding-left: 10px;">Currency</th> 
        <th class="cca-column" style="padding-left: 10px;">Currency Display</th>
        <th class="cca-column"style="padding-left: 10px;">Rate</th>
      </tr>

      <tr>
         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cs_basecurency) ) {
                if ('USD' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="USD" name="basecurencyapi" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="USD" name="basecurencyapi" class="cca_hidden"/>
            <?php }
            } else {?>
             <input type="radio"  value="USD" name="basecurencyapi" class="cca_hidden"/>

         <?php } ?>
       

        <span class="currency-switcher-slider round"></span></label>

        </td>

        <td><label for="USD"><?php _e('United States Dollar(USD)', 'cs_currencyswitch'); ?></label></td>
        <td><label class="currency-switcher-switch">
         <?php
         $convertbtn = CS_Loader::cswp_load_currency_button_data();
            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cs_usd_button) ) {

                        if ('USD' === $cs_usd_button ) {
                            echo'<label for="ForCurrencyButton">
                     <input type="checkbox" checked name="currency_button_api[]" value="USD">
                     USD</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                     <input type="checkbox"  name="currency_button_api[]" value="USD">
                     USD</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="USD">
                 USD</label><br> ';
                    }
                  } else {
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="USD">
                 USD</label><br> ';
                  }
                }
                ?> 
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="apitext_usd"  value="<?php  echo $apitext_usd; ?>" placeholder="<?php _e('Enter the USD value', 'cs_currencyswitch'); ?>" readonly>
      </td>
      </tr>

      <tr>
         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cs_basecurency) ) {
                if ('INR' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="INR" name="basecurencyapi" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="INR" name="basecurencyapi" class="cca_hidden"/>
            <?php }
            } else {?>
             <input type="radio"  value="INR" name="basecurencyapi" class="cca_hidden"/>

         <?php } ?>
       

        <span class="currency-switcher-slider round"></span></label>

        </td>
        <td><label for="INR"><?php _e('Indian Rupee(INR)', 'cs_currencyswitch'); ?></label></td>
        <td> <label class="currency-switcher-switch">  
        <!-- <input type="checkbox"  name="currency_button[]" value="INR" class="cca_hidden"> -->
        <?php
        

            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cs_inr_button) ) {

                        if ('INR' === $cs_inr_button ) {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox" checked name="currency_button_api[]" value="INR">
                 INR</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="INR">
                 INR</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="INR">
                 INR</label><br> ';
                    }
                  } else {
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="INR">
                 INR</label><br> ';
                  }
                }
                ?>
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="apitext_inr" value="<?php echo $apitext_inr; ?>" placeholder="<?php _e('Enter the INR value', 'cs_currencyswitch'); ?>" readonly>
       </td>
      </tr>
      <tr>
       
         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cs_basecurency) ) {
                if ('EUR' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="EUR" name="basecurencyapi" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="EUR" name="basecurencyapi" class="cca_hidden"/>
            <?php }
            } else {?>
             <input type="radio"  value="EUR" name="basecurencyapi" class="cca_hidden"/>

         <?php } ?>
       

        <span class="currency-switcher-slider round"></span></label>

        </td>
        <td><label for="EUO"><?php _e('European Union(EUR)', 'cs_currencyswitch'); ?></label></td>
        <td > <label class="currency-switcher-switch">  
        
         <?php
        

            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cs_eur_button) ) {

                        if ('EUR' === $cs_eur_button ) {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox" checked name="currency_button_api[]" value="EUR">
                 EUR</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="EUR">
                 EUR</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="EUR">
                 EUR</label><br> ';
                    }
                  } else {
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="EUR">
                 EUR</label><br> ';
                  }

                }
                ?>
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="apitext_eur"  value="<?php echo $apitext_eur; ?>" placeholder="<?php _e('Enter the EURO value', 'cs_currencyswitch'); ?>" readonly >
       </td>
      </tr>
      <tr>
        
         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cs_basecurency) ) {
                if ('AUD' === $cs_basecurency ) { 
                    ?>
                    <input type="radio"  value="AUD" name="basecurencyapi" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="AUD" name="basecurencyapi" class="cca_hidden"/>
            <?php }
            } else {?>
             <input type="radio"  value="AUD" name="basecurencyapi" class="cca_hidden"/>

         <?php } ?>
       

        <span class="currency-switcher-slider round"></span></label>

        </td>
        <td><label for="AUD"><?php _e('Australian Dollar(AUD)', 'cs_currencyswitch'); ?></td>
        <td > <label class="currency-switcher-switch"> 
      
        <?php
         

            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cs_aud_button) ) {

                        if ('AUD' === $cs_aud_button ) {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox" checked name="currency_button_api[]" value="AUD">
                 AUD</label><br> ';
                        } else {
                            echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="AUD">
                 AUD</label><br> ';
                        }
                    } else {
                        echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="AUD">
                 AUD</label><br> ';
                    }
                  } else {
                    echo'<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button_api[]" value="AUD">
                 AUD</label><br> ';
                  }

                }
                ?>
        <span class="currency-switcher-slider round"></span></label>
        </td>
        <td>
        <input type="text" name="apitext_aud"  value="<?php echo $apitext_aud;?>" placeholder="<?php _e('Enter the AUD value', 'cs_currencyswitch'); ?> " readonly>
       </td>
      </tr>

    </table>

   
    <table class="form-table">
         <!-- <tr>
            <th>Display Type</th>
            <td><select>
                <option>Drop Down</option>
                 <option>Button</option>
                  <option>Toggle</option>
                </select>
            </td>
        </tr> -->
         <tr>
            <th scope="row">
              <label for="DecimalPlaces"><?php _e('Decimal Places', 'cs_currencyswitch'); ?></label>
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

