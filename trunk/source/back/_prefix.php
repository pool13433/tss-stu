<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // insert 
        if (!empty($_POST)) {

            if (empty($_POST['id'])) { // insert
                $sql_prefix = "INSERT INTO prefix (pref_id,pref_name,pref_descrition)";
                $sql_prefix .= " VALUES(";
                $sql_prefix .= " ''";
                $sql_prefix .= " ,'" . $_POST['name'] . "'";
                $sql_prefix .= " ,'" . $_POST['desc'] . "'";
                $sql_prefix .= ")";
            } else { // update
                $sql_prefix = "UPDATE prefix SET ";
                $sql_prefix .= " pref_name='" . $_POST['name'] . "'";
                $sql_prefix .= " ,pref_descrition = '" . $_POST['desc'] . "'";
                $sql_prefix .= " WHERE pref_id =" . $_POST['id'];
            }
            //echo "<pre> sql: " . $sql_prefix . "</pre>";
            $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
            if ($query_prefix) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Prefix Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=pre">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }
        break;
    case 'd': //delete
        $sql_prefix = "DELETE FROM prefix";
        $sql_prefix .= " WHERE pref_id =" . $_POST['id'];
        echo "<pre> sql: " . $sql_prefix . "</pre>";
        mysql_query($sql_prefix) or die(mysql_error());
        return true;
        break;
    default:
        break;
}
?>
