<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // insert 
        if (!empty($_POST)) {

            if (empty($_POST['id'])) { // insert
                $sql_bank = "INSERT INTO bank (bank_id,bank_name,bank_detail)";
                $sql_bank .= " VALUES(";
                $sql_bank .= " ''";
                $sql_bank .= " ,'" . $_POST['name'] . "'";
                $sql_bank .= " ,'" . $_POST['detail'] . "'";
                $sql_bank .= ")";
            } else { // update
                $sql_bank = "UPDATE bank SET ";
                $sql_bank .= " bank_name='" . $_POST['name'] . "'";
                $sql_bank .= " ,bank_detail = '" . $_POST['detail'] . "'";
                $sql_bank .= " WHERE bank_id =" . $_POST['id'];
            }
            //echo "<pre> sql: " . $sql_bank . "</pre>";
            $query_bank = mysql_query($sql_bank) or die(mysql_error());
            if ($query_bank) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New bank Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=b">';
            } else {
                echo "alert('add bank fail !!');";
            }
        }
        break;
    case 'd': //delete
        $sql_bank = "DELETE FROM bank";
        $sql_bank .= " WHERE bank_id =" . $_POST['id'];
        echo "<pre> sql: " . $sql_bank . "</pre>";
        mysql_query($sql_bank) or die(mysql_error());
        return true;
        break;
    default:
        break;
}
?>
