<?php

@ob_start();
@session_start();
include '../../config/connect.php';

// สร้าง string sql
$sql_regis = "INSERT INTO person ";
$sql_regis .= " (pers_id,pref_id,prov_id,persta_id,pers_username,pers_password";
$sql_regis .= " ,pers_fname,pers_lname,pers_idcard,pers_birthday,pers_address";
$sql_regis .= " ,pers_alley,pers_district,pers_prefecture,pers_postcode,pers_phone";
$sql_regis .= " ,pers_email,pers_active,pers_createdate) VALUES(";
$sql_regis .= " '','" . $_POST['prefix'] . "','" . $_POST['province'] . "',2,'" . $_POST['username'] . "','" . $_POST['repassword'] . "'";
$sql_regis .= " ,'" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['idcart'] . "','" . $_POST['birthdate'] . "','" . $_POST['address'] . "'";
$sql_regis .= " ,'" . $_POST['alley'] . "','" . $_POST['district'] . "','" . $_POST['prefecture'] . "','" . $_POST['postcode'] . "','" . $_POST['tel'] . "'";
$sql_regis .= " ,'" . $_POST['email'] . "','nonactive',NOW()";
$sql_regis .= ")";
//echo "sql: " . $sql_regis;
$query_regis = mysql_query($sql_regis) or die(mysql_error());
if ($query_regis) {
    echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New User Success</div>';
    echo '<META HTTP-EQUIV="refresh" CONTENT="2.0; URL=./index.php?page=pd">';
} else {
    echo "alert('add user fail !!');";
}
?>
