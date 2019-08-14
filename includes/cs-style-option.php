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
wp_enqueue_script( 'colorpickerscript' );

$cswp_value  = get_option( 'cswp_style_form_data' );

$cswp_button = get_option( 'cswp_currency_button_type' );


$cswp_font_size = ( ! empty( $cswp_value['cswp_font_size'] ) ? $cswp_value['cswp_font_size'] : 10 );

$cswp_button_width = ( ! empty( $cswp_value['cswp_button_width'] ) ? $cswp_value['cswp_button_width'] : 10 );

$cswp_icon_width = ( ! empty( $cswp_value['cswp_icon_width'] ) ? $cswp_value['cswp_icon_width'] : 10 );

$cswp_icon_height = ( ! empty( $cswp_value['cswp_icon_height'] ) ? $cswp_value['cswp_icon_height'] : 10 );

$cswp_hover_color = ( ! empty( $cswp_value['cswp_hover_color'] ) ? $cswp_value['cswp_hover_color'] : '' );

$cswp_text_hover_color = ( ! empty( $cswp_value['cswp_text_hover_color'] ) ? $cswp_value['cswp_text_hover_color'] : '' );

$cswp_font_weight = ( ! empty( $cswp_value['cswp_font_weight'] ) ? $cswp_value['cswp_font_weight'] : 100 );

$cswp_text_color = ( ! empty( $cswp_value['cswp_text_color'] ) ? $cswp_value['cswp_text_color'] : '' );

$cswp_background_color = ( ! empty( $cswp_value['cswp_background_color'] ) ? $cswp_value['cswp_background_color'] : '' );

$cswp_active_button_background_color = ( ! empty( $cswp_value['cswp_active_button_background_color'] ) ? $cswp_value['cswp_active_button_background_color'] : '');
// var_dump($cswp_active_button_background_color);

$cswp_padding_top = ( ! empty( $cswp_value['cswp_padding_top'] ) ? $cswp_value['cswp_padding_top'] : 0 );

$cswp_padding_right = ( ! empty( $cswp_value['cswp_padding_right'] ) ? $cswp_value['cswp_padding_right'] : 0 );

$cswp_padding_bottom = ( ! empty( $cswp_value['cswp_padding_bottom'] ) ? $cswp_value['cswp_padding_bottom'] : 0 );

$cswp_padding_left = ( ! empty( $cswp_value['cswp_padding_left'] ) ? $cswp_value['cswp_padding_left'] : 0 );

$cswp_padding_unit = ( ! empty( $cswp_value['cswp_padding_unit'] ) ? $cswp_value['cswp_padding_unit'] : 'px' );

$cswp_border_radius = ( ! empty( $cswp_value['cswp_border_radius'] ) ? $cswp_value['cswp_border_radius'] : 10 );

$cswp_border_width = ( ! empty( $cswp_value['cswp_border_width'] ) ? $cswp_value['cswp_border_width'] : 0 );

$cswp_border_style = ( ! empty( $cswp_value['cswp_border_style'] ) ? $cswp_value['cswp_border_style'] : 'none' );

$cswp_border_color = ( ! empty( $cswp_value['cswp_border_color'] ) ? $cswp_value['cswp_border_color'] : '' );

$cswp_border_unit = ( ! empty( $cswp_value['cswp_border_unit'] ) ? $cswp_value['cswp_border_unit'] : 'px' );

$cswp_border_style = ( ! empty( $cswp_value['cswp_border_style'] ) ? $cswp_value['cswp_border_style'] : 'none' );

$cswp_icon_align = ( ! empty( $cswp_value['cswp_icon_align'] ) ? $cswp_value['cswp_icon_align'] : 'left' );



// $cswp_iconUSD = ( ! empty( $cswp_value['cswp_iconUSD'] ) ? $cswp_value['cswp_iconUSD'] : '' );
// $cswp_iconAUD = ( ! empty( $cswp_value['cswp_iconAUD'] ) ? $cswp_value['cswp_iconAUD'] : '' );
// $cswp_iconEUR = ( ! empty( $cswp_value['cswp_iconEUR'] ) ? $cswp_value['cswp_iconEUR'] : '' );
// $cswp_iconINR = ( ! empty( $cswp_value['cswp_iconINR'] ) ? $cswp_value['cswp_iconINR'] : '' );
// foreach ($cswp_button as $cswp_button_value ) {

//$cswp_icon = ( ! empty( $cswp_value['cswp_icon'] ) ? $cswp_value['cswp_icon'] : '' );
	//var_dump( $cswp_value );

			// }
	//$cswp_icon = ( ! empty( $cswp_value['cswp_icon'] ) ? $cswp_value['cswp_icon'] : '' );
		// foreach ($cswp_button as $cswp_button_value ) {

		// 		$cswp_icon = ! empty( $_POST['cswp_icon'.$cswp_button_value] ) ? sanitize_url( $_POST['cswp_icon'.$cswp_button_value] ) : '';
				$cswp_icon = $cswp_value['cswp_icon'];
				// foreach ( $cswp_icon as $value ){
				// 
				// 	<img src="<?php echo $cswp_icon[$value] " style="height:30px;width:30px;">
				// 	
				// }

				// var_dump($cswp_icon);
				
		// // 		
				//var_dump( $cswp_icon);

			// }
// $cswp_array_option = array();

// array_push($cswp_array_option,$cswp_button);
// var_dump($cswp_array_option);
// // var_dump( $cswp_iconEUR );
// var_dump( $cswp_iconAUR );
// var_dump( $cswp_iconINR );


