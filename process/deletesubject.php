<?php 
require("../conn.php");
if (isset($_GET['s_id']) && !empty($_GET['s_id'])) {
    
    $s_id = $_GET['s_id'];
    
    $sql = sprintf("DELETE FROM subject WHERE sub_id = '%s' ", $s_id);
    mysql_query($sql) or die("<script>location.href='../index.php?error=Error: ".mysql_error()."&page=staff/index.php#subject';</script>");
    header("Location: ../index.php?page=staff/index.php#subject");
    die();
    
} else {
    header("Location: ../index.php?error=Access denied!&page=staff/index.php#subject");
    die();
}
?>