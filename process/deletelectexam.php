<?php 
require("../conn.php");
if (isset($_GET['e_id']) && !empty($_GET['e_id'])) {
    
    $e_id = $_GET['e_id'];
    
    $sql = sprintf("DELETE FROM examination WHERE e_id = '%s' ", $e_id);
    mysql_query($sql) or die("<script>location.href='../index.php?error=Error: ".mysql_error()."&page=staff/index.php#managestudsub';</script>");
    header("Location: ../index.php?page=staff/index.php#managestudsub");
    die();
    
} else {
    header("Location: ../index.php?error=Access denied!&page=staff/index.php#managestudsub");
    die();
}
?>