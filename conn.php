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

function generate_qr_code($str) {
    include('assets/qr/QRGenerator.php');
    $ayat = (isset($str) && !empty($str) && $str != '' && $str != null) ? ($str) : ("--");
    $qrcode = new QRGenerator($ayat, 100);  // 100 is the qr size
    $code = $qrcode->generate();
    return "<a href='" . $code . "' target='_blank'><img src='". $code ."'></a>";
}
?>