?>
<!-- Html code for frontend -->
<form method="post" name="cca_settings_form">
	<!--  set the html code for select base currency and select currency type -->
	<table class="form-table" >
		<tr >
			<th scope="row">
				<label for="CSWPIconAlignment"><?php esc_attr_e( 'Icon Alignment', 'advanced-currency-switcher' ); ?>  :</label>
			</th>
			<td>
			<select name="cswp_icon_align">
				<?php
				if ( 'right' === $cswp_icon_align ) {

					echo '<option selected value="left">LEFT</option>';
				} else {

					echo '<option  value="left">LEFT</option>';
				}
				if ( 'right' === $cswp_icon_align ) {

					echo '<option selected value="right">RIGHT</option>';
				} else {

					echo '<option  value="right">RIGHT</option>';
				}
				?>
			</select>
			<p class="description">
			<?php esc_attr_e( 'By Default Alignment is Left.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
		<tr >
			<th scope="row">
				<label for="CSWPIconWidth"><?php esc_attr_e( 'Icon Width', 'advanced-currency-switcher' ); ?>  :</label>
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
			<th scope="row">
				<label for="CSWPIconHeight"><?php esc_attr_e( 'Icon Height', 'advanced-currency-switcher' ); ?>  :</label>
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
		<tr >
			<th scope="row">
				<label for="CSWPButtonWidth"><?php esc_attr_e( 'Button Width', 'advanced-currency-switcher' ); ?>  :</label>
			</th>
			<td>
			<?php
			echo '<input type="number" name="cswp_button_width" class="small-text" value="' . esc_attr( $cswp_button_width ) . '"  >&nbsp px';
			?>
			<p class="description">
			<?php esc_attr_e( 'Keep blank for default value.', 'advanced-currency-switcher' ); ?>
			</p>  
			</td>
		</tr>
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
		<label for="CSWPBorder"><?php esc_attr_e( 'Border Width', 'advanced-currency-switcher' ); ?> :</label>
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
	<tr>
		<th scope="row">
		<label for="CSWPBorder"><?php esc_attr_e( 'Border Style', 'advanced-currency-switcher' ); ?> :</label>
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
		<th scope="row">
		<label for="CSWPBorder"><?php esc_attr_e( 'Border Color', 'advanced-currency-switcher' ); ?> :</label>
		</th>
			<td>
				<?php
				echo '<input  name="cswp_border_color" class="my-color-field" value="' . esc_attr( $cswp_border_color ) . '" >';
				?>
		</td>
		</tr>
		<tr >
			<th scope="row">
				<label for="CSWPColor"> <?php esc_attr_e( 'Toggle/Button Background Hover Color', 'advanced-currency-switcher' ); ?> :</label>
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
		<tr >
			<th scope="row">
				<label for="CSWPColor"> <?php esc_attr_e( 'Toggle/Button Text Hover Color', 'advanced-currency-switcher' ); ?> :</label>
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
			<th scope="row"> 
				<label for="CSWPActiveButtonBackgroundColor"> <?php esc_attr_e( 'Active Button Background Color', 'advanced-currency-switcher' ); ?> :</label>
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
		<tr>
			<th scope="row">
				<label for="CSWPUploadIcon"> <?php esc_attr_e( 'Upload Icon', 'advanced-currency-switcher' ); ?> :</label>
			</th>
			<td>
			<!-- <ul>
				<input id="upload_imageUSD" type="text" size="36" name="cswp_iconUSD" value="$cswp_iconUSD" />
			    <input id="upload_image_buttonUSD" class="buttonUSD" type="button" value="Upload Image" />
			    <br/>Enter a URL or upload an image
				</label>
			</ul>
			<ul>
				<input id="upload_imageAUD" type="text" size="36" name="cswp_iconAUD" value="$cswp_iconAUD" />
			    <input id="upload_image_buttonAUD" class="buttonAUD" type="button" value="Upload Image" />
			    <br/>Enter a URL or upload an image
				</label>
			</ul>
			<ul>
				<input id="upload_imageEUR" type="text" size="36" name="cswp_iconEUR" value="$cswp_iconEUR" />
			    <input id="upload_image_buttonEUR" class="buttonEUR" type="button" value="Upload Image" />
			    <br/>Enter a URL or upload an image
				</label>
			</ul>
			<ul>
				



				<input id="upload_imageINR" type="text" size="36" name="cswp_iconINR" value="$cswp_iconINR" />
			    <input id="upload_image_buttonINR" class="buttonINR" type="button" value="Upload Image" />
			    <br/>Enter a URL or upload an image
				</label>
			</ul> -->
			<?php $count = 0; foreach ( $cswp_button as $cswp_button_value ){ esc_attr_e( $cswp_button_value );  ?>	
			<ul>
				<img src="<?php echo $cswp_icon[$count] ?>" style="height:30px;width:30px;">
				<input id="upload_image<?php echo $cswp_button_value ?>" type="text" size="0" name="cswp_icon<?php echo $cswp_button_value ?>" value="<?php //echo $cswp_icon[$count]; ?>" />
			    <input id="upload_image_button<?php echo $cswp_button_value ?>" class="button" type="button" value="Upload Image" />
			    <br/>Enter a URL or upload an image
				</label>
			</ul>
				<?php update_option('count',$count);$count++;} ?>
		</td>
		</tr>
		<!-- <?php $g //= get_option('count'); 
		//echo $g; ?> -->
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

