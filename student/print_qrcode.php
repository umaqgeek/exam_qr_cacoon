<?php
require("../conn.php");
if (isset($_GET['code']) && !empty($_GET['code'])) {
    
    $str_code = $_GET['code'];
    $qr_code = generate_qr_code($str_code);
    echo $qr_code;
    echo "<script>window.print();</script>";
    
} else {
    header("Location: ../index.php?error=Access denied!");
    die();
}
?>