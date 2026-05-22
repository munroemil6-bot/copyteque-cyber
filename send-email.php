<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
    exit;
}

$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$phone = trim($input['phone'] ?? '');
$service = trim($input['service'] ?? '');
$message = trim($input['message'] ?? '');

if (empty($name)) {
    echo json_encode(['success' => false, 'message' => 'Name is required']);
    exit;
}

if (empty($email) && empty($phone)) {
    echo json_encode(['success' => false, 'message' => 'Email or phone is required']);
    exit;
}

$to = 'laisamoses@gmail.com';
$subject = 'New Inquiry from Copyteque Website';

$emailBody = "
<html>
<head>
    <title>New Inquiry from Copyteque Website</title>
</head>
<body>
    <h2>New Customer Inquiry</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> " . ($email ?: 'Not provided') . "</p>
    <p><strong>Phone:</strong> " . ($phone ?: 'Not provided') . "</p>
    <p><strong>Service Needed:</strong> " . ($service ?: 'General Inquiry') . "</p>
    <p><strong>Message:</strong></p>
    <p>" . nl2br(htmlspecialchars($message ?: 'No additional message')) . "</p>
    <hr>
    <p><small>This message was sent from the Copyteque website contact form on " . date('Y-m-d H:i:s') . "</small></p>
</body>
</html>
";

// Get server name for From header
$serverName = $_SERVER['HTTP_HOST'] ?? 'copyteque.com';

$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: Copyteque Website <noreply@' . $serverName . '>',
    'Reply-To: ' . ($email ?: 'noreply@' . $serverName),
    'X-Mailer: PHP/' . phpversion()
];

// Log the attempt
$logData = [
    'timestamp' => date('Y-m-d H:i:s'),
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'service' => $service,
    'message' => substr($message, 0, 100) . '...'
];
file_put_contents('contact_log.txt', json_encode($logData) . "\n", FILE_APPEND | LOCK_EX);

// Try to send email
$mailResult = mail($to, $subject, $emailBody, implode("\r\n", $headers));

if ($mailResult) {
    echo json_encode(['success' => true, 'message' => 'Email sent successfully']);
} else {
    // Get last error
    $lastError = error_get_last();
    $errorMsg = $lastError ? $lastError['message'] : 'Unknown mail error';
    
    echo json_encode([
        'success' => false, 
        'message' => 'Failed to send email: ' . $errorMsg,
        'debug' => [
            'mail_function_exists' => function_exists('mail'),
            'server' => $serverName,
            'php_version' => phpversion()
        ]
    ]);
}
?>