<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=travel', 'root', '');

// Retrieve email address from form
$email = $_POST['email'];

// Check if email address is registered
$stmt = $pdo->prepare('SELECT user_no FROM users  WHERE users.Email= ?');
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    // If email address is not registered, redirect back to forgot_password.php with an error message
    header('Location: forgot_password2.php?error=Email address not found');
    exit;
}

// Generate random code and store it in the database
$reset_code = bin2hex(random_bytes(3));
$stmt = $pdo->prepare('UPDATE users SET password = ? WHERE user_no = ?');
$stmt->execute([$reset_code, $user['user_no']]);

// Send reset code to user's email address using Gmail SMTP
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cabdihamza851@gmail.com';
    $mail->Password = 'fpjbqspqgmwwmhtp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    //tmph
    //qofka
    $mail->setFrom('cabdihamza851@gmail.com', 'TRAVEL MANAGEMENT SYSTEM');
    $mail->addAddress($email);

    //waxa la diraayo
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset Code';
    $mail->Body = 'Your password reset code is: ' . $reset_code;

    $mail->send();

    // reset password geey an email has been sent
    header('Location: reset_password2.php?email=' . urlencode($email));
    exit;
} catch (Exception $e) {
    // haddi la diri waayo ku soo celi forgot_password.php with an error message
    header('Location: forgot_password2.php?error=' . urlencode('Email failed to send: ' . $mail->ErrorInfo));
    exit;
}
