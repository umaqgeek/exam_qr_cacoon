<?php
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
?>

<li><a href="#login">Login</a></li>
<li><a href="#about">About System</a></li>

<?php
} else {
    if (isset($_SESSION['type'])) {
        $type = $_SESSION['type'];
        if ($type == 'student') {
            ?>
<li><a href="#profile">Profile Overview</a></li>
<li><a href="#viewexam">View Examination</a></li>
<li><a href="logout.php">Log Out</a></li>
<?php
        } else if ($type == 'staff_1') {
            $controller = (isset($_GET['controller'])) ? ($_GET['controller']) : (0);
            if ($controller == 1) {
                $link = "index.php?page=staff/index.php";
                ?>
<li><a href="<?=$link; ?>#profile">Profile Overview</a></li>
<li><a href="<?=$link; ?>#subject">Manage Subject</a></li>
<li><a href="<?=$link; ?>#managelectsub">Manage Lecturer-Subject</a></li>
<li><a href="<?=$link; ?>#managestudsub">Manage Examination</a></li>
<li><a href="<?=$link; ?>#managestudexam">Manage Student-Exam</a></li>
<li><a href="<?=$link; ?>#viewexam">View Examination</a></li>
<li><a href="logout.php">Log Out</a></li>
<?php
            } else {
            ?>
<li><a href="#profile">Profile Overview</a></li>
<li><a href="#subject">Manage Subject</a></li>
<li><a href="#managelectsub">Manage Lecturer-Subject</a></li>
<li><a href="#managestudsub">Manage Examination</a></li>
<li><a href="#managestudexam">Manage Student-Exam</a></li>
<li><a href="#viewexam">View Examination</a></li>
<li><a href="logout.php">Log Out</a></li>
<?php
            }
        } else if ($type == 'staff_2') {
            $controller = (isset($_GET['controller'])) ? ($_GET['controller']) : (0);
            if ($controller == 1) {
                $link = "index.php?page=lecturer/index.php";
                ?>
<li><a href="<?=$link; ?>#profile">Profile Overview</a></li>
<li><a href="<?=$link; ?>#viewexam">View Examination</a></li>
<li><a href="logout.php">Log Out</a></li>
<?php
            } else {
            ?>
<li><a href="#profile">Profile Overview</a></li>
<li><a href="#viewexam">View Examination</a></li>
<li><a href="logout.php">Log Out</a></li>
<?php
            }
        }
    }
?>

<?php } ?>
