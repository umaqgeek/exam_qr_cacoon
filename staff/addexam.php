
<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <?php require("title.php"); ?>
            <h3>Add Examination</h3>
            
            <form method="post" action="process/addexam_process.php">
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
                                <option value="-1">-- Select subject --</option>
                                <?php
                                if ($t2 > 0) {
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
                        <td>Date</td>
                        <td>:</td>
                        <td>
                            <input type="date" name="e_datetime" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>Start Time</td>
                        <td>:</td>
                        <td>
                            <input type="time" name="e_starttime" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>End Time</td>
                        <td>:</td>
                        <td>
                            <input type="time" name="e_endtime" class="form-control" />
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
                                <option value="-1">-- Select venue --</option>
                                <?php
                                if ($t3 > 0) {
                                    do {
                                        $v_id = $d3['v_id'];
                                        $v_desc = $d3['v_desc'];
                                        ?>
                                <option value="<?=$v_id; ?>"><?=$v_desc; ?></option>
                                <?php
                                    } while ($d3 = mysql_fetch_array($r3));
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Number of Attendance</td>
                        <td>:</td>
                        <td>
                            <input type="text" value="0" name="e_numstudent" class="form-control" placeholder="Number of attendance." />
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