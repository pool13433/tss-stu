<!DOCTYPE html>
<html>
    <head>
        <title>Report Order</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../../bootstrap/docs/dist/css/bootstrap.min.css" type="text/css">        
        <link rel="stylesheet" href="../../css/style.css" type="text/css">        
    </head>
    <body style="padding: 50px;">
        <?php
        include '../../config/connect.php';

        if (!empty($_GET['id'])):
            $sql_order = "SELECT * FROM order_header oh,person ps";
            $sql_order .= " LEFT JOIN province pv ON pv.prov_id = ps.prov_id";
            $sql_order .= " LEFT JOIN prefix pf ON  pf.pref_id = ps.pref_id";
            $sql_order .= " WHERE ps.pers_id = oh.pers_id";
            $sql_order .= " AND  oh.order_id =" . $_GET['id'];
            // echo "<pre> sql :" . $sql_order . "</pre>";
            $query_order = mysql_query($sql_order) or die(mysql_error());
            $rh = mysql_fetch_assoc($query_order);
            ?>
            <h2 style="text-align: center;">ใบการ จอง การถ่ายภาพ</h2>
            <table class="table-head">
                <tbody>
                    <tr>
                        <td colspan="2" style="text-align: left;">เลขที่ ใบ จอง <?= $rh['order_id'] ?></td>
                        <td></td>
                        <td colspan="2" style="text-align: right;">วันที่ จอง <?= date("d-m-Y", strtotime($rh['order_createdate'])); ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><?= $rh['pers_fname'] . " " . $rh['pers_lname'] ?></td>
                        <td></td>
                        <td style="text-align: center;"><?= $rh['pers_idcard'] ?></td>
                        <td></td>
                        <td><?= $rh['pers_birthday'] ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">ที่อยู่ </td>
                        <td colspan="4">
                            <?=
                            $rh['pers_address'] . "    " . $rh['pers_alley'] . "   " . $rh['pers_district'] . "    " .
                            $rh['pers_district'] . "    " . $rh['pers_prefecture'] . "    " .
                            $rh['prov_name'] . "    " . $rh['pers_postcode']
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><?= $rh['pers_phone'] ?></td>
                        <td></td>
                        <td style="text-align: center;"><?= $rh['pers_email'] ?></td>
                        <td></td>
                        <td>สถานะ <?php
                            if ($rh['persta_id'] == 1):
                                echo "Administrtor";
                            else:
                                echo "Customer VIP";
                            endif;
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr/>
            <h2 style="text-align: center;">รายการ</h2>        
            <div class="row">
                <div class="col-md-6" style="width: 90%">
                    <h3>แพ็คเก๊ต</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ลำดับ</th>
                                <th style="text-align: center;">ชื่อ</th>
                                <th style="text-align: center;">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_package = "SELECT * FROM order_package op";
                            $sql_package .= " JOIN package_set ps ON op.pack_id = ps.pacset_id";
                            $sql_package .= " WHERE op.cart_id = " . $rh['order_id'];
                            $querypac = mysql_query($sql_package) or die(mysql_error());
                            $i = 0;
                            while ($rowpac = mysql_fetch_array($querypac)) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $i ?></td>
                                    <td style="text-align: left;"><?= $rowpac['pacset_name'] ?></td>
                                    <td style="text-align: center;"><?= $rowpac['pacset_price'] ?></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6" style="width: 90%">
                    <h3>แพ็คเก๊ต</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ลำดับ</th>
                                <th style="text-align: left;">ชื่อ</th>
                                <th style="text-align: center;">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_pacpro = "SELECT * FROM order_product op";
                            $sql_pacpro .= " JOIN product  ps ON op.prod_id = ps.prod_id";
                            $sql_pacpro .= " WHERE op.cart_id = " . $rh['order_id'];
                            $querypro = mysql_query($sql_pacpro) or die(mysql_error());
                            $i = 0;
                            while ($rowpro = mysql_fetch_array($querypro)) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $i ?></td>
                                    <td style="text-align: center;"><?= $rowpro['prod_name'] ?></td>
                                    <td style="text-align: center;"><?= $rowpro['prod_price'] ?></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="text-align: right;">
                <span class="alert alert-info">รวม ค่า ใช่จ่าย <?= $rh['order_totalprice'] ?></span>
            </div>
            <hr/>
            <div class="row" style="text-align: right;">
                <span class="alert alert-warning">สถานที่ ถ่ายภาพ [ <?= getLocation($rh['order_id']) ?> ]</span>
            </div>
            <hr/>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td style="text-align: center;width: 25%;"> 
                            [..................................................]<br/><br/>
                            (...................ผู้รับเงิน..................)
                        </td>
                        <td style="width: 50%"></td>
                        <td style="text-align: center;width: 25%;"> 
                            [......................................................]<br/><br/>
                            (.....<?= $rh['pers_fname'] . " " . $rh['pers_lname'] ?>.....)<br/><br/>
                            (...................ผู้จ่ายเงิน....................)
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: center;">
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <i class="glyphicon glyphicon-print"></i> ปริ้น
                </button>
            </div>
        <?php endif; ?>
    </body>
</html>
<?php

function getLocation($order_id) {
    $str = "";
    $sql_ = "SELECT * FROM order_location ol,location l ";
    $sql_ .= " WHERE ol.loc_id = l.loc_id AND order_id = " . $order_id;
    $query = mysql_query($sql_) or die(mysql_error());
    $i = 0;
    while ($row = mysql_fetch_array($query)) {
        if ($i == 0) {
            $str = $str . $row['loc_name'];
        } else {
            $str = $str . "," . $row['loc_name'];
        }
        $i++;
    }
    return $str;
}
?>

