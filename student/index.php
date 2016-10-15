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
            
            <?php
            $username = (isset($_SESSION['username'])) ? ($_SESSION['username']) : ("-");
            $password = (isset($_SESSION['password'])) ? ($_SESSION['password']) : ("-");
            $sql_2 = sprintf("SELECT * FROM examination e, venue v, subject sub, "
                    . "stud_exam se, stud_exam_status ses, users1 u "
                    . "WHERE e.sub_id = sub.sub_id "
                    . "AND e.v_id = v.v_id "
                    . "AND e.e_id = se.e_id "
                    . "AND se.ses_id = ses.ses_id "
                    . "AND se.u_id = u.u_id "
                    . "AND u.u_matric = '%s' "
                    . "AND u.u_password = '%s' "
                    . "GROUP BY e.e_id ", 
                    $username, $password);
            $r2 = mysql_query($sql_2) or die("Error: ". mysql_error());
            $t2 = mysql_num_rows($r2);
            $d2 = mysql_fetch_array($r2);
            ?>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Table No.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($t2 > 0) {
                        do {
                            $e_id = $d2['e_id'];
                            
                            $sql_x1 = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' ", $e_id);
                            $r_x1 = mysql_query($sql_x1) or die("Error: ".  mysql_error());
                            $t_x1 = mysql_num_rows($r_x1);
                            $attendance_all = $t_x1;
                            
                            $sql_x2 = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' AND ses_id = 2 ", $e_id);
                            $r_x2 = mysql_query($sql_x2) or die("Error: ".  mysql_error());
                            $t_x2 = mysql_num_rows($r_x2);
                            $attendance_present = $t_x2;
                    ?>
                    <tr>    
                        <td><?=date('d/m/Y', strtotime($d2['e_datetime'])); ?></td>
                        <td><?=$d2['sub_code']; ?> <?=$d2['sub_name']; ?></td>
                        <td><?=date('h:i A', strtotime($d2['e_starttime'])); ?> - <?=date('h:i A', strtotime($d2['e_endtime'])); ?></td>
                        <td><?=$d2['v_desc']; ?></td>
                        <td><?php
                        $se_tableno = $d2['se_tableno'];
                        if ($se_tableno != 0 && $se_tableno != "0" && $se_tableno != '' && $se_tableno != null) {
                            echo number_format($se_tableno, 0);
                        }
                        ?>&nbsp;</td>
                    </tr>
                    <?php } while ($d2 = mysql_fetch_array($r2)); } ?>
                </tbody>
            </table>

        </div>
    </section>

</div>