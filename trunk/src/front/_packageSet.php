<?php

include '../../config/connect.php';
    $arr = array();
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM package_set_detail WHERE pacset_id = ".$id;
    
    $query = mysql_query($sql) or die(mysql_error() . "sql==>>" . $sql);
    
    
    while ($row = mysql_fetch_array($query)) {
            $arr[] = array(
                        'setd_id' => $row['setd_id'],
                        'pacset_id' => $row['pacset_id'],
                        'setd_imgsize' => $row['setd_imgsize'],
                        'setd_number' =>$row['setd_number'],
            );
    };
    
    echo json_encode($arr);
    //echo json_encode($row);
?>
