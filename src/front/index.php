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

        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>

        <script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../../js/jquery-ui.min.js"></script>

        <script type="text/javascript" src="../../js/stuScript.js"></script>
        <script type="text/javascript" src="../../datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../datatables/jquery-DT-pagination.js"></script>
    </head>
    <body style="margin-top: 50px;padding-left: 25px;padding-right: 25px;">
        <div class="row">
                <div class="col-md-8">
                    <div class="jumbotron">
                        <h1>ส่วน ผู้ดูแลระบบ ร้านถ่ายภาพ</h1>
                    </div>
                </div>
                <div class="col-md-4 alert alert-warning">
                    <ul class="list-group">
                      <li class="list-group-item">
                        ชื่อผู้เข้าใช้งาน : <?=$_SESSION['object']['pers_fname']?>
                      </li>
                      <li class="list-group-item">
                        สถานะ : ผู้ใช้งานทั่วไป
                      </li>
                      <li class="list-group-item">     
                        <div class="row">                   
                            <label class="col-md-2">วันที่ : </label>
                            <div class="col-md-6"> <?=date('m-d-Y')?></div> 
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-success">
                        <div class="row">
                            <label class="col-md-2">เวลา : </label>
                            <div class="col-md-6" id="clock"></div>  
                        </div>                      
                      </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">                
                $(document).ready(function(){
                   setInterval('updateClock()', 1000);
                });
            </script>
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

