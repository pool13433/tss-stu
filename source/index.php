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
    <body style="margin-top: 30px">
        <div style="padding-left:100px;padding-right: 100px;">
            <div class="jumbotron">
                <h1>ร้านถ่ายภาพ ออนไลน์</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php include './Menu_top.php'; ?>
                </div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <?php include './Menu_left.php'; ?>
                    </div>
                    <div class="col-md-9">
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
                            include './Login.php';
                        }
                        ?>
                    </div>
                </div>
                <div class="panel-footer"> Footer</div>
            </div>
        </div>
    </body>
</html>