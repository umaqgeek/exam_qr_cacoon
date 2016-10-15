<?php
require("../conn.php");
if (isset($_POST['se_id']) && !empty($_POST['se_id'])) {
    $se_id = $_POST['se_id'];
    if (isset($_POST['u_id']) && !empty($_POST['u_id']) 
            && isset($_POST['e_id']) && !empty($_POST['e_id'])) {

        $e_id = $_POST['e_id'];
        $u_id = $_POST['u_id'];

    //    print_r($_POST); die();

        if ($se_id == '-1' || $se_id == null 
                || $e_id == '-1' || $e_id == null 
                || $u_id == '-1' || $u_id == null) {
            header("Location: ../index.php?page=staff/editstudentexam.php&controller=1&se_id=".$se_id."&error=Do not leave blank!");
            die();
        }

        /**
         * if already assign lecturer to that subject, quit
         */
        $sqlx = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' AND u_id = '%s' ", $e_id, $u_id);
        $rx = mysql_query($sqlx) or die("<script>location.href='../index.php?page=staff/editstudentexam.php&controller=1&se_id=".$se_id."&error=Error: ".mysql_error()."';</script>");
        $tx = mysql_num_rows($rx);
        if ($tx > 0) {
            header("Location: ../index.php?page=staff/editstudentexam.php&controller=1&se_id=".$se_id."&error=Already assigned!");
            die();
        }

        $sql = sprintf("UPDATE stud_exam SET e_id = '%s', u_id = '%s' WHERE se_id = '%s' ", $e_id, $u_id, $se_id);
        mysql_query($sql) or die("<script>location.href='../index.php?page=staff/editstudentexam.php&controller=1&se_id=".$se_id."&error=Error: ".mysql_error()."';</script>");
        header("Location: ../index.php?page=staff/index.php#managestudexam");
        die();

    } else {

        header("Location: ../index.php?page=staff/editstudentexam.php&controller=1&se_id=".$se_id."&error=Do not leave blank!");
        die();
    }
} else {
    header("Location: ../index.php?page=staff/index.php&error=Access denied!#managestudexam");
    die();
}
?>