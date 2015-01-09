
<?php

@ob_start();
@session_start();

unset($_SESSION['pers_id']);
unset($_SESSION['username']);
unset($_SESSION['password']);


if (empty($_SESSION['pers_id'])) {
    echo json_encode(array('status' => true));
} else {
    echo json_encode(array('status' => false));
}
?>
