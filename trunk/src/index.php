<?php
@ob_start();
@session_start();
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.dialog.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.datepicker.js"></script>

        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css/jquery-ui.css"/>

        <script type="text/javascript" src="../bootstrap/js/dropdown.js"></script>
        <script type="text/javascript" src="../js/stuScript.js"></script>
    </head>
    <body style="margin-top: 30px;background-image: url('../images/system/bg.jpg');">
        <div style="padding-left:30px;padding-right: 30px;">
            <div class=" panel panel-default" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-3">
                        <img src="../images/system/logo_studio.jpg" class="img-thumbnail img-size150x150"/>
                    </div>
                    <div class="col-md-9">
                        <h1>ร้านถ่ายภาพ ออนไลน์</h1>
                    </div>
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <?php include './Menu_top.php'; ?>
                </div>
                <div class="panel-body">
                    <div class="col-md-2">
                        <?php include './Menu_left.php'; ?>
                    </div>
                    <div class="col-md-10">
                        <?php
                        if (isset($_GET['page'])) {
                            switch ($_GET['page']) {
                                case 'h':
                                    include './Home.php';
                                    break;
                                case 'l':
                                    include './Login.php';
                                    break;
                                case 'r':
                                    include './Register.php';
                                    break;
                                case 'p':
                                    include './Product.php';
                                    break;
                                case 'o':
                                    include './Option.php';
                                    break;
                                case 'o-pk':
                                    include './Option_pagkage.php';
                                    break;
                                case 'o-pkd':
                                    include './Option_pagkage_set.php';
                                    break;
                                case 'i-a':
                                    include './i-album.php';
                                    break;
                                case 'i-p':
                                    include './i-promotion.php';
                                    break;
                                case 'i-c':
                                    include './i_contact.php';
                                    break;
                                case 'i-h':
                                    include './i_help.php';
                                    break;
                                case 'i-m':
                                    include './i_payment.php';
                                    break;
                                case 'i-i':
                                    include './Home.php';
                                    break;
                                default:
                                    include './Home.php';
                                    break;
                            }
                        } else {
                            include './Home.php';
                        }
                        ?>
                    </div>
                </div>
                <div class="panel-footer label-center">
                    <div class="row">
                        <div class="col-md-4">
                            เมนู
                            <ul class="list-group">
                                <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            เกี่ยวกับเรา
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">Cras justo odio</li>
                                <li class="list-group-item list-group-item-info">Dapibus ac facilisis in</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            เพื่อนบ้าน ของเรา
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning">Cras justo odio</li>
                                <li class="list-group-item list-group-item-warning">Dapibus ac facilisis in</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>