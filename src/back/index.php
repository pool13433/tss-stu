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
        <div style="padding-left: 20px;padding-right: 20px;">
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
                        สถานะ : admin
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
                        case 'f-od':
                            include './f_order.php';
                            break;
                        case 'pre':
                            include './m_Prefix.php';
                            break;
                        case 'f-pre':
                            include './f_Prefix.php';
                            break;
                        case 'size':
                            include './m_Size.php';
                            break;
                        case 'f-size':
                            include './f_Size.php';
                            break;
                        case 'f-od':
                            include '';
                            break;
                        case 'pm':
                            include './m_Payment.php';
                            break;
                        case 'alb':
                            include './m_Album.php';
                            break;
                        case 'alb-file':
                            include './m_Images.php';
                            break;
                        case 'f-alb':
                            include './f_Album.php';
                            break;
                        case 'promote':
                            include './m_Promotion.php';
                            break;
                        case 'f-promote':
                            include './f_Promotion.php';
                            break;
                        case 'contact':
                            include './m_Contact.php';
                            break;
                        case 'f-contact':
                            include './f_Contact.php';
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

