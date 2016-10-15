<?php
require("../conn.php");
if (isset($_POST['s_code']) && !empty($_POST['s_code']) && isset($_POST['s_name']) && !empty($_POST['s_name'])) {
  
    $s_code = $_POST['s_code'];
    $s_name = $_POST['s_name'];
    
    if ($s_code == '' || $s_code == null || $s_name == '' || $s_code == null) {
        header("Location: ../index.php?page=staff/addsubject.php&controller=1&error=Do not leave blank!");
        die();
    }
    
    $sql = sprintf("INSERT INTO subject(sub_code, sub_name) VALUES('%s', '%s') ", $s_code, $s_name);
    mysql_query($sql) or die("<script>location.href='../index.php?page=staff/addsubject.php&controller=1&error=Error: ".mysql_error()."';</script>");
    header("Location: ../index.php?page=staff/index.php#subject");
    die();
    
} else {
    
    header("Location: ../index.php?page=staff/addsubject.php&controller=1&error=Do not leave blank!");
    die();
}
?>