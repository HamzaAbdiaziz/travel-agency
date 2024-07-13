<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['user']);
unset($_SESSION['date']);
header('Location:login.php');
?>
