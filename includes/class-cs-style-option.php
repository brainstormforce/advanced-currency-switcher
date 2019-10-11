<?php
/**
 * Setting Style Option.
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

if ( ! class_exists( 'CS_Style_Option' ) ) {

	/**
	 * Class define for Style.
	 *
	 * @class    CS_Style_Option
	 * @category PHP
	 * @package  Currency_Switcher
	 * @license  https://brainstormforce.com
	 * @link     https://brainstormforce.com
	 */
	class CS_Style_Option {

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
			$this->cswp_style_data();
			// Store form inputs values in variable.
			wp_enqueue_script( 'cswp-color-picker' );
			wp_enqueue_script( 'cswp-hide-image-upload' );
			wp_register_style( 'cswp-style-option', CSWP_PLUGIN_URL . '/assets/css/cswp-style-option.css', CSWP_CURRENCY_SWITCHER_VER, true );
			wp_enqueue_style( 'cswp-style-option', CSWP_PLUGIN_URL . '/assets/css/cs-styles.css', '', CSWP_CURRENCY_SWITCHER_VER );
		}

		/**
		 * Check Empty or Not.
		 *
		 * @param array  $array   Array from which the property's value should be retrieved.
		 * @param string $prop    Name of the property to be retrieved.
		 * @param string $default Optional.
		 * @since 1.0.2
		 * @return array of object if not empty.
		 */
		public function cswp_get_prop( $array, $prop, $default = null ) {

			return ( ! empty( $array[ $prop ] ) ? $array[ $prop ] : $default );
		}

		/**
		 * Style settings.
		 *
		 * @since 1.0.2
		 */
		public function cswp_style_data() {
			// Dropdown Button.
			$cswp_get_form_value = get_option( 'cswp_style_form_data' );

			$cswp_dd_fontsize_unit = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_fontsize_unit', 'px' );
			$cswp_dd_fs            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_font_size', 'inherit' );
			$cswp_dd_bc            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_background_color', '' );
			$cswp_dd_tc            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_text_color', '' );
			$cswp_dd_pt            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_padding_top', '' );
			$cswp_dd_pr            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_padding_right', '' );
			$cswp_dd_pl            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_padding_left', '' );
			$cswp_dd_pb            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_padding_bottom', '' );
			$cswp_dd_pu            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_dd_padding_unit', 'rem' );

			// Symbol.
			$cswp_symbol_fontsize_unit = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_fontsize_unit', 'px' );
			$cswp_symbol_fs            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_font_size', 'inherit' );
			$cswp_symbol_bc            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_background_color', '' );
			$cswp_symbol_tc            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_text_color', '' );
			$cswp_symbol_pt            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_padding_top', '' );
			$cswp_symbol_pr            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_padding_right', '' );
			$cswp_symbol_pl            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_padding_left', '' );
			$cswp_symbol_pb            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_padding_bottom', '' );
			$cswp_symbol_pu            = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_symbol_padding_unit', 'rem' );

			// For Toggle.
			$cswp_tgl_fs               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_font_size', 'inherit' );
			$cswp_tgl_fontsize_unit    = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_fontsize_unit', '' );
			$cswp_tgl_bc               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_background_color', '' );
			$cswp_tgl_tc               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_text_color', '' );
			$cswp_tgl_pt               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_padding_top', '' );
			$cswp_tgl_pr               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_padding_right', '' );
			$cswp_tgl_pl               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_padding_left', '' );
			$cswp_tgl_pb               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_padding_bottom', '' );
			$cswp_tgl_pu               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_padding_unit', 'rem' );
			$cswp_tgl_fw               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_font_weight', 'inherit' );
			$cswp_tgl_br               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_border_radius', '' );
			$cswp_tgl_bw               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_border_width', '' );
			$cswp_tgl_bs               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_border_style', 'inherit' );
			$cswp_tgl_bu               = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_border_unit', 'px' );
			$cswp_tgl_borderc          = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_border_color', '' );
			$cswp_tgl_text_hover_color = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_text_hover_color', '' );
			$cswp_tgl_hover_color      = $this->cswp_get_prop( $cswp_get_form_value, 'cswp_tgl_hover_color', '' );

			$cswp_value = get_option( 'cswp_style_form_data' );

			$cswp_button = get_option( 'cswp_currency_button_type' );

			$cswp_alignment                      = $this->cswp_get_prop( $cswp_value, 'cswp_alignment', '' );
			$cswp_font_size                      = $this->cswp_get_prop( $cswp_value, 'cswp_font_size', '' );
			$cswp_fontsize_unit                  = $this->cswp_get_prop( $cswp_value, 'cswp_fontsize_unit', 'px' );
			$cswp_icon_width                     = $this->cswp_get_prop( $cswp_value, 'cswp_icon_width', '' );
			$cswp_icon_height                    = $this->cswp_get_prop( $cswp_value, 'cswp_icon_height', '' );
			$cswp_hover_color                    = $this->cswp_get_prop( $cswp_value, 'cswp_hover_color', '' );
			$cswp_text_hover_color               = $this->cswp_get_prop( $cswp_value, 'cswp_text_hover_color', '' );
			$cswp_font_weight                    = $this->cswp_get_prop( $cswp_value, 'cswp_font_weight', 'inherit' );
			$cswp_text_color                     = $this->cswp_get_prop( $cswp_value, 'cswp_text_color', '' );
			$cswp_background_color               = $this->cswp_get_prop( $cswp_value, 'cswp_active_button_background_color', '' );
			$cswp_active_button_background_color = $this->cswp_get_prop( $cswp_value, 'cswp_background_color', '' );
			$cswp_padding_top                    = $this->cswp_get_prop( $cswp_value, 'cswp_padding_top', '' );
			$cswp_padding_right                  = $this->cswp_get_prop( $cswp_value, 'cswp_padding_right', '' );
			$cswp_padding_bottom                 = $this->cswp_get_prop( $cswp_value, 'cswp_padding_bottom', '' );
			$cswp_padding_left                   = $this->cswp_get_prop( $cswp_value, 'cswp_padding_left', '' );
			$cswp_spacing_top                    = $this->cswp_get_prop( $cswp_value, 'cswp_spacing_top', '' );
			$cswp_spacing_right                  = $this->cswp_get_prop( $cswp_value, 'cswp_spacing_right', '' );

			$cswp_spacing_bottom = $this->cswp_get_prop( $cswp_value, 'cswp_spacing_bottom', '' );
			$cswp_spacing_left   = $this->cswp_get_prop( $cswp_value, 'cswp_spacing_left', '' );
			$cswp_spacing_unit   = $this->cswp_get_prop( $cswp_value, 'cswp_spacing_unit', 'px' );
			$cswp_padding_unit   = $this->cswp_get_prop( $cswp_value, 'cswp_padding_unit', 'rem' );
			$cswp_border_radius  = $this->cswp_get_prop( $cswp_value, 'cswp_border_radius', '' );
			$cswp_border_width   = $this->cswp_get_prop( $cswp_value, 'cswp_border_width', '' );
			$cswp_border_style   = $this->cswp_get_prop( $cswp_value, 'cswp_border_style', 'none' );
			$cswp_border_color   = $this->cswp_get_prop( $cswp_value, 'cswp_border_color', 'inherit' );
			$cswp_border_unit    = $this->cswp_get_prop( $cswp_value, 'cswp_border_unit', 'px' );
			$cswp_icon_align     = $this->cswp_get_prop( $cswp_value, 'cswp_icon_align', 'left' );
			$cswp_icon           = $this->cswp_get_prop( $cswp_value, 'cswp_icon', 'emptyimg.jpg' );

			$cswp_button_hide = get_option( 'cswp_form_data' );

			if ( 'button' === $cswp_button_hide['cswp_button_type'] ) {
			$cswp_button_css   = 'class=cswp-block-css';
			$cswp_symbol_css   = 'class=cswp-none-css';
			$cswp_toggle_css   = 'class=cswp-none-css';
			$cswp_dropdown_css = 'class=cswp-none-css';
		} elseif ( 'toggle' === $cswp_button_hide['cswp_button_type'] ) {
			$cswp_toggle_css   = 'class=cswp-block-css';
			$cswp_symbol_css   = 'class=cswp-none-css';
			$cswp_button_css   = 'class=cswp-none-css';
			$cswp_dropdown_css = 'class=cswp-none-css';
		} elseif ( 'dropdown' === $cswp_button_hide['cswp_button_type'] ) {
			$cswp_dropdown_css = 'class=cswp-block-css';
			$cswp_symbol_css   = 'class=cswp-none-css';
			$cswp_toggle_css   = 'class=cswp-none-css';
			$cswp_button_css   = 'class=cswp-none-css';
		} elseif ( 'symbol' === $cswp_button_hide['cswp_button_type'] ) {
			$cswp_symbol_css   = 'class=cswp-block-css';
			$cswp_dropdown_css = 'class=cswp-none-css';
			$cswp_toggle_css   = 'class=cswp-none-css';
			$cswp_button_css   = 'class=cswp-none-css';
		} else {
			$cswp_dropdown_css = 'class=cswp-block-css';
			$cswp_symbol_css   = 'class=cswp-none-css';
			$cswp_toggle_css   = 'class=cswp-none-css';
			$cswp_button_css   = 'class=cswp-none-css';
		}

			$currencybtn       = CS_Loader::cswp_load_currency_button_data();
			$base_value_select = CS_Loader::cswp_load_all_data();

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
	<!-- Html code for frontend -->
	<form method="post" name="cca_settings_form">
		<table class="form-table" >
		<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWP"> <?php esc_attr_e( 'Overall Alignment', 'advanced-currency-switcher' ); ?></label></code>
				</td>
		</tr>
		<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPOverAlign"><?php esc_attr_e( 'Alignment', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<select name="cswp_alignment">
					<?php
					echo "
					<option value='left' " . selected( $cswp_alignment, 'left', false ) . ">Left</option>
					<option value='center' " . selected( $cswp_alignment, 'center', false ) . ">Center</option>
					<option value='right' " . selected( $cswp_alignment, 'right', false ) . '>Right</option>         
					';
					?>
				</select>
				<p class="description">
					<?php esc_attr_e( 'by default alignment is left.', 'advanced-currency-switcher' ); ?>
				</p> 
				</td>
		</tr>
		</table>

	<div <?php echo $cswp_dropdown_css; ?> id="cswp_hide_upload" >
		<table class="form-table" >
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPDropdown"> <?php esc_attr_e( 'Dropdown', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontSize"><?php esc_attr_e( 'Font Size', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
					<?php
					echo '<input type="number" name="cswp_dd_font_size" min="0" class="small-text" value="' . esc_attr( $cswp_dd_fs ) . '"  >&nbsp';
					?>
				<select name="cswp_dd_fontsize_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_dd_fontsize_unit, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_dd_fontsize_unit, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_dd_fontsize_unit, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPTextColor"> <?php esc_attr_e( 'Text Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
					<?php
					if ( isset( $cswp_dd_tc ) ) {

						echo '<input name="cswp_dd_text_color" class="my-color-field" value="' . esc_attr( $cswp_dd_tc ) . '">';
					} else {
						?>
				<input name="cswp_dd_text_color" class="my-color-field" value="#333333">
						<?php
					}
					?>
				</td>
			</tr>
			<tr>
				<th class="cswp_table_row" scope="row"> 
					<label for="CSWPBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<div id="cswp_rt_bg">';
				if ( isset( $cswp_dd_bc ) ) {

					echo '<input  name="cswp_dd_background_color" class="my-color-field" value="' . esc_attr( $cswp_dd_bc ) . '">';
				} else {
					?>
				<input  name="cswp_dd_background_color" class="my-color-field" value="#eeeeee">
					<?php
				}
				echo '</div>';
				?>
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPpadding"><?php esc_attr_e( 'Padding', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_top" class="small-text" value="' . esc_attr( $cswp_dd_pt ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_right" class="small-text" value="' . esc_attr( $cswp_dd_pr ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_bottom" class="small-text" value="' . esc_attr( $cswp_dd_pb ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_left" class="small-text" value="' . esc_attr( $cswp_dd_pl ) . '" >';
					?>
				<select name="cswp_dd_padding_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_dd_pu, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_dd_pu, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_dd_pu, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description cswp-label-style">
					<label class="cswp-top">TOP</label>
					<label class="cswp-right">RIGHT</label>
					<label class="cswp-bottom">BOTTOM</label>
					<label class="cswp-left">LEFT</label>                  
				</p> 
				</td> 
			</tr>
		</table>
	</div>
	<div <?php echo $cswp_toggle_css; ?> id="cswp_hide_upload"  >
	<table class="form-table" >
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPToggle"> <?php esc_attr_e( 'Toggle', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontSize"><?php esc_attr_e( 'Font Size', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
					<?php
					echo '<input type="number" name="cswp_tgl_font_size" min="0" class="small-text" value="' . esc_attr( $cswp_tgl_fs ) . '"  >&nbsp';
					?>
				<select name="cswp_tgl_fontsize_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_tgl_fontsize_unit, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_tgl_fontsize_unit, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_tgl_fontsize_unit, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontWeight"><?php esc_attr_e( 'Font Weight', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
					<?php
					echo '<input type="number" name="cswp_tgl_font_weight" max="900" min="100" class="small-text" value="' . esc_attr( $cswp_tgl_fw ) . '"  >&nbsp';
					?>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPpadding"><?php esc_attr_e( 'Padding', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_top" class="small-text" value="' . esc_attr( $cswp_tgl_pt ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_right" class="small-text" value="' . esc_attr( $cswp_tgl_pr ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_bottom" class="small-text" value="' . esc_attr( $cswp_tgl_pb ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_left" class="small-text" value="' . esc_attr( $cswp_tgl_pl ) . '" >';
					?>
				<select name="cswp_tgl_padding_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_tgl_pu, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_tgl_pu, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_tgl_pu, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description cswp-label-style">
					<label class="cswp-top">TOP</label>
					<label class="cswp-right">RIGHT</label>
					<label class="cswp-bottom">BOTTOM</label>
					<label class="cswp-left">LEFT</label>                  
				</p> 
				</td> 
			</tr>
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPToggle"> <?php esc_attr_e( 'Border', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPBorder"><?php esc_attr_e( 'Style', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td class="cswp_table_td">
					<select name="cswp_tgl_border_style">
					<?php
					echo "
					<option value='none' " . selected( $cswp_tgl_bs, 'none', false ) . ">None</option>
					<option value='solid' " . selected( $cswp_tgl_bs, 'solid', false ) . ">Solid</option>
					<option value='double' " . selected( $cswp_tgl_bs, 'double', false ) . '>Double</option>         
					';
					?>
					</select>
					<p class="description">
					<?php esc_attr_e( 'by default style is one.', 'advanced-currency-switcher' ); ?>
					</p>
				</td> 
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPBorder"><?php esc_attr_e( 'Width', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input step="any" id="cswp_border" type="number" name="cswp_tgl_border_width" class="small-text" min="0" value="' . esc_attr( $cswp_tgl_bw ) . '" >';
					?>
					<select name="cswp_tgl_border_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_tgl_bu, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_tgl_bu, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_tgl_bu, 'rem', false ) . '>rem</option>         
					';
					?>
					</select>
					<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
					</p>
			</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontSize"><?php esc_attr_e( 'Radius', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
					<?php
					echo '<input type="number" name="cswp_tgl_border_radius" min="0" class="small-text" value="' . esc_attr( $cswp_tgl_br ) . '"  >&nbsp px';
					?>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPBorder"><?php esc_attr_e( 'Color', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input  name="cswp_tgl_border_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_borderc ) . '" >';
					?>
			</td>
			</tr>
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPToggle"> <?php esc_attr_e( 'Colors', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPTextColor"> <?php esc_attr_e( 'Text Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
					<?php
					if ( isset( $cswp_tgl_tc ) ) {

						echo '<input name="cswp_tgl_text_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_tc ) . '">';
					} else {
						?>
				<input name="cswp_tgl_text_color" class="my-color-field" value="#333333">
						<?php
					}
					?>

				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPColor"> <?php esc_attr_e( 'Text Hover Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
				<?php
				if ( isset( $cswp_tgl_text_hover_color ) ) {

					echo '<input name="cswp_tgl_text_hover_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_text_hover_color ) . '">';
				} else {
					?>
				<input name="cswp_tgl_text_hover_color" class="my-color-field" value="#333333">
					<?php
				}
				?>
				</td>
			</tr>
			<tr>
				<th class="cswp_table_row" scope="row"> 
					<label for="CSWPBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<div id="cswp_rt_bg">';
				if ( isset( $cswp_tgl_bc ) ) {

					echo '<input  name="cswp_tgl_background_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_bc ) . '">';
				} else {
					?>
				<input  name="cswp_tgl_background_color" class="my-color-field" value="#eeeeee">
					<?php
				}
				echo '</div>';
				?>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPColor"> <?php esc_attr_e( 'Background Hover Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
				<?php
				if ( isset( $cswp_tgl_hover_color ) ) {

					echo '<input name="cswp_tgl_hover_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_hover_color ) . '">';
				} else {
					?>
				<input name="cswp_tgl_hover_color" class="my-color-field" value="#333333">
					<?php
				}
				?>
				</td>
			</tr>
		</table>
		<br><br>
	</div>
		<div <?php echo $cswp_button_css; ?> id="cswp_hide_upload" >
		<table class="form-table">
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWP"> <?php esc_attr_e( 'Button', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontSize"><?php esc_attr_e( 'Font Size', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<input type="number" name="cswp_font_size" min="0" class="small-text" value="' . esc_attr( $cswp_font_size ) . '"  >';
				?>
				<select name="cswp_fontsize_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_fontsize_unit, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_fontsize_unit, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_fontsize_unit, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontWeight"><?php esc_attr_e( 'Font Weight', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
					<?php
					echo '<input type="number" name="cswp_font_weight" max="900" min="100" class="small-text" value="' . esc_attr( $cswp_font_weight ) . '"  >&nbsp';
					?>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPpadding"><?php esc_attr_e( 'Padding', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_top" class="small-text" value="' . esc_attr( $cswp_padding_top ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_right" class="small-text" value="' . esc_attr( $cswp_padding_right ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_bottom" class="small-text" value="' . esc_attr( $cswp_padding_bottom ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_left" class="small-text" value="' . esc_attr( $cswp_padding_left ) . '" >';
					?>
				<select name="cswp_padding_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_padding_unit, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_padding_unit, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_padding_unit, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description cswp-label-style">
					<label class="cswp-top">TOP</label>
					<label class="cswp-right">RIGHT</label>
					<label class="cswp-bottom">BOTTOM</label>
					<label class="cswp-left">LEFT</label>                  
				</p> 
				</td> 
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPTextColor"> <?php esc_attr_e( 'Text Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
					<?php
					if ( isset( $cswp_text_color ) ) {

						echo '<input name="cswp_text_color" class="my-color-field" value="' . esc_attr( $cswp_text_color ) . '">';
					} else {
						?>
				<input name="cswp_text_color" class="my-color-field" value="#333333">
						<?php
					}
					?>

				</td>
			</tr>
			<tr>
				<th class="cswp_table_row" scope="row"> 
					<label for="CSWPBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<div id="cswp_rt_bg">';
				if ( isset( $cswp_background_color ) ) {

					echo '<input  name="cswp_background_color" class="my-color-field" value="' . esc_attr( $cswp_background_color ) . '">';
				} else {
					?>
				<input  name="cswp_background_color" class="my-color-field" value="#eeeeee">
					<?php
				}
				echo '</div>';
				?>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPColor"> <?php esc_attr_e( 'Background Hover Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
				<?php
				if ( isset( $cswp_hover_color ) ) {

					echo '<input name="cswp_hover_color" class="my-color-field" value="' . esc_attr( $cswp_hover_color ) . '">';
				} else {
					?>
				<input name="cswp_hover_color" class="my-color-field" value="#333333">
					<?php
				}
				?>
				</td>
			</tr>
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPActiveButtonBackgroundColor"> <?php esc_attr_e( 'Active Button', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr>
				<th class="cswp_table_row" scope="row">
					<label for="CSWPActiveButtonBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<div id="cswp_rt_bg">';
				if ( isset( $cswp_active_button_background_color ) ) {
					echo '<input  name="cswp_active_button_background_color" class="my-color-field" value="' . esc_attr( $cswp_active_button_background_color ) . '">';
				} else {
					?>
				<input  name="cswp_active_button_background_color" class="my-color-field" value="#eeeeee">
					<?php
				}
				echo '</div>';
				?>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPColor"> <?php esc_attr_e( 'Text Hover Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
				<?php
				if ( isset( $cswp_text_hover_color ) ) {

					echo '<input name="cswp_text_hover_color" class="my-color-field" value="' . esc_attr( $cswp_text_hover_color ) . '">';
				} else {
					?>
				<input name="cswp_text_hover_color" class="my-color-field" value="#333333">
					<?php
				}
				?>
				</td>
			</tr>
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPBorder"> <?php esc_attr_e( 'Border', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPBorder"><?php esc_attr_e( 'Style', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td class="cswp_table_td">
					<select name="cswp_border_style">
					<?php
					echo "
					<option value='none' " . selected( $cswp_border_style, 'none', false ) . ">None</option>
					<option value='solid' " . selected( $cswp_border_style, 'solid', false ) . ">Solid</option>
					<option value='double' " . selected( $cswp_border_style, 'double', false ) . '>Double</option>         
					';
					?>
					</select>
					<p class="description">
					<?php esc_attr_e( 'by default style is none.', 'advanced-currency-switcher' ); ?>
					</p>
				</td> 
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPBorder"><?php esc_attr_e( 'Width', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input step="any" id="cswp_border" type="number" name="cswp_border_width" class="small-text" min="0" value="' . esc_attr( $cswp_border_width ) . '" >';
					?>
					<select name="cswp_border_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_border_unit, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_border_unit, 'em', false ) . '>em</option>';
					?>
					</select>
					<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
					</p>  
			</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontSize"><?php esc_attr_e( 'Radius', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
					<?php
					echo '<input type="number" name="cswp_border_radius" min="0" class="small-text" value="' . esc_attr( $cswp_border_radius ) . '"  >&nbsp px';
					?>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPIconAlignment"> <?php esc_attr_e( 'Icon', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPIconAlignment"><?php esc_attr_e( 'Alignment', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<select name="cswp_icon_align">
					<?php
					echo "
					<option value='left' " . selected( $cswp_icon_align, 'left', false ) . ">Left</option>
					<option value='right' " . selected( $cswp_icon_align, 'right', false ) . '>Right</option>         
					';
					?>
				</select>
				<p class="description">
					<?php esc_attr_e( 'by default alignment is left.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPIconWidth"><?php esc_attr_e( 'Width', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
					<?php
					echo '<input type="number" name="cswp_icon_width" min="0" class="small-text" value="' . esc_attr( $cswp_icon_width ) . '"  >&nbsp px';
					?>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPIconHeight"><?php esc_attr_e( 'Height', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<input type="number" name="cswp_icon_height" min="0" class="small-text" value="' . esc_attr( $cswp_icon_height ) . '"  >&nbsp px';
				?>
				<p class="description">
				<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPspacing"><?php esc_attr_e( 'Spacing', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input step="any" id="cswp_spacing" type="number" name="cswp_spacing_top" class="small-text" value="' . esc_attr( $cswp_spacing_top ) . '" >';
					echo '<input step="any" id="cswp_spacing" type="number" name="cswp_spacing_right" class="small-text" value="' . esc_attr( $cswp_spacing_right ) . '" >';
					echo '<input step="any" id="cswp_spacing" type="number" name="cswp_spacing_bottom" class="small-text" value="' . esc_attr( $cswp_spacing_bottom ) . '" >';
					echo '<input step="any" id="cswp_spacing" type="number" name="cswp_spacing_left" class="small-text" value="' . esc_attr( $cswp_spacing_left ) . '" >';
					?>
				<select name="cswp_spacing_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_spacing_unit, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_spacing_unit, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_spacing_unit, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description cswp-label-style">
					<label class="cswp-top">TOP</label>
					<label class="cswp-right">RIGHT</label>
					<label class="cswp-bottom">BOTTOM</label>
					<label class="cswp-left">LEFT</label>                  
				</p> 
				</td> 
			</tr>
			<tr>
				<th class="cswp_table_row" scope="row">
				<label for="CSWPUploadIcon"><?php esc_attr_e( 'Upload Image', 'advanced-currency-switcher' ); ?>
				</label>
				</th>
				<td class="cswp_table_td">
					<?php
					$cswp_count = 0;
					$cswp_icon  = array();
					foreach ( $currencybtn as $cswp_button_value ) {
						$cswp_icon_list                        = ! empty( $_POST[ 'cswp_icon' . $cswp_button_value ] ) ? esc_url_raw( $_POST[ 'cswp_icon' . $cswp_button_value ] ) : '';//PHPCS:ignore:WordPress.Security.NonceVerification.Missing
						$cswp_icon_array[ $cswp_button_value ] = $cswp_icon_list;
						$x                                     = ! empty( $cswp_value['cswp_icon'][ $cswp_count ] ) ? $cswp_value['cswp_icon'][ $cswp_count ] : '';
						array_push( $cswp_icon, $cswp_icon_list );
						if ( empty( $x ) ) {
							$cswp_img_hide = 'style="display:none;height:20px;width:20px;"';
						} else {
							$cswp_img_hide = 'style="display:inline-block;height:20px;width:20px;"';
						}
						?>
				<ul>
					<img src="<?php echo $x; ?>" <?php echo $cswp_img_hide; ?> >
					<input id="upload_image<?php echo $cswp_button_value; ?>" name="cswp_icon<?php echo $cswp_button_value; ?>" value="<?php echo $x; ?>" style="padding: 5px 0px 1px 5px;" readonly/> 
					<input id="upload_image_button<?php echo $cswp_button_value; ?>" class="button" type="button" value="Upload Image" />
					<input id="clear_image_button<?php echo $cswp_button_value; ?>" class="button" type="button" value="Clear" />
					<br>
					<br/><label class="cswp_button_label" style="padding:25px;">Upload an image for <b><?php echo $cswp_button_value; ?></b></label>
				</ul>
						<?php
						$cswp_count++;
					}
					?>
					<?php update_option( 'cswp_iconx', $cswp_icon ); ?>
					</div>
			</td>
			</tr>
			</table>
	</div>
	<div <?php echo $cswp_symbol_css; ?> id="cswp_hide_upload"  >
		<table class="form-table" >
			<tr>
				<td class="cswp_table_row" scope="row">
					<code class="cswp_code"><label for="CSWPDropdown"> <?php esc_attr_e( 'Symbol', 'advanced-currency-switcher' ); ?></label></code>
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPFontSize"><?php esc_attr_e( 'Font Size', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<input type="number" name="cswp_symbol_font_size" min="0" class="small-text" value="' . esc_attr( $cswp_symbol_fs ) . '"  >&nbsp';
				?>
				<select name="cswp_symbol_fontsize_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_symbol_fontsize_unit, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_symbol_fontsize_unit, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_symbol_fontsize_unit, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description">
					<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
				</p>  
				</td>
			</tr>
			<tr >
				<th class="cswp_table_row" scope="row">
					<label for="CSWPTextColor"> <?php esc_attr_e( 'Text Color', 'advanced-currency-switcher' ); ?></label>
				</th>  
				<td class="cswp_table_td">
					<?php
					if ( isset( $cswp_symbol_tc ) ) {

						echo '<input name="cswp_symbol_text_color" class="my-color-field" value="' . esc_attr( $cswp_symbol_tc ) . '">';
					} else {
						?>
				<input name="cswp_symbol_text_color" class="my-color-field" value="#333333">
						<?php
					}
					?>
				</td>
			</tr>
			<tr>
				<th class="cswp_table_row" scope="row"> 
					<label for="CSWPBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?></label>
				</th>
				<td class="cswp_table_td">
				<?php
				echo '<div id="cswp_rt_bg">';
				if ( isset( $cswp_symbol_bc ) ) {

					echo '<input  name="cswp_symbol_background_color" class="my-color-field" value="' . esc_attr( $cswp_symbol_bc ) . '">';
				} else {
					?>
				<input  name="cswp_symbol_background_color" class="my-color-field" value="#eeeeee">
					<?php
				}
				echo '</div>';
				?>
				</td>
			</tr>
			<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPpadding"><?php esc_attr_e( 'Padding', 'advanced-currency-switcher' ); ?></label>
			</th>
				<td class="cswp_table_td">
					<?php
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_symbol_padding_top" class="small-text" value="' . esc_attr( $cswp_symbol_pt ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_symbol_padding_right" class="small-text" value="' . esc_attr( $cswp_symbol_pr ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_symbol_padding_bottom" class="small-text" value="' . esc_attr( $cswp_symbol_pb ) . '" >';
					echo '<input step="any" id="cswp_padding" type="number" name="cswp_symbol_padding_left" class="small-text" value="' . esc_attr( $cswp_symbol_pl ) . '" >';
					?>
				<select name="cswp_symbol_padding_unit">
					<?php
					echo "
					<option value='px' " . selected( $cswp_symbol_pu, 'px', false ) . ">px</option>
					<option value='em' " . selected( $cswp_symbol_pu, 'em', false ) . ">em</option>
					<option value='rem' " . selected( $cswp_symbol_pu, 'rem', false ) . '>rem</option>         
					';
					?>
				</select>
				<p class="description cswp-label-style">
					<label class="cswp-top">TOP</label>
					<label class="cswp-right">RIGHT</label>
					<label class="cswp-bottom">BOTTOM</label>
					<label class="cswp-left">LEFT</label>                  
				</p> 
				</td> 
			</tr>
		</table>
	</div>
			<tr>
				<th class="cswp_table_row">
					<?php
						wp_nonce_field( 'cs-style-form-nonce', 'cs-style-form' );
					?>
					<input type="submit" name="submit" value="<?php esc_html_e( 'Save Changes', 'advanced-currency-switcher' ); ?>" class="bt button button-primary">
				</th>
			</tr>
		</table>
		<!-- </div> -->
	</form>
			<?php
		}

	}
	CS_Style_Option::get_instance();
}
