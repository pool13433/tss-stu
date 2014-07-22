<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (!empty($_POST)) {
            $img_temp = "";
            $upload = "";
            // upload
            $temp = explode(".", $_FILES["file"]["name"]);
            $img_temp = $_FILES["file"]["tmp_name"];
            $img_type = $_FILES["file"]["type"];
            $img_size = $_FILES["file"]["size"];
            $img_name = $_FILES["file"]["name"];
            if (!empty($img_temp)) {
                $img_random_name = randomString() . "." . $temp[1];
                $img_new = PATH_PRODUCT . $img_random_name;

                $upload = move_uploaded_file($img_temp, $img_new);
            }


            if (empty($_POST['id'])) { // insert
                $sql_product = "INSERT INTO product (prod_id,prod_code,prod_name,prod_price,prod_img,prod_createdate)";
                $sql_product .= " VALUES(";
                $sql_product .= " ''";
                $sql_product .= " ,'" . $_POST['code'] . "'";
                $sql_product .= " ,'" . $_POST['name'] . "'";
                $sql_product .= " ,'" . $_POST['price'] . "'";
                $sql_product .= " ,'" . $img_random_name . "',NOW()";
                $sql_product .= ")";
            } else { // update
                $sql_product = "UPDATE product SET ";
                $sql_product .= " prod_code='" . $_POST['code'] . "'";
                $sql_product .= " ,prod_name = '" . $_POST['name'] . "'";
                $sql_product .= " ,prod_price = '" . $_POST['price'] . "'";
                if (!empty($img_temp) && $upload) {
                    //echo "update upload file";
                    $sql_product .= " ,prod_img = '" . $img_random_name . "'";
                }
                $sql_product .= " WHERE prod_id =" . $_POST['id'];
            }
            //echo "<pre> sql: " . $sql_prefix . "</pre>";
            $query_product = mysql_query($sql_product) or die(mysql_error());
            if ($query_product) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">Add New Product Success</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=p">';
            } else {
                echo "alert('add prefix fail !!');";
            }
        }
        break;
    case 'd': // *************************************************************** do delete 
        $sql_pro = "DELETE FROM product";
        $sql_pro .= " WHERE prod_id =" . $_POST['id'];
        echo "<pre> sql: " . $sql_pro . "</pre>";
        $query = mysql_query($sql_pro) or die(mysql_error());
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
