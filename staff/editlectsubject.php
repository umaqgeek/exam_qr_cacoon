<?php
//require("conn.php");
$ls_idx = -1;
$s_idx = -1;
$sub_idx = -1;
if (isset($_GET['ls_id']) && !empty($_GET['ls_id'])) {
    
    $ls_idx = $_GET['ls_id'];
    $sql = sprintf("SELECT * FROM lect_subject ls "
            . "WHERE ls.ls_id = '%s' "
            , $ls_idx);
    $r = mysql_query($sql) or die("<script>location.href='index.php?page=staff/index.php&error=Error: ".mysql_error()."#managelectsub'</script>");
    $t = mysql_num_rows($r);
    $d = mysql_fetch_array($r);
    if ($t > 0) {
        
        $s_idx = $d['s_id'];
        $sub_idx = $d['sub_id'];
        
    } else {
        header("Location: index.php?page=staff/index.php&error=Error: Access denied!#managelectsub");
        die();
    }
    
} else {
    header("Location: index.php?page=staff/index.php#managelectsub");
    die();
}
?>

<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>Edit Lecturer-Subject</h3>
            
            <form method="post" action="process/editlectsubject_process.php">
                <input type="hidden" name="ls_id" id="ls_id" value="<?=$ls_idx; ?>" />
                <table class="table">
                    <tr>
                        <td>Lecturer</td>
                        <td>:</td>
                        <td>
                            <?php
                            $sql1 = "SELECT * FROM staff1 WHERE s_type = 2 ORDER BY s_name ASC ";
                            $r1 = mysql_query($sql1) or die("Error: ".mysql_error());
                            $t1 = mysql_num_rows($r1);
                            $d1 = mysql_fetch_array($r1);
                            ?>
                            <select name="s_id" class="form-control">
                                <option value="-1" 
                                    <?php if ($s_idx == "-1") { echo "selected"; } ?>>-- Select lecturer --</option>
                                <?php
                                if ($t1 > 0) {
                                    do {
                                        $s_id = $d1['s_id'];
                                        $s_number = $d1['s_number'];
                                        $s_name = $d1['s_name'];
                                        ?>
                                <option value="<?=$s_id; ?>" 
                                    <?php if ($s_idx == $s_id) { echo "selected"; } ?>>(<?=$s_number; ?>) <?=$s_name; ?></option>
                                <?php
                                    } while ($d1 = mysql_fetch_array($r1));
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
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
                                <option value="-1" 
                                    <?php if ($sub_idx == "-1") { echo "selected"; } ?>>-- Select subject --</option>
                                <?php
                                if ($t1 > 0) {
                                    do {
                                        $sub_id = $d2['sub_id'];
                                        $sub_code = $d2['sub_code'];
                                        $sub_name = $d2['sub_name'];
                                        ?>
                                <option value="<?=$sub_id; ?>" 
                                        <?php if ($sub_idx == $sub_id) { echo "selected"; } ?>><?=$sub_code; ?> - <?=$sub_name; ?></option>
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