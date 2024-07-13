<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


session_start();
$con = mysqli_connect('localhost', 'root', '', 'travel');
$email = $_POST['email'];
$res = mysqli_query($con, "select * from users where Email='$email'");
$row = $res->fetch_array(MYSQLI_NUM);
//$_SESSION['user_type'] = $row[3];
$_SESSION['username'] = $row[1];
$_SESSION['user'] = $row[0];
$count = mysqli_num_rows($res);
if ($count > 0) {
	$otp = rand(11111, 99999);
	mysqli_query($con, "update users set otp='$otp' where Email='$email'");
	$html = "Your otp verification code is " . $otp;
	$_SESSION['EMAIL'] = $email;
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
		$mail->Body = 'Your password reset code is: ' . $otp;

		$mail->send();
		echo "yes";
		// reset password geey an email has been sent
		// header('Location: reset_password2.php?email=' . urlencode($email));
		exit;
	} catch (Exception $e) {
		// haddi la diri waayo ku soo celi forgot_password.php with an error message
		// header('Location: forgot_password2.php?error=' . urlencode('Email failed to send: ' . $mail->ErrorInfo));
		exit;
	}
} else {
	echo "not_exist";
}

function smtp_mailer($to, $subject, $msg)
{
	$mail = new PHPMailer(true);
	try {



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
		$mail->addAddress($to);

		//waxa la diraayo
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $msg;

		$mail->send();
		exit;
	} catch (Exception $e) {
		echo $e;
		// haddi la diri waayo ku soo celi forgot_password.php with an error message
		//  header('Location: forgot_password2.php?error=' . urlencode('Email failed to send: ' . $mail->ErrorInfo));
		exit;
	}
}
