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

// Store form inputs values in variable.
wp_enqueue_script( 'colorpickerscript' );
wp_enqueue_script( 'cswp-hide-image-upload' );

//Dropdown Button
$cswp_get_form_value = get_option( 'cswp_style_form_data' );
//var_dump($cswp_get_form_value);
$cswp_dd_fs = ( ! empty( $cswp_get_form_value['cswp_dd_font_size'] ) ? $cswp_get_form_value['cswp_dd_font_size'] : 'inherit' );
$cswp_dd_bc = ( ! empty( $cswp_get_form_value['cswp_dd_background_color'] ) ? $cswp_get_form_value['cswp_dd_background_color'] : 'inherit' );
$cswp_dd_tc = ( ! empty( $cswp_get_form_value['cswp_dd_text_color'] ) ? $cswp_get_form_value['cswp_dd_text_color'] : 'inherit' );
$cswp_dd_pt = ( ! empty( $cswp_get_form_value['cswp_dd_padding_top'] ) ? $cswp_get_form_value['cswp_dd_padding_top'] : 'inherit' );
$cswp_dd_pr = ( ! empty( $cswp_get_form_value['cswp_dd_padding_right'] ) ? $cswp_get_form_value['cswp_dd_padding_right'] : 'inherit' );
$cswp_dd_pl = ( ! empty( $cswp_get_form_value['cswp_dd_padding_left'] ) ? $cswp_get_form_value['cswp_dd_padding_left'] : 'inherit' );
$cswp_dd_pb = ( ! empty( $cswp_get_form_value['cswp_dd_padding_bottom'] ) ? $cswp_get_form_value['cswp_dd_padding_bottom'] : 'inherit' );
$cswp_dd_pu = ( ! empty( $cswp_get_form_value['cswp_dd_padding_unit'] ) ? $cswp_get_form_value['cswp_dd_padding_unit'] : 'rem' );

//For Toggle
$cswp_tgl_fs = ( ! empty( $cswp_get_form_value['cswp_tgl_font_size'] ) ? $cswp_get_form_value['cswp_tgl_font_size'] : 'inherit' );
$cswp_tgl_bc = ( ! empty( $cswp_get_form_value['cswp_tgl_background_color'] ) ? $cswp_get_form_value['cswp_tgl_background_color'] : 'inherit' );
$cswp_tgl_tc = ( ! empty( $cswp_get_form_value['cswp_tgl_text_color'] ) ? $cswp_get_form_value['cswp_tgl_text_color'] : 'inherit' );
$cswp_tgl_pt = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_top'] ) ? $cswp_get_form_value['cswp_tgl_padding_top'] : 0.76 );
$cswp_tgl_pr = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_right'] ) ? $cswp_get_form_value['cswp_tgl_padding_right'] : 0.76 );
$cswp_tgl_pl = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_left'] ) ? $cswp_get_form_value['cswp_tgl_padding_left'] : 0.76);
$cswp_tgl_pb = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_bottom'] ) ? $cswp_get_form_value['cswp_tgl_padding_bottom'] : 0.76 );
$cswp_tgl_pu = ( ! empty( $cswp_get_form_value['cswp_tgl_padding_unit'] ) ? $cswp_get_form_value['cswp_tgl_padding_unit'] : 'inherit' );
$cswp_tgl_fw = ( ! empty( $cswp_get_form_value['cswp_tgl_font_weight'] ) ? $cswp_get_form_value['cswp_tgl_font_weight'] : 'inherit' );
$cswp_tgl_br = ( ! empty( $cswp_get_form_value['cswp_tgl_border_radius'] ) ? $cswp_get_form_value['cswp_tgl_border_radius'] : 5 );
$cswp_tgl_bw = ( ! empty( $cswp_get_form_value['cswp_tgl_border_width'] ) ? $cswp_get_form_value['cswp_tgl_border_width'] : 2 );
$cswp_tgl_bs = ( ! empty( $cswp_get_form_value['cswp_tgl_border_style'] ) ? $cswp_get_form_value['cswp_tgl_border_style'] : 'inherit' );
$cswp_tgl_bu = ( ! empty( $cswp_get_form_value['cswp_tgl_border_unit'] ) ? $cswp_get_form_value['cswp_tgl_border_unit'] : 'px' );
$cswp_tgl_borderc = ( ! empty( $cswp_get_form_value['cswp_tgl_border_color'] ) ? $cswp_get_form_value['cswp_tgl_border_color'] : 'buttonface' );
$cswp_tgl_text_hover_color = ( ! empty( $cswp_get_form_value['cswp_tgl_text_hover_color'] ) ? $cswp_get_form_value['cswp_tgl_text_hover_color'] : 'inherit' );
$cswp_tgl_hover_color = ( ! empty( $cswp_get_form_value['cswp_tgl_hover_color'] ) ? $cswp_get_form_value['cswp_tgl_hover_color'] : 'unset' );
//var_dump($cswp_get_form_value);

