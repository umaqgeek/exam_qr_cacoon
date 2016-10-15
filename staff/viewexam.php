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
            
            <div class="col-sm-6">
                <?php
                $sql = sprintf("SELECT * FROM stud_exam se, examination e, subject sub, venue v "
                        . "WHERE se.e_id = e.e_id "
                        . "AND e.sub_id = sub.sub_id "
                        . "AND e.v_id = v.v_id "
                        . "AND se.e_id = '%s' ", 
                        $e_id);
                $r = mysql_query($sql) or die("Error: ".mysql_error());
                $t = mysql_num_rows($r);
                $d = mysql_fetch_array($r);
                if ($t > 0) {

                    $sql_x1 = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' ", $e_id);
                    $r_x1 = mysql_query($sql_x1) or die("Error: ".  mysql_error());
                    $t_x1 = mysql_num_rows($r_x1);
                    $attendance_all = $t_x1;

                    $sql_x2 = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' AND ses_id = 2 ", $e_id);
                    $r_x2 = mysql_query($sql_x2) or die("Error: ".  mysql_error());
                    $t_x2 = mysql_num_rows($r_x2);
                    $attendance_present = $t_x2;
                ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Exam Date</td>
                        <td>:</td>
                        <td><?=date('d/m/Y', strtotime($d['e_datetime'])); ?></td>
                    </tr>
                    <tr>
                        <td>Exam Date</td>
                        <td>:</td>
                        <td><?=date('d/m/Y', strtotime($d['e_datetime'])); ?></td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td><?=$d['sub_code']; ?> <?=$d['sub_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>:</td>
                        <td><?=date('h:i A', strtotime($d['e_starttime'])); ?> <?=date('h:i A', strtotime($d['e_endtime'])); ?></td>
                    </tr>
                    <tr>
                        <td>Venue</td>
                        <td>:</td>
                        <td><?=$d['v_desc']; ?></td>
                    </tr>
                    <tr>
                        <td>Attendance</td>
                        <td>:</td>
                        <td><?=$attendance_present; ?>/<?=$attendance_all; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <em><strong>Scan Attendance Here</strong></em>
                <br />
                <?php require("read_qr_code.php") ?>
            </div>
            
            <hr />
            
            <?php
            $sql2 = sprintf("SELECT * FROM stud_exam se, examination e, users1 u, stud_exam_status ses "
                    . "WHERE se.e_id = e.e_id "
                    . "AND se.u_id = u.u_id "
                    . "AND se.ses_id = ses.ses_id "
                    . "AND se.e_id = '%s' "
                    . "GROUP BY u.u_id ", 
                    $e_id);
            $r2 = mysql_query($sql2) or die("Error: ".mysql_error());
            $t2 = mysql_num_rows($r2);
            $d2 = mysql_fetch_array($r2);
            ?>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Matric No.</th>
                        <th>Name</th>
                        <th>Check In Time</th>
                        <th>Table No.</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($t2 > 0) {
                        do {
                    ?>
                    <tr>
                        <td><?=$d2['u_matric']; ?></td>
                        <td><?=$d2['u_name']; ?></td>
                        <td><?php
                        $se_checkin = $d2['se_checkin'];
                        if ($se_checkin != '0000-00-00 00:00:00' && $se_checkin != '' && $se_checkin != null) {
                            echo date('h:i A', strtotime($se_checkin));
                        }
                        ?>&nbsp;</td>
                        <td><?php
                        $se_tableno = $d2['se_tableno'];
                        if ($se_tableno != 0 && $se_tableno != "0" && $se_tableno != '' && $se_tableno != null) {
                            echo number_format($se_tableno, 0);
                        }
                        ?>&nbsp;</td>
                        <td><?=$d2['ses_desc']; ?></td>
                    </tr>
                    <?php } while ($d2 = mysql_fetch_array($r2)); } ?>
                </tbody>
            </table>
            
            <?php } ?>
            
        </div>
    </section>
    
</div>