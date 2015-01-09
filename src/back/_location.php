<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (!empty($_POST)) {

            if (empty($_POST['id'])) { // insert
                $sql_prefix = "INSERT INTO location (loc_id,loc_name,loc_price,loc_createdate)";
                $sql_prefix .= " VALUES(";
                $sql_prefix .= " ''";
                $sql_prefix .= " ,'" . $_POST['l_name'] . "'";
                $sql_prefix .= " ,'" . $_POST['l_price'] . "',NOW()";
                $sql_prefix .= ")";
            } else { // update
                $sql_prefix = "UPDATE location SET ";
                $sql_prefix .= " loc_name='" . $_POST['l_name'] . "'";
                $sql_prefix .= " ,loc_price = '" . $_POST['l_price'] . "'";
                $sql_prefix .= " WHERE loc_id =" . $_POST['id'];
            }
            //echo "<pre> sql: " . $sql_prefix . "</pre>";
            $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
            if ($query_prefix) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Location Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=l">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }
        break;
    case 'd': // *************************************************************** do delete 
        $sql_loc = "DELETE FROM location";
        $sql_loc .= " WHERE loc_id =" . $_POST['id'];
        echo "<pre> sql: " . $sql_loc . "</pre>";
        $query = mysql_query($sql_loc) or die(mysql_error());
        echo $query;
        break;
}
?>
