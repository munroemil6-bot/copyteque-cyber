<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if (empty($name)) {
        die('Error: Name is required');
    }
    
    if (empty($email) && empty($phone)) {
        die('Error: Email or phone is required');
    }
    
    $to = 'laisamoses@gmail.com';
    $subject = 'New Inquiry from Copyteque Website';
    
    $emailBody = "New Customer Inquiry\n\n";
    $emailBody .= "Name: " . $name . "\n";
    $emailBody .= "Email: " . ($email ?: 'Not provided') . "\n";
    $emailBody .= "Phone: " . ($phone ?: 'Not provided') . "\n";
    $emailBody .= "Service: " . ($service ?: 'General Inquiry') . "\n";
    $emailBody .= "Message: " . ($message ?: 'No additional message') . "\n\n";
    $emailBody .= "Sent from Copyteque website on " . date('Y-m-d H:i:s');
    
    $headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
    if ($email) {
        $headers .= "Reply-To: " . $email . "\r\n";
    }
    
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "SUCCESS";
    } else {
        echo "FAILED";
    }
} else {
    echo "Invalid request method";
}
?>