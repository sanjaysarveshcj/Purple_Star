<?php
require('razorpay-php/Razorpay.php'); // Include Razorpay SDK

use Razorpay\Api\Api;

// Your Razorpay API keys
$keyId = 'CYQyLn45gM8JHIogWDMO0By6';
$keySecret = 'YOUR_RAZORPAY_SECRET';

try {
    // $api = new Api($keyId, $keySecret);

    // Amount in the smallest currency unit (e.g., 1000 paise = 10 INR)
    $orderAmount = 1000;

    // Create a new Razorpay order
    $order = $api->order->create([
        'receipt' => 'order_rcptid_11',
        'amount' => $orderAmount,
        'currency' => 'INR',
    ]);

    echo json_encode([
        'id' => $order['id'],
        'amount' => $orderAmount,
    ]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
