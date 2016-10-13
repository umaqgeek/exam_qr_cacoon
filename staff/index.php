<div id="wrapper">

    <!-- Intro -->
    <section id="profile" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>Profile Overview (Lecturer Profile)</h3>
            
            <?php
            $username = (isset($_SESSION['username'])) ? ($_SESSION['username']) : ("-");
            $password = (isset($_SESSION['password'])) ? ($_SESSION['password']) : ("-");
            $sql = sprintf("SELECT * FROM staff1 WHERE s_number = '%s' AND s_password = '%s' ", $username, $password);
            $r = mysql_query($sql) or die("Error: ".mysql_error());
            $t = mysql_num_rows($r);
            $d = mysql_fetch_array($r);
            if ($t > 0) {
            ?>
            
            <div class="row">
                <div class="col-sm-12">
                    <img src="assets/images/uploads/<?=$d['s_profilepic']; ?>" class="img-circle" style="max-width: 200px; max-height: 200px;" /> 
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table width="100%">
                        <tr>
                            <td>Lecturer No.</td>
                            <td>:</td>
                            <td><strong><?=$d['s_number']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><strong><?=$d['s_name']; ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <?php } ?>

        </div>
    </section>

    <!-- One -->
    <section id="subject" class="wrapper style2 fullscreen spotlights">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>Manage Subject</h3>
            
            <?php
            $sql_2 = "SELECT * FROM subject ORDER BY s_name";
            $r2 = mysql_query($sql_2) or die("Error: ".  mysql_error());
            $t2 = mysql_num_rows($r2);
            $d2 = mysql_fetch_array($r2);
            ?>
            
            <a href="index.php?page=staff/addsubject.php&controller=1">
                <button class="btn btn-success" type="button">Add Subject</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($t2 > 0) {
                        do {
                    ?>
                    <tr>    
                        <td><?=$d2['s_code']; ?></td>
                        <td><?=$d2['s_name']; ?></td>
                        <td>
                            <a href="">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="">
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } while ($d2 = mysql_fetch_array($r2)); } ?>
                </tbody>
            </table>

        </div>
    </section>
    
    <section id="viewexam" class="wrapper style2 fullscreen spotlights">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>View Examination</h3>

        </div>
    </section>

</div>