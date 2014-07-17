<?php

include '../../config/Database.php';
$db = new Database();
$check = true;
   // echo "pay".$_POST['pay']."---<br/>";
   // echo "take".$_POST['take']."---";
    if(isset($_POST['pay'])){
        $db->update(
                    'order_header',
                     array('order_status' => intval($_POST['pay']) ),
                     array('order_id ',  intval($_POST['id'])) );
        $check = $db->getResults();
        //echo "update pay==>>".$check;
    }else{
        echo "no select pay";
    }
    if(isset($_POST['take'])){
        $db->update(
                'order_header',
                 array('order_approve_status' => intval($_POST['take'])),
                 array('order_id',  intval($_POST['id'])) );
        $check = $db->getResults();
        //echo "update take==>>".$check;
    }else{
        echo "no select take";
    }
    echo json_encode($check);
?>
