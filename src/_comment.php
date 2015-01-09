<?php

include '../config/connect.php';
//echo "id==>>>".$_POST['id'];
//echo "message==>>>".$_POST['message'];
$sql = "INSERT INTO webboard_comment (comment_id,post_id,comment_message,comment_createdate)";
$sql .= " VALUES ";
$sql .= " ('','" . $_POST['id'] . "','" . $_POST['message'] . "',NOW())";
//echo "sql==>>".$sql;
$query = mysql_query($sql) or die(mysql_error() . "sql===>>" . $sql);

 echo json_encode($query);

?>
