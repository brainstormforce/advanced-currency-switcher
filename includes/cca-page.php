<?php 
/**
 * Add submenu of Global settings Page to admin menu.
 *
 * @since  1.0.0
 * @return void
 */
function cca_options_page()
    {
        add_submenu_page(
            'tools.php',
            'Currency Converter',
            'Currency Converter',
            'manage_options',
            'cca',
            'CCA_Page_html'
        );
    }
    add_action('admin_menu', 'cca_options_page');


/**
 * Main Frontpage.
 *
 * @since  1.0.0
 * @return void
 */
function CCA_Page_html()
{
    include CCA_PLUGIN_DIR.'/includes/cca-main-frontend.php';   
}
