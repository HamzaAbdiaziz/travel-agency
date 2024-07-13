<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'travel');
$otp = $_POST['otp'];
$email = $_SESSION['EMAIL'];
$res = mysqli_query($con, "select * from users where Email='$email' and otp='$otp'");
$count = mysqli_num_rows($res);
if ($count > 0) {
	mysqli_query($con, "update users set otp='' where Email='$email'");
	$_SESSION['IS_LOGIN'] = $email;
	echo "yes";
} else {
	echo "not_exist";
}
?>
