<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (!empty($_POST)) {
            $sql_PackageSet = "INSERT INTO package_set (pacset_id,pac_id,pacset_name,pacset_price,pacset_remark,pacset_createdate)";
            $sql_PackageSet .= " VALUES(";
            $sql_PackageSet .= $_POST['id'];
            $sql_PackageSet .= " ,'" . $_POST['package'] . "'";
            $sql_PackageSet .= " ,'" . $_POST['name'] . "'";
            $sql_PackageSet .= " ,'" . $_POST['price'] . "'";
            $sql_PackageSet .= " ,'" . $_POST['remark'] . "',NOW()";
            $sql_PackageSet .= ")";
            //echo "<pre> sql: " . $sql_PackageSet . "</pre>";
            $query_packageSet = mysql_query($sql_PackageSet) or die(mysql_error());
            if ($query_packageSet) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Product Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=pks">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }
        break;
    case 'e': // *************************************************************** do delete 
        $sql_PackageSet = "UPDATE package_set SET ";
        $sql_PackageSet .= " pac_id = '" . $_POST['package'] . "'";
        $sql_PackageSet .= " ,pacset_name = '" . $_POST['name'] . "'";
        $sql_PackageSet .= " ,pacset_price = '" . $_POST['price'] . "'";
        $sql_PackageSet .= " ,pacset_remark = '" . $_POST['remark'] . "'";
        $sql_PackageSet .= " WHERE pacset_id =" . $_POST['id'];

        //echo "<pre> sql: " . $sql_PackageSet . "</pre>";
        $query_packageSet = mysql_query($sql_PackageSet) or die(mysql_error());
        if ($query_packageSet) {
            echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Product Success</div>';
            echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=pks">';
        } else {
            echo "alert('add prefix fail !!');";
        }
        break;
    case 'd': // *************************************************************** do delete 
        // ลบ table ลูก 
        $sql_PackageSetDetail = " DELETE FROM package_set_detail WHERE pacset_id =  " . $_POST['id'];
        mysql_query($sql_PackageSetDetail) or die(mysql_error());
        
        // ลบ table แม่ ได้
        $sql_package = "DELETE FROM package_set";
        $sql_package .= " WHERE pacset_id =" . $_POST['id'];
        //echo "<pre> sql: " . $sql_package . "</pre>";
        $query = mysql_query($sql_package) or die(mysql_error());

        echo $query;
        break;
}

/*
  // insert detail item
  $arr_num = $_POST['num'];
  $arr_size = $_POST['size'];
  if (isset($_POST['num'])) {
  //foreach ($arr_num as $num) {
  for ($i = 0; $i < count($arr_num); $i++) {
  $sql_PackageSetDetail = "INSERT INTO package_set_detail (pacset_id,setd_imgsize,setd_number,setd_createdate)";
  $sql_PackageSetDetail .= " VALUES( ";
  $sql_PackageSetDetail .= $_POST['pac_set'];
  $sql_PackageSetDetail .= " ,'" . $arr_size[$i] . "'";
  $sql_PackageSetDetail .= " ," . $arr_num[$i] . ",NOW()";
  $sql_PackageSetDetail .= ")";
  //echo "<pre> sql: " . $sql_PackageSet . "</pre>";
  mysql_query($sql_PackageSetDetail) or die(mysql_error());
  }
  }
 */
?>
