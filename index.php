<?php

/*
Plugin Name: Coffee Admin Theme
Plugin URI: http://michaelgunner.co.uk
Description: This theme gives the Wordpress dashboard a darker, sleeker look. This theme is only compatible with Wordpress 3.3.
Author: Michael Gunner
Version: 1.2.3
Author URI: http://michaelgunner.co.uk
*/

function coffee_admin_head() {
        echo '<link rel="stylesheet" type="text/css" href="' .plugins_url('coffee-admin.css', __FILE__). '">';
}

add_action('admin_head', 'coffee_admin_head');

?>