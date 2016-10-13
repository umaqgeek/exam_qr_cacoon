<div id="wrapper">

    <!-- Intro -->
    <section id="profile" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>Profile Overview</h3>
            
            <?php
            $username = (isset($_SESSION['username'])) ? ($_SESSION['username']) : ("-");
            $password = (isset($_SESSION['password'])) ? ($_SESSION['password']) : ("-");
            $sql = sprintf("SELECT * FROM users1 WHERE u_matric = '%s' AND u_password = '%s' ", $username, $password);
            $r = mysql_query($sql) or die("Error: ".mysql_error());
            $t = mysql_num_rows($r);
            $d = mysql_fetch_array($r);
            if ($t > 0) {
            ?>
            
            <div class="row">
                <div class="col-sm-12">
                    <img src="assets/images/uploads/<?=$d['u_profilepic']; ?>" class="img-circle" style="max-width: 200px; max-height: 200px;" /> 
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table width="100%">
                        <tr>
                            <td>Matric No.</td>
                            <td>:</td>
                            <td><strong><?=$d['u_matric']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><strong><?=$d['u_name']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Course</td>
                            <td>:</td>
                            <td><strong><?=$d['u_course']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Faculty</td>
                            <td>:</td>
                            <td><strong><?=$d['u_faculty']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Course Year</td>
                            <td>:</td>
                            <td><strong><?=$d['u_courseyear']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Contact No.</td>
                            <td>:</td>
                            <td><strong><?=$d['u_contact']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td><strong><?=$d['u_email']; ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <?php } ?>

        </div>
    </section>

    <!-- One -->
    <section id="viewexam" class="wrapper style2 fullscreen spotlights">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>View Examination</h3>

        </div>
    </section>

</div>