<?php

ob_start();
session_start();
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();
$check = true;

$orderId = $_POST['order'];
$u_id = $_POST['u_id'];
$bank = $_POST['bank'];
$examDeposit = $_POST['examdeposit'];
$deposit = $_POST['deposit'];
$file = $_POST['file'];
$payDate = $_POST['paymentdate'];
$payTime = $_POST['paymenttime'];
$comnent = $_POST['comment'];

// payment slip images
// upload and resize **********
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") ||
        ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") ||
        ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) &&
        ($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/payment/" . $u_id."-".date('Y-m-d,H-i-s').".".$extension);

        // เพิ่ม การชำระเงิน
        $r = $db->insert('payment', array(
            '', $bank, $orderId, $deposit, $payDate, $payTime, "../../images/payment/" .$u_id."-".date('Y-m-d,H-i-s').".".$extension , $comnent, 'F', date('Y-m-d')
        ));

        // แก้ไข สถานะ การชำระเงิน table order_header 
        if ($r) {
            
                $u = $db->update(
                        'order_header', array('order_status' => 1), array('order_id ', intval($orderId) ));
                $check = $db->getResults();
                
                if ($u) {
                    echo "<script>alert('payment success');</script>";
                    $html->redirect('index.php?page=od');
                }else{
                    echo "<script>alert('payment fail');</script>";
                }
            
        }
    }
}else{
    echo json_encode('image fail');
}
?>
