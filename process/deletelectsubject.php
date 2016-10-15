<?php 
require("../conn.php");
if (isset($_GET['ls_id']) && !empty($_GET['ls_id'])) {
    
    $ls_id = $_GET['ls_id'];
    
    $sql = sprintf("DELETE FROM lect_subject WHERE ls_id = '%s' ", $ls_id);
    mysql_query($sql) or die("<script>location.href='../index.php?error=Error: ".mysql_error()."&page=staff/index.php#managelectsub';</script>");
    header("Location: ../index.php?page=staff/index.php#managelectsub");
    die();
    
} else {
    header("Location: ../index.php?error=Access denied!&page=staff/index.php#managelectsub");
    die();
}
?>