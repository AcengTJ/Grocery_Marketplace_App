<?php 
namespace Midtrans;

require_once dirname(__FILE__) . '/../midtrans/Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-hfHFQC7aS4FH1BAv6xJxyb81';
Config::$clientKey = 'SB-Mid-client-7Zw67daMTnwtJH1R';
Config::$isSanitized = true;
Config::$is3ds = true;
date_default_timezone_set('Asia/Jakarta');

// Optional
$item1_details = array(
    'id' => 'a1',
    'price' => 18000,
    'quantity' => 3,
    'name' => "Apple"
);

// Optional
$item2_details = array(
    'id' => 'a2',
    'price' => 20000,
    'quantity' => 2,
    'name' => "Orange"
);

// Optional
$item_details = array ($item1_details, $item2_details);

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
    ),
    'enabled_payments' => array(
        'credit_card',
        'bca_va',
        'bni_va',
        'bri_va',
        'permata_va',
        'shopeepay',
        'indomaret',
        'alfamart'
    ),
    'customer_details' => array(
        'first_name' => "Test",
        "email" => "user@example.com",
        "phone" => "0000876767"
    ),
    'item_details' => $item_details,
    'expiry' => array(
        'start_time' => date('Y-m-d H:i:s').'+0700',
        'unit' => 'day',
        'duration' => 1
    ),
    'callbacks' => array(
        'finish' => 'http://localhost:8080/AppPenjualan/view/index.php?checkout'. "&application_fee="."1500"
    )
);

$snap_token = Snap::getSnapToken($params);

?>