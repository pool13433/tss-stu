<?php

include '../../config/connect.php';
switch ($_GET['method']) {
    case 'i':
        if (!empty($_POST)) {
            $message = "";
            $arrfile = array();
            $pathTh = $_POST['albumsTh'];
            $pathEng = $_POST['albumsEng'];
            $albumid = "";
            // echo "<pre> " . var_dump($arrfile) . "</pre>";
            if (empty($_POST['id'])) { // insert 
                $sql_albums = "INSERT INTO album (album_nameth,album_nameeng,album_createdate) VALUES (";
                $sql_albums .= " '" . $pathTh . "','" . $pathEng . "',NOW()";
                $sql_albums .= " )";

                //echo "<pre> sql : ".$sql_albums."</pre>";
                $query_album = mysql_query($sql_albums) or die(mysql_error());
                $albumid = mysql_insert_id();

                $message = "INSERT New Album Success";
            } else {
                $albumid = $_POST['id'];
                $sql_albums = " UPDATE album SET ";
                $sql_albums .= " album_nameth = '" . $pathTh . "'";
                $sql_albums .= " ,album_nameeng = '" . $pathEng . "'";
                $sql_albums .= " WHERE album_id = " . $_POST['id'];

                $query_album = mysql_query($sql_albums) or die(mysql_error());
                $message = "Update  Album Success";
            }
            //var_dump($_FILES["file"]);
            if (!empty($_FILES["file"])) {
                $arrfile = reArrayFiles($_FILES["file"]);
                //var_dump($arrfile);
                if (count($arrfile) > 0) {
                    foreach ($arrfile as $file) {

                        $splite = array();
                        $splite = explode(".", $file['name']);
                        //var_dump($splite);
                        $temp = $file['tmp_name'];
                        $name = $file['name'];
                        $type = $file['type'];
                        $size = $file['size'];
                        $name = $file['error'];

                        $new = randomString(10) . "." . $splite[1];
                        $path = createdirectory($pathEng);

                        move_uploaded_file($temp, $path . $new);
                        $sql_file = " INSERT INTO album_file (album_id,file_name) VALUES ( ";
                        $sql_file .= $albumid . ",'" . $new . "'";
                        $sql_file .= " )";

                        mysql_query($sql_file) or die(mysql_error());
                    }
                }
            }
            if ($query_album) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">' . $message . '</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=alb">';
            } else {
                echo "alert('add Album fail !!');";
            }
        }

        break;
    case 'd':
        $sql_file = "DELETE FROM album_file WHERE file_id = " . $_POST['id'];
        echo mysql_query($sql_file) or die(mysql_error());
        break;
    default:
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

function createdirectory($directory) {
    $directory = PATH_ALBUMS . $directory . '/';
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }
    return $directory;
}

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    //var_dump($file_post['name']);
    if ($file_post['name'][0] != '') {
        //echo "<pre> reArrayFiles : " . var_dump($file_count) . "</pre> []";
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        //echo 'do';
    }
    return $file_ary;
}

?>