$cswp_value = get_option( 'cswp_style_form_data' );

$cswp_button = get_option( 'cswp_currency_button_type' );

$cswp_font_size = ( ! empty( $cswp_value['cswp_font_size'] ) ? $cswp_value['cswp_font_size'] : 16 );

// $cswp_button_width = ( ! empty( $cswp_value['cswp_button_width'] ) ? $cswp_value['cswp_button_width'] : 284 );

$cswp_icon_width = ( ! empty( $cswp_value['cswp_icon_width'] ) ? $cswp_value['cswp_icon_width'] : 30 );

$cswp_icon_height = ( ! empty( $cswp_value['cswp_icon_height'] ) ? $cswp_value['cswp_icon_height'] : 30 );

$cswp_hover_color = ( ! empty( $cswp_value['cswp_hover_color'] ) ? $cswp_value['cswp_hover_color'] : 'inherit' );

$cswp_text_hover_color = ( ! empty( $cswp_value['cswp_text_hover_color'] ) ? $cswp_value['cswp_text_hover_color'] : 'inherit' );

$cswp_font_weight = ( ! empty( $cswp_value['cswp_font_weight'] ) ? $cswp_value['cswp_font_weight'] : 'inherit' );

$cswp_text_color = ( ! empty( $cswp_value['cswp_text_color'] ) ? $cswp_value['cswp_text_color'] : '' );

$cswp_background_color = ( ! empty( $cswp_value['cswp_background_color'] ) ? $cswp_value['cswp_background_color'] : 'inherit' );

$cswp_active_button_background_color = ( ! empty( $cswp_value['cswp_active_button_background_color'] ) ? $cswp_value['cswp_active_button_background_color'] : 'inherit' );

$cswp_padding_top = ( ! empty( $cswp_value['cswp_padding_top'] ) ? $cswp_value['cswp_padding_top'] : 0.76 );

$cswp_padding_right = ( ! empty( $cswp_value['cswp_padding_right'] ) ? $cswp_value['cswp_padding_right'] : 0.76 );

$cswp_padding_bottom = ( ! empty( $cswp_value['cswp_padding_bottom'] ) ? $cswp_value['cswp_padding_bottom'] : 0.76 );

$cswp_padding_left = ( ! empty( $cswp_value['cswp_padding_left'] ) ? $cswp_value['cswp_padding_left'] : 0.76 );

$cswp_padding_unit = ( ! empty( $cswp_value['cswp_padding_unit'] ) ? $cswp_value['cswp_padding_unit'] : 'rem' );

$cswp_border_radius = ( ! empty( $cswp_value['cswp_border_radius'] ) ? $cswp_value['cswp_border_radius'] : 0 );

$cswp_border_width = ( ! empty( $cswp_value['cswp_border_width'] ) ? $cswp_value['cswp_border_width'] : 0 );

$cswp_border_style = ( ! empty( $cswp_value['cswp_border_style'] ) ? $cswp_value['cswp_border_style'] : 'none' );

$cswp_border_color = ( ! empty( $cswp_value['cswp_border_color'] ) ? $cswp_value['cswp_border_color'] : 'inherit' );

$cswp_border_unit = ( ! empty( $cswp_value['cswp_border_unit'] ) ? $cswp_value['cswp_border_unit'] : 'px' );

$cswp_vertical_align = ( ! empty( $cswp_value['cswp_vertical_align'] ) ? $cswp_value['cswp_vertical_align'] : 'baseline' );

