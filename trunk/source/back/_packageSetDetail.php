<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if (empty($_POST['id'])) {  //insert
            if (!empty($_POST['packageSet'])||!empty($_POST['pksd1'])||!empty($_POST['pksd2'])||$_POST['pksd_no']) {
                
                // save new item 
                
                $r = $db->insert('package_set_detail', array(
                    '', $_POST['packageSet'],$_POST['pksd1']."X".$_POST['pksd2'],$_POST['pksd_no'], date('Y-m-d')
                ));
                
                // check 
                
                if ($r) {
                    $html->redirect('index.php?page=pksd');
                } else {
                    echo "save error";
                }
                
            } else {
                echo '<script type="text/javascript">'
                , 'alert("กรุณากรอกค่าให้ครบถ้วน");'
                , '</script>';
                $html->redirect('index.php?page=f-pksd');
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
                'package_set_detail', 'setd_id =' . $id);

        return true;
        break;
    default:
        echo "method other";
        break;
}
?>
