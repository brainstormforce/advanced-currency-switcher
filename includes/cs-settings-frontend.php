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

$cswp_decimalpoint = isset( $cswp_get_form_value['decimalradio'] ) ? $cswp_get_form_value['decimalradio'] : '';

// Store Manual rate values in variable.
$cswp_manualrate = CS_Loader::cswp_load_manual_data();

$cswp_usd_rate = isset( $cswp_manualrate['usd_rate'] ) ? $cswp_manualrate['usd_rate'] : '1';

$cswp_inr_rate = isset( $cswp_manualrate['inr_rate'] ) ? $cswp_manualrate['inr_rate'] : '69.45';

$cswp_eur_rate = isset( $cswp_manualrate['eur_rate'] ) ? $cswp_manualrate['eur_rate'] : '0.89';

$cswp_aud_rate = isset( $cswp_manualrate['aud_rate'] ) ? $cswp_manualrate['aud_rate'] : '1.45';


$cswp_usd_text = isset( $cswp_manualrate['usd-text'] ) ? $cswp_manualrate['usd-text'] : 'Change TO USD';

$cswp_inr_text = isset( $cswp_manualrate['inr-text'] ) ? $cswp_manualrate['inr-text'] : 'Change TO INR';

$cswp_eur_text = isset( $cswp_manualrate['eur-text'] ) ? $cswp_manualrate['eur-text'] : 'Change TO EURO';

$cswp_aud_text = isset( $cswp_manualrate['aud-text'] ) ? $cswp_manualrate['aud-text'] : 'Change TO AUD';


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

$cswp_api_usd_text = isset( $cswp_apirate_values['usd-apitext'] ) ? $cswp_apirate_values['usd-apitext'] : 'Change TO USD';

$cswp_api_inr_text = isset( $cswp_apirate_values['inr-apitext'] ) ? $cswp_apirate_values['inr-apitext'] : 'Change TO INR';

$cswp_api_eur_text = isset( $cswp_apirate_values['eur-apitext'] ) ? $cswp_apirate_values['eur-apitext'] : 'Change TO EURO';

$cswp_api_aud_text = isset( $cswp_apirate_values['aud-apitext'] ) ? $cswp_apirate_values['aud-apitext'] : 'Change TO AUD';

if ( get_option( 'cswp_display' ) === 'display' ) {
	echo '<div class="updated notice is-dismissible">
<p><strong>Settings Saved.</strong></p>
</div>';
	update_option( 'cswp_display', 'nodisplay' );
}
if ( get_option( 'apivalidate' ) === 'no' ) {
	echo '<div class="notice notice-error is-dismissible">
<p><strong>Please enter correct API key.</strong></p>
</div>';
	update_option( 'apivalidate', 'ok' );
}

