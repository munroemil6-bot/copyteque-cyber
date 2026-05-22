<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

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
    <p><small>This message was sent from the Copyteque website contact form.</small></p>
</body>
</html>
";

$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: Copyteque Website <noreply@copyteque.com>',
    'Reply-To: ' . ($email ?: 'noreply@copyteque.com'),
    'X-Mailer: PHP/' . phpversion()
];

if (mail($to, $subject, $emailBody, implode("\r\n", $headers))) {
    echo json_encode(['success' => true, 'message' => 'Email sent successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to send email']);
}
?>