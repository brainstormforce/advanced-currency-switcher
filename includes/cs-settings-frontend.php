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
$cswp_basecurency='';
$cswp_form_select_value = '';
$cswp_api_key = '';
$api_key_status = '';
$cswp_frequency_reload = '';
$cswp_decimalpoint = '';

if ( isset( $cswp_get_form_value[ 'basecurency' ] ) ) {
    $cswp_basecurency = $cswp_get_form_value[ 'basecurency' ];
}

if ( isset( $cswp_get_form_value[ 'cswp_form_select' ] ) ) {
    $cswp_form_select_value = $cswp_get_form_value[ 'cswp_form_select' ];
}

if ( isset( $cswp_get_form_value[ 'api_key'] ) ) {
    $cswp_api_key = $cswp_get_form_value[ 'api_key' ];
}

if ( isset( $cswp_get_form_value[ 'api_key_status'] ) ) {
    $cswp_api_key = $cswp_get_form_value[ 'api_key_status' ];
}

if ( isset( $cswp_get_form_value[ 'frequency_reload'] ) ) {
    $cswp_frequency_reload = $cswp_get_form_value[ 'frequency_reload' ];
}

if ( isset( $cswp_get_form_value[ 'decimalpoint' ] ) ) {
    $cswp_decimalpoint=$cswp_get_form_value['decimalpoint'];
}

//Store Manual rate values in variable.
$cswp_manualrate =  CS_Loader::cswp_load_manual_data();
$cswp_usd_rate = '';
$cswp_inr_rate = '';
$cswp_eur_rate = '';
$cswp_aud_rate = '';

if ( isset( $cswp_manualrate[ 'usd_rate' ] ) ) {
    $cswp_usd_rate = $cswp_manualrate[ 'usd_rate' ];
}

if ( isset( $cswp_manualrate[ 'inr_rate'] ) ) {
    $cswp_inr_rate = $cswp_manualrate[ 'inr_rate' ];
}

if ( isset( $cswp_manualrate[ 'eur_rate' ] ) ) {
    $cswp_eur_rate = $cswp_manualrate[ 'eur_rate' ];
}

if ( isset( $cswp_manualrate[ 'aud_rate' ] ) ) {
    $cswp_aud_rate = $cswp_manualrate[ 'aud_rate' ];
}

//Store Switcher Button value.

$convertbtn = CS_Loader::cswp_load_currency_button_data();
$cswp_usd_button = '';
$cswp_inr_button = '';
$cswp_eur_button = '';
$cswp_aud_button = '';

if ( isset( $convertbtn[ 'USD' ] ) ) {
    $cswp_usd_button = $convertbtn[ 'USD' ];
}

if ( isset( $convertbtn[ 'INR' ] ) ) {
    $cswp_inr_button = $convertbtn[ 'INR' ];
}

if ( isset( $convertbtn['EUR'] ) ) {
    $cswp_eur_button = $convertbtn[ 'EUR' ];
}

