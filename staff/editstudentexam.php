<?php
//require("conn.php");
$se_idx = -1;
$e_idx = -1;
$u_idx = -1;
if (isset($_GET['se_id']) && !empty($_GET['se_id'])) {
    
    $se_idx = $_GET['se_id'];
    $sql = sprintf("SELECT * FROM stud_exam se "
            . "WHERE se.se_id = '%s' "
            , $se_idx);
    $r = mysql_query($sql) or die("<script>location.href='index.php?page=staff/index.php&error=Error: ".mysql_error()."#managestudexam'</script>");
    $t = mysql_num_rows($r);
    $d = mysql_fetch_array($r);
    if ($t > 0) {
        
        $e_idx = $d['e_id'];
        $u_idx = $d['u_id'];
        
    } else {
        header("Location: index.php?page=staff/index.php&error=Error: Access denied!#managestudexam");
        die();
    }
    
} else {
    header("Location: index.php?page=staff/index.php#managestudexam");
    die();
}
?>

<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>Edit Student-Examination</h3>
            
            <form method="post" action="process/editstudentexam_process.php">
                <input type="hidden" name="se_id" id="se_id" value="<?=$se_idx; ?>" />
                <table class="table">
                    <tr>
                        <td>Student</td>
                        <td>:</td>
                        <td>
                            <?php
                            $sql1 = "SELECT * FROM users1 ORDER BY u_name ASC ";
                            $r1 = mysql_query($sql1) or die("Error: ".mysql_error());
                            $t1 = mysql_num_rows($r1);
                            $d1 = mysql_fetch_array($r1);
                            ?>
                            <select name="u_id" class="form-control">
                                <option value="-1" <?php if ($u_idx == "-1") { echo "selected"; } ?>>-- Select student --</option>
                                <?php
                                if ($t1 > 0) {
                                    do {
                                        $u_id = $d1['u_id'];
                                        $u_matric = $d1['u_matric'];
                                        $u_name = $d1['u_name'];
                                        ?>
                                <option value="<?=$u_id; ?>" <?php if ($u_idx == $u_id) { echo "selected"; } ?>>(<?=$u_matric; ?>) <?=$u_name; ?></option>
                                <?php
                                    } while ($d1 = mysql_fetch_array($r1));
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Examination</td>
                        <td>:</td>
                        <td>
                            <?php
                            $sql2 = "SELECT * FROM examination e, subject sub, venue v "
                                    . "WHERE e.sub_id = sub.sub_id "
                                    . "AND e.v_id = v.v_id "
                                    . "ORDER BY e.e_datetime ASC ";
                            $r2 = mysql_query($sql2) or die("Error: ".mysql_error());
                            $t2 = mysql_num_rows($r2);
                            $d2 = mysql_fetch_array($r2);
                            ?>
                            <select name="e_id" class="form-control">
                                <option value="-1" <?php if ($e_idx == "-1") { echo "selected"; } ?>>-- Select examination --</option>
                                <?php
                                if ($t2 > 0) {
                                    do {
                                        $e_id = $d2['e_id'];
                                        $sub_code = $d2['sub_code'];
                                        $sub_name = $d2['sub_name'];
                                        $e_datetime = date('d/m/Y', strtotime($d2['e_datetime']));
                                        $e_starttime = date('h:i A', strtotime($d2['e_starttime']));
                                        $e_endtime = date('h:i A', strtotime($d2['e_endtime']));
                                        ?>
                                <option value="<?=$e_id; ?>" <?php if ($e_idx == $e_id) { echo "selected"; } ?>><?=$sub_code; ?> - <?=$sub_name; ?> [<?=$e_datetime; ?>, <?=$e_starttime; ?>-<?=$e_endtime; ?>]</option>
                                <?php
                                    } while ($d2 = mysql_fetch_array($r2));
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button class="btn btn-success" type="submit">Save</button>
                            <button class="btn btn-info" type="reset">Clear</button>
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </section>
    
</div>