<?php

ob_start();
session_start();
include '../../config/Database.php';
include '../../config/connect.php';
$db = new Database();



switch ($_GET['method']) {
    case 'a':
       
           // echo "isset===>>".!isset($_SESSION['order_id']);
           // echo "empty===>".empty($_SESSION['order_id']);
            
        if (!isset($_SESSION['order_id']) && empty($_SESSION['order_id'])) {
            echo " session null-----";

            // เพิ่ม ตะกร้าใหม่เข้าระบบ
                $db->insert('order_header', array(
                    '', $_SESSION['id'], '', '', '', '', '', '', 0, 0, date("Y-m-d H:i:s"), 'F'
                ));
                $db->getResults();
                
            // get Data Last Table 
                $sql = 'SELECT * FROM order_header ORDER BY order_id DESC LIMIT 0,1';
                $query = mysql_query($sql) or die(mysql_error());
                while ($result = mysql_fetch_assoc($query)) {
                            session_register('order_id');
                    
                            $_SESSION['order_id'] = $result['order_id'];
                            return 1; // get id complete
                } 
           
        } 
        
        switch ($_POST['typeItem']) {
            
            case 'item_pro':  // กรณี เพิ่ม product
                   $r = $db->insert(
                            'order_product', 
                             array(
                                '',$_SESSION['order_id'],$_SESSION['id'],$_POST['id'],  date("Y-m-d H:i:s"),'F'
                    ));
                    return true;
                break;
            case 'item_pac': // กรณี เพิ่ม package
                    $r = $db->insert(
                            'order_package', 
                             array(
                                '',$_SESSION['order_id'],$_SESSION['id'],$_POST['id'],  date("Y-m-d H:i:s"),'F'
                    ));
                    return true;
                break;
            default:
                break;
        }
        
        break;
    case 'd':
        
        switch ($_POST['typeItem']) {
            case 'item_pro':
                    $db->delete('order_product', 'temp_id ='.$_POST['id']);
                    return true;
                break;
            case 'item_pac':
                    $db->delete('order_package', 'temp_id ='.$_POST['id']);
                    return true;
                break;
            default:
                echo "delete fail";
                break;
        }
        break;
    
    default:
        return false;
        break;
}
?>
