<?php
require('razorpay-php/Razorpay.php'); // Include Razorpay SDK

use Razorpay\Api\Api;

$keyId = 'CYQyLn45gM8JHIogWDMO0By6';
$keySecret = 'YOUR_RAZORPAY_SECRET';

// Read JSON payload from the request
$payload = file_get_contents('php://input');
$data = json_decode($payload, true);

if (!empty($data)) {
    $paymentId = $data['razorpay_payment_id'];
    $orderId = $data['razorpay_order_id'];
    $signature = $data['razorpay_signature'];

    try {
        // $api = new Api($keyId, $keySecret);

        // Verify the signature
        $attributes = [
            'razorpay_order_id' => $orderId,
            'razorpay_payment_id' => $paymentId,
            'razorpay_signature' => $signature,
        ];

        $api->utility->verifyPaymentSignature($attributes);

        // Payment is verified
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        // Payment verification failed
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data received.']);
}
?>
