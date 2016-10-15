<?php
require("../../conn.php");
if (isset($_POST['result']) && !empty($_POST['result']) && isset($_POST['eid']) && !empty($_POST['eid'])) {
    
    $e_id = $_POST['eid'];
    $result = $_POST['result'];
    $str_code = explode("|", $result);
    
    if (isset($str_code[0]) && !empty($str_code[0]) && isset($str_code[1]) && !empty($str_code[1])) {
        
        $u_id = $str_code[0];
        $u_matric = $str_code[1];
        
        $sql = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' ", $e_id);
        $r = mysql_query($sql) or die("1|Error: ".mysql_error());
        $t = mysql_num_rows($r);
        if ($t > 0) {
            $sql1 = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' AND ses_id = 2 ORDER BY se_tableno DESC ", $e_id);
            $r1 = mysql_query($sql1) or die("1|Error: ".mysql_error());
            $t1 = mysql_num_rows($r1);
            $last_table_no = 1;
            if ($t1 > 0) {
                $d1 = mysql_fetch_array($r1);
                $se_tableno = $d1['se_tableno'];
                $last_table_no = (is_numeric($se_tableno)) ? ($se_tableno + 1) : (1);
            }
            
            $sql2 = sprintf("SELECT * FROM stud_exam WHERE e_id = '%s' AND u_id = '%s' AND ses_id = 1 ", $e_id, $u_id);
            $r2 = mysql_query($sql2) or die("1|Error: ".mysql_error());
            $t2 = mysql_num_rows($r2);
            if ($t2 > 0) {
                
                $se_checkin = date('Y-m-d H:i:s');
                $sql3 = sprintf("UPDATE stud_exam SET ses_id = 2, se_checkin = '%s', se_tableno = '%s' "
                        . "WHERE e_id = '%s' AND u_id = '%s' AND ses_id = 1 ", 
                        $se_checkin, $last_table_no, $e_id, $u_id);
                mysql_query($sql3) or die("1|Error: ".mysql_error());
                die("-1|Success check-in. ..");
                
            } else {
                die("1|You already check-in!");
            }
            
        } else {
            die("1|Invalid examination!");
        }
        
    } else {
        die("1|Invalid code!");
    }
    
} else {
    die("1|No code were sent!");
}
?>