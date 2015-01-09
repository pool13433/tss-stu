<?php

include '../../config/connect.php';

switch ($_GET['method']) {
    case 'd':
        $sql_album = "DELETE FROM album WHERE album_id = " . $_POST['id'];
        $sql_file = "DELETE FROM album_file WHERE album_id = " . $_POST['id'];
        mysql_query($sql_file) or die(mysql_error());
        echo mysql_query($sql_album) or die(mysql_error());
        break;
    default:
        break;
}
?>
