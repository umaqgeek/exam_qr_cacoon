<?php
require("../conn.php");
if (isset($_POST['ls_id']) && !empty($_POST['ls_id'])) {
    $ls_id = $_POST['ls_id'];
    if (isset($_POST['s_id']) && !empty($_POST['s_id']) 
            && isset($_POST['sub_id']) && !empty($_POST['sub_id'])) {

        $s_id = $_POST['s_id'];
        $sub_id = $_POST['sub_id'];

    //    print_r($_POST); die();

        if ($ls_id == '-1' || $ls_id == null 
                || $s_id == '-1' || $s_id == null 
                || $sub_id == '-1' || $sub_id == null) {
            header("Location: ../index.php?page=staff/editlectsubject.php&controller=1&ls_id=".$ls_id."&error=Do not leave blank!");
            die();
        }

        /**
         * if already assign lecturer to that subject, quit
         */
        $sqlx = sprintf("SELECT * FROM lect_subject WHERE s_id = '%s' AND sub_id = '%s' ", $s_id, $sub_id);
        $rx = mysql_query($sqlx) or die("<script>location.href='../index.php?page=staff/editlectsubject.php&controller=1&ls_id=".$ls_id."&error=Error: ".mysql_error()."';</script>");
        $tx = mysql_num_rows($rx);
        if ($tx > 0) {
            header("Location: ../index.php?page=staff/editlectsubject.php&controller=1&ls_id=".$ls_id."&error=Already assigned!");
            die();
        }

        $sql = sprintf("UPDATE lect_subject SET s_id = '%s', sub_id = '%s' WHERE ls_id = '%s' ", $s_id, $sub_id, $ls_id);
        mysql_query($sql) or die("<script>location.href='../index.php?page=staff/editlectsubject.php&controller=1&ls_id=".$ls_id."&error=Error: ".mysql_error()."';</script>");
        header("Location: ../index.php?page=staff/index.php#managelectsub");
        die();

    } else {

        header("Location: ../index.php?page=staff/editlectsubject.php&controller=1&ls_id=".$ls_id."&error=Do not leave blank!");
        die();
    }
} else {
    header("Location: ../index.php?page=staff/index.php&error=Access denied!#managelectsub");
    die();
}
?>