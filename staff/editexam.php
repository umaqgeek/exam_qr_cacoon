<?php
require("conn.php");
$e_idx = 0;
$sub_idx = -1;
$e_datetimex = "";
$e_starttimex = "";
$e_endtimex = "";
$v_idx = -1;
$e_numstudentx = "0";
if (isset($_GET['e_id']) && !empty($_GET['e_id'])) {
    
    $e_idx = $_GET['e_id'];
    $sql = sprintf("SELECT * FROM examination WHERE e_id = '%s' ", $e_idx);
    $r = mysql_query($sql) or die("<script>location.href='index.php?page=staff/index.php&error=Error: ".mysql_error()."#managestudsub'</script>");
    $t = mysql_num_rows($r);
    $d = mysql_fetch_array($r);
    if ($t > 0) {
        
        $sub_idx = $d['sub_id'];
        $e_datetimex1 = $d['e_datetime'];
        $pecah1 = explode(' ', $e_datetimex1);
        $e_datetimex = (isset($pecah1[0])) ? ($pecah1[0]) : ("");
        $e_starttimex1 = $d['e_starttime'];
        $pecah21 = explode(' ', $e_starttimex1);
        $e_starttimex = (isset($pecah21[1])) ? ($pecah21[1]) : ("");
        $e_endtimex1 = $d['e_endtime'];
        $pecah22 = explode(' ', $e_endtimex1);
        $e_endtimex = (isset($pecah22[1])) ? ($pecah22[1]) : ("");
        $v_idx = $d['v_id'];
        
    } else {
        header("Location: index.php?page=staff/index.php&error=Error: Access denied!#managestudsub");
        die();
    }
    
} else {
    header("Location: index.php?page=staff/index.php#managestudsub");
    die();
}
?>

<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>Add Examination</h3>
            
            <form method="post" action="process/editexam_process.php">
                <input type="hidden" name="e_id" id="e_id" value="<?=$e_idx; ?>" />
                <table class="table">
                    <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td>
                            <?php
                            $sql2 = "SELECT * FROM subject ORDER BY sub_name ASC ";
                            $r2 = mysql_query($sql2) or die("Error: ".mysql_error());
                            $t2 = mysql_num_rows($r2);
                            $d2 = mysql_fetch_array($r2);
                            ?>
                            <select name="sub_id" class="form-control">
                                <option value="-1" <?php if ($sub_idx == "-1") { echo "selected"; } ?>>-- Select subject --</option>
                                <?php
                                if ($t2 > 0) {
                                    do {
                                        $sub_id = $d2['sub_id'];
                                        $sub_code = $d2['sub_code'];
                                        $sub_name = $d2['sub_name'];
                                        ?>
                                <option value="<?=$sub_id; ?>" <?php if ($sub_idx == $sub_id) { echo "selected"; } ?>><?=$sub_code; ?> - <?=$sub_name; ?></option>
                                <?php
                                    } while ($d2 = mysql_fetch_array($r2));
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td>
                            <input type="date" name="e_datetime" class="form-control" value="<?=$e_datetimex; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Start Time</td>
                        <td>:</td>
                        <td>
                            <input type="time" name="e_starttime" class="form-control" value="<?=$e_starttimex; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>End Time</td>
                        <td>:</td>
                        <td>
                            <input type="time" name="e_endtime" class="form-control" value="<?=$e_endtimex; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Venue</td>
                        <td>:</td>
                        <td>
                            <?php
                            $sql3 = "SELECT * FROM venue ORDER BY v_desc ASC ";
                            $r3 = mysql_query($sql3) or die("Error: ".mysql_error());
                            $t3 = mysql_num_rows($r3);
                            $d3 = mysql_fetch_array($r3);
                            ?>
                            <select name="v_id" class="form-control">
                                <option value="-1" <?php if ($v_idx == "-1") { echo "selected"; } ?>>-- Select venue --</option>
                                <?php
                                if ($t3 > 0) {
                                    do {
                                        $v_id = $d3['v_id'];
                                        $v_desc = $d3['v_desc'];
                                        ?>
                                <option value="<?=$v_id; ?>" <?php if ($v_idx == $v_id) { echo "selected"; } ?>><?=$v_desc; ?></option>
                                <?php
                                    } while ($d3 = mysql_fetch_array($r3));
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