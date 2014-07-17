<?php
    include '../../config/Database.php';
    $db = new Database();
    
    // ลบ table ทั้งหมด ที่เกี่ยวข้อกับ order_id ที่จะลบ
    
    
    $r = $db->delete('order_header', 'order_id = '.$_POST['id']);
    
    $db->delete('order_package', 'cart_id = '.$_POST['id']);
    
    $db->delete('order_product', 'cart_id = '.$_POST['id']);
    
    $db->delete('order_location', 'order_id = '.$_POST['id']);
    
    echo json_encode($r);
?>
