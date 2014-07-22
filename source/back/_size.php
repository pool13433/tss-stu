<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (!empty($_POST)) {
            if (empty($_POST['id'])) { // insert
                $sql_Size = "INSERT INTO photo_size (size_name,size_unit)";
                $sql_Size .= " VALUES(";
                $sql_Size .= " '" . $_POST['name1'] . "x" . $_POST['name2'] . "'";
                $sql_Size .= " ,'" . $_POST['unit'] . "'";
                $sql_Size .= ")";
            } else { // update
                $sql_Size = "UPDATE photo_size SET ";
                $sql_Size .= " size_name = '" . $_POST['name1'] . "x" . $_POST['name2'] . "'";
                $sql_Size .= " ,size_unit = '" . $_POST['unit'] . "'";
                $sql_Size .= " WHERE size_id =" . $_POST['id'];
            }
            //echo "<pre> sql: " . $sql_Size . "</pre>";
            $query_size = mysql_query($sql_Size) or die(mysql_error());
            if ($query_size) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Product Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=size">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }
        break;
    case 'd': // *************************************************************** do delete 
        $sql_package = "DELETE FROM photo_size";
        $sql_package .= " WHERE size_id =" . $_POST['id'];
        //echo "<pre> sql: " . $sql_package . "</pre>";
        $query = mysql_query($sql_package) or die(mysql_error());

        echo $query;
        break;
}
?>
