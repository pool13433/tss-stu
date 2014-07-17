
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript">
            function e() {
                $('#dialog_e').dialog({
                    autoOpen: false,
                });
            }
            function s() {
                $('#dialog_s').dialog({
                    autoOpen: false,
                });
            }
        </script>
    </head>
    <body>
        <div class="dialog_s"></div>
        <div class="dialog_e"></div>
    </body>
</html>
<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();
switch ($_GET['method']) {
    case 'i': // *************************************************************** do insert 
        if(empty($_POST['id'])) {  //insert
            if (!empty($_POST['bank'])) {
                echo "bank===>>" . $_POST['bank'];
                $r = $db->insert('bank', array(
                    '', $_POST['bank']
                ));
                if ($r) {
                    $html->redirect('index.php?page=b');
                } else {
                    // $html->redirect('index.php?page=b');
                    echo "save error";
                }
            } else {
                echo '<script type="text/javascript">'
                , 'alert("กรุณากรอกค่าให้ครบถ้วน");'
                , '</script>';
                $html->redirect('index.php?page=f-b');
            }
        } else {  // *********************************************************** do Update
            if (isset($_POST['bank'])) {
                
                //echo $_POST['id'];
                
                $db->update('bank', array(
                    'bank_name' => $_POST['bank'],
                        ), array(
                            'bank_id',$_POST['id']
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
                'bank', 'bank_id =' . $id);

        return true;
        break;
    default:
        break;
}
?>

