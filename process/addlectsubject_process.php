<?php
require("../conn.php");
if (isset($_POST['s_id']) && !empty($_POST['s_id']) && isset($_POST['sub_id']) && !empty($_POST['sub_id'])) {
  
    $s_id = $_POST['s_id'];
    $sub_id = $_POST['sub_id'];
    
    if ($s_id == '-1' || $s_id == null || $sub_id == '-1' || $sub_id == null) {
        header("Location: ../index.php?page=staff/addlectsubject.php&controller=1&error=Do not leave blank!");
        die();
    }
    
    /**
     * if already assign lecturer to that subject, quit
     */
    $sql = sprintf("SELECT * FROM lect_subject WHERE s_id = '%s' AND sub_id = '%s' ", $s_id, $sub_id);
    $r = mysql_query($sql) or die("<script>location.href='../index.php?page=staff/addlectsubject.php&controller=1&error=Error: ".mysql_error()."';</script>");
    $t = mysql_num_rows($r);
    if ($t > 0) {
        header("Location: ../index.php?page=staff/addlectsubject.php&controller=1&error=Already assigned!");
        die();
    }
    
    /**
     * assign lecturer to that subject
     */
    $sql = sprintf("INSERT INTO lect_subject(s_id, sub_id) VALUES('%s', '%s') ", $s_id, $sub_id);
    mysql_query($sql) or die("<script>location.href='../index.php?page=staff/addlectsubject.php&controller=1&error=Error: ".mysql_error()."';</script>");
    header("Location: ../index.php?page=staff/index.php#managelectsub");
    die();
    
} else {
    
    header("Location: ../index.php?page=staff/addlectsubject.php&controller=1&error=Do not leave blank!");
    die();
}
?>