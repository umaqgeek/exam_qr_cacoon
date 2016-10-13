<?php
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
?>

<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#login">Login</a></li>
                <li><a href="#about">About System</a></li>
            </ul>
        </nav>
    </div>
</section>

<?php
} else {
    if (isset($_SESSION['type'])) {
        $type = $_SESSION['type'];
        if ($type == 'student') {
            ?>
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#profile">Profile Overview</a></li>
                <li><a href="#viewexam">View Examination</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
</section>
<?php
        } else if ($type == 'staff_1') {
            $controller = (isset($_GET['controller'])) ? ($_GET['controller']) : (0);
            if ($controller == 1) {
                ?>
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="index.php?page=staff/index.php#profile">Profile Overview</a></li>
                <li><a href="index.php?page=staff/index.php#subject">Manage Subject</a></li>
                <li><a href="index.php?page=staff/index.php#viewexam">View Examination</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
</section>
<?php
            } else {
            ?>
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#profile">Profile Overview</a></li>
                <li><a href="#subject">Manage Subject</a></li>
                <li><a href="#viewexam">View Examination</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
</section>
<?php
            }
        } else if ($type == 'staff_2') {
            ?>
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#profile">Profile Overview</a></li>
                <li><a href="#viewexam">View Examination</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
</section>
<?php
        }
    }
?>

<?php } ?>
