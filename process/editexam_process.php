<?php
require("../conn.php");
$arr = $_POST;
if (isset($_POST['e_id']) && !empty($_POST['e_id'])) {
    $e_id = $_POST['e_id'];
    foreach ($arr as $ar) {
        if ($ar == '' || $ar == null || empty($ar) || $ar == -1 || $ar == "-1" || $ar == 0 || $ar == "0") {
            header("Location: ../index.php?page=staff/editexam.php&controller=1&e_id=".$e_id."&error=Do not leave blank!");
            die();
        }
    }
    $sub_id = $_POST['sub_id'];
    $e_datetime = $_POST['e_datetime'];
    $e_starttime = $_POST['e_starttime'];
    $e_starttime = date('Y-m-d ') . $e_starttime . ":00";
    $e_endtime = $_POST['e_endtime'];
    $e_endtime = date('Y-m-d ') . $e_endtime . ":00";
    $v_id = $_POST['v_id'];
    $sql = sprintf("UPDATE examination SET "
            . "sub_id = '%s', "
            . "e_datetime = '%s', "
            . "e_starttime = '%s', "
            . "e_endtime = '%s', "
            . "v_id = '%s' "
            . "WHERE e_id = '%s' ", 
            $sub_id, $e_datetime, $e_starttime, $e_endtime, $v_id, $e_id);
    mysql_query($sql) or die("<script>location.href='../index.php?page=staff/editexam.php&controller=1&e_id=".$e_id."&error=Error: ".mysql_error()."';</script>");
    header("Location: ../index.php?page=staff/index.php#managestudsub");
    die();
} else {
    header("Location: ../index.php?page=staff/index.php&error=Access denied!#managestudsub");
    die();
}
?>