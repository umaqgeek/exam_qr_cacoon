<?php require_once("menubar.php"); ?>
<?php
if (isset($_GET['page'])) {
    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
        header("Location: index.php");
        die();
    }
    
    $page = $_GET['page'];
    require($page);
    
} else {
    
    require("login.php");
    
} ?>
