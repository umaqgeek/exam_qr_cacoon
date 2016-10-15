<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <form method="post" action="process/addlectsubject_process.php">
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
                                <option value="-1">-- Select lecturer --</option>
                                <?php
                                if ($t1 > 0) {
                                    do {
                                        $s_id = $d1['s_id'];
                                        $s_number = $d1['s_number'];
                                        $s_name = $d1['s_name'];
                                        ?>
                                <option value="<?=$s_id; ?>">(<?=$s_number; ?>) <?=$s_name; ?></option>
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
                                <option value="-1">-- Select subject --</option>
                                <?php
                                if ($t1 > 0) {
                                    do {
                                        $sub_id = $d2['sub_id'];
                                        $sub_code = $d2['sub_code'];
                                        $sub_name = $d2['sub_name'];
                                        ?>
                                <option value="<?=$sub_id; ?>"><?=$sub_code; ?> - <?=$sub_name; ?></option>
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