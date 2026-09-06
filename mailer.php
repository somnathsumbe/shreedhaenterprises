<?php
$to = 'somasumbe@gmail.com';
$subject = 'New enquiry from Shreedha Enterprises website';

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !$phone || !$email || !$message) {
    header('Location: index.html?error=1');
    exit;
}

$body = "Name: $name\n";
$body .= "Phone: $phone\n";
$body .= "Email: $email\n\n";
$body .= "Requirement:\n$message\n";

$headers = [];
$headers[] = 'From: Shreedha Enterprises <info@shreedhaenterprises.in>';
$headers[] = 'Reply-To: somasumbe@gmail.com';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

$mailSent = mail($to, $subject, $body, implode("\r\n", $headers));

if ($mailSent) {
    header('Location: index.html?success=1');
} else {
    header('Location: index.html?error=1');
}
exit;
?>
