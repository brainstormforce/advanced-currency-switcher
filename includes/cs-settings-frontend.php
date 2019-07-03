<?php
/**
 * Setting Front End Doc comment
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

// Store form inputs values in variable.
$cswp_get_form_value = CS_Loader::cswp_load_all_data();

$cswp_basecurency = isset( $cswp_get_form_value['basecurency'] ) ? $cswp_get_form_value['basecurency'] : '';

$cswp_form_select_value = isset( $cswp_get_form_value['cswp_form_select'] ) ? $cswp_get_form_value['cswp_form_select'] : '';

$cswp_api_key = isset( $cswp_get_form_value['api_key'] ) ? $cswp_get_form_value['api_key'] : '';

$api_key_status = isset( $cswp_get_form_value['api_key_status'] ) ? $cswp_get_form_value['api_key_status'] : '';

$cswp_frequency_reload = isset( $cswp_get_form_value['frequency_reload'] ) ? $cswp_get_form_value['frequency_reload'] : '';

$cswp_button_type_value = isset( $cswp_get_form_value['cswp_button_type'] ) ? $cswp_get_form_value['cswp_button_type'] : '';

$cswp_decimal_place_value = isset( $cswp_get_form_value['decimalradio'] ) ? $cswp_get_form_value['decimalradio'] : '';

// Store Manual rate values in variable.
$cswp_manualrate = CS_Loader::cswp_load_manual_data();

$cswp_usd_rate = isset( $cswp_manualrate['usd_rate'] ) ? $cswp_manualrate['usd_rate'] : '1';

$cswp_inr_rate = isset( $cswp_manualrate['inr_rate'] ) ? $cswp_manualrate['inr_rate'] : '69.45';

$cswp_eur_rate = isset( $cswp_manualrate['eur_rate'] ) ? $cswp_manualrate['eur_rate'] : '0.89';

$cswp_aud_rate = isset( $cswp_manualrate['aud_rate'] ) ? $cswp_manualrate['aud_rate'] : '1.45';


$cswp_usd_text = isset( $cswp_manualrate['usd-text'] ) ? $cswp_manualrate['usd-text'] : 'Change to USD';

$cswp_inr_text = isset( $cswp_manualrate['inr-text'] ) ? $cswp_manualrate['inr-text'] : 'Change to INR';

$cswp_eur_text = isset( $cswp_manualrate['eur-text'] ) ? $cswp_manualrate['eur-text'] : 'Change to EURO';

$cswp_aud_text = isset( $cswp_manualrate['aud-text'] ) ? $cswp_manualrate['aud-text'] : 'Change to AUD';

$cswp_inr_symbol = isset( $cswp_manualrate['inr-symbol'] ) ? $cswp_manualrate['inr-symbol'] : '&#8377;';
$cswp_eur_symbol = isset( $cswp_manualrate['eur-symbol'] ) ? $cswp_manualrate['eur-symbol'] : '&#8364;';
$cswp_aud_symbol = isset( $cswp_manualrate['aud-symbol'] ) ? $cswp_manualrate['aud-symbol'] : '&#36;';
$cswp_usd_symbol = isset( $cswp_manualrate['usd-symbol'] ) ? $cswp_manualrate['usd-symbol'] : '&#36;';

// Store Switcher Button value.
$convertbtn = CS_Loader::cswp_load_currency_button_data();

$cswp_usd_button = isset( $convertbtn['USD'] ) ? $convertbtn['USD'] : '';

$cswp_inr_button = isset( $convertbtn['INR'] ) ? $convertbtn['INR'] : '';

$cswp_eur_button = isset( $convertbtn['EUR'] ) ? $convertbtn['EUR'] : '';

$cswp_aud_button = isset( $convertbtn['AUD'] ) ? $convertbtn['AUD'] : '';


// Store OpenExchangeRate value in a variable.
$cswp_apirate_values = CS_Loader::cswp_load_apirate_values_data();

$apitext_inr = isset( $cswp_apirate_values['inr'] ) ? $cswp_apirate_values['inr'] : '';

$apitext_usd = isset( $cswp_apirate_values['usd'] ) ? $cswp_apirate_values['usd'] : '';

$apitext_eur = isset( $cswp_apirate_values['eur'] ) ? $cswp_apirate_values['eur'] : '';

$apitext_aud = isset( $cswp_apirate_values['aud'] ) ? $cswp_apirate_values['aud'] : '';

$cswp_api_usd_text = isset( $cswp_apirate_values['usd-apitext'] ) ? $cswp_apirate_values['usd-apitext'] : 'Change to USD';

$cswp_api_inr_text = isset( $cswp_apirate_values['inr-apitext'] ) ? $cswp_apirate_values['inr-apitext'] : 'Change to INR';

$cswp_api_eur_text = isset( $cswp_apirate_values['eur-apitext'] ) ? $cswp_apirate_values['eur-apitext'] : 'Change to EURO';

$cswp_api_aud_text = isset( $cswp_apirate_values['aud-apitext'] ) ? $cswp_apirate_values['aud-apitext'] : 'Change to AUD';

$cswp_inr_apisymbol = isset( $cswp_apirate_values['inr-apisymbol'] ) ? $cswp_apirate_values['inr-apisymbol'] : '&#8377;';
$cswp_eur_apisymbol = isset( $cswp_apirate_values['eur-apisymbol'] ) ? $cswp_apirate_values['eur-apisymbol'] : '&#8364;';
$cswp_aud_apisymbol = isset( $cswp_apirate_values['aud-apisymbol'] ) ? $cswp_apirate_values['aud-apisymbol'] : '&#36;';
$cswp_usd_apisymbol = isset( $cswp_apirate_values['usd-apisymbol'] ) ? $cswp_apirate_values['usd-apisymbol'] : '&#36;';

if ( get_option( 'cswp_display' ) === 'display' ) {
	?>
	<div class="updated notice is-dismissible cswp-notice">
		<p><strong><?php esc_html_e( 'Settings Saved.', 'cswp' ); ?></strong></p>
	</div>
	<?php
	update_option( 'cswp_display', 'nodisplay' );
}
if ( get_option( 'apivalidate' ) === 'no' ) {
	?>
	<div class="notice notice-error is-dismissible cswp-notice">
	<p><strong><?php esc_html_e( 'The API key you entered seems invalid. Please enter the correct API key & try again.', 'cswp' ); ?></strong></p>
	</div>
	<?php
	update_option( 'apivalidate', 'ok' );
}
if ( get_option( 'apinotfree' ) === 'notfree' ) {
	?>
	<div class="notice notice-error is-dismissible cswp-notice">
	<p><strong><?php esc_html_e( 'Your API key allows only USD is a base currency. Please change the base currency to USD & save changes again.', 'cswp' ); ?></strong></p>
	</div>
	<?php
	update_option( 'apinotfree', 'ok' );
}
if ( get_option( 'apinotfree' ) === 'emptyapi' ) {
	?>
	<div class="notice notice-error is-dismissible cswp-notice">
	<p><strong><?php esc_html_e( 'Please enter the API key for get currency rate.', 'cswp' ); ?></strong></p>
	</div>
	<?php
	update_option( 'apinotfree', 'ok' );
}
?>
<!-- Html code for frontend -->
<form method="post" name="cca_settings_form">
	<!--  set the html code for select base currency and select currency type -->
	<table class="form-table" >
		<tr>
			<th scope="row">
				<label><?php esc_html_e( 'Currency Conversion By', 'cswp' ); ?></label>
			</th>
			<td>
				<select name="cswp_form_select" id="cswp_currency_form" onchange="showcurency(this)">
					<option id="manual-currency" value="manualrate" <?php selected( $cswp_form_select_value, 'manualrate' ); ?>><?php esc_html_e( 'Manual Conversion Rate', 'cswp' ); ?></option>
					<option id="api-currency" value="apirate" <?php selected( $cswp_form_select_value, 'apirate' ); ?>><?php esc_html_e( 'Open Exchange Rate API', 'cswp' ); ?></option>
				</select>
			</td>
		</tr>
	</table>

	<!--  set the html code for put manual currancy rate -->
	<table class="form-table ccatable" id="cs-manual-display">
		<tr>
			<th class="cca-column" >Base Currency</th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Currency', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Conversion Rate', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Display at Frontend?', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Button / Dropdown Label', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Currency Symbol', 'cswp' ); ?></th>
		</tr>

		<tr>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $cswp_basecurency ) ) {
					if ( 'USD' === $cswp_basecurency ) {
						?>
						<input type="radio"  value="USD" name="basecurency" class="cca_hidden" checked="checked" />
						<?php
					} else {
						?>
						<input type="radio"  value="USD" name="basecurency" class="cca_hidden" checked="checked"/>
						<?php
					}
				} else {
					?>
					<input type="radio"  value="USD" name="basecurency" class="cca_hidden"  />
					<?php
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="USD"><?php esc_html_e( 'United States Dollar (USD)', 'cswp' ); ?>
				</label>
			</td>
			
			<td>
				<input step="any" type="number" name="usd"  value="<?php echo esc_attr( $cswp_usd_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the USD value', 'cswp' ); ?>" >
			</td>
			<td>
				<label class="currency-switcher-switch">
				<?php
				$convertbtn = CS_Loader::cswp_load_currency_button_data();
				?>
					<label for="usdCurrencyButton">
						<input type="checkbox" id="usdCurrencyButton" name="currency_button[]" value="USD" <?php checked( $cswp_usd_button, 'USD' ); ?>>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="usd-text"  value="<?php echo esc_attr( $cswp_usd_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="usd-symbol"  value="<?php echo esc_attr( $cswp_usd_symbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<input type="radio"  value="EUR" name="basecurency" class="cca_hidden" <?php checked( $cswp_basecurency, 'EUR' ); ?>>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="EUR"><?php esc_html_e( 'European Union (EUR)', 'cswp' ); ?>
				</label>
			</td>

			<td>
				<input step="any" type="number" name="eur"  value="<?php echo esc_attr( $cswp_eur_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the EURO value', 'cswp' ); ?>">
			</td>
			<td>
				<label class="currency-switcher-switch">
					<label for="eurCurrencyButton">
						<input type="checkbox" id="eurCurrencyButton" name="currency_button[]" value="EUR" <?php checked( $cswp_eur_button, 'EUR' ); ?>>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="eur-text"  value="<?php echo esc_attr( $cswp_eur_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="eur-symbol"  value="<?php echo esc_attr( $cswp_eur_symbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<input type="radio"  value="AUD" name="basecurency" class="cca_hidden" <?php checked( $cswp_basecurency, 'AUD' ); ?>>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="AUD"><?php esc_html_e( 'Australian Dollar (AUD)', 'cswp' ); ?>
			</td>
			
			<td>
				<input step="any" type="number" name="aud"  value="<?php echo esc_attr( $cswp_aud_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the AUD value', 'cswp' ); ?>">
			</td>
			<td>
				<label class="currency-switcher-switch">
					<label for="audCurrencyButton">
						<input type="checkbox" id="audCurrencyButton" name="currency_button[]" value="AUD" <?php checked( $cswp_aud_button, 'AUD' ); ?>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="aud-text"  value="<?php echo esc_attr( $cswp_aud_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="aud-symbol"  value="<?php echo esc_attr( $cswp_aud_symbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<input type="radio"  value="INR" name="basecurency" class="cca_hidden" <?php checked( $cswp_basecurency, 'INR' ); ?>>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="INR"><?php esc_html_e( 'Indian Rupee (INR)', 'cswp' ); ?>
				</label>
			</td>
			
			<td>
				<input step="any" type="number" name="inr" value="<?php echo esc_attr( $cswp_inr_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the INR value', 'cswp' ); ?>">
			</td>
			<td>
				<label class="currency-switcher-switch">
					<label for="inrCurrencyButton">
						<input type="checkbox" id="inrCurrencyButton" name="currency_button[]" value="INR" <?php checked( $cswp_inr_button, 'INR' ); ?>>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="inr-text"  value="<?php echo esc_attr( $cswp_inr_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="inr-symbol"  value="<?php echo esc_attr( $cswp_inr_symbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td colspan="6" class="cswp_note_rate">
			<p class="description cswp_apidescription">
				<b><?php esc_html_e( 'Note:', 'cswp' ); ?></b>	<?php esc_html_e( 'Please make sure that you have entered the 1 value for the selected base currency rate. Enter an exchange rate for the different currency options against the chosen base currency.', 'cswp' ); ?>
				</p>
			</td>
		</tr>
	</table>

	<!--  set the html code for Apikey value and frequency update time -->
	<table class="form-table" id="cs-api-display" >

		<tr>
			<th scope="row">
				<label for="ApiKey"> <?php esc_html_e( 'App ID', 'cswp' ); ?></label>
			</th>
			<td>
				<input type="text" name="appid" class="cs-input-appid regular-text" id="cswp-apitext" value="<?php echo esc_attr( $cswp_api_key ); ?>">
				<input type="button" name="Authenticate" value="Authenticate" class="cs-authenticate bt button button-secondary">
			</td>
		</tr>
		<tr class="cswp_api_note">
			<td>
			</td>
			<td class="cswp_api_note_td" colspan="3">
				<p class="description cswp_apidescription">
					<?php esc_html_e( 'Enter Your Open Exchange Rate App ID. If you dont have then get from ', 'cswp' ); ?>
					<a href="https://openexchangerates.org/" target="_blank">https://openexchangerates.org/</a>
				</p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="UpdateExchangeRate"><?php esc_html_e( 'Frequency', 'cswp' ); ?></label>
			</th>
			<td>
				<select name="frequency_reload">
					<option value="manual" <?php selected( $cswp_frequency_reload, 'manual' ); ?>>
						<?php esc_html_e( 'Manual', 'cswp' ); ?>		
					</option>
					<option value="hourly" <?php selected( $cswp_frequency_reload, 'hourly' ); ?>>
						<?php esc_html_e( 'Hourly', 'cswp' ); ?>
					</option>
					<option value="daily" <?php selected( $cswp_frequency_reload, 'daily' ); ?>>
						<?php esc_html_e( 'Daily', 'cswp' ); ?>							
					</option>
					<option value="weekly" <?php selected( $cswp_frequency_reload, 'weekly' ); ?>>
						<?php esc_html_e( 'Weekly', 'cswp' ); ?>							
					</option>
				</select>
			</td>
		</tr>
		<tr class="cswp_api_note">
			<td>
			</td>
			<td class="cswp_api_note_td" colspan="3">
				<p class="description cswp_apidescription">
					<?php esc_html_e( 'Set how frequently you want to update the currency conversion rate. This setting is helpful to reduce API calls.', 'cswp' ); ?>
				</p>
			</td>
		</tr>
	</table>
	<table class="form-table" id="cs-api-display2" >
		<tr>
			<th class="cca-column" >Base Currency</th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Currency', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Conversion Rate', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Display at Frontend?', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Button/Dropdown Label', 'cswp' ); ?></th>
			<th class="cca-column" style="padding-left: 10px;"><?php esc_html_e( 'Currency Symbol', 'cswp' ); ?></th>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $cswp_basecurency ) ) {
					if ( 'USD' === $cswp_basecurency ) {
						?>
							<input type="radio"  value="USD" name="basecurencyapi" class="cca_hidden" checked="checked"/>
						<?php
					} else {
						?>
						<input type="radio"  value="USD" name="basecurencyapi" class="cca_hidden" checked="checked"/>
						<?php
					}
				} else {
					?>
					<input type="radio"  value="USD" name="basecurencyapi" class="cca_hidden"/>
					<?php
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="USD"><?php esc_html_e( 'United States Dollar (USD)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<input type="text" name="apitext_usd"  value="<?php echo esc_attr( $apitext_usd ); ?>" placeholder="<?php esc_html_e( 'Enter the USD value', 'cswp' ); ?>" readonly>
			</td>
			<td>
				<label class="currency-switcher-switch">
				<?php
				$convertbtn = CS_Loader::cswp_load_currency_button_data();
				?>
					<label for="usdapiButton">
						<input type="checkbox" id="usdapiButton" name="currency_button_api[]" value="USD" <?php checked( $cswp_usd_button, 'USD' ); ?>>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="usd-apitext"  value="<?php echo esc_attr( $cswp_api_usd_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="usd-apisymbol"  value="<?php echo esc_attr( $cswp_usd_apisymbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<input type="radio"  value="EUR" name="basecurencyapi" class="cca_hidden" <?php checked( $cswp_basecurency, 'EUR' ); ?>>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="EUO"><?php esc_html_e( 'European Union (EUR)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<input type="text" name="apitext_eur"  value="<?php echo esc_attr( $apitext_eur ); ?>" placeholder="<?php esc_html_e( 'Enter the EURO value', 'cswp' ); ?>" readonly >
			</td>
			<td>
				<label class="currency-switcher-switch">
					<label for="eurapiButton">
						<input type="checkbox" id="eurapiButton" name="currency_button_api[]" value="EUR" <?php checked( $cswp_eur_button, 'EUR' ); ?>>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="eur-apitext"  value="<?php echo esc_attr( $cswp_api_eur_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="eur-apisymbol"  value="<?php echo esc_attr( $cswp_eur_apisymbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<input type="radio"  value="AUD" name="basecurencyapi" class="cca_hidden" <?php checked( $cswp_basecurency, 'AUD' ); ?>>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="AUD"><?php esc_html_e( 'Australian Dollar (AUD)', 'cswp' ); ?>
			</td>
			<td>
				<input type="text" name="apitext_aud"  value="<?php echo esc_attr( $apitext_aud ); ?>" placeholder="<?php esc_html_e( 'Enter the AUD value', 'cswp' ); ?>" readonly>
			</td>
			<td>
				<label class="currency-switcher-switch">
					<label for="audapiButton">
						<input type="checkbox" id="audapiButton" name="currency_button_api[]" value="AUD" <?php checked( $cswp_aud_button, 'AUD' ); ?>>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="aud-apitext"  value="<?php echo esc_attr( $cswp_api_aud_text ); ?>"placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="aud-apisymbol"  value="<?php echo esc_attr( $cswp_aud_apisymbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<input type="radio"  value="INR" name="basecurencyapi" class="cca_hidden" <?php checked( $cswp_basecurency, 'INR' ); ?>>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="INR"><?php esc_html_e( 'Indian Rupee (INR)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<input type="text" name="apitext_inr" value="<?php echo esc_attr( $apitext_inr ); ?>" placeholder="<?php esc_html_e( 'Enter the INR value', 'cswp' ); ?>" readonly>
			</td>
			<td>
				<label class="currency-switcher-switch">
					<label for="inrapiButton">
					<input type="checkbox" id="inrapiButton" name="currency_button_api[]" value="INR" <?php checked( $cswp_inr_button, 'INR' ); ?>>
					</label>
					<br>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="inr-apitext"  value="<?php echo esc_attr( $cswp_api_inr_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="inr-apisymbol"  value="<?php echo esc_attr( $cswp_inr_apisymbol ); ?>" placeholder="<?php esc_html_e( 'Provide Symbol ', 'cswp' ); ?>" >
			</td>
		</tr>
	</table>

	<table class="form-table">
		<tr>
			<th>Display Type</th>
			<td>
				<select name="cswp_button_type" >
						<option value="dropdown" <?php selected( $cswp_button_type_value, 'dropdown' ); ?>>Drop Down</option>
						<option value="toggle" <?php selected( $cswp_button_type_value, 'toggle' ); ?>>Toggle</option>
				</select>
			</td>
		</tr>
		<tr class="cswp_api_note">
			<td>
			</td>
			<td class="cswp_api_note_td" colspan="3">
				<p class="description cswp_apidescription">
					<?php esc_html_e( 'Select how you wish to display the currency conversion action at frontend.', 'cswp' ); ?>
				</p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="DecimalPlaces"><?php esc_html_e( 'Number Format', 'cswp' ); ?></label>
			</th>
			<td>
				<select name="cswp_decimal_place_value" >
					<option value="0" <?php selected( $cswp_decimal_place_value, null ); ?>>
						<?php esc_html_e( 'Round Number (e.g.12)', 'cswp' ); ?>
					</option>
					<option value="1" <?php selected( $cswp_decimal_place_value, 1 ); ?>>
						<?php esc_html_e( '1 Decimal Place (e.g.12.3)', 'cswp' ); ?>
					</option>
					<option value="2" <?php selected( $cswp_decimal_place_value, 2 ); ?>>
						<?php esc_html_e( '2 Decimal Places (e.g.12.34)', 'cswp' ); ?>
					</option>
				</select>
			</td>
		</tr>
		<tr class="cswp_api_note">
			<td>
			</td>
			<td class="cswp_api_note_td" colspan="3">
				<p class="description cswp_apidescription">
					<?php esc_html_e( 'Control decimal places of the currency that displays after conversion.', 'cswp' ); ?>
				</p>
			</td>
		</tr>
		<tr>
			<th>
				<?php
					wp_nonce_field( 'cs-form-nonce', 'cs-form' );
				?>
				<input type="submit" name="submit" value="<?php esc_html_e( 'Save Changes', 'cswp' ); ?>" class="bt button button-primary">
			</th>
		</tr>
	</table>
</form>
<?php
