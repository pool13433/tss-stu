<?php

define("PATH_PRODUCT", "../../images/product/");
define("PATH_PAYMENT", "../../images/payment/");
define("PATH_PACKAGE", "../../images/package/");
define("PATH_ALBUMS", "../../images/albums/");
define("PATH_PROMOTION", "../../images/promotion/");

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'studio';

$connect = mysql_connect($server, $username, $password) or die("not connecting");
mysql_select_db($database) or die("no db :'(");
mysql_query("SET NAMES UTF8");

?>
