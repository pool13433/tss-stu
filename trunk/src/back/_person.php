<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // insert 
        $massage = "";
        if (!empty($_POST)) {
            if (empty($_POST['id'])) { // inssert
                $sql_person = "INSERT INTO person (pref_id,prov_id,persta_id,pers_username,pers_password";
                $sql_person .= " ,pers_fname,pers_lname,pers_idcard,pers_birthday,pers_address,pers_alley";
                $sql_person .= " ,pers_district,pers_prefecture,pers_postcode,pers_phone,pers_email,pers_active,pers_createdate";
                $sql_person .= " )VALUES( ";
                $sql_person .= " " . $_POST['prefix'] . "," . $_POST['province'] . ",'" . $_POST['status'] . "','" . $_POST['username'] . "','" . $_POST['password'] . "'";
                $sql_person .= " ,'" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['idcard'] . "','" . $_POST['birthday'] . "','" . $_POST['address'] . "','" . $_POST['alley'] . "'";
                $sql_person .= " ,'" . $_POST['district'] . "','" . $_POST['prefecture'] . "','" . $_POST['postcode'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','nonactive',NOW()";
                $sql_person .= " )";
                $massage = "Insert Person Success ";
            } else { // update 
                $sql_person = "UPDATE person SET ";
                $sql_person .= " pref_id = " . $_POST['prefix'];
                $sql_person .= " ,prov_id = " . $_POST['province'];
                $sql_person .= " ,persta_id = " . $_POST['permission_status'];
                $sql_person .= " ,pers_username = '" . $_POST['password'] . "'";
                $sql_person .= " ,pers_fname = '" . $_POST['fname'] . "'";
                $sql_person .= " ,pers_lname = '" . $_POST['lname'] . "'";
                $sql_person .= " ,pers_idcard = '" . $_POST['idcard'] . "'";
                $sql_person .= " ,pers_birthday = '" . $_POST['birthday'] . "'";
                $sql_person .= " ,pers_address = '" . $_POST['address'] . "'";
                $sql_person .= " ,pers_alley = '" . $_POST['alley'] . "'";
                $sql_person .= " ,pers_district = '" . $_POST['district'] . "'";
                $sql_person .= " ,pers_prefecture = '" . $_POST['prefecture'] . "'";
                $sql_person .= " ,pers_postcode = '" . $_POST['postcode'] . "'";
                $sql_person .= " ,pers_phone = '" . $_POST['phone'] . "'";
                $sql_person .= " ,pers_email = '" . $_POST['email'] . "'";
                $sql_person .= " ,pers_active = '" . $_POST['status'] . "'";
                $sql_person .= " WHERE pers_id = " . $_POST['id'];

                $massage = "Update Person Success ";
            }
            //echo "<pre> sql : " . $sql_person . "</pre>";
            $query_person = mysql_query($sql_person) or die(mysql_error());
            if ($query_person) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">' . $massage . '</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=m">';
            } else {
                echo "alert('add person fail !!');";
            }
        }
        break;
    case 'd': //delete
        $sql_person = "DELETE FROM  person WHERE pers_id = " . $_POST['id'];
        $query_person = mysql_query($sql_person) or die(mysql_error());
        echo $query_person;
        break;
}
