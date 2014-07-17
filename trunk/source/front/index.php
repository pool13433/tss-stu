<?php
ob_start();
session_start();
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../../js/jquery.ui.dialog.js"></script>
        <script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.ui.datepicker.js"></script>
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/bootstrap.css"/>
        <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../css/jquery-ui.css"/>
    </head>
    <body style="margin-top: 30px">
        <div style="margin: 0 auto;width: 1248px;">
            <table border="1" style="width: 1248px;">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <div id="top">
                                Top
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php include './menu_top.php';?>
                        </td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top">
                            <div id="left-menu" class="box">
                                <?php include './menu_left.php'; ?>
                            </div>
                        </td>
                        <td id="content" valign="top">
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
                                case 'o-pd': // choose product
                                    include './listProduct.php';
                                    break;
                                case 'c': //
                                    include './listCart.php';
                                    break;
                                case 'od': //
                                    include './listOrder.php';
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
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" valign="top">
                            <div id="footer" class="footer">
                                Footer
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

