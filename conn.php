<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "qr_izhar_db";
$conn = mysql_connect($hostname, $username, $password);
if (!$conn) {
    die("Error: ".mysql_error());
}
mysql_select_db($database);
if (!isset($_SESSION)) {
    session_start();
}
?>