<?php
require("../conn.php");
if (isset($_POST['e_id']) && !empty($_POST['e_id']) && isset($_POST['u_id']) && !empty($_POST['u_id'])) {
  
    $e_id = $_POST['e_id'];
    $u_id = $_POST['u_id'];
    
    if ($e_id == '-1' || $e_id == null || $u_id == '-1' || $u_id == null) {
        header("Location: ../index.php?page=staff/addstudentexam.php&controller=1&error=Do not leave blank!");
        die();
    }
    
    /**
     * if already assign student to that exam, quit
     */
    $sql = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' AND u_id = '%s' ", $e_id, $u_id);
    $r = mysql_query($sql) or die("<script>location.href='../index.php?page=staff/addstudentexam.php&controller=1&error=Error: ".mysql_error()."';</script>");
    $t = mysql_num_rows($r);
    if ($t > 0) {
        header("Location: ../index.php?page=staff/addstudentexam.php&controller=1&error=Already assigned!");
        die();
    }
    
    /**
     * assign student to that exam
     */
    $sql = sprintf("INSERT INTO stud_exam(e_id, u_id) VALUES('%s', '%s') ", $e_id, $u_id);
    mysql_query($sql) or die("<script>location.href='../index.php?page=staff/addstudentexam.php&controller=1&error=Error: ".mysql_error()."';</script>");
    header("Location: ../index.php?page=staff/index.php#managestudexam");
    die();
    
} else {
    
    header("Location: ../index.php?page=staff/addstudentexam.php&controller=1&error=Do not leave blank!");
    die();
}
?>