$cswp_icon_align = ( ! empty( $cswp_value['cswp_icon_align'] ) ? $cswp_value['cswp_icon_align'] : 'left' );

$cswp_icon = ( ! empty( $cswp_value['cswp_icon'] ) ? $cswp_value['cswp_icon'] : 'emptyimg.jpg' );

$cswp_button_hide = get_option( 'cswp_form_data' );
if ( 'button' === $cswp_button_hide['cswp_button_type'] ) {
	// var_dump($cswp_button_hide);
	// wp_die();
	$cswp_button_css = 'style="display:block"';
	$cswp_toggle_css = 'style="display:none"';
	$cswp_dropdown_css = 'style="display:none"';
} else if ( 'toggle' === $cswp_button_hide['cswp_button_type'] ) {
	$cswp_toggle_css = 'style="display:block"';
	$cswp_button_css = 'style="display:none"';
	$cswp_dropdown_css = 'style="display:none"';
} else if ( 'dropdown' === $cswp_button_hide['cswp_button_type'] ) {
	$cswp_dropdown_css = 'style="display:block"';
	$cswp_toggle_css = 'style="display:none"';
	$cswp_button_css = 'style="display:none"';
}
$cswp_base_currency = get_option( 'currencybtn' );
// var_dump($cswp_button_hide["cswp_button_type"]);
// var_dump($cswp_button_css);
?>
<!-- Html code for frontend -->
<form method="post" name="cca_settings_form">
	<!--  set the html code for select base currency and select currency type -->
	<div id="cswp_style_container" class="cswp_style_container" style="
    padding: 16px 16px 16px 10px;">
