<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;
$woocommerce = new Client(
    'https://www.yoururl.com',
    'ck_hashed-key-retrieved-from-wc-admin',
    'cs_hashed-key-retrieved-from-wc-admin',
    [
        'version' => 'wc/v3',
    ]
);

try {

    $data = [
        'payment_method' => 'cod',
        'payment_method_title' => 'Cash on Delivery',
        'set_paid' => true,
        'billing' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'address_1' => '969 Market',
            'address_2' => '',
            'city' => 'San Francisco',
            'state' => 'CA',
            'postcode' => '94103',
            'country' => 'US',
            'email' => 'john.doe@example.com',
            'phone' => '(555) 555-5555'
        ],
        'shipping' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'address_1' => '969 Market',
            'address_2' => '',
            'city' => 'San Francisco',
            'state' => 'CA',
            'postcode' => '94103',
            'country' => 'US'
        ],
        'line_items' => [
            [
                'product_id' => 3109,
                'quantity' => 1
            ]
        ]
    ];

    print_r($woocommerce->post('orders', $data));


} catch (HttpClientException $e) {
    echo '<pre><code>' . print_r( $e->getMessage(), true ) . '</code><pre>'; // Error message.
    echo '<pre><code>' . print_r( $e->getRequest(), true ) . '</code><pre>'; // Last request data.
    echo '<pre><code>' . print_r( $e->getResponse(), true ) . '</code><pre>'; // Last response data.
}
