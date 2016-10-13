<?php
session_start();
$_SESSION['username'] = "";
$_SESSION['password'] = "";
$_SESSION['logged_in'] = false;
$_SESSION['type'] = "";
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['logged_in']);
unset($_SESSION['type']);
header("Location: index.php");
die();
?>