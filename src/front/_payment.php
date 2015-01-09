<?php

@ob_start();
@session_start();
include '../../config/connect.php';

switch ($_GET['method']) {
    case 'u': // update payment
        // update table order_header ถ้าเกิด จำนวน คนเปลี่ยนแปลง
        $sql_orderhead = "UPDATE order_header SET ";
        $sql_orderhead .= " order_number_fermale = " . $_POST['female'];
        $sql_orderhead .= " ,order_number_male = " . $_POST['male'];
        $sql_orderhead .= " ,order_status = 1";
        $sql_orderhead .= " WHERE order_id = " . $_POST['id'];
        mysql_query($sql_orderhead) or die(mysql_error());

        $temp = explode(".", $_FILES["file"]["name"]);
        $img_temp = $_FILES["file"]["tmp_name"];
        $img_type = $_FILES["file"]["type"];
        $img_size = $_FILES["file"]["size"];
        $img_name = $_FILES["file"]["name"];
        $file_in = $img_temp;
        $file_out = randomString(10) . '.' . $temp[1];
        $upload = move_uploaded_file($file_in, PATH_PAYMENT . $file_out);
        if ($upload) {
            $sql_payment = "INSERT INTO  payment (bank_id,order_id,pay_date,pay_time,pay_file,pay_comment,pay_createdate)";
            $sql_payment .= " VALUES ( ";
            $sql_payment .= " " . $_POST['bank'];
            $sql_payment .= " ," . $_POST['id'];
            $sql_payment .= " ,'" . $_POST['date'] . "'";
            $sql_payment .= " ,'" . $_POST['time'] . "'";
            $sql_payment .= " ,'" . $file_out . "'";
            $sql_payment .= " ,'" . $_POST['comment'] . "'";
            $sql_payment .= " ,NOW())";
            $query_payment = mysql_query($sql_payment) or die(mysql_error());
            if ($query_payment) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large"> Payment  Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=od">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }

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
