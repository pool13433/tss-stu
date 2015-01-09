<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (!empty($_POST)) {
            $img_temp = "";
            $upload = "";
            $img_random_name = "";
            // upload
            $temp = explode(".", $_FILES["file"]["name"]);
            $img_temp = $_FILES["file"]["tmp_name"];
            $img_type = $_FILES["file"]["type"];
            $img_size = $_FILES["file"]["size"];
            $img_name = $_FILES["file"]["name"];
            if (!empty($img_temp)) {
                $img_random_name = randomString() . "." . $temp[1];
                $img_new = PATH_PACKAGE . $img_random_name;                

                $upload = move_uploaded_file($img_temp, $img_new);
            }


            if (empty($_POST['id'])) { // insert
                $sql_Package = "INSERT INTO package (pac_id,pac_name,pac_img,pac_createdate)";
                $sql_Package .= " VALUES(";
                $sql_Package .= " ''";
                $sql_Package .= " ,'" . $_POST['name'] . "'";
                $sql_Package .= " ,'" . $img_random_name . "',NOW()";
                $sql_Package .= ")";
            } else { // update
                $sql_Package = "UPDATE package SET ";
                $sql_Package .= " pac_name = '" . $_POST['name'] . "'";
                if (!empty($img_temp) && $upload) {
                    //echo "update upload file";
                    $sql_Package .= " ,pac_img = '" . $img_random_name . "'";
                }
                $sql_Package .= " WHERE pac_id =" . $_POST['id'];
            }
            //echo "<pre> sql: " . $sql_Package . "</pre>";
            $query_package = mysql_query($sql_Package) or die(mysql_error());
            if ($query_package) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Product Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=pk">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }
        break;
    case 'd': // *************************************************************** do delete 
        $sql_package = "DELETE FROM package";
        $sql_package .= " WHERE pac_id =" . $_POST['id'];
        echo "<pre> sql: " . $sql_package . "</pre>";
        $query =mysql_query($sql_package) or die(mysql_error());

        echo $query;
        break;
}

function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return (string) $randomString;
}

function deleteImage($file) {
    $target = PATH_PRODUCT . $file;
// See if it exists before attempting deletion on it
    if (file_exists($target)) {
        unlink($target); // Delete now
    }
// See if it exists again to be sure it was removed
    if (file_exists($target)) {
        return false;
    } else {
        return true;
    }
}

?>
