<?php

include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

switch ($_GET['method']) {
   case 'i': // *************************************************************** do insert 
        echo "method new save";
        if (empty($_POST['id'])) {  //insert
            if (!empty($_POST['pk_name']) || trim($_FILES["file"]["tmp_name"]) != "") {

                // upload and resize **********
                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["file"]["name"]);
                $extension = end($temp);
                if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") ||
                        ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") ||
                        ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) &&
                        ($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts)) {
                    
                    if ($_FILES["file"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                    } else {
//                        if (file_exists("../../images/package/" . $_FILES["file"]["name"])) {
//                            echo $_FILES["file"]["name"] . " already exists. ";
//                        } else {
                            move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/package/" . $_FILES["file"]["name"]);
                            //echo "Stored in: " . "../../images/product/" . $_FILES["file"]["name"];
                            $r = $db->insert('package', array(
                                '', $_POST['pk_name'],"../../images/package/" . $_FILES["file"]["name"], date("Y-m-d")
                            ));
                            if ($r) {
                                $html->redirect('index.php?page=pk');
                            } else {
                                // $html->redirect('index.php?page=b');
                                echo "save error";
                            }
                        //}
                    }
                } else {
                    echo "Invalid file";
                }
                //*****************************
            } else {
                ?>
                <script type="text/javascript">
                    $(function() {
                        error();
                    });
                </script>
                <?php
//                echo '<script type="text/javascript">'
//                , 'alert("กรุณากรอกค่าให้ครบถ้วน");'
//                , '</script>';
                $html->redirect('index.php?page=f-p');
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
                    $html->redirect('index.php?page=p');
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
                'package', 'pac_id =' . $id);

        return true;
        break;
    default:
        break;
}
?>

