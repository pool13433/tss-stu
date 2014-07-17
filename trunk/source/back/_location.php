<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (empty($_POST['id'])) {  //insert
            if (!empty($_POST['l_name'])||!empty($_POST['l_price'])) {
                
                $r = $db->insert('location', array(
                    '', $_POST['l_name'],$_POST['l_price'], date('Y-m-d')
                ));
                if ($r) {
                    $html->redirect('index.php?page=l');
                } else {
                    echo "save error";
                }
            } else {
                echo '<script type="text/javascript">'
                , 'alert("กรุณากรอกค่าให้ครบถ้วน");'
                , '</script>';
                $html->redirect('index.php?page=f-l');
            }
        } else {  // *********************************************************** do Update
            if (isset($_POST['bank'])) {

                //echo $_POST['id'];

                $db->update('bank', array(
                    'bank_name' => $_POST['bank'],
                        ), array(
                    'bank_id', $_POST['id']
                ));
                $r = $db->getResults();
                if ($r) {
                    $html->redirect('index.php?page=b');
                } else {
                    // $html->redirect('index.php?page=b');
                    echo 'update error';
                }
            } else {
                echo "Insert Error";
            }
        }
        break;
    case 'd': // *************************************************************** do delete 
        $id = $_POST['id'];
        $r = $db->delete(
                'location', 'loc_id =' . $id);

        return true;
        break;
    default:
        echo "method other";
        break;
}
?>
