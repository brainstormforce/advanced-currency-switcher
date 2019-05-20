<?php

 
//Navigation

//To get the tab value from URL and store in $active_tab variable
 $active_tab = "cca_settings";
if (isset($_GET["tab"])) {
    if ($_GET["tab"] == "cca_settings") {
        $active_tab = "cca_settings";
    } elseif ($_GET["tab"] == "cca_settings_backend") {
        $active_tab = "cca_settings_backend";
    }
}  
?>
<?php

 //here we display the sections and options in the settings page based on the active tab
if (isset($_GET["tab"])) {
    if ($_GET["tab"] == "cca_settings") {
           include 'cca-settings-frontend.php';
    } elseif ($_GET["tab"] == "cca_settings_backend") {
           include 'cca-settings-backend.php';
    }  
}
else
{
    include 'cca-settings-frontend.php';
}