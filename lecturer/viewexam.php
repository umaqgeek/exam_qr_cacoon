<?php
if (isset($_GET['e_id']) && !empty($_GET['e_id'])) {
    
    $e_id = $_GET['e_id'];
    
    
} else {
    header("Location: index.php?page=lecturer/index.php&error=Access denied!#viewexam");
    die();
}
?>

<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>View Attendance List</h3>
            
            
            
        </div>
    </section>
    
</div>