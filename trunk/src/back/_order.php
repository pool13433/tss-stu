<?php

@ob_start();
@session_start();
include '../../config/connect.php';
switch ($_GET['method']) {
    case 'u': // update approve
        $sql_order = " UPDATE order_header SET ";
        $sql_order .= " order_approve_status = " . $_POST['approve'];
        $sql_order .= " ,order_takephoto = " . $_POST['takephoto'];
        $sql_order .= " WHERE order_id = " . $_POST['id'];
        $query_order = mysql_query($sql_order) or die(mysql_error());
        if ($query_order) {
            echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Update Order Success</div>';
            echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=od">';
        } else {
            echo "alert('add bank fail !!');";
        }
        break;

    default:
        break;
}
?>