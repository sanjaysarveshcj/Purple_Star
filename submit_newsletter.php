<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form input
    $subscriberEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($subscriberEmail, FILTER_VALIDATE_EMAIL)) {
        
        $to = "company@example.com";  // Replace with the company email address
        $subject = "New Newsletter Subscription";
        $message = "A new user has subscribed to the newsletter with the following email: " . $subscriberEmail;
        
        // Email headers
        $headers = "From: no-reply@yourwebsite.com" . "\r\n" . 
                   "Reply-To: no-reply@yourwebsite.com" . "\r\n" .
                   "Content-Type: text/plain; charset=UTF-8" . "\r\n";
        
        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            exit();

        } else {
            echo "<p>Sorry, there was an issue with the subscription. Please try again.</p>";
        }
        
    } else {
        echo "<p>Please enter a valid email address.</p>";
    }
}
?>
