<?php
function settings(){
	include(get_template_directory().'/templates/quote/quote-settings.php');
    exit();
}

// creating Ajax call for WordPress  
add_action('wp_ajax_nopriv_settings', 'settings');
add_action('wp_ajax_settings', 'settings');

?>