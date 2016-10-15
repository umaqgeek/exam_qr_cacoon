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
                <button class="btn btn-success" type="button">Assign Lecturer</button>
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

</div>