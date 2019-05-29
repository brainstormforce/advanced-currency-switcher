<?php
/**
 * Setting Backend Doc comment
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
 */


// $site_url = site_url();

// if (isset($_POST['submit']) ) {

//     if (isset($_POST['base_currency']) ) {
//         $base_currency = $_POST['base_currency'];
//     } else {
//         $base_currency ='';
//     }

//     if (isset($_POST['form_select']) ) {
//         $form_type = $_POST['form_select'];
//     } else {
//         $form_type ='';
//     }

//     if (isset($_POST['appid']) ) {
//         $api_key = $_POST['appid'];
//     } else {
//         $api_key ='';
//     }

//     if (isset($_POST['frequency_reload']) ) {
//         $frequency_reload = $_POST['frequency_reload'];
//     } else {
//         $frequency_reload ='';
//     }

//     if (isset($_POST['decimal']) ) {
//         $decimalpoint = $_POST['decimal'];
//     } else {
//         $decimalpoint ='';
//     }

// }
 

// //Set decimal point by default 2 if its blank
// if ($decimalpoint === '' ) {
//     $decimalpoint = '2';
// }

// //Store checkbox values in array

// if (isset($_POST['currency_button']) ) {

//     foreach ( $_POST['currency_button'] as $currencybutton ) {
//         $currency_button_type[] = $currencybutton;
//     }
// }

// if (isset($currency_button_type) ) {

//     $currency_button_type=array_combine($currency_button_type, $currency_button_type);
//     update_option('currency_button_type', $currency_button_type);
// }

// //Store values in array
// $savevalues = array(
//   'base_currency'=>$base_currency,
//   'form_select'=>$form_type,
//   'api_key'=>$api_key,
//   'frequency_reload'=>$frequency_reload,
//   'decimalpoint'=>$decimalpoint,
// );

// //Merging both array 
// if (isset($currency_button_type) ) {

//     $savevalues = array_merge($savevalues, $currency_button_type);
// }

// //Store $update_option array value in database option table
// update_option('cs_data', $savevalues);

// //values from usermanual currency rate
// if ($_POST['form_select'] === 'manualrate' ) {

//     $usd_rate=$_POST['usd'];
//     $inr_rate=$_POST['inr'];
//     $eur_rate=$_POST['eur'];
//     $aud_rate=$_POST['aud'];

//     $manual_rate = array(
//         'usd_rate'=>$usd_rate,
//         'inr_rate'=>$inr_rate,
//         'eur_rate'=>$eur_rate,
//         'aud_rate'=>$aud_rate,

//     );
//     update_option('manual_rate', $manual_rate);
// } elseif ($_POST['form_select'] === 'apirate' ) {

//     $data='';
//     // if ( file_exists( 'https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$base_currency.'') ) {

//     $data = file_get_contents('https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$base_currency.'');

//     //decode jason data.
//     $data = json_decode($data);

//     //Store required data in database 
//     if (isset($data) ) {

//         $inr=$data->rates->INR;
//         if ($inr ) {
//             update_option('inr', $inr);
//         }

//         $eur=$data->rates->EUR;
//         if ($eur ) {
//             update_option('eur', $eur);
//         }

//         $usd=$data->rates->USD;
//         if ($usd) {
//             update_option('usd', $usd);
//         }

//         $aud=$data->rates->AUD;
//         if ($aud) {
//             update_option('aud', $aud);
//         }
//     }
// }

