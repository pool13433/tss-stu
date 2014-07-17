<?php

include '../../config/Database.php';
$db = new Database();

switch ($_GET['method']) {
    case 'i': // insert 


        break;
    case 'u': // update


        break;
    case 'd': //delete
        echo "delete==>>";
        $id = $_POST['id'];
        $r = $db->delete(
                'person', 'pers_id =' . $id);

        return true;

        break;
    default:
        break;
}
?>
