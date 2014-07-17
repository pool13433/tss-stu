<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'studio';
    $connect = mysql_connect($server,$username,$password) or die("not connecting");
    mysql_select_db($database) or die("no db :'(");
    mysql_query("SET NAMES UTF8");
?>
