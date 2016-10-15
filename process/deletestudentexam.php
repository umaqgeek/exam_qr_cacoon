<?php 
require("../conn.php");
if (isset($_GET['se_id']) && !empty($_GET['se_id'])) {
    
    $se_id = $_GET['se_id'];
    
    $sql = sprintf("DELETE FROM stud_exam WHERE se_id = '%s' ", $se_id);
    mysql_query($sql) or die("<script>location.href='../index.php?error=Error: ".mysql_error()."&page=staff/index.php#managestudexam';</script>");
    header("Location: ../index.php?page=staff/index.php#managestudexam");
    die();
    
} else {
    header("Location: ../index.php?error=Access denied!&page=staff/index.php#managestudexam");
    die();
}
?>