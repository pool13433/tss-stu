<?php
@ob_start();
@session_start();
include '../../config/connect.php';
if (!empty($_POST)) {
    // update fname and lname 
    $sql_person = "UPDATE person SET ";
    $sql_person .= " pers_fname = '" . $_POST['fname'] . "'";
    $sql_person .= " ,pers_lname = '" . $_POST['lname'] . "'";
    $sql_person .= " WHERE pers_id = " . $_SESSION['id'];
    mysql_query($sql_person) or die(mysql_error());

    // update order_head
    $sql_orderhead = "UPDATE order_header SET ";
    $sql_orderhead .= " order_date = '" . $_POST['day'] . "'";
    $sql_orderhead .= " ,order_time = '" . $_POST['time1'] . "-" . $_POST['time2'] . "'";
    $sql_orderhead .= " ,order_number_fermale = " . $_POST['female'];
    $sql_orderhead .= " ,order_number_male =" . $_POST['male'];
    $sql_orderhead .= " ,order_totalprice = " . $_POST['price'];
    $sql_orderhead .= " ,order_deposit = " . $_POST['deposit'];
    $sql_orderhead .= " ,order_createdate = NOW()";
    $sql_orderhead .= " ,order_success = 1";
    $sql_orderhead .= " WHERE order_id =" . $_SESSION['order_id'];

    //insert order_location 
    $arrLocation = $_POST['location'];
    //var_dump($arrLocation);
    foreach ($arrLocation as $loc) {
        $sql_localtion = "INSERT INTO order_location (order_id,loc_id,order_lo_createdate)";
        $sql_localtion .= " VALUES ( ";
        $sql_localtion .= $_SESSION['order_id'];
        $sql_localtion .= " , " . $loc;
        $sql_localtion .= " ,NOW()";
        $sql_localtion .= " )";
        mysql_query($sql_localtion) or die(mysql_error());
    }
    //echo '<pre> sql : ' . $sql_orderhead . '</pre>';
    $query_orderhead = mysql_query($sql_orderhead) or die(mysql_error());
    if ($query_orderhead) {
        unset($_SESSION['order_id']);
        echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Confirm Order Succes กรุณา รอการ อนุมัติ</div>';
        echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=od">';
    } else {
        echo "alert('Confirm Order fail !!');";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>

    </body>
</html>
