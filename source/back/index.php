<?php
@ob_start();
@session_start();
?>
<html >
    <head>
        <title>ผู้ดูแลระบบ</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>

        <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../datatables/dataTables.css"/>
        <link rel="stylesheet" href="../../css/jquery-ui.css"/>

        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>

        <script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../../js/jquery-ui.min.js"></script>

        <script type="text/javascript" src="../../bootstrap/js/dropdown.js"></script>

        <script type="text/javascript" src="../../datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../datatables/jquery-DT-pagination.js"></script>
        <script type="text/javascript" src="../../js/stuScript.js"></script>


    </head>
    <body style="margin-top: 30px">
        <div style="padding-left: 50px;padding-right: 50px;">
            <div class="jumbotron">
                <h1>ส่วน ผู้ดูแลระบบ ร้านถ่ายภาพ</h1>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?php
                    include './menu.php';
                    ?>
                </div>
                <div class="panel-body">
                    <?php
                    switch ($_GET['page']) {
                        case 'h': //home
                            include './m_Profile.php';
                            break;
                        case 'm': // person
                            include './m_Person.php';
                            break;
                        case 'f-m': // form person
                            include './f_Person.php';
                            break;
                        case 'b': //product
                            include './m_Bank.php';
                            break;
                        case 'f-b': //
                            include './f_Bank.php';
                            break;
                        case 'p':
                            include './m_Product.php';
                            break;
                        case 'f-p':
                            include './f_Product.php';
                            break;
                        case 'l':
                            include './m_Location.php';
                            break;
                        case 'f-l':
                            include './f_Location.php';
                            break;
                        case 'pk':
                            include './m_Package.php';
                            break;
                        case 'f-pk':
                            include './f_Package.php';
                            break;
                        case 'pks':
                            include './m_PackageSet.php';
                            break;
                        case 'f-pks':
                            include './f_PackageSet.php';
                            break;
                        case 'pksd':
                            include './m_PackageSetDetail.php';
                            break;
                        case 'f-pksd':
                            include './f_PackageSetDetail.php';
                            break;
                        case 'od':
                            include './m_Order.php';
                            break;
                        case 'pre':
                            include './m_Prefix.php';
                            break;
                         case 'f-pre':
                            include './f_Prefix.php';
                            break;
                        case 'f-od':
                            include '';
                            break;
                        case 'pm':
                            include './m_Payment.php';
                            break;
                        case 'img':
                            include './m_Images.php';
                            break;
                        case 'f-img':
                            include './f_Images.php';
                            break;
                        case 'f-pm':
                            include '';
                            break;
                        default:
                            include './m_Order.php';
                            break;
                    }
                    ?>
                </div>
                <div class="panel-footer">Footer</div>
            </div>
        </div>
    </body>
</html>

