<?php
/**
 * Setting Backend Doc comment
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Convertor_Addon
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
*/


 $site_url=site_url();

 
 $base_currency=$_POST['base_currency'];
 $api_key=$_POST['appid'];
 $frequency_reload=$_POST['frequency_reload'];
 $decimalpoint=$_POST['decimal'];
 
if($decimalpoint==='') {
  $decimalpoint='2';
}

 if ( isset( $_POST['currency_button'] ) ) {
    foreach ( $_POST['currency_button'] as $currencybutton ) {
      $currency_button_type[] = $currencybutton;
    }
  }

update_option('currency_button_type',$currency_button_type);
//var_dump(get_option('currency_button_type'));

//Store values in array
 $update_options = array(
  'base_currency'=>$base_currency,
  'api_key'=>$api_key,
  'frequency_reload'=>$frequency_reload,
  'decimalpoint'=>$decimalpoint,

 );

//Merging both array 
if ( isset( $currency_button_type ) ) {
  $update_options= array_merge($update_options,$currency_button_type);
}

//Store $update_option array value in database option table
update_option('cca_data', $update_options);
$get_currency_rate='https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$base_currency.'';
//If condition for remove file get content warning
if($get_currency_rate==='') {
  $data=file_get_contents($get_currency_rate);
}

//decode jason data.
$data=json_decode($data);

$inr=$data->rates->INR;
if( $inr ) {
  update_option('inr',$inr);
}

$eur=$data->rates->EUR;
if( $eur ) {
  update_option('eur',$eur);
}

$usd=$data->rates->USD;
if($usd){
  update_option('usd',$usd);
}

$aud=$data->rates->AUD;
if($aud){
  update_option('aud',$aud);
}

//header('Location:'.$site_url.'tools.php?page=cca');
?> 
<script type='text/javascript'>
	<?php echo("location.href = '".$site_url."/wp-admin/tools.php?page=cca';");?>
</script>