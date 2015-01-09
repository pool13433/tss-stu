<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (!empty($_POST)) {
            if (empty($_POST['id'])) { // insert                
                $arr_num = $_POST['num'];
                $arr_size = $_POST['size'];
                if (isset($_POST['num'])) {
                    //foreach ($arr_num as $num) {
                    for ($i = 0; $i < count($arr_num); $i++) {
                        $sql_PackageSet = "INSERT INTO package_set_detail (pacset_id,setd_imgsize,setd_number,setd_createdate)";
                        $sql_PackageSet .= " VALUES( ";
                        $sql_PackageSet .= $_POST['pac_set'];
                        $sql_PackageSet .= " ,'" . $arr_size[$i] . "'";
                        $sql_PackageSet .= " ," . $arr_num[$i] . ",NOW()";
                        $sql_PackageSet .= ")";
                        //echo "<pre> sql: " . $sql_PackageSet . "</pre>";
                        $query_packageSet = mysql_query($sql_PackageSet) or die(mysql_error());
                    }
                }
            } else { // update
                $sql_PackageSet = "UPDATE package_set SET ";
                $sql_PackageSet .= " pac_id = '" . $_POST['package'] . "'";
                $sql_PackageSet .= " ,pacset_name = '" . $_POST['name'] . "'";
                $sql_PackageSet .= " ,pacset_price = '" . $_POST['price'] . "'";
                $sql_PackageSet .= " ,pacset_remark = '" . $_POST['remark'] . "'";
                $sql_PackageSet .= " WHERE pacset_id =" . $_POST['id'];
            }
            //echo "<pre> sql: " . $sql_Package . "</pre>";
            //$query_packageSet = mysql_query($sql_PackageSet) or die(mysql_error());
            if ($query_packageSet) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Product Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=pksd">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }
        break;
    case 'a': // *************************************************************** do insert 
        $sql_package = "INSERT INTO package_set_detail (pacset_id,setd_imgsize,setd_number,setd_createdate)";
        $sql_package .= " VALUES ( ";
        $sql_package .= $_POST['set_id'];
        $sql_package .= " ," . $_POST['id'];
        $sql_package .= " ," . $_POST['number'];
        $sql_package .= " ,NOW()";
        $sql_package .= " )";
        //echo "<pre> sql: " . $sql_package . "</pre>";
        $query_packageSetSetail = mysql_query($sql_package) or die(mysql_error());
        echo $query_packageSetSetail;
        break;
    case 'd': // *************************************************************** do delete 
        $sql_package = "DELETE FROM package_set_detail";
        $sql_package .= " WHERE setd_id =" . $_POST['id'];
        //echo "<pre> sql: " . $sql_package . "</pre>";
        $query_packageSetSetail = mysql_query($sql_package) or die(mysql_error());
        echo $query_packageSetSetail;
        break;
}
?>
