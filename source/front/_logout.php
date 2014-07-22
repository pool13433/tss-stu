<?php

@ob_start();
@session_start();
?>
<?php

include '../../config/connect.php';

if (!empty($_SESSION['order_id'])) {
    $id = $_SESSION['order_id'];
    $sql_orderpackage = "DELETE FROM order_package WHERE  cart_id = " . $id;
    $d_pac = mysql_query($sql_orderpackage) or die(mysql_error());

    $sql_orderproduct = "DELETE FROM order_product WHERE cart_id = " . $id;
    $d_pro = mysql_query($sql_orderproduct) or die(mysql_error());

    if ($d_pac || $d_pro) {
        unset($_SESSION['order_id']);
    }
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
