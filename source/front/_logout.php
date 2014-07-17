<?php
@ob_start();
@session_start();
?>
<?php
        include '../../config/Database.php';
        $db= new Database();
        $id = $_SESSION['order_id'];
        
        $d_pac = $db->delete('order_package', 'cart_id ='.$id);
        
        $d_pro = $db->delete('order_product', 'cart_id ='.$id);
        
        if($d_pac || $d_pro){
            unset($_SESSION['order_id']);
        }
        
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['status']);
       
        if (empty($_SESSION['pers_id'])) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
?>
