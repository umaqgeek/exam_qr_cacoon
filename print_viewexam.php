<?php require_once("conn.php"); ?>
<html>
    <head>
        <title>QrCARS</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <script src="assets/js/jquery-2.2.3.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.js" type="text/javascript"></script>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <!--<link rel="stylesheet" href="assets/css/main.css" />-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        
        <link rel="icon" href="assets/images/qrcars_icon.png" />
        
    </head>
    <body>
       
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-10 col-md-offset-1">
                
                <?php
                $sql = "SELECT * FROM subject ";
                $r = mysql_query($sql) or die("Error: " . mysql_error());
                $t = mysql_num_rows($r);
                $d = mysql_fetch_array($r);
                ?>
                <table class="table">
                    <tr>
                        <td colspan="2">
                            SUBJECT :-
                        </td>
                    </tr>
                    <?php
                    $a = "A";
                    if ($t > 0) {
                        do {
                            $sub_id = $d['sub_id'];
                            ?>
                            <tr>
                                <td width="5%"><?php echo $a++; ?>.</td>
                                <td>
                                    <strong>
                                        <?php echo $d['sub_code']; ?><br /><?php echo $d['sub_name']; ?>
                                    </strong>
                                    <br />

                                    <?php
                                    $sql2 = sprintf("SELECT * FROM examination e, venue v "
                                            . "WHERE e.v_id = v.v_id "
                                            . "AND e.sub_id = '%s' ", $sub_id);
                                    $r2 = mysql_query($sql2) or die("Error: " . mysql_error());
                                    $t2 = mysql_num_rows($r2);
                                    $d2 = mysql_fetch_array($r2);
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <td colspan="2">
                                                VENUE :-
                                            </td>
                                        </tr>
                                        <?php
                                        $b = 1;
                                        if ($t2 > 0) {
                                            do {
                                                $e_id = $d2['e_id'];
                                        ?>
                                        <tr>
                                            <td width="5%"><?php echo $b++; ?>.</td>
                                            <td>
                                                <strong style="background-color: rgba(0, 0, 0, 0.1); padding: 5px; border-radius: 10%; width: 800px; height: 200px;">
                                                    <?php echo $d2['v_desc']; ?>
                                                </strong>
                                                <br />
                                                
                                                <?php
                                                $sql3 = sprintf("SELECT * FROM stud_exam se, users1 u, stud_exam_status ses "
                                                        . "WHERE se.u_id = u.u_id "
                                                        . "AND se.ses_id = ses.ses_id "
                                                        . "AND se.e_id = '%s' ", $e_id);
                                                $r3 = mysql_query($sql3) or die("Error: " . mysql_error());
                                                $t3 = mysql_num_rows($r3);
                                                $d3 = mysql_fetch_array($r3);
                                                ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr style="background-color: rgba(0, 0, 0, 0.1);">
                                                            <th>#</th>
                                                            <th>Matric No.<br />Full Name</th>
                                                            <th>Course<br />Faculty<br />Year</th>
                                                            <th>Contact No.<br />E-mail</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ivv = 1;
                                                        if ($t3 > 0) {
                                                            do {
                                                                $ses_id = $d3['ses_id'];
                                                                $color = "#000";
                                                                if ($ses_id == 1) {
                                                                    $color = "#f00";
                                                                } else if ($ses_id == 2) {
                                                                    $color = "#0c0";
                                                                }
                                                        ?>
                                                        <tr>
                                                            <td> <?php echo $ivv++; ?> </td>
                                                            <td> <?php echo strtoupper(strtolower($d3['u_matric'])); ?> <br /> <?php echo strtoupper(strtolower($d3['u_name'])); ?> </td>
                                                            <td> <?php echo strtoupper(strtolower($d3['u_course'])); ?> <br /> <?php echo strtoupper(strtolower($d3['u_faculty'])); ?> <br /> Year <?php echo strtoupper(strtolower($d3['u_courseyear'])); ?> </td>
                                                            <td> <?php echo strtoupper(strtolower($d3['u_contact'])); ?> <br /> <?php echo strtoupper(strtolower($d3['u_email'])); ?> </td>
                                                            <td style="color: <?php echo $color; ?>"> <?php echo strtoupper(strtolower($d3['ses_desc'])); ?> </td>
                                                        </tr>
                                                        <?php } while ($d3 = mysql_fetch_array($r3)); } ?>
                                                    </tbody>
                                                </table>
                                                
                                            </td>
                                        </tr>
                                        <?php } while ($d2 = mysql_fetch_array($r2)); } ?>
                                    </table>
                                </td>
                            </tr>
                        <?php } while ($d = mysql_fetch_array($r));
                    } ?>
                </table>
                
            </div>
        </div>
        
        <script>
            $(document).ready(function () {
                window.print();
            });
        </script>
        
    </body>
</html>