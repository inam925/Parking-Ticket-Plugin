<?php
// Enqueue styles and scripts
ob_start();
function plugin_park_enqueue_styles()
{
    wp_register_style('parkstyle', plugins_url('/parkstyle.css', __FILE__), false, null, true);

    wp_enqueue_style('parkstyle');
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), '5.2.3', true);
    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js');
}
add_action('wp_enqueue_scripts', 'plugin_park_enqueue_styles');
function plugin_park_enqueue_scripts()
{
    wp_register_script('parkjquery', plugins_url('/js/jquery.js', __FILE__), array('jquery'));

    wp_enqueue_script('parkjquery');
    wp_register_script('inputjquery', plugins_url('/js/input.js', __FILE__), array('jquery'));

    wp_enqueue_script('inputjquery');
    wp_register_script('showjquery', plugins_url('/js/show.js', __FILE__), array('jquery'));

    wp_enqueue_script('showjquery');
    wp_register_script('checkoutjs', plugins_url('/js/checkout.js', __FILE__), array('jquery'));

    wp_enqueue_script('checkoutjs');
    wp_enqueue_script('stripe-elements', 'https://js.stripe.com/v3/', array(), '3.0', true);
}
add_action('wp_enqueue_scripts', 'plugin_park_enqueue_scripts');
