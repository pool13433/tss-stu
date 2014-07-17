<?php

include '../../config/Database.php';
$db = new Database();

// save date = ไป อัพเดทข้อมูล การสั่งจอง ตาราง ชื่อ order_header


$arrOrder = $_POST['arrOrder'];


$i = $db->update('order_header', array(
    'order_date' => $arrOrder[3],
    'order_time' => $arrOrder[4],
    'order_number_fermale' => intval($arrOrder[5]),
    'order_number_male' => intval($arrOrder[6]),
    'order_totalprice' => intval($arrOrder[7]),
    'order_deposit' => intval($arrOrder[8]),
    'order_status' => 0,
    'order_approve_status' => 0,
    'order_createdate' => date('Y-m-d'),
    'order_success' => 'T',  // update ตะกร้า true
        ), array(
    'order_id', intval($arrOrder[0])
        ));
        //echo "<script>alert('update order');</script>";
if ($i) {
    // save data = ไปเพิ่มข้อมูลการเลือกจอง สถานที่ ตาราง ชื่อ order_location
    $arrLoc = $_POST['arrLocation'];
    foreach ($arrLoc as $r) {
        $r = $db->insert('order_location', array(
            '', $arrOrder[0], $r, date('Y-m-d'), ''
        ));
    }
    
    // ล้าง ค่า ตะกร้า อันเก่า
    unset($_SESSION['order_id']);
    echo json_encode($r);
} else {
    //echo "<script>alert('save location fail');</script>";
    echo json_encode(false);
}
?>