<div class="cswp_hide_upload" id="cswp_hide_upload" <?php echo wp_kses_post( $cswp_dropdown_css );?> >
	<table class="form-table" >
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPFontSize"><?php esc_attr_e( 'Font Size', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_dd_font_size" max="50" min="10" class="small-text" value="' . esc_attr( $cswp_dd_fs ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPTextColor"> <?php esc_attr_e( 'Text Color', 'advanced-currency-switcher' ); ?></label>
			</th>  
			<td>
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
			<td>
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
			<td>
				<?php
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_top" class="small-text" value="' . esc_attr( $cswp_dd_pt ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_right" class="small-text" value="' . esc_attr( $cswp_dd_pr ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_bottom" class="small-text" value="' . esc_attr( $cswp_dd_pb ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_dd_padding_left" class="small-text" value="' . esc_attr( $cswp_dd_pl ) . '" >';
				?>
			<select name="cswp_dd_padding_unit">
				<?php
				if ( 'px' === $cswp_dd_pu ) {

					echo '<option selected  value="px">px</option>';
				} else {

					echo '<option value="px">px</option>';
				}
				if ( 'em' === $cswp_dd_pu ) {

					echo '<option selected value="em">em</option>';
				} else {

					echo '<option value="em">em</option>';
				}
				if ( 'rem' === $cswp_dd_pu ) {

					echo '<option selected value="rem">rem</option>';
				} else {

					echo '<option value="rem">rem</option>';
				}
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
<div class="cswp_hide_upload" id="cswp_hide_upload" <?php echo wp_kses_post( $cswp_toggle_css );?> >
<table class="form-table" >
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPFontWeight"><?php esc_attr_e( 'Font Weight', 'advanced-currency-switcher' ); ?>  :</label>
			</th>
			<td>
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
		<label for="CSWPpadding"><?php esc_attr_e( 'Padding', 'advanced-currency-switcher' ); ?> :</label>
		</th>
			<td>
				<?php
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_top" class="small-text" value="' . esc_attr( $cswp_tgl_pt ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_right" class="small-text" value="' . esc_attr( $cswp_tgl_pr ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_bottom" class="small-text" value="' . esc_attr( $cswp_tgl_pb ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_tgl_padding_left" class="small-text" value="' . esc_attr( $cswp_tgl_pl ) . '" >';
				?>
			<select name="cswp_tgl_padding_unit">
				<?php
				if ( 'px' === $cswp_tgl_pu ) {

					echo '<option  value="px">px</option>';
				} else {

					echo '<option  value="px">px</option>';
				}
				if ( 'em' === $cswp_tgl_pu ) {

					echo '<option  value="em">em</option>';
				} else {

					echo '<option  value="em">em</option>';
				}
				if ( 'rem' === $cswp_tgl_pu ) {

					echo '<option selected value="rem">rem</option>';
				} else {

					echo '<option  value="rem">rem</option>';
				}
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
		<label for="CSWPBorder"><?php esc_attr_e( 'Border Style', 'advanced-currency-switcher' ); ?> :</label>
		</th>
		<td>
				<select name="cswp_tgl_border_style">
				<?php
				if ( 'none' === $cswp_tgl_bs ) {

					echo '<option selected value="none">none</option>';
				} else {

					echo '<option  value="none">none</option>';
				}
				if ( 'solid' === $cswp_tgl_bs ) {

					echo '<option selected value="solid">solid</option>';
				} else {

					echo '<option  value="solid">solid</option>';
				}
				if ( 'double' === $cswp_tgl_bs ) {

					echo '<option selected value="double">double</option>';
				} else {

					echo '<option  value="double">double</option>';
				}
				?>
				</select>
			</td> 
		</tr>
		<tr>
		<th class="cswp_table_row" scope="row">
		<label for="CSWPBorder"><?php esc_attr_e( 'Border Width', 'advanced-currency-switcher' ); ?> :</label>
		</th>
			<td>
				<?php
				echo '<input step="any" id="cswp_border" type="number" name="cswp_tgl_border_width" class="small-text" value="' . esc_attr( $cswp_tgl_bw ) . '" >';
				?>
				<select name="cswp_tgl_border_unit">
				<?php
				if ( 'px' === $cswp_tgl_bu ) {

					echo '<option selected value="px">px</option>';
				} else {

					echo '<option  value="px">px</option>';
				}
				if ( 'em' === $cswp_tgl_bu ) {

					echo '<option selected value="em">em</option>';
				} else {

					echo '<option  value="em">em</option>';
				}
				?>
				</select>
		</td>
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPFontSize"><?php esc_attr_e( 'Border Radius', 'advanced-currency-switcher' ); ?>  :</label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_tgl_border_radius" max="50" min="0" class="small-text" value="' . esc_attr( $cswp_tgl_br ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr>
		<th class="cswp_table_row" scope="row">
		<label for="CSWPBorder"><?php esc_attr_e( 'Border Color', 'advanced-currency-switcher' ); ?> :</label>
		</th>
			<td>
				<?php
				echo '<input  name="cswp_tgl_border_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_borderc ) . '" >';
				?>
		</td>
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPTextColor"> <?php esc_attr_e( 'Text Color', 'advanced-currency-switcher' ); ?> :</label>
			</th>  
			<td>
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
		<tr>
			<th class="cswp_table_row" scope="row"> 
				<label for="CSWPBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?> :</label>
			</th>
			<td>
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
				<label for="CSWPColor"> <?php esc_attr_e( 'Toggle Background Hover Color', 'advanced-currency-switcher' ); ?> :</label>
			</th>  
			<td>
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
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPColor"> <?php esc_attr_e( 'Toggle Text Hover Color', 'advanced-currency-switcher' ); ?> :</label>
			</th>  
			<td>
			<?php
			if ( isset( $cswp_tgl_text_hover_color) ) {

				echo '<input name="cswp_tgl_text_hover_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_text_hover_color ) . '">';
			} else {
				?>
			<input name="cswp_tgl_text_hover_color" class="my-color-field" value="#333333">
				<?php
			}
			?>
			</td>
		</tr>
	</table>
</div>
	<div class="cswp_hide_upload" id="cswp_hide_upload" <?php echo wp_kses_post( $cswp_button_css );?> >
	<table class="form-table">
		<tr>
			<td class="cswp_table_row" scope="row">
				<code><label for="CSWP"> <?php esc_attr_e( 'Button', 'advanced-currency-switcher' ); ?></label></code>
			</td>
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPFontSize"><?php esc_attr_e( 'Font Size', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_font_size" max="50" min="10" class="small-text" value="' . esc_attr( $cswp_font_size ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPFontWeight"><?php esc_attr_e( 'Font Weight', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td>
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
		<label for="CSWPpadding"><?php esc_attr_e( 'Padding', 'advanced-currency-switcher' ); ?> :</label>
		</th>
			<td>
				<?php
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_top" class="small-text" value="' . esc_attr( $cswp_padding_top ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_right" class="small-text" value="' . esc_attr( $cswp_padding_right ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_bottom" class="small-text" value="' . esc_attr( $cswp_padding_bottom ) . '" >';
				echo '<input step="any" id="cswp_padding" type="number" name="cswp_padding_left" class="small-text" value="' . esc_attr( $cswp_padding_left ) . '" >';
				?>
			<select name="cswp_padding_unit">
				<?php
				if ( 'px' === $cswp_padding_unit ) {

					echo '<option selected value="px">px</option>';
				} else {

					echo '<option  value="px">px</option>';
				}
				if ( 'em' === $cswp_padding_unit ) {

					echo '<option selected value="em">em</option>';
				} else {

					echo '<option  value="em">em</option>';
				}
				if ( 'rem' === $cswp_padding_unit ) {

					echo '<option selected value="rem">rem</option>';
				} else {

					echo '<option  value="rem">rem</option>';
				}
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
			<td>
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
			<td>
			<?php
			echo '<div id="cswp_rt_bg">';
			if ( isset( $cswp_tgl_bc ) ) {

				echo '<input  name="cswp_background_color" class="my-color-field" value="' . esc_attr( $cswp_tgl_bc ) . '">';
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
			<td>
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
				<code><label for="CSWPActiveButtonBackgroundColor"> <?php esc_attr_e( 'Active Button', 'advanced-currency-switcher' ); ?></label></code>
			</td>
		</tr>
		<tr>
			<th class="cswp_table_row" scope="row">
				<label for="CSWPActiveButtonBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td>
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
			<td>
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
				<code><label for="CSWPBorder"> <?php esc_attr_e( 'Border', 'advanced-currency-switcher' ); ?>:</label></code>
			</td>
		</tr>
		<tr>
		<th class="cswp_table_row" scope="row">
		<label for="CSWPBorder"><?php esc_attr_e( 'Style', 'advanced-currency-switcher' ); ?></label>
		</th>
		<td>
				<select name="cswp_border_style">
				<?php
				if ( 'none' === $cswp_border_style ) {

					echo '<option selected value="none">none</option>';
				} else {

					echo '<option  value="none">none</option>';
				}
				if ( 'solid' === $cswp_border_style ) {

					echo '<option selected value="solid">solid</option>';
				} else {

					echo '<option  value="solid">solid</option>';
				}
				if ( 'double' === $cswp_border_style ) {

					echo '<option selected value="double">double</option>';
				} else {

					echo '<option  value="double">double</option>';
				}
				?>
				</select>
			</td> 
		</tr>
		<tr>
		<th class="cswp_table_row" scope="row">
		<label for="CSWPBorder"><?php esc_attr_e( 'Width', 'advanced-currency-switcher' ); ?></label>
		</th>
			<td>
				<?php
				echo '<input step="any" id="cswp_border" type="number" name="cswp_border_width" class="small-text" value="' . esc_attr( $cswp_border_width ) . '" >';
				?>
				<select name="cswp_border_unit">
				<?php
				if ( 'px' === $cswp_border_unit ) {

					echo '<option selected value="px">px</option>';
				} else {

					echo '<option  value="px">px</option>';
				}
				if ( 'em' === $cswp_border_unit ) {

					echo '<option selected value="em">em</option>';
				} else {

					echo '<option  value="em">em</option>';
				}
				?>
				</select>
		</td>
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPFontSize"><?php esc_attr_e( 'Radius', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_border_radius" max="50" min="0" class="small-text" value="' . esc_attr( $cswp_border_radius ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr>
			<td class="cswp_table_row" scope="row">
				<code><label for="CSWPIconAlignment"> <?php esc_attr_e( 'Icon', 'advanced-currency-switcher' ); ?> :</label></code>
			</td>
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPIconAlignment"><?php esc_attr_e( 'Alignment', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td>
			<select name="cswp_icon_align">
				<?php
				if ( 'right' === $cswp_icon_align ) {

					echo '<option selected value="left">Left</option>';
				} else {

					echo '<option  value="left">Left</option>';
				}
				if ( 'right' === $cswp_icon_align ) {

					echo '<option selected value="right">Right</option>';
				} else {

					echo '<option  value="right">Right</option>';
				}
				?>
			</select>
			<p class="description">
			<?php esc_attr_e( 'By Default Alignment is Left.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr>
		<th class="cswp_table_row" scope="row">
		<label for="CSWPVerticalAlignment"><?php esc_attr_e( 'Vertical Alignment', 'advanced-currency-switcher' ); ?></label>
		</th>
		<td>
				<select name="cswp_vertical_align">
				<?php
				if ( 'baseline' === $cswp_vertical_align ) {

					echo '<option selected value="baseline">Baseline</option>';
				} else {

					echo '<option  value="baseline">Baseline</option>';
				}
				if ( 'top' === $cswp_vertical_align ) {

					echo '<option selected value="top">Top</option>';
				} else {

					echo '<option  value="top">Top</option>';
				}
				if ( 'bottom' === $cswp_vertical_align ) {

					echo '<option selected value="bottom">Bottom</option>';
				} else {

					echo '<option  value="bottom">Bottom</option>';
				}
				if ( 'middle' === $cswp_vertical_align ) {

					echo '<option selected value="middle">Middle</option>';
				} else {

					echo '<option  value="middle">Middle</option>';
				}
				?>
				</select>
			</td> 
		</tr>
		<tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPIconWidth"><?php esc_attr_e( 'Width', 'advanced-currency-switcher' ); ?></label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_icon_width" class="small-text" value="' . esc_attr( $cswp_icon_width ) . '"  >&nbsp px';
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
			<td>
			<?php
			echo '<input type="number" name="cswp_icon_height" class="small-text" value="' . esc_attr( $cswp_icon_height ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<!-- <tr >
			<th class="cswp_table_row" scope="row">
				<label for="CSWPButtonWidth"><?php //esc_attr_e( 'Button Width', 'advanced-currency-switcher' ); ?>  :</label>
			</th>
			<td>
			<?php
			//echo '<input type="number" name="cswp_button_width" class="small-text" value="' . esc_attr( $cswp_button_width ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php //esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr> -->
		<tr>
			<th class="cswp_table_row" scope="row">
			<label for="CSWPUploadIcon"><?php esc_attr_e( 'Upload Image', 'advanced-currency-switcher' ); ?>
			</label>
			</th>
			<td>
			<?php
				$cswp_count = 0;	
			$cswp_icon = array();			
				foreach ( $cswp_base_currency as $cswp_button_value ) {
				$cswp_icon_list                        = ! empty( $_POST[ 'cswp_icon' . $cswp_button_value ] ) ? esc_url_raw( $_POST[ 'cswp_icon' . $cswp_button_value ] ) : '';
				$cswp_icon_array[ $cswp_button_value ] = $cswp_icon_list;
				array_push( $cswp_icon, $cswp_icon_list );
				?>
			<ul>
				<img src="<?php echo $cswp_icon[$cswp_count]; ?>" style="height:20px;width:20px;">
				<input id="upload_image<?php echo $cswp_button_value; ?>" name="cswp_icon<?php echo $cswp_button_value; ?>" value="<?php echo $cswp_icon[$cswp_count]; ?>" style="padding: 5px 0px 1px 5px;" readonly/>
				<input id="upload_image_button<?php echo $cswp_button_value; ?>" class="button" type="button" value="Upload Image" />
				<br/>Upload an image for <b><?php echo $cswp_button_value; ?></b>
				</label>
			</ul>
						<?php
						$cswp_count++;
						}
			?>
				<?php update_option( 'cswp_iconx', $cswp_icon ); ?>
				</div>
				<p class="description cswp-description">
					<?php esc_html_e( 'This Option work for only Display Type "Button".', 'advanced-stats' ); ?>
				</p>
		</td>
		</tr>
		</table>
</div>
		<tr>
			<th>
				<?php
					wp_nonce_field( 'cs-style-form-nonce', 'cs-style-form' );
				?>
				<input type="submit" name="submit" value="<?php esc_html_e( 'Save Changes', 'advanced-currency-switcher' ); ?>" class="bt button button-primary">
			</th>
		</tr>
	</table>
	</div>
</form>

