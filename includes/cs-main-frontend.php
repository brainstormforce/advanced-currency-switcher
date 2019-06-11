<?php
/**
 * Add tabs
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */
if(get_option('cs_display1') == 'display') {

    ?>
<div id="message" class="notice is-dismissible notice-info">
<p class="description">Generate Your OpenExchangeRate App ID:&nbsp;<a href="https://openexchangerates.org/" target="_blank">https://openexchangerates.org/</a>&nbsp;[ If you don't have then get it from OpenExchangeRate. ]
</p>
</div>
<?php
}

?>

<div class="pr_main_heading">

    <h1> <?php esc_html_e('Currency Switcher', 'cswp_currencyswitch'); ?> </h1>

</div>

<?php

//To get the tab value from URL and store in $active_tab variable
$active_tab = "cs_settings";
if (isset($_GET["tab"]) ) {

    if ($_GET["tab"] == "cs_settings" ) {

        $active_tab = "cs_settings";

    } elseif ($_GET["tab"] == "user-manual" ) {

        $active_tab = "user-manual";

    }
}

?>

<h2 class="nav-tab-wrapper">

    <a href="?page=currency_switch" class="nav-tab tb <?php if ($active_tab == 'cs_settings' ) {
        echo 'nav-tab-active';
} ?>">
        <?php _e('Global Setting', 'cs_currencyswitch'); ?>
    </a>

    <a href="?page=currency_switch&tab=user-manual" class="nav-tab tb <?php if ($active_tab == 'user-manual' ) {
        echo 'nav-tab-active';
} ?>">
        <?php _e('User Manual', 'cs_currencyswitch'); ?>
    </a>

</h2>

<?php

 //here we display the sections and options in the settings page based on the active tab
if (isset($_GET["tab"]) ) {

    if ($_GET["tab"] == "cs_settings" ) {

        require_once 'cs-settings-frontend.php';

    } elseif ($_GET["tab"] == "user-manual" ) {

        require_once 'cs-user-manual.php';

    }


} else {

    require_once 'cs-settings-frontend.php';
}
