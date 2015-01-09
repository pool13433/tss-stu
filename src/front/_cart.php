<?php

@ob_start();
@session_start();

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'a':
        //unset($_SESSION['order_id']);
        if (empty($_SESSION['order_id'])):
            runCartId();
        endif;
        if (!empty($_SESSION['order_id'])) {
            switch ($_POST['typeItem']) {
                case 'item_pro':  // กรณี เพิ่ม product
                    $sql_orderproduct = "INSERT INTO order_product (cart_id,pers_id,prod_id,temp_createdate)";
                    $sql_orderproduct .= " VALUES ( ";
                    $sql_orderproduct .= $_SESSION['order_id'];
                    $sql_orderproduct .= " , " . $_SESSION['id'];
                    $sql_orderproduct .= " , " . $_POST['id'];
                    $sql_orderproduct .= " ,NOW()";
                    $sql_orderproduct .= " )";

                    $query_orderproduct = mysql_query($sql_orderproduct) or die(mysql_error());
                    echo $query_orderproduct;
                    break;
                case 'item_pac': // กรณี เพิ่ม package
                    $sql_orderpackage = "INSERT INTO order_package (cart_id,pers_id,pack_id,temp_createdate)";
                    $sql_orderpackage .= " VALUES ( ";
                    $sql_orderpackage .= $_SESSION['order_id'];
                    $sql_orderpackage .= " , " . $_SESSION['id'];
                    $sql_orderpackage .= " , " . $_POST['id'];
                    $sql_orderpackage .= " ,NOW()";
                    $sql_orderpackage .= " )";

                    $query_orderpackage = mysql_query($sql_orderpackage) or die(mysql_error());
                    echo $query_orderpackage;
                    break;
            }
        } else {
            echo 'เพิ่ม item ไม่ได้ กรุณา แจ้งเจ้าหน้าที่';
        }
        break;
    case 'd': // delete item

        switch ($_POST['typeItem']) {
            case 'item_pro': // case delete product
                $sql_orderproduct = "DELETE FROM order_product WHERE temp_id = " . $_POST['id'];
                $query = mysql_query($sql_orderproduct) or die(mysql_error());
                echo $query;
                break;
            case 'item_pac': // case delete package 
                $sql_orderpackage = "DELETE FROM order_package WHERE temp_id = " . $_POST['id'];
                $query = mysql_query($sql_orderpackage) or die(mysql_error());
                echo $query;
                break;
            default:
                echo "delete fail";
                break;
        }
        break;
    case 'c': // cancle order 
        $sql_orderhead = "UPDATE order_header SET";
        $sql_orderhead .= " order_success = 2";
        $sql_orderhead .= " WHERE order_id = " . $_POST['id'];
        $query = mysql_query($sql_orderhead) or die(mysql_error());
        echo $query;
        break;
    default:
        return false;
        break;
}

function runCartId() {
//echo " session null-----";
// insert ค่า กรณี เพิ่ม สินค้า ลงตพกร้าครั้งแรก
    $sql_orderhead = " INSERT INTO order_header (pers_id,order_totalprice,order_deposit,order_createdate,order_success)";
    $sql_orderhead .= " VALUES( ";
    $sql_orderhead .= $_SESSION['id'];
    $sql_orderhead .= " ,0";
    $sql_orderhead .= " ,0";
    $sql_orderhead .= " ,NOW()";
    $sql_orderhead .= " ,0";
    $sql_orderhead .= " )";
    echo '<pre> sql : '.$sql_orderhead.'</pre>';
    mysql_query($sql_orderhead) or die(mysql_error());

// ตรวจสอบ การ เพิ่ม 
    $status = mysql_affected_rows();

// insert เข้า จะได้ 1 row
    if ($status > 0) {
// ดึง id ของ order_head สุดท้าย มา ใส่ session_
        $sql = 'SELECT * FROM order_header ORDER BY order_id DESC LIMIT 0,1';
        $query = mysql_query($sql) or die(mysql_error());
        $result = mysql_fetch_assoc($query);

        $_SESSION['order_id'] = $result['order_id'];
        echo "insert order_hear conplete";
        return true; // get id complete
    } else {
        echo 'insert orderheader error';
        return false;
    }
}

?>
