<?php

@ob_start();
@session_start();
include '../config/connect.php';

//check login
$sql = "SELECT * FROM person ";
$sql .= "WHERE pers_username ='" . trim($_POST['username']) . "'";
$sql .= " AND pers_password = '" . trim($_POST['password']) . "'";
$sql .= " LIMIT 0, 1";

$query = mysql_query($sql) or die(mysql_error());

$row = mysql_num_rows($query);

$r = mysql_fetch_assoc($query);
// check person in table
if ($row != 0) { // true have person in table    
    /* session_register("id");
      session_register("username");
      session_register("password");
      session_register("status"); */

    $_SESSION['id'] = $r['pers_id'];
    $_SESSION['username'] = $r['pers_username'];
    $_SESSION['password'] = $r['pers_password'];
    $_SESSION['status'] = $r['persta_id'];
    $_SESSION['object'] = $r;

    if (isset($_SESSION['id']) &&
            isset($_SESSION['username']) &&
            isset($_SESSION['password'])) { // status = register complete
        $status = $r['persta_id'];

        echo json_encode(array('status' => 1, 'personstatus' => $status));
    } else { // status = register error
        echo json_encode(array('status' => 2));
    }
} else { // status = no person in table 
    echo json_encode(array('status' => 0));
}
?>
