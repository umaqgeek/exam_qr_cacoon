<?php
require("../conn.php");
$arr = $_POST;
foreach ($arr as $ar) {
    if ($ar == '' || $ar == null || empty($ar) || $ar == -1 || $ar == "-1" || $ar == 0 || $ar == "0") {
        header("Location: ../index.php?page=staff/addexam.php&controller=1&error=Do not leave blank!");
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
$e_numstudent = $_POST['e_numstudent'];
$e_numstudent = (is_numeric($e_numstudent)) ? ($e_numstudent) : ("0");
$sql = sprintf("INSERT INTO examination(sub_id, e_datetime, e_starttime, e_endtime, v_id, e_numstudent) "
        . "VALUES('%s', '%s', '%s', '%s', '%s', '%s') ", 
        $sub_id, $e_datetime, $e_starttime, $e_endtime, $v_id, $e_numstudent);
mysql_query($sql) or die("<script>location.href='../index.php?page=staff/addexam.php&controller=1&error=Error: ".mysql_error()."';</script>");
header("Location: ../index.php?page=staff/index.php#managestudsub");
die();
?>