if ( isset( $convertbtn[ 'AUD' ] ) ) {
    $cswp_aud_button = $convertbtn[ 'AUD' ];
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

if(get_option('cswp_display') == 'display') {
echo'<div class="updated notice">
<p><strong>Settings Saved.</strong></p>
</div>';
update_option('cswp_display','nodisplay');

}
?>
 <!-- Html code for frontend -->

<form method="post" name="cca_settings_form">
  <!--  set the html code for select base currency and select currency type -->
     <table class="form-table" >
    <tr>
     <th scope="row">
      <label><?php esc_html_e('Select Type of Conversion', 'cswp_currencyswitch'); ?></label>
     </th>
      <td>
        <select name="cswp_form_select" id="cswp_currency_form" onchange="showcurency(this)">
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
            if (isset($cswp_basecurency) ) {
                if ('USD' === $cswp_basecurency ) {
                    ?>
                    <input type="radio"  value="USD" name="basecurency" class="cca_hidden" checked="checked" />
               <?php } else {?>
                <input type="radio"  value="USD" name="basecurency" class="cca_hidden" />
           <?php }
            }else { ?>
             <input type="radio"  value="USD" name="basecurency" class="cca_hidden" />

         <?php } ?>

        <span class="currency-switcher-slider round"></span></label></td>

        <td><label for="USD"><?php esc_html_e('United States Dollar(USD)', 'cswp_currencyswitch'); ?></label></td>

        <td><label class="currency-switcher-switch">
        <!-- <input type="checkbox"  name="currency_button[]" value="USD" class="cca_hidden"> -->
         <?php
         $convertbtn = CS_Loader::cswp_load_currency_button_data();
            if (isset($convertbtn) ) {

                if ($convertbtn !== '') {

                    if (isset($cswp_usd_button) ) {

                        if ('USD' === $cswp_usd_button ) {
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
        <input step = "any" type="number" name="usd"  value="<?php  echo esc_attr($cswp_usd_rate); ?>" placeholder="<?php _e('Enter the USD value', 'cswp_currencyswitch'); ?>" >
      </td>
      </tr>

      <tr>
        <td><label class="currency-switcher-switch">
            <?php
            if (isset($cswp_basecurency) ) {
                if ('INR' === $cswp_basecurency ) {
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
        <td><label for="INR"><?php esc_html_e('Indian Rupee(INR)', 'cswp_currencyswitch'); ?></label></td>
        <td> <label class="currency-switcher-switch">
        <!-- <input type="checkbox"  name="currency_button[]" value="INR" class="cca_hidden"> -->
         <?php


            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cswp_inr_button) ) {

                        if ('INR' === $cswp_inr_button ) {
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
        <input step = "any" type="number" name="inr" value="<?php echo esc_attr($cswp_inr_rate); ?>" placeholder="<?php _e('Enter the INR value', 'cswp_currencyswitch'); ?>">
       </td>
      </tr>
      <tr>
         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cswp_basecurency) ) {
                if ('EUR' === $cswp_basecurency ) {
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
        <td><label for="EUO"><?php esc_html_e('European Union(EUR)', 'cswp_currencyswitch'); ?></label></td>
        <td > <label class="currency-switcher-switch">
        <!-- <input type="checkbox"  name="currency_button[]" value="EURO" class="cca_hidden"> -->
         <?php
              if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cswp_eur_button) ) {

                        if ('EUR' === $cswp_eur_button ) {
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
        <input step = "any" type="number" name="eur"  value="<?php echo esc_attr($cswp_eur_rate); ?>" placeholder="<?php _e('Enter the EURO value', 'cswp_currencyswitch'); ?>">
       </td>
      </tr>
      <tr>
         <td><label class="currency-switcher-switch">
            <?php
            if (isset($cswp_basecurency) ) {
                if ('AUD' === $cswp_basecurency ) {
                    ?>
                    <input type="radio"  value="AUD" name="basecurency" class="cca_hidden" checked="checked"/>
                <?php } else {?>
                <input type="radio"  value="AUD" name="basecurency" class="cca_hidden"/>
            <?php }
            } else {?>
             <input type="radio"  value="AUD" name="basecurency" class="cca_hidden"/>

         <?php } ?>
        <span class="currency-switcher-slider round"></span></label></td>
        <td><label for="AUD"><?php esc_html_e('Australian Dollar(AUD)', 'cswp_currencyswitch'); ?></td>
        <td > <label class="currency-switcher-switch">
        <!-- <input type="checkbox"  name="currency_button[]" value="AUD" class="cca_hidden"> -->
         <?php


            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cswp_aud_button) ) {

                        if ('AUD' === $cswp_aud_button ) {
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
        <input step = "any" type="number" name="aud"  value="<?php echo esc_attr($cswp_aud_rate);?>" placeholder="<?php _e('Enter the AUD value', 'cswp_currencyswitch'); ?>">
      </tr>
      <tr></tr>
    </table>

  <!--  set the html code for Apikey value and frequency update time -->
  <table class="form-table" id="cs-api-display" >
        <tr>
        <th scope="row">
          <label for="ApiKey"> <?php esc_html_e('App ID(Api Key)', 'cswp_currencyswitch'); ?></label>
        </th>
           <td>
            <input type="text" name="appid" class="cs-input-appid regular-text" value="<?php echo  $cswp_api_key;?>">

          </td>
           <td><input type="button" name="Authenticate" value="Authenticate" id="" class="cs-authenticate bt button button-secondary"></td>
           <td>
           </td>
        </tr>
        <tr>
            <th scope="row">
              <label for="UpdateExchangeRate"><?php esc_html_e('Frequency to Update', 'cswp_currencyswitch'); ?></label>
            </th>
            <td>
                <select name="frequency_reload">
                  <option value="hourly" <?php selected( $cswp_frequency_reload, 'hourly') ?>>Hourly</option>
                  <option value="daily" <?php selected( $cswp_frequency_reload, 'daily') ?>>Daily</option>
                  <option value="weekly" <?php selected( $cswp_frequency_reload, 'weekly') ?>>Weekly</option>
                  <option value="manual" <?php selected( $cswp_frequency_reload, 'manual') ?>>Manual</option>
                 </select>
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
            if (isset($cswp_basecurency) ) {
                if ('USD' === $cswp_basecurency ) {
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

        <td><label for="USD"><?php esc_html_e('United States Dollar(USD)', 'cswp_currencyswitch'); ?></label></td>
        <td><label class="currency-switcher-switch">
         <?php
         $convertbtn = CS_Loader::cswp_load_currency_button_data();
            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cswp_usd_button) ) {

                        if ('USD' === $cswp_usd_button ) {
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
        <input type="text" name="apitext_usd"  value="<?php  echo esc_attr($apitext_usd); ?>" placeholder="<?php esc_html_e('Enter the USD value', 'cswp_currencyswitch'); ?>" readonly>
      </td>
      </tr>

      <tr>
         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cswp_basecurency) ) {
                if ('INR' === $cswp_basecurency ) {
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
        <td><label for="INR"><?php esc_html_e('Indian Rupee(INR)', 'cswp_currencyswitch'); ?></label></td>
        <td> <label class="currency-switcher-switch">
        <!-- <input type="checkbox"  name="currency_button[]" value="INR" class="cca_hidden"> -->
        <?php


            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cswp_inr_button) ) {

                        if ('INR' === $cswp_inr_button ) {
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
        <input type="text" name="apitext_inr" value="<?php echo esc_attr($apitext_inr); ?>" placeholder="<?php esc_html_e('Enter the INR value', 'cswp_currencyswitch'); ?>" readonly>
       </td>
      </tr>
      <tr>

         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cswp_basecurency) ) {
                if ('EUR' === $cswp_basecurency ) {
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
        <td><label for="EUO"><?php esc_html_e('European Union(EUR)', 'cswp_currencyswitch'); ?></label></td>
        <td > <label class="currency-switcher-switch">

         <?php


            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cswp_eur_button) ) {

                        if ('EUR' === $cswp_eur_button ) {
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
        <input type="text" name="apitext_eur"  value="<?php echo esc_attr($apitext_eur); ?>" placeholder="<?php esc_html_e('Enter the EURO value', 'cswp_currencyswitch'); ?>" readonly >
       </td>
      </tr>
      <tr>

         <td><label class="currency-switcher-switch">
        <?php
            if (isset($cswp_basecurency) ) {
                if ('AUD' === $cswp_basecurency ) {
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
        <td><label for="AUD"><?php esc_html_e('Australian Dollar(AUD)', 'cswp_currencyswitch'); ?></td>
        <td > <label class="currency-switcher-switch">

        <?php


            if (isset($convertbtn) ) {

                if ($convertbtn ==! '') {

                    if (isset($cswp_aud_button) ) {

                        if ('AUD' === $cswp_aud_button ) {
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
        <input type="text" name="apitext_aud"  value="<?php echo esc_attr($apitext_aud);?>" placeholder="<?php esc_html_e('Enter the AUD value', 'cswp_currencyswitch'); ?> " readonly>
       </td>
      </tr>

    </table>


    <table class="form-table">
         <tr>
            <th scope="row">
              <label for="DecimalPlaces"><?php esc_html_e('Decimal Places', 'cswp_currencyswitch'); ?></label>
            </th>
            <td>
                <input type="number" name="decimal" placeholder="2" class="small-text"
                value="<?php echo esc_attr($cswp_decimalpoint);?>">
            </td>
        </tr>
        <tr>
        <th>
            <?php wp_nonce_field( 'cs-form-nonce', 'cs-form' ); ?>
            <input type="submit" name="submit" value="<?php esc_html_e('Submit', 'cswp_currencyswitch'); ?>" class="bt button button-primary">
        </th>
      </tr>
    </table>
</form>
