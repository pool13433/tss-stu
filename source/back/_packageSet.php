<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (empty($_POST['id'])) {  //insert
            if (!empty($_POST['pks_name'])||!empty($_POST['package'])||!empty($_POST['pks_price'])) {
                
                // save new item 
                
                $r = $db->insert('package_set', array(
                    '', $_POST['package'],$_POST['pks_name'],$_POST['pks_price'], date('Y-m-d')
                ));
                
                // check 
                
                if ($r) {
                    $html->redirect('index.php?page=pks');
                } else {
                    echo "save error";
                }
                
            } else {
                echo '<script type="text/javascript">'
                , 'alert("กรุณากรอกค่าให้ครบถ้วน");'
                , '</script>';
                $html->redirect('index.php?page=f-pks');
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
                'package_set', 'pacset_id =' . $id);

        return true;
        break;
    default:
        echo "method other";
        break;
}
?>
