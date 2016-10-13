<?php
require("conn.php");
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    
    if ($user == '' || $user == null || $pwd == '' || $pwd == null) {
        header("Location: index.php?error=Cannot leave blank!");
        die();
    }
    
    $sql1 = sprintf("SELECT * FROM users1 WHERE u_matric = '%s' AND u_password = '%s' ", $user, $pwd);
    $r1 = mysql_query($sql1) or die("<script>location.href='index.php?error=Opss! Error: ".mysql_error()."';</script>");
    $t1 = mysql_num_rows($r1);
    if ($t1 > 0) {
        // go to student page
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $pwd;
        $_SESSION['logged_in'] = true;
        $_SESSION['type'] = 'student';
        header("Location: index.php?page=student/index.php");
        die();
    } else {
        $sql2 = sprintf("SELECT * FROM staff1 WHERE s_number = '%s' AND s_password = '%s' ", $user, $pwd);
        $r2 = mysql_query($sql2) or die("<script>location.href='index.php?error=Opss! Error: ".mysql_error()."';</script>");
        $t2 = mysql_num_rows($r2);
        if ($t2 > 0) {
            // go to staff page
            $_SESSION['username'] = $user;
            $_SESSION['password'] = $pwd;
            $_SESSION['logged_in'] = true;
            $d = mysql_fetch_array($r2);
            $type = ($d['s_type'] == 1) ? ('staff_1') : ('staff_2');
            $_SESSION['type'] = $type;
            $parent = ($d['s_type'] == 1) ? ('staff') : ('lecturer');
            header("Location: index.php?page=".$parent."/index.php");
            die();
        } else {
            header("Location: index.php?error=Invalid matric/staff no. or wrong password!");
            die();
        }
    }
    
} else {
    header("Location: index.php?error=Cannot leave blank!");
    die();
}
?>