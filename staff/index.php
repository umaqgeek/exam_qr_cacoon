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
            $sql_2 = "SELECT * FROM subject ORDER BY sub_name";
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
                            $s_id = $d2['sub_id'];
                    ?>
                    <tr>    
                        <td><?=$d2['sub_code']; ?></td>
                        <td><?=$d2['sub_name']; ?></td>
                        <td>
                            <a href="index.php?page=staff/editsubject.php&controller=1&s_id=<?=$s_id; ?>">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a onclick="return ask('Are you sure?');" href="process/deletesubject.php?s_id=<?=$s_id; ?>">
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } while ($d2 = mysql_fetch_array($r2)); } ?>
                </tbody>
            </table>

        </div>
    </section>
    
    <section id="managelectsub" class="wrapper style3 fullscreen spotlights">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>Manage Lecturer-Subject</h3>
            
            <?php
            $sql_3 = "SELECT * FROM lect_subject ls, staff1 s, subject sub "
                    . "WHERE s.s_type = 2 "
                    . "AND s.s_id = ls.s_id "
                    . "AND sub.sub_id = ls.sub_id "
                    . "ORDER BY s.s_name ASC ";
            $r3 = mysql_query($sql_3) or die("Error: ".  mysql_error());
            $t3 = mysql_num_rows($r3);
            $d3 = mysql_fetch_array($r3);
            ?>
            
            <a href="index.php?page=staff/addlectsubject.php&controller=1">
                <button class="btn btn-success" type="button">Assign Lecturer-Subject</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Lecturer</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($t3 > 0) {
                        do {
                            $ls_id = $d3['ls_id'];
                    ?>
                    <tr>    
                        <td><?=$d3['s_name']; ?></td>
                        <td><?=$d3['sub_code']; ?> <?=$d3['sub_name']; ?></td>
                        <td>
                            <a href="index.php?page=staff/editlectsubject.php&controller=1&ls_id=<?=$ls_id; ?>">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a onclick="return ask('Are you sure?');" href="process/deletelectsubject.php?ls_id=<?=$ls_id; ?>">
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } while ($d3 = mysql_fetch_array($r3)); } ?>
                </tbody>
            </table>

        </div>
    </section>
    
    <section id="managestudsub" class="wrapper style1 fullscreen">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>Manage Examination</h3>
            
            <?php
            $sql_4 = "SELECT * FROM examination e, subject sub, venue v "
                    . "WHERE e.sub_id = sub.sub_id "
                    . "AND e.v_id = v.v_id "
                    . "ORDER BY e.e_datetime ASC ";
            $r4 = mysql_query($sql_4) or die("Error: ".  mysql_error());
            $t4 = mysql_num_rows($r4);
            $d4 = mysql_fetch_array($r4);
            ?>
            
            <a href="index.php?page=staff/addexam.php&controller=1">
                <button class="btn btn-success" type="button">Add Examination</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Attendance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($t4 > 0) {
                        do {
                            $e_id = $d4['e_id'];
                            
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
                        <td><?=date('d/m/Y', strtotime($d4['e_datetime'])); ?></td>
                        <td><?=$d4['sub_code']; ?> <?=$d4['sub_name']; ?></td>
                        <td><?=date('h:i A', strtotime($d4['e_starttime'])); ?> - <?=date('h:i A', strtotime($d4['e_endtime'])); ?></td>
                        <td><?=$d4['v_desc']; ?></td>
                        <td><?=$attendance_present; ?>/<?=$attendance_all; ?></td>
                        <td>
                            <a href="index.php?page=staff/editexam.php&controller=1&e_id=<?=$e_id; ?>">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a onclick="return ask('Are you sure?');" href="process/deletelectexam.php?e_id=<?=$e_id; ?>">
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } while ($d4 = mysql_fetch_array($r4)); } ?>
                </tbody>
            </table>
            
        </div>
    </section>
    
    <section id="managestudexam" class="wrapper style2 fullscreen">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>Manage Student-Examination</h3>
            
            <?php
            $sql_5 = "SELECT * FROM users1 u, stud_exam se, "
                    . "examination e, subject sub, venue v "
                    . "WHERE e.sub_id = sub.sub_id "
                    . "AND e.v_id = v.v_id "
                    . "AND se.e_id = e.e_id "
                    . "AND se.u_id = u.u_id  "
                    . "ORDER BY e.e_datetime ASC ";
            $r5 = mysql_query($sql_5) or die("Error: ".  mysql_error());
            $t5 = mysql_num_rows($r5);
            $d5 = mysql_fetch_array($r5);
            ?>
            
            <a href="index.php?page=staff/addstudentexam.php&controller=1">
                <button class="btn btn-success" type="button">Assign Student-Exam</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Examination</th>
                        <th>Student</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($t5 > 0) {
                        do {
                            $se_id = $d5['se_id'];
                            $sub_code = $d5['sub_code'];
                            $sub_name = $d5['sub_name'];
                            $e_datetime = date('d/m/Y', strtotime($d5['e_datetime']));
                            $e_starttime = date('h:i A', strtotime($d5['e_starttime']));
                            $e_endtime = date('h:i A', strtotime($d5['e_endtime']));
                    ?>
                    <tr>    
                        <td><?=$sub_code; ?> - <?=$sub_name; ?> [<?=$e_datetime; ?>, <?=$e_starttime; ?>-<?=$e_endtime; ?>]</td>
                        <td>(<?=$d5['u_matric']; ?>) <?=$d5['u_name']; ?></td>
                        <td>
                            <a href="index.php?page=staff/editstudentexam.php&controller=1&se_id=<?=$se_id; ?>">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a onclick="return ask('Are you sure?');" href="process/deletestudentexam.php?se_id=<?=$se_id; ?>">
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } while ($d5 = mysql_fetch_array($r5)); } ?>
                </tbody>
            </table>
            
        </div>
    </section>
    
    <section id="viewexam" class="wrapper style3 fullscreen">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>View Examination</h3>
            
            <?php
            $sql_2 = sprintf("SELECT * FROM examination e, venue v, subject sub, "
                    . "lect_subject ls, staff1 s "
                    . "WHERE e.sub_id = sub.sub_id "
                    . "AND sub.sub_id = ls.sub_id "
                    . "AND ls.s_id = s.s_id "
                    . "GROUP BY e.e_id ");
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
                        <th>Attendance</th>
                        <th>Action</th>
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
                        <td><?=$attendance_present; ?>/<?=$attendance_all; ?></td>
                        <td>
                            <a href="index.php?page=staff/viewexam.php&controller=1&e_id=<?=$e_id; ?>">
                                <span class="fa fa-folder-open"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } while ($d2 = mysql_fetch_array($r2)); } ?>
                </tbody>
            </table>
            
        </div>
    </section>

</div>

<script>
    $(document).ready(function () {
        $("#profile").removeClass("inactive");
    });
</script>