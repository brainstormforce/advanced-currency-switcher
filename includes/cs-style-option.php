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
$cswp_value = get_option( 'cswp_style_form_data' );

$cswp_font_size = ( ! empty( $cswp_value['cswp_font_size'] ) ? $cswp_value['cswp_font_size'] : 10 );

$cswp_font_weight = ( ! empty( $cswp_value['cswp_font_weight'] ) ? $cswp_value['cswp_font_weight'] : 100 );

$cswp_text_color = ( ! empty( $cswp_value['cswp_text_color'] ) ? $cswp_value['cswp_text_color'] : '' );

$cswp_background_color = ( ! empty( $cswp_value['cswp_background_color'] ) ? $cswp_value['cswp_background_color'] : '' );

$cswp_padding_top = ( ! empty( $cswp_value['cswp_padding_top'] ) ? $cswp_value['cswp_padding_top'] : 0 );

$cswp_padding_right = ( ! empty( $cswp_value['cswp_padding_right'] ) ? $cswp_value['cswp_padding_right'] : 0 );

$cswp_padding_bottom = ( ! empty( $cswp_value['cswp_padding_bottom'] ) ? $cswp_value['cswp_padding_bottom'] : 0 );

$cswp_padding_left = ( ! empty( $cswp_value['cswp_padding_left'] ) ? $cswp_value['cswp_padding_left'] : 0 );

$cswp_padding_unit = ( ! empty( $cswp_value['cswp_padding_unit'] ) ? $cswp_value['cswp_padding_unit'] : 'px' );

$cswp_border_radius = ( ! empty( $cswp_value['cswp_border_radius'] ) ? $cswp_value['cswp_border_radius'] : 10 );

$cswp_border_width = ( ! empty( $cswp_value['cswp_border_width'] ) ? $cswp_value['cswp_border_width'] : 0 );

$cswp_border_style = ( ! empty( $cswp_value['cswp_border_style'] ) ? $cswp_value['cswp_border_style'] : 'none' );

$cswp_border_color = ( ! empty( $cswp_value['cswp_border_color'] ) ? $cswp_value['cswp_border_color'] : '#000' );

$cswp_border_unit = ( ! empty( $cswp_value['cswp_border_unit'] ) ? $cswp_value['cswp_border_unit'] : 'px' );
// var_dump($cswp_padding_top);

?>
<!-- Html code for frontend -->
<form method="post" name="cca_settings_form">
	<!--  set the html code for select base currency and select currency type -->
	<table class="form-table" >
		<tr >
			<th scope="row">
				<label for="CSWPFontSize"><?php esc_attr_e( 'Font Size', 'advanced-currency-switcher' ); ?>  :</label>
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
			<th scope="row">
				<label for="CSWPFontWeight"><?php esc_attr_e( 'Font Weight', 'advanced-currency-switcher' ); ?>  :</label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_font_weight" max="900" min="100" class="small-text" value="' . esc_attr( $cswp_font_weight ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr >
			<th scope="row">
				<label for="CSWPTextColor"> <?php esc_attr_e( 'Text Color', 'advanced-currency-switcher' ); ?> :</label>
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
			<th scope="row"> 
				<label for="CSWPBackgroundColor"> <?php esc_attr_e( 'Background Color', 'advanced-currency-switcher' ); ?> :</label>
			</th>
			<td>
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
		<tr>
		<th scope="row">
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
			<th scope="row">
				<label for="CSWPFontSize"><?php esc_attr_e( 'Border Radius', 'advanced-currency-switcher' ); ?>  :</label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_border_radius" max="50" min="10" class="small-text" value="' . esc_attr( $cswp_border_radius ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr>
		<th scope="row">
		<label for="CSWPBorder"><?php esc_attr_e( 'Border', 'advanced-currency-switcher' ); ?> :</label>
		</th>
			<td>
				<?php
				echo '<input step="any" id="cswp_border" type="number" name="cswp_border_width" class="small-text" value="' . esc_attr( $cswp_border_width ) . '" >';
				echo '<input name="cswp_border_style" class="small-text" value="' . esc_attr( $cswp_border_style ) . '" >';
				echo '<input  name="cswp_border_color" class="small-text" value="' . esc_attr( $cswp_border_color ) . '" >';
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
			<p class="description cswp-label-style">
				<label class="cswp-width">Width</label>
				<label class="cswp-style">Style</label>
				<label class="cswp-color">Color</label>               
			</p> 
			</td> 
		</tr>
		<tr>
			<th>
				<?php
					wp_nonce_field( 'cs-style-form-nonce', 'cs-style-form' );
				?>
				<input type="submit" name="submit" value="<?php esc_html_e( 'Save Changes', 'advanced-currency-switcher' ); ?>" class="bt button button-primary">
			</th>
		</tr>
	</table>
</form>
