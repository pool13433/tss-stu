<?php

include '../../config/connect.php';
switch ($_GET['method']) {
    case 'i':
        if (!empty($_POST)) {
            $message = "";
            $file_temp = "";
            $temp = explode(".", $_FILES["file"]["name"]);
            $img_temp = $_FILES["file"]["tmp_name"];
            $img_type = $_FILES["file"]["type"];
            $img_size = $_FILES["file"]["size"];
            $img_name = $_FILES["file"]["name"];
            if (!empty($img_temp)) {
                $img_random_name = randomString() . "." . $temp[1];
                $img_new = PATH_PROMOTION . $img_random_name;

                $upload = move_uploaded_file($img_temp, $img_new);
            }
            if (empty($_POST['id'])) {  // insert
                $sql_promote = "INSERT INTO promotion (prom_name,prom_file,prom_startdate,prom_enddate,prom_createdate)";
                $sql_promote .= " VALUES (";
                $sql_promote .= " '" . $_POST['name'] . "'";
                $sql_promote .= " ,'" . $img_random_name . "'";
                $sql_promote .= " ,'" . $_POST['startdate'] . "'";
                $sql_promote .= " ,'" . $_POST['enddate'] . "'";
                $sql_promote .= " ,NOW())";

                $message = 'INSERT promotion Success';
            } else { //update
                $sql_promote = " UPDATE promotion SET ";
                $sql_promote .= " prom_name = '" . $_POST['name'] . "'";
                if (!empty($img_temp) && $upload) {
                    $sql_promote .= " ,prom_file = '" . $img_random_name . "'";
                }
                $sql_promote .= " ,prom_startdate = '" . $_POST['startdate'] . "'";
                $sql_promote .= " ,prom_enddate = '" . $_POST['enddate'] . "'";
                $sql_promote .= " WHERE prom_id = " . $_POST['id'];
                $message = 'Update promotion Success';
            }
            $query_promote = mysql_query($sql_promote) or die(mysql_error());
            if ($query_promote) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">' . $message . '</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=promote">';
            } else {
                echo "alert('add promotion fail !!');";
            }
        }
        break;
    case 'd':
        $sql_promote = "DELETE FROM promotion WHERE prom_id = " . $_POST['id'];
        echo mysql_query($sql_promote) or die(mysql_error());
        break;
    default:
        break;
}

function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return (string) $randomString;
}

?>
