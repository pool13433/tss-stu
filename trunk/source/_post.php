<?php

include '../config/connect.php';
//echo "id==>>>".$_POST['id'];
//echo "message==>>>".$_POST['message'];
$sql = "INSERT INTO webboard_post (post_id,post_message,post_createdate)";
$sql .= " VALUES ";
$sql .= " ('','" . $_POST['message'] . "',NOW())";
//echo "sql==>>".$sql;
$query = mysql_query($sql) or die(mysql_error() . "sql===>>" . $sql);

 echo json_encode($query);

?>