?>
<!-- Html code for frontend -->
<form method="post" name="cca_settings_form">
	<!--  set the html code for select base currency and select currency type -->
	<table class="form-table" >
		<tr>
			<th scope="row">
				<label><?php esc_html_e( 'Select Type of Conversion', 'cswp' ); ?></label>
			</th>
			<td>
				<select name="cswp_form_select" id="cswp_currency_form" onchange="showcurency(this)">
					<option id="manual-currency" value="manualrate" <?php selected( $cswp_form_select_value, 'manualrate' ); ?>>Manual Currency Rate</option>
					<option id="api-currency" value="apirate" <?php selected( $cswp_form_select_value, 'apirate' ); ?>>Open Exchange Rate</option>
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
			<th class="cca-column" style="padding-left: 10px;">Button Text to Display</th>
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
				<span class="currency-switcher-slider round"></span></label></td>
			<td>
				<label for="USD"><?php esc_html_e( 'United States Dollar(USD)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<label class="currency-switcher-switch">
			<?php
			$convertbtn = CS_Loader::cswp_load_currency_button_data();
			if ( isset( $convertbtn ) ) {

				if ( '' !== $convertbtn ) {

					if ( isset( $cswp_usd_button ) ) {

						if ( 'USD' === $cswp_usd_button ) {
							echo '<label for="ForCurrencyButton">
                     <input type="checkbox" checked name="currency_button[]" value="USD">
                     USD &#36;</label><br> ';
						} else {
							echo '<label for="ForCurrencyButton">
                     <input type="checkbox"  name="currency_button[]" value="USD">
                     USD &#36;</label><br> ';
						}
					} else {
						echo '<label for="ForCurrencyButton">
                 <input type="checkbox"  name="currency_button[]" value="USD">
                 USD &#36;</label><br> ';
					}
				} else {
					echo '<label for="ForCurrencyButton">
                 <input type="checkbox" name="currency_button[]" value="USD">
                 USD &#36;</label><br> ';
				}
			}
			?>
				<span class="currency-switcher-slider round"></span></label>
			</td>
			<td>
				<input step="any" type="number" name="usd"  value="<?php echo esc_attr( $cswp_usd_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the USD value', 'cswp' ); ?>" >
			</td>
			<td>
				<input type="text" name="usd-text"  value="<?php echo esc_attr( $cswp_usd_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>

		<tr>
			<td>
				<label class="currency-switcher-switch">
					<?php
					if ( isset( $cswp_basecurency ) ) {
						if ( 'INR' === $cswp_basecurency ) {
							?>
						<input type="radio"  value="INR" name="basecurency" class="cca_hidden" checked="checked"/>
							<?php
						} else {
							?>
							<input type="radio"  value="INR" name="basecurency" class="cca_hidden" />
							<?php
						}
					} else {
						?>
						<input type="radio"  value="INR" name="basecurency" class="cca_hidden" />
						<?php
					}
					?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="INR"><?php esc_html_e( 'Indian Rupee(INR)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<label class="currency-switcher-switch">
					<?php
					if ( isset( $convertbtn ) ) {

						if ( '' !== $convertbtn ) {

							if ( isset( $cswp_inr_button ) ) {

								if ( 'INR' === $cswp_inr_button ) {
									echo '<label for="ForCurrencyButton">
		                 <input type="checkbox" checked name="currency_button[]" value="INR">
		                 INR &#8377;</label><br> ';
								} else {
									echo '<label for="ForCurrencyButton">
		                 <input type="checkbox"  name="currency_button[]" value="INR">
		                 INR &#8377;</label><br> ';
								}
							} else {
								echo '<label for="ForCurrencyButton">
		                 <input type="checkbox"  name="currency_button[]" value="INR">
		                 INR &#8377;</label><br> ';
							}
						} else {

							echo '<label for="ForCurrencyButton">
		                 <input type="checkbox" name="currency_button[]" value="INR">
		                 INR &#8377;</label><br> ';

						}
					}
					?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input step="any" type="number" name="inr" value="<?php echo esc_attr( $cswp_inr_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the INR value', 'cswp' ); ?>">
			</td>
			<td>
				<input type="text" name="inr-text"  value="<?php echo esc_attr( $cswp_inr_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<?php
					if ( isset( $cswp_basecurency ) ) {
						if ( 'EUR' === $cswp_basecurency ) {
							?>
							<input type="radio"  value="EUR" name="basecurency" class="cca_hidden" checked="checked"/>
							<?php
						} else {
							?>
						<input type="radio"  value="EUR" name="basecurency" class="cca_hidden"/>
							<?php
						}
					} else {
						?>
						<input type="radio"  value="EUR" name="basecurency" class="cca_hidden"/>
					<?php } ?>
					<span class="currency-switcher-slider round"></span>
				</label>
			</td>
			<td>
				<label for="EUR"><?php esc_html_e( 'European Union(EUR)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<label class="currency-switcher-switch">
					<?php
					if ( isset( $convertbtn ) ) {

						if ( '' !== $convertbtn ) {

							if ( isset( $cswp_eur_button ) ) {
								if ( 'EUR' === $cswp_eur_button ) {
									echo '<label for="ForCurrencyButton">
		                <input type="checkbox" checked name="currency_button[]" value="EUR">
		                EUR &#8364;</label><br> ';
								} else {
									echo '<label for="ForCurrencyButton">
		                <input type="checkbox"  name="currency_button[]" value="EUR">
		                EUR &#8364;</label><br> ';
								}
							} else {
								echo '<label for="ForCurrencyButton">
		                <input type="checkbox"  name="currency_button[]" value="EUR">
		                EUR &#8364;</label><br> ';
							}
						} else {
							echo '<label for="ForCurrencyButton">
		                <input type="checkbox"  name="currency_button[]" value="EUR">
		                EUR &#8364;</label><br> ';
						}
					}
					?>
					<span class="currency-switcher-slider round"></span>
				</label>
			</td>
			<td>
				<input step="any" type="number" name="eur"  value="<?php echo esc_attr( $cswp_eur_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the EURO value', 'cswp' ); ?>">
			</td>
			<td>
				<input type="text" name="eur-text"  value="<?php echo esc_attr( $cswp_eur_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
					<?php
					if ( isset( $cswp_basecurency ) ) {
						if ( 'AUD' === $cswp_basecurency ) {
							?>
						<input type="radio"  value="AUD" name="basecurency" class="cca_hidden" checked="checked"/>
						<?php } else { ?>
					<input type="radio"  value="AUD" name="basecurency" class="cca_hidden"/>
							<?php
						}
					} else {
						?>
					<input type="radio"  value="AUD" name="basecurency" class="cca_hidden"/>
						<?php
					}
					?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="AUD"><?php esc_html_e( 'Australian Dollar(AUD)', 'cswp' ); ?>
			</td>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $convertbtn ) ) {

					if ( '' !== $convertbtn ) {

						if ( isset( $cswp_aud_button ) ) {

							if ( 'AUD' === $cswp_aud_button ) {
								echo '<label for="ForCurrencyButton">
	                	<input type="checkbox" checked name="currency_button[]" value="AUD">
	                 	AUD &#36;</label><br> ';
							} else {
								echo '<label for="ForCurrencyButton">
	                 	<input type="checkbox"  name="currency_button[]" value="AUD">
	                 	AUD &#36;</label><br> ';
							}
						} else {
							echo '<label for="ForCurrencyButton">
	                 	<input type="checkbox"  name="currency_button[]" value="AUD">
	                 	AUD &#36;</label><br> ';
						}
					} else {
						echo '<label for="ForCurrencyButton">
	                <input type="checkbox"  name="currency_button[]" value="AUD">
	                AUD &#36;</label><br> ';
					}
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input step="any" type="number" name="aud"  value="<?php echo esc_attr( $cswp_aud_rate ); ?>" placeholder="<?php esc_html_e( 'Enter the AUD value', 'cswp' ); ?>">
			</td>
			<td>
				<input type="text" name="aud-text"  value="<?php echo esc_attr( $cswp_aud_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
		</tr>
	</table>

	<!--  set the html code for Apikey value and frequency update time -->
	<table class="form-table" id="cs-api-display" >
		<tr>
			<th scope="row">
				<label for="ApiKey"> <?php esc_html_e( 'App ID(Api Key)', 'cswp' ); ?></label>
			</th>
			<td>
				<input type="text" name="appid" class="cs-input-appid regular-text" id="cswp-apitext" value="<?php echo esc_attr( $cswp_api_key ); ?>">
			</td>
			<td>
				<input type="button" name="Authenticate" value="Authenticate" class="cs-authenticate bt button button-secondary">
			</td>
			<td>
			</td>
		</tr>
		<tr class="cswp_api_note">
			<td>
			</td>
			<td class="cswp_api_note_td" colspan="3">
				<p class="description cswp_apidescription">
					Enter Your OpenExchangeRate App ID: [ If you dont have then get from <a href="https://openexchangerates.org/" target="_blank">https://openexchangerates.org/</a> ]
				</p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="UpdateExchangeRate"><?php esc_html_e( 'Frequency to Update', 'cswp' ); ?></label>
			</th>
			<td>
				<select name="frequency_reload">
					<option value="hourly" <?php selected( $cswp_frequency_reload, 'hourly' ); ?>>Hourly</option>
					<option value="daily" <?php selected( $cswp_frequency_reload, 'daily' ); ?>>Daily</option>
					<option value="weekly" <?php selected( $cswp_frequency_reload, 'weekly' ); ?>>Weekly</option>
					<option value="manual" <?php selected( $cswp_frequency_reload, 'manual' ); ?>>Manual</option>
				</select>
			</td>
		</tr>
		<tr>
			<th class="cca-column" >Base Currency</th>
			<th class="cca-column" style="padding-left: 10px;">Currency</th>
			<th class="cca-column" style="padding-left: 10px;">Currency Display</th>
			<th class="cca-column"style="padding-left: 10px;">Rate</th>
			<th class="cca-column" style="padding-left: 10px;">Button Text to Display</th>
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
				<label for="USD"><?php esc_html_e( 'United States Dollar(USD)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<label class="currency-switcher-switch">
				<?php
				$convertbtn = CS_Loader::cswp_load_currency_button_data();
				if ( isset( $convertbtn ) ) {

					if ( '' !== $convertbtn ) {

						if ( isset( $cswp_usd_button ) ) {

							if ( 'USD' === $cswp_usd_button ) {
								echo '<label for="ForCurrencyButton">
	                     <input type="checkbox" checked name="currency_button_api[]" value="USD">
	                     USD &#36;</label><br> ';
							} else {
								echo '<label for="ForCurrencyButton">
	                     <input type="checkbox"  name="currency_button_api[]" value="USD">
	                     USD &#36;</label><br> ';
							}
						} else {
							echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="USD">
	                 USD &#36;</label><br> ';
						}
					} else {
						echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="USD">
	                 USD &#36;</label><br> ';
					}
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="apitext_usd"  value="<?php echo esc_attr( $apitext_usd ); ?>" placeholder="<?php esc_html_e( 'Enter the USD value', 'cswp' ); ?>" readonly>
			</td>
			<td>
				<input type="text" name="usd-apitext"  value="<?php echo esc_attr( $cswp_api_usd_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $cswp_basecurency ) ) {
					if ( 'INR' === $cswp_basecurency ) {
						?>
							<input type="radio"  value="INR" name="basecurencyapi" class="cca_hidden" checked="checked"/>
						<?php
					} else {
						?>
						<input type="radio"  value="INR" name="basecurencyapi" class="cca_hidden"/>
						<?php
					}
				} else {
					?>
					<input type="radio"  value="INR" name="basecurencyapi" class="cca_hidden"/>
					<?php
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="INR"><?php esc_html_e( 'Indian Rupee(INR)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<label class="currency-switcher-switch">
			<?php
			if ( isset( $convertbtn ) ) {

				if ( '' !== $convertbtn ) {

					if ( isset( $cswp_inr_button ) ) {

						if ( 'INR' === $cswp_inr_button ) {
							echo '<label for="ForCurrencyButton">
	                 <input type="checkbox" checked name="currency_button_api[]" value="INR">
	                 INR &#8377;</label><br> ';
						} else {
							echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="INR">
	                 INR &#8377;</label><br> ';
						}
					} else {
						echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="INR">
	                 INR &#8377;</label><br> ';
					}
				} else {
					echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="INR">
	                 INR &#8377;</label><br> ';
				}
			}
			?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="apitext_inr" value="<?php echo esc_attr( $apitext_inr ); ?>" placeholder="<?php esc_html_e( 'Enter the INR value', 'cswp' ); ?>" readonly>
			</td>
			<td>
				<input type="text" name="inr-apitext"  value="<?php echo esc_attr( $cswp_api_inr_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $cswp_basecurency ) ) {
					if ( 'EUR' === $cswp_basecurency ) {
						?>
							<input type="radio"  value="EUR" name="basecurencyapi" class="cca_hidden" checked="checked"/>
						<?php
					} else {
						?>
						<input type="radio"  value="EUR" name="basecurencyapi" class="cca_hidden"/>
						<?php
					}
				} else {
					?>
					<input type="radio"  value="EUR" name="basecurencyapi" class="cca_hidden"/>
					<?php
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="EUO"><?php esc_html_e( 'European Union(EUR)', 'cswp' ); ?>
				</label>
			</td>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $convertbtn ) ) {

					if ( '' !== $convertbtn ) {

						if ( isset( $cswp_eur_button ) ) {

							if ( 'EUR' === $cswp_eur_button ) {
								echo '<label for="ForCurrencyButton">
	                 <input type="checkbox" checked name="currency_button_api[]" value="EUR">
	                 EUR &#8364;</label><br> ';
							} else {
								echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="EUR">
	                 EUR &#8364;</label><br> ';
							}
						} else {
							echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="EUR">
	                 EUR &#8364;</label><br> ';
						}
					} else {
						echo '<label for="ForCurrencyButton">
	                 <input type="checkbox"  name="currency_button_api[]" value="EUR">
	                 EUR &#8364;</label><br> ';
					}
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="apitext_eur"  value="<?php echo esc_attr( $apitext_eur ); ?>" placeholder="<?php esc_html_e( 'Enter the EURO value', 'cswp' ); ?>" readonly >
			</td>
			<td>
				<input type="text" name="eur-apitext"  value="<?php echo esc_attr( $cswp_api_eur_text ); ?>" placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $cswp_basecurency ) ) {
					if ( 'AUD' === $cswp_basecurency ) {
						?>
							<input type="radio"  value="AUD" name="basecurencyapi" class="cca_hidden" checked="checked"/>
						<?php
					} else {
						?>
						<input type="radio"  value="AUD" name="basecurencyapi" class="cca_hidden"/>
						<?php
					}
				} else {
					?>
					<input type="radio"  value="AUD" name="basecurencyapi" class="cca_hidden"/>
					<?php
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<label for="AUD"><?php esc_html_e( 'Australian Dollar(AUD)', 'cswp' ); ?>
			</td>
			<td>
				<label class="currency-switcher-switch">
				<?php
				if ( isset( $convertbtn ) ) {

					if ( '' !== $convertbtn ) {

						if ( isset( $cswp_aud_button ) ) {

							if ( 'AUD' === $cswp_aud_button ) {
								echo '<label for="ForCurrencyButton">
		                 <input type="checkbox" checked name="currency_button_api[]" value="AUD">
		                 AUD &#36;</label><br> ';
							} else {
								echo '<label for="ForCurrencyButton">
		                 <input type="checkbox"  name="currency_button_api[]" value="AUD">
		                 AUD &#36;</label><br> ';
							}
						} else {
							echo '<label for="ForCurrencyButton">
		                 <input type="checkbox"  name="currency_button_api[]" value="AUD">
		                 AUD &#36;</label><br> ';
						}
					} else {
						echo '<label for="ForCurrencyButton">
		                 <input type="checkbox"  name="currency_button_api[]" value="AUD">
		                 AUD &#36;</label><br> ';
					}
				}
				?>
					<span class="currency-switcher-slider round">
					</span>
				</label>
			</td>
			<td>
				<input type="text" name="apitext_aud"  value="<?php echo esc_attr( $apitext_aud ); ?>" placeholder="<?php esc_html_e( 'Enter the AUD value', 'cswp' ); ?>" readonly>
			</td>
			<td>
				<input type="text" name="aud-apitext"  value="<?php echo esc_attr( $cswp_api_aud_text ); ?>"placeholder="<?php esc_html_e( 'Enter Button Text', 'cswp' ); ?>" >
			</td>
		</tr>
	</table>

	<table class="form-table">
		<tr>
			<th>Display Type</th>
			<td>
				<select name="cswp_button_type" >
					?> 
					<?php

					if ( 'dropdown' === $cswp_button_type_value ) {
						?>
						<option value="dropdown" <?php selected( $cswp_button_type_value, 'dropdown' ); ?>>Drop Down</option>
						<?php
					} else {
						?>
						<option value="dropdown">Drop Down</option>
						<?php
					}
					if ( 'toggle' === $cswp_button_type_value ) {
						?>
						<option value="toggle" <?php selected( $cswp_button_type_value, 'toggle' ); ?>>Toggle</option>
						<?php
					} else {
						?>
						<option value="toggle" >Toggle</option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<th scope="row">
				<label for="DecimalPlaces"><?php esc_html_e( 'Decimal Places', 'cswp' ); ?></label>
			</th>
			<td>
				<?php

				if ( isset( $cswp_decimalpoint ) ) {
					
					if ( '' === $cswp_decimalpoint ) {
						?>
							<input type="radio"  value="0" name="decimal-radio" class="cca_hidden" checked="checked"/> ($27)
						<?php
					} else {
						?>
							<input type="radio"  value="0" name="decimal-radio" class="cca_hidden"/> ($27)
						<?php
					}
					if ( '1' === $cswp_decimalpoint ) {
						?>
							<input type="radio"  value="1" name="decimal-radio" class="cca_hidden" checked="checked"/> ($27.2)
						<?php
					} else {
						?>
							<input type="radio"  value="1" name="decimal-radio" class="cca_hidden"/> ($27.2)
						<?php
					}
					if ( '2' === $cswp_decimalpoint ) {
						?>
							<input type="radio"  value="2" name="decimal-radio" class="cca_hidden" checked="checked"/> ($27.27)
						<?php
					} else {
						?>
							<input type="radio"  value="2" name="decimal-radio" class="cca_hidden"/> ($27.27)
						<?php
					}
				} else {
					?>
						<input type="radio"  value="0" name="decimal-radio" class="cswp_decimal_radio" checked="checked"/> ($27)
						<input type="radio"  value="1" name="decimal-radio" class="cswp_decimal_radio"/> ($27.2)
						<input type="radio"  value="2" name="decimal-radio" class="cswp_decimal_radio"/> ($27.27)
					<?php
				}
				?>
			</td>
		</tr>
		<tr>
			<th>
				<?php
					wp_nonce_field( 'cs-form-nonce', 'cs-form' );
				?>
				<input type="submit" name="submit" value="<?php esc_html_e( 'Submit', 'cswp' ); ?>" class="bt button button-primary">
			</th>
		</tr>
	</table>
</form>
<?php
