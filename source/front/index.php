<?php
@ob_start();
@session_start();
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../datatables/dataTables.css"/>
        <link rel="stylesheet" href="../../css/jquery-ui.css"/>
        <link rel="stylesheet" href="../../multi-select/css/multi-select.css" media="screen" type="text/css"/>

        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>

        <script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../../js/jquery-ui.min.js"></script>

        <script type="text/javascript" src="../../js/stuScript.js"></script>
        <script type="text/javascript" src="../../datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../datatables/jquery-DT-pagination.js"></script>
        <script type="text/javascript" src="../../multi-select/js/jquery.multi-select.js"></script>
    </head>
    <body style="margin-top: 50px;padding-left: 50px;padding-right: 50px;">
        <div class="jumbotron">
            <h1>Hello, world!</h1>
        </div>
        <?php include './menu_top.php'; ?>
        <div class="panel panel-warning">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <?php include './menu_left.php'; ?>
                    </div>
                    <div class="col-md-10">
                        <?php
                        switch ($_GET['page']) {

                            //menu left


                            case 'h': //home
                                break;
                            case 'pd': //product
                                include './listProduct.php';
                                break;
                            case 'ot': //package
                                include './optionProduct.php';
                                break;
                            case 'o-pk': // choose package
                                include './listPackage.php';
                                break;
                            case 'o-pkd': // choose package
                                include './listPackage_detail.php';
                                break;
                            case 'o-pd': // choose product
                                include './listProduct.php';
                                break;
                            case 'c': //
                                include './listCart.php';
                                break;
                            case 'lo': //
                                include './formLocation.php';
                                break;
                            case 'od': //
                                include './listOrder.php';
                                break;
                            case 'od-d': //
                                include './listOrder_detail.php';
                                break;
                            case 'pm':
                                include './formPayment.php';
                                break;
                            case 'pf':
                                include './formProfile.php';
                                break;
                            case 'rp':
                                include './r_report.php';
                                break;

                            // menu_top 

                            case 'i-p':
                                include '../i-promotion.php';
                                break;
                            case 'i-m':
                                include '../i_payment.php';
                                break;
                            case 'i-c':
                                include '../i_contact.php';
                                break;
                            case 'i-h':
                                include '../i_help.php';
                                break;
                            case 'i-a':
                                include '../i-album.php';
                                break;
                            default:
                                break;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
    </body>
</html>

