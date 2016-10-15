<?php
require("conn.php");
$s_id = 0;
$s_code = "";
$s_name = "";
if (isset($_GET['s_id']) && !empty($_GET['s_id'])) {
    
    $s_id = $_GET['s_id'];
    $sql = sprintf("SELECT * FROM subject WHERE sub_id = '%s' ", $s_id);
    $r = mysql_query($sql) or die("<script>location.href='index.php?page=staff/index.php&error=Error: ".mysql_error()."#subject'</script>");
    $t = mysql_num_rows($r);
    $d = mysql_fetch_array($r);
    if ($t > 0) {
        
        $s_code = $d['sub_code'];
        $s_name = $d['sub_name'];
        
    } else {
        header("Location: index.php?page=staff/index.php&error=Error: Access denied!#subject");
        die();
    }
    
} else {
    header("Location: index.php?page=staff/index.php#subject");
    die();
}
?>

<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>Edit Subject</h3>
            
            <form method="post" action="process/editsubject_process.php">
                <input type="hidden" name="s_id" id="s_id" value="<?=$s_id; ?>" />
                <table class="table">
                    <tr>
                        <td>Subject Code</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="s_code" id="s_code" class="form-control" placeholder="Subject code." value="<?=$s_code; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Subject Name</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="s_name" id="s_name" class="form-control" placeholder="Subject name." value="<?=$s_name; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button class="btn btn-success" type="submit">Save</button>
                            <button class="btn btn-info" type="reset">Reset</button>
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </section>
    
</div>