<?php
/**
 * Class Short Button Doc Comment
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

if ( ! class_exists( 'CS_Btn_Shortcode' ) ) {

	/**
	 * Class for definr currency_Switcher_button shortcode.
	 *
	 * @class    CSWP_urrency_Shortcode
	 * @category PHP
	 * @package  Currency_Switcher
	 * @author   Display Name <ahemads@bsf.io>
	 * @license  https://brainstormforce.com
	 * @link     https://brainstormforce.com
	 */
	class CS_Btn_Shortcode {

		/**
		 * Instance
		 *
		 * @access private
		 * @var $instance
		 * @since 1.0.2
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.2
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			add_shortcode( 'currency-switch', array( $this, 'cswp_advance_currency_button' ) );
			add_action( 'wp_head', array( $this, 'cswp_styling_data' ) );

		}

		/**
		 * Get style data.
		 *
		 * @since  1.0.0
		 *  array of $cswp_font_size_disp.
		 */
		public function cswp_styling_data() {
			$cswp_get_form_value = get_option( 'cswp_style_form_data' );
			$cswp_icon           = $cswp_get_form_value['cswp_icon'];
			$cswp_iconx          = get_option( 'cswp_iconx' );
			$cswp_currency_array = $cswp_get_form_value['cswp_icon_array'];
			// echo '<pre>';var_dump($cswp_currency_array);wp_die();
				// var_dump($cswp_get_form_value); wp_die();
			//For Dropdown
			$cswp_dd_fs = ( ! empty( $cswp_get_form_value['cswp_dd_font_size'] ) ? $cswp_get_form_value['cswp_dd_font_size'] : 16 );
			$cswp_dd_bc = ( ! empty( $cswp_get_form_value['cswp_dd_background_color'] ) ? $cswp_get_form_value['cswp_dd_background_color'] : 'inherit' );
			$cswp_dd_tc = ( ! empty( $cswp_get_form_value['cswp_dd_text_color'] ) ? $cswp_get_form_value['cswp_dd_text_color'] : 'inherit' );
			$cswp_dd_pt = ( ! empty( $cswp_get_form_value['cswp_dd_padding_top'] ) ? $cswp_get_form_value['cswp_dd_padding_top'] : 'inherit' );
			$cswp_dd_pr = ( ! empty( $cswp_get_form_value['cswp_dd_padding_right'] ) ? $cswp_get_form_value['cswp_dd_padding_right'] : 'inherit' );
			$cswp_dd_pl = ( ! empty( $cswp_get_form_value['cswp_dd_padding_left'] ) ? $cswp_get_form_value['cswp_dd_padding_left'] : 'inherit' );
			$cswp_dd_pb = ( ! empty( $cswp_get_form_value['cswp_dd_padding_bottom'] ) ? $cswp_get_form_value['cswp_dd_padding_bottom'] : 'inherit' );
			$cswp_dd_pu = ( ! empty( $cswp_get_form_value['cswp_dd_padding_unit'] ) ? $cswp_get_form_value['cswp_dd_padding_unit'] : 'inherit' );

			//For Toggle
			$cswp_tgl_fs = ( ! empty( $cswp_get_form_value['cswp_tgl_font_size'] ) ? $cswp_get_form_value['cswp_tgl_font_size'] : 'inherit' );
			$cswp_tgl_bc = ( ! empty( $cswp_get_form_value['cswp_tgl_background_color'] ) ? $cswp_get_form_value['cswp_tgl_background_color'] : '' );
			$cswp_tgl_tc = ( ! empty( $cswp_get_form_value['cswp_tgl_text_color'] ) ? $cswp_get_form_value['cswp_tgl_text_color'] : '' );
			$cswp_tgl_pt = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_top'] ) ? $cswp_get_form_value['cswp_tgl_padding_top'] : 0.76 );
			$cswp_tgl_pr = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_right'] ) ? $cswp_get_form_value['cswp_tgl_padding_right'] : 0.76 );
			$cswp_tgl_pl = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_left'] ) ? $cswp_get_form_value['cswp_tgl_padding_left'] : 0.76);
			$cswp_tgl_pb = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_bottom'] ) ? $cswp_get_form_value['cswp_tgl_padding_bottom'] : 0.76 );
			$cswp_tgl_pu = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_unit'] ) ? $cswp_get_form_value['cswp_tgl_padding_unit'] : 'rem' );
			$cswp_tgl_fw = ( ! empty( $cswp_get_form_value['cswp_tgl_font_weight'] ) ? $cswp_get_form_value['cswp_tgl_font_weight'] : '700' );
			$cswp_tgl_br = ( ! empty( $cswp_get_form_value['cswp_tgl_border_radius'] ) ? $cswp_get_form_value['cswp_tgl_border_radius'] : 5 );
			$cswp_tgl_bw = ( ! empty( $cswp_get_form_value['cswp_tgl_border_width'] ) ? $cswp_get_form_value['cswp_tgl_border_width'] : 2 );
			$cswp_tgl_bs = ( ! empty( $cswp_get_form_value['cswp_tgl_border_style'] ) ? $cswp_get_form_value['cswp_tgl_border_style'] : 'inherit' );
			$cswp_tgl_bu = ( ! empty( $cswp_get_form_value['cswp_tgl_border_unit'] ) ? $cswp_get_form_value['cswp_tgl_border_unit'] : 'px' );
			$cswp_tgl_borderc = ( ! empty( $cswp_get_form_value['cswp_tgl_border_color'] ) ? $cswp_get_form_value['cswp_tgl_border_color'] : 'buttonface' );
			$cswp_tgl_text_hover_color = ( ! empty( $cswp_get_form_value['cswp_tgl_text_hover_color'] ) ? $cswp_get_form_value['cswp_tgl_text_hover_color'] : '' );
			$cswp_tgl_background_hover_color = ( ! empty( $cswp_get_form_value['cswp_tgl_hover_color'] ) ? $cswp_get_form_value['cswp_tgl_hover_color'] : '' );
			// var_dump($cswp_get_form_value['cswp_tgl_text_hover_color']);
			// wp_die();

			//For Button
			$cswp_btn_fs = ( ! empty( $cswp_get_form_value['cswp_font_size'] ) ? $cswp_get_form_value['cswp_font_size'] : 16 );
			$cswp_btn_bc = ( ! empty( $cswp_get_form_value['cswp_background_color'] ) ? $cswp_get_form_value['cswp_background_color'] : '' );
			$cswp_btn_tc = ( ! empty( $cswp_get_form_value['cswp_text_color'] ) ? $cswp_get_form_value['cswp_text_color'] : '' );
			$cswp_btn_pt = ( ! empty( $cswp_get_form_value['cswp_padding_top'] ) ? $cswp_get_form_value['cswp_padding_top'] : 0.76 );
			$cswp_btn_pr = ( ! empty( $cswp_get_form_value['cswp_padding_right'] ) ? $cswp_get_form_value['cswp_padding_right'] : 0.76 );
			$cswp_btn_pl = ( ! empty( $cswp_get_form_value['cswp_padding_left'] ) ? $cswp_get_form_value['cswp_padding_left'] : 0.76);
			$cswp_btn_pb = ( ! empty( $cswp_get_form_value['cswp_padding_bottom'] ) ? $cswp_get_form_value['cswp_padding_bottom'] : 0.76 );
			$cswp_btn_pu = ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'inherit' );
			$cswp_btn_fw = ( ! empty( $cswp_get_form_value['cswp_font_weight'] ) ? $cswp_get_form_value['cswp_font_weight'] : 'inherit' );
			$cswp_btn_br = ( ! empty( $cswp_get_form_value['cswp_border_radius'] ) ? $cswp_get_form_value['cswp_border_radius'] : 0 );
			$cswp_btn_bw = ( ! empty( $cswp_get_form_value['cswp_border_width'] ) ? $cswp_get_form_value['cswp_border_width'] : 2 );
			$cswp_btn_bs = ( ! empty( $cswp_get_form_value['cswp_border_style'] ) ? $cswp_get_form_value['cswp_border_style'] : 'none' );
			$cswp_btn_bu = ( ! empty( $cswp_get_form_value['cswp_border_unit'] ) ? $cswp_get_form_value['cswp_border_unit'] : 'px' );
			$cswp_btn_borderc = ( ! empty( $cswp_get_form_value['cswp_border_color'] ) ? $cswp_get_form_value['cswp_border_color'] : 'buttonface' );
			$cswp_btn_text_hover_color = ( ! empty( $cswp_get_form_value['cswp_text_hover_color'] ) ? $cswp_get_form_value['cswp_text_hover_color'] : '' );
			$cswp_btn_background_hover_color = ( ! empty( $cswp_get_form_value['cswp_hover_color'] ) ? $cswp_get_form_value['cswp_hover_color'] : '' );
			$cswp_btn_active_background_color = ( ! empty( $cswp_get_form_value['cswp_active_button_background_color'] ) ? $cswp_get_form_value['cswp_active_button_background_color'] : '' );
			if ( 'inherit' !== $cswp_btn_text_hover_color && 'inherit' !== $cswp_btn_active_background_color ){
				$important = '!important';
			}else if ( 'inherit' !== $cswp_btn_active_background_color ){
				$important = '!important';
			}else if ( 'inherit' !== $cswp_btn_text_hover_color ){
				$important = '!important';
			}
			else{
				$important = '';
			}
			$cswp_btn_icon_align = ( ! empty( $cswp_get_form_value['cswp_icon_align'] ) ? $cswp_get_form_value['cswp_icon_align'] : 'left' ); 
			$cswp_btn_icon_width = ( ! empty( $cswp_get_form_value['cswp_icon_width'] ) ? $cswp_get_form_value['cswp_icon_width'] : 30 );
			$cswp_btn_icon_height = ( ! empty( $cswp_get_form_value['cswp_icon_height'] ) ? $cswp_get_form_value['cswp_icon_height'] : 30 );
			$cswp_btn_valign = ( ! empty( $cswp_get_form_value['cswp_vertical_align'] ) ? $cswp_get_form_value['cswp_vertical_align'] : 'none' );

			?>
			<!-- Style For Dropdown -->
			<style type="text/css">

			.cs-currency-buttons .cs-currency-name-dropdown {
				font-size: <?php echo $cswp_dd_fs; ?>px;

				background: <?php echo $cswp_dd_bc; ?>;

				color: <?php echo $cswp_dd_tc; ?>;

				padding-top: 
				<?php
				echo $cswp_dd_pt;
				echo $cswp_dd_pu;
				?>
				;

				padding-right: 
						<?php
						echo $cswp_dd_pr;
						echo $cswp_dd_pu;
						?>
				;

				padding-bottom: 
						<?php
						echo $cswp_dd_pb;
						echo $cswp_dd_pu;
						?>
				;

				padding-left: 
						<?php
						echo $cswp_dd_pl;
						echo $cswp_dd_pu;
						?>
				;

			}

			 .cs-currency-buttons .cs-currency-name:hover{
					color:<?php echo $cswp_tgl_text_hover_color; ?>!important;
					background-color:<?php echo $cswp_tgl_background_hover_color; ?>!important;
				}
				<!-- Style For Toggle .cs-currency-name--> 
				<!-- .cs-currency-buttons .cs-currency-name {
				    color:red !important;
				} -->
				button.cs-currency-name {
   					font-weight: <?php echo $cswp_tgl_fw; ?>;

				background: <?php echo $cswp_tgl_bc; ?>;

				color: <?php echo $cswp_tgl_tc; ?>;

				padding-top: 
				<?php
				echo $cswp_tgl_pt;
				echo $cswp_tgl_pu;
				?>
				;

				padding-right: 
						<?php
						echo $cswp_tgl_pr;
						echo $cswp_tgl_pu;
						?>
				;

				padding-bottom: 
						<?php
						echo $cswp_tgl_pb;
						echo $cswp_tgl_pu;
						?>
				;

				padding-left: 
						<?php
						echo $cswp_tgl_pl;
						echo $cswp_tgl_pu;
						?>
				;

				border-radius:
					<?php
						echo $cswp_tgl_br;

					?>px;
				;

				border:
					<?php
						echo $cswp_tgl_bw;
						echo $cswp_tgl_bu;

						echo ' ';
						echo $cswp_tgl_bs;
						echo ' ';
						echo $cswp_tgl_borderc;

					?>
				;
				}
			
			
			<!-- Style For Button -->
			 <!-- .cswp_button_change .cs-currency-name-btn:hover{
			 color:<?php //echo $cswp_tgl_text_hover_color; ?>; 

			 background-color:<?php //echo $cswp_btn_background_hover_color; ?>;
			}  --> 
			<!-- .cswp_button_change .cs-currency-name-btn:hover{
			
		} -->
		.cs-currency-name-btn.cswpactive:hover{
		background-color:<?php echo $cswp_btn_background_hover_color; ?>;
		color:<?php echo $cswp_btn_text_hover_color; ?>;
		} 

			.cs-currency-name-btn.cswpactive{

					background:<?php echo $cswp_btn_active_background_color; ?>;
					color:<?php echo $cswp_btn_text_hover_color; ?>;
				}

			span.cs-currency-icon{
			float:<?php echo $cswp_btn_icon_align; ?>;

			width:<?php echo $cswp_btn_icon_width; ?>px;


			height:<?php echo $cswp_btn_icon_height; ?>px;

			content:"";

			background-size:cover;

			background-repeat:no-repeat;
			}

			#cstoggletoEUR span.cs-currency-icon{
			vertical-align: <?php echo $cswp_btn_valign; ?>;
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['EUR'] ) ? $cswp_currency_array['EUR'] : '' ); ?>);
			}

			#cstoggletoAUD span.cs-currency-icon{
			vertical-align: <?php echo $cswp_btn_valign; ?>;
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['AUD'] ) ? $cswp_currency_array['AUD'] : '' ); ?>);
			}

			#cstoggletoINR span.cs-currency-icon{
			vertical-align: <?php echo $cswp_btn_valign; ?>;
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['INR'] ) ? $cswp_currency_array['INR'] : '' ); ?>);
			}

			#cstoggletoUSD span.cs-currency-icon{
			vertical-align: <?php echo $cswp_btn_valign; ?>;
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['USD'] ) ? $cswp_currency_array['USD'] : '' ); ?>);
			}

			.cswp_button_change .cs-currency-name-btn {

				font-size: <?php echo $cswp_btn_fs; ?>px;			

				font-weight: <?php echo $cswp_btn_fw; ?>;

				background-color: <?php echo $cswp_btn_bc; ?>;

				color: <?php echo $cswp_btn_tc; ?>;

				padding-top: 
				<?php
				echo $cswp_btn_pt;
				echo $cswp_btn_pu;
				?>
				;

				padding-right: 
						<?php
						echo $cswp_btn_pr;
						echo $cswp_btn_pu;
						?>
				;

				padding-bottom: 
						<?php
						echo $cswp_btn_pb;
						echo $cswp_btn_pu;
						?>
				;

				padding-left: 
						<?php
						echo $cswp_btn_pl;
						echo $cswp_btn_pu;
						?>
				;

				border-radius:
					<?php
						echo $cswp_btn_br;
					?>px;
				;

				border:
					<?php
						echo $cswp_btn_bw;
						echo $cswp_btn_bu;

						echo ' ';
						echo $cswp_btn_bs;
						echo ' ';
						echo $cswp_btn_borderc;

					?>
				;
		}
		}											
			<?php

		}

		/**
		 * Define Currency_Converter_Addon_button.
		 *
		 * @since  1.0.0
		 * @return ob_get_clean().
		 */
		public function cswp_advance_currency_button() {
			$cswp_get_form_value = get_option( 'cswp_style_form_data' );
			$cswp_currency_array = $cswp_get_form_value['cswp_icon_array'];

			ob_start();
			wp_enqueue_style( 'cswp-style' );
			wp_enqueue_script( 'cswp-script' );

			$base_value_select                   = CS_Loader::cswp_load_all_data();
							$manual_usd_btn_text = isset( $base_value_select['usd-text'] ) ? $base_value_select['usd-text'] : '';
							$manual_inr_btn_text = isset( $base_value_select['inr-text'] ) ? $base_value_select['inr-text'] : '';
							$manual_eur_btn_text = isset( $base_value_select['eur-text'] ) ? $base_value_select['eur-text'] : '';
							$manual_aud_btn_text = isset( $base_value_select['aud-text'] ) ? $base_value_select['aud-text'] : '';

							$manual_button_text_value = array(
								$manual_usd_btn_text,
								$manual_inr_btn_text,
								$manual_eur_btn_text,
								$manual_aud_btn_text,
							);

							$currencybtn      = CS_Loader::cswp_load_currency_button_data();
							$currencydropdown = CS_Loader::cswp_load_currency_button_data();
							if ( ! empty( $currencybtn ) ) {
								foreach ( $currencybtn as $cswp_base_value ) {
									if ( $cswp_base_value === $base_value_select['basecurency'] ) {
										continue;
									}
									$curbtn[] = $cswp_base_value;
								}
								if ( ! empty( $curbtn ) && is_array( $curbtn ) ) {
									array_push( $curbtn, $base_value_select['basecurency'] );
									$currencybtn = array_combine( $curbtn, $curbtn );
								}
							}
							?>
			<div class="cs-currency-buttons">
			<?php
			if ( 'toggle' === $base_value_select['cswp_button_type'] ) {
				if ( is_array( $currencybtn ) ) {

					foreach ( $currencybtn as $currencyname ) {

						$currency_symbol = $this->get_currency_symbol( $currencyname );
						?>
						<button class="cs-currency-name" id="cstoggleto<?php echo esc_attr( $currencyname ); ?>"
						data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>" style="display: none;"> 
														<?php
														if ( 'USD' === $currencyname ) {
															echo trim( $manual_button_text_value[0] );
														} elseif ( 'INR' === $currencyname ) {
															echo trim( $manual_button_text_value[1] );
														} elseif ( 'EUR' === $currencyname ) {
															echo trim( $manual_button_text_value[2] );
														} elseif ( 'AUD' === $currencyname ) {
															echo trim( $manual_button_text_value[3] );
														}
														?>
						</button>
						<?php
					}
				}
			} elseif ( 'dropdown' === $base_value_select['cswp_button_type'] ) {

				if ( ! empty( $currencydropdown ) ) {
					foreach ( $currencydropdown as $cswp_base_value ) {
						if ( $cswp_base_value === $base_value_select['basecurency'] ) {
							continue;
						}
						$curbtn[] = $cswp_base_value;
					}
					if ( ! empty( $curbtn ) && is_array( $curbtn ) ) {
						array_unshift( $curbtn, $base_value_select['basecurency'] );
						$currencydropdown = array_combine( $curbtn, $curbtn );
					}
				}

				if ( is_array( $currencydropdown ) ) {
					$currencyname    = '';
					$currency_symbol = '';
					?>
					<select class="cs-currency-name-dropdown">
						<?php

						foreach ( $currencydropdown as $currencyname ) {

							$currency_symbol = $this->get_currency_symbol( $currencyname );
							$selected        = '';
							$currency_value  = '';
							if ( $currencyname === $base_value_select['basecurency'] ) {
								$selected = 'selected';
							}
							if ( 'USD' === $currencyname ) {
								$currency_value = $manual_button_text_value[0];
							} elseif ( 'INR' === $currencyname ) {
								$currency_value = $manual_button_text_value[1];
							} elseif ( 'EUR' === $currencyname ) {
								$currency_value = $manual_button_text_value[2];
							} elseif ( 'AUD' === $currencyname ) {
								$currency_value = $manual_button_text_value[3];
							}
							?>
							<option value="<?php echo esc_attr( $currencyname ); ?>" data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>"
								value="<?php echo esc_attr( $currencyname ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo $currency_value; ?></option>
							<?php } ?>
						</select>
					<?php
				}
			} elseif ( 'button' === $base_value_select['cswp_button_type'] ) {

				if ( is_array( $currencybtn ) ) {
					echo '<div class="cswp_button_change">';
					foreach ( $currencybtn as $currencyname ) {

						$currency_symbol = $this->get_currency_symbol( $currencyname );
						?>
						<button class="cs-currency-name-btn 
						<?php
						if ( $base_value_select['basecurency'] === $currencyname ) {
							echo 'cswpactive'; }
						?>
						" id="cstoggleto<?php echo esc_attr( $currencyname ); ?>"
						data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>"> 
														<?php
														if ( 'USD' === $currencyname ) {
															echo trim( $manual_button_text_value[0] );
														} elseif ( 'INR' === $currencyname ) {
															echo trim( $manual_button_text_value[1] );
														} elseif ( 'EUR' === $currencyname ) {
															echo trim( $manual_button_text_value[2] );
														} elseif ( 'AUD' === $currencyname ) {
															echo trim( $manual_button_text_value[3] );
														}
														?>
														<?php if ( empty( $cswp_currency_array['USD'] ) && empty( $cswp_currency_array['INR'] ) && empty( $cswp_currency_array['EUR'] ) && empty( $cswp_currency_array['AUD'] ) ) {?>
														<span class="cs-currency-icon" style="display: none;"></span>
													<?php }else{?>
														<span class="cs-currency-icon"></span>
													<?php } ?>
						</button>
						<?php
					}
					echo '</div>';
				}
			}
			?>
			</div>
			<?php

			return ob_get_clean();
		}

		/**
		 * Get_currency_symbol.
		 *
		 * @since  1.0.0
		 * @param string $currency The text to be formatted.
		 * @return ''.
		 */
		public function get_currency_symbol( $currency ) {
			$currenceis = $this->get_currenceis();

			if ( array_key_exists( $currency, $currenceis ) ) {
				return $currenceis[ $currency ];
			}

			return '';
		}

		/**
		 * Get_currenceis.
		 *
		 * @since  1.0.0
		 */
		public function get_currenceis() {
			return array(
				'INR' => '&#8377;',
				'USD' => '&#36;',
				'AUD' => '&#36;',
				'EUR' => '&#8364;',
			);
		}

	}

	CS_Btn_Shortcode::get_instance();
}
