<?php
if (!defined('ABSPATH')) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/wordpress/';
    include_once $path . '/wp-load.php';
}

use Stripe\StripeClient;
// Add this code to your server-side endpoint handling the Stripe token
// require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');
require_once(plugin_dir_path(__FILE__) . 'vendor/stripe/stripe-php/init.php');

$stripe = new StripeClient('sk_test_51NLhA8SJcCvwTeMNXSDkGWA0B8qq6VPQD1Qzze9PYEDw4TxmRXEmmjoGn0uwAvnsjsHsAVkhHCqNWkXS8LyOB0MS00nL8YiByW');

header('Content-Type: application/json');

try {
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str);
    $intValue = intval($json_obj->price);
    $amountCents = $intValue * 100;
    $description = $json_obj->description;
    $name = $json_obj->name;

    $payment_intent = $stripe->paymentIntents->create([
        'amount' => $amountCents,
        'currency' => 'eur',
        'description' => $description,
        'shipping' => [
            'name' => $name,
            'address' => [
                'line1' => '510 Townsend St',
                'postal_code' => '98140',
                'city' => 'San Francisco',
                'state' => 'CA',
                'country' => 'US',
            ],
        ],
        'payment_method_types' => [
            'card',
            // 'ideal',
        ],
    ]);

    $clientSecret = $payment_intent->client_secret;

    echo json_encode(['clientSecret' => $clientSecret]);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
