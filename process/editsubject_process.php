<?php
require("../conn.php");
if (isset($_POST['s_id']) && !empty($_POST['s_id']) 
        && isset($_POST['s_code']) && !empty($_POST['s_code']) 
        && isset($_POST['s_name']) && !empty($_POST['s_name'])) {
  
    $s_id = $_POST['s_id'];
    $s_code = $_POST['s_code'];
    $s_name = $_POST['s_name'];
    
    if ($s_id == '' || $s_id == null 
            || $s_code == '' || $s_code == null 
            || $s_name == '' || $s_code == null) {
        header("Location: ../index.php?page=staff/editsubject.php&controller=1&error=Do not leave blank!");
        die();
    }
    
    $sql = sprintf("UPDATE subject SET sub_code = '%s', sub_name = '%s' WHERE sub_id = '%s' ", $s_code, $s_name, $s_id);
    mysql_query($sql) or die("<script>location.href='../index.php?page=staff/editsubject.php&controller=1&error=Error: ".mysql_error()."';</script>");
    header("Location: ../index.php?page=staff/index.php#subject");
    die();
    
} else {
    
    header("Location: ../index.php?page=staff/editsubject.php&controller=1&error=Do not leave blank!");
    die();
}
?>