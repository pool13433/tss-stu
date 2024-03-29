<?php
include '../../config/connect.php';
if (!empty($_GET['id'])) {
    $sql_order = "SELECT * FROM order_header WHERE order_id =" . $_GET['id'];
    $query_head = mysql_query($sql_order) or die(mysql_error());
    $rhead = mysql_fetch_assoc($query_head);

    $order_id = $rhead['order_id'];
    $pers_id = $rhead['pers_id'];
    $order_date = $rhead['order_date'];
    $order_time = $rhead['order_time'];
    $order_number_fermale = $rhead['order_number_fermale'];
    $order_number_male = $rhead['order_number_male'];
    $order_totalprice = $rhead['order_totalprice'];
    $order_deposit = $rhead['order_deposit'];
    $order_status = $rhead['order_status'];
    $order_approve_status = $rhead['order_approve_status'];
    $order_createdate = $rhead['order_createdate'];
    $order_success = $rhead['order_success'];
    $order_takephoto = $rhead['order_takephoto'];
    ?>
    <ol class="breadcrumb">
        <li><a href="index.php?page=od"><i class="glyphicon glyphicon-arrow-left"></i> รายการ ใบจอง</a></li>
        <li class="active">รายละเอียด</li>
    </ol>
    <div class="panel panel-warning">
        <div class="panel-heading">ชื่อ: <?= $_SESSION['object']['pers_fname'] . " นามสกุล: " . $_SESSION['object']['pers_lname'] ?></div>
        <div class="panel-body">
            <div class="row">
                <label class="col-sm-2 label-rigth">วันที่จอง</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_date ?></label>
                <label class="col-sm-2 label-rigth">เวลา</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_time ?></label>         
            </div>
            <div class="row">
                <label class="col-sm-2 label-rigth">หญิง</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_number_fermale ?></label>
                <label class="col-sm-2 label-rigth">ชาย</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_number_male ?></label>         
            </div>
            <div class="row">
                <label class="col-sm-2 label-rigth">ยอดเหลือ ที่ต้อง ชำระ</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_totalprice ?></label>
                <label class="col-sm-2 label-rigth">ยอดมัดจำ</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_deposit ?></label>         
            </div>
            <div class="row">
                <label class="col-sm-2 label-rigth">สถานะการจ่ายเงิน</label>
                <?php
                if ($order_status == 0):
                    ?>
                    <label class="col-sm-4 label-left alert alert-warning"><i class="glyphicon glyphicon-info-sign"></i>  รอ การจ่ายเงิน</label>
                    <?php
                elseif ($order_status == 1):
                    ?>
                    <label class="col-sm-4 label-left alert alert-success"><i class="glyphicon glyphicon-ok-sign"></i> จ่ายเงิน เรียบร้อยแล้ว</label>
                    <?php
                elseif ($order_status == 2):
                    ?>
                    <label class="col-sm-4 label-left alert alert-danger"><i class="glyphicon glyphicon-remove-sign"></i> ผิดพลาด</label>
                    <?php
                endif;
                ?>
                <label class="col-sm-2 label-rigth">สถานะ การ อนุมัติการ ถ่าย</label>
                <?php
                if ($order_approve_status == 0):
                    ?>
                    <label class="col-sm-4 label-left alert alert-warning"><i class="glyphicon glyphicon-info-sign"></i> รอ การ อนุมัติ</label>
                    <?php
                elseif ($order_approve_status == 1):
                    ?>
                    <label class="col-sm-4 label-left alert alert-success"><i class="glyphicon glyphicon-ok-sign"></i>  อนุมัติ แล้ว</label>
                    <?php
                elseif ($order_approve_status == 2):
                    ?>
                    <label class="col-sm-4 label-left alert alert-danger"> <i class="glyphicon glyphicon-remove-sign"></i> ผิดพลาด</label>
                    <?php
                endif;
                ?>       
            </div>
            <div class="row">
                <label class="col-sm-2 label-rigth">วันที่ สี่งจอง</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_createdate ?></label>
                <label class="col-sm-2 label-rigth">สถานะ ตะกร้า</label>

                <?php
                if ($order_success == 0):
                    ?>
                    <label class="col-sm-4 label-left alert alert-danger"></label>        
                    <?php
                else:
                    ?>
                    <label class="col-sm-4 label-left alert alert-success"> ยืนยันการ สั่งจอง เรียบร้อยแล้ว</label>        
                <?php
                endif;
                ?>
                </label>         
            </div>
            <div class="row">
                <label class="col-sm-2 label-rigth">วันที่ สี่งจอง</label>
                <label class="col-sm-4 label-left alert alert-info"><?= $order_createdate ?></label>
                <label class="col-sm-2 label-rigth">สถานะ การถ่ายภาพ</label>

                <?php
                if ($order_takephoto == 1):
                    ?>
                    <label class="col-sm-4 label-left alert alert-success">
                        <i class="glyphicon glyphicon-ok-sign"></i> ยืนยันการ สั่งจอง เรียบร้อยแล้ว</label>
                    <?php
                else:
                    ?>
                    <label class="col-sm-4 label-left alert alert-warning">
                        <i class="glyphicon glyphicon-info-sign"></i> รอ การ ถ่ายภาพ</label>
                <?php
                endif;
                ?>
                </label>         
            </div>
            <div class="row">
                <label class="col-md-2 label-rigth">สถานที่ ถ่ายทำ</label>
                <div class="col-md-6 alert alert-info" style="font-size: larger">
                    <?php
                    $sql_loc = "SELECT * FROM order_location ol";
                    $sql_loc .= " JOIN location l ON ol.loc_id = l.loc_id";
                    $sql_loc .= " WHERE ol.order_id = " . $order_id;
                    //echo '<pre> sql : ' . $sql_loc . '</pre>';
                    $query_location = mysql_query($sql_loc) or die(mysql_error());

                    $str_loc = "";
                    $num_loc = 0;
                    while ($row1 = mysql_fetch_array($query_location)) {
                        if (empty($str_loc)) {
                            $str_loc = $str_loc . $row1['loc_name'];
                        } else {
                            $str_loc = $str_loc . ',' . $row1['loc_name'];
                        }
                        $num_loc = (intval($row1['loc_price']) + $num_loc);
                    }
                    echo $str_loc;
                    ?>                
                </div>
                <label class="col-md-1"> รวมราคา</label>
                <div class="col-md-2 alert alert-success">
                    <input class="form-control" value="<?= $num_loc ?>" readonly="true"/>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <form class="form-horizontal" action="_order.php?method=u" method="post">
                <div class="form-group">
                    <label class="col-md-2 label-rigth">สถานะ อนุมัติ</label>
                    <div class="col-md-2">
                        <input type="hidden" name="id" value="<?= $order_id ?>"/>
                        <select class="form-control" name="approve">
                            <?php $approve = approve() ?>
                            <?php foreach ($approve as $key => $val): ?>
                                <option value="<?= $key ?>"><?= $val ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label class="col-md-2 label-rigth">สถานะ ถ่ายภาพ</label>
                    <div class="col-md-2">
                        <select class="form-control" name="takephoto">
                            <?php $take = takephoto() ?>
                            <?php foreach ($take as $key => $val): ?>
                                <option value="<?= $key ?>"><?= $val ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary" onclick="return confirm('ยืนยัน')">
                            <i class="glyphicon glyphicon-ok-sign"></i>ยืนยัน
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="label-left">Package</div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>รูป</th>
                                <th>ชื่อ</th>
                                <th style="width: 25%">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_orderpackage = "SELECT * FROM order_package od";
                            $sql_orderpackage .= "  JOIN package_set ps ON od.pack_id = ps.pacset_id";
                            $sql_orderpackage .= "  JOIN package p ON p.pac_id = ps.pac_id";
                            $sql_orderpackage .= " WHERE od.cart_id =" . $order_id;
                            $query_orderpackage = mysql_query($sql_orderpackage) or die(mysql_error());
                            $record = mysql_num_rows($query_orderpackage);
                            if ($record > 0):
                                while ($row = mysql_fetch_array($query_orderpackage)) :
                                    ?>
                                    <tr>
                                        <td><img src="<?= PATH_PACKAGE . $row['pac_img'] ?>" class="img-thumbnail img-size150x150"/></td>
                                        <td><?= $row['pacset_name'] ?></td>
                                        <td><?= $row['pacset_price'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">-- ไม่มี สินค้า -- </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>                
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="label-left">Product</div>
            </div>
            <div class="panel-body">                
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>รูป</th>
                                <th>ชื่อ</th>
                                <th style="width: 25%">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_orderproduct = "SELECT * FROM order_product op";
                            $sql_orderproduct .= "  JOIN product p ON op.prod_id = p.prod_id";
                            $sql_orderproduct .= " WHERE op.cart_id =" . $order_id;
                            $query_orderproduct = mysql_query($sql_orderproduct) or die(mysql_error());
                            $record1 = mysql_num_rows($query_orderproduct);
                            if ($record1 > 0):
                                while ($row = mysql_fetch_array($query_orderproduct)) :
                                    ?>
                                    <tr>
                                        <td><img src="<?= PATH_PRODUCT . $row['prod_img'] ?>" class="img-thumbnail img-size150x150"/></td>
                                        <td><?= $row['prod_name'] ?></td>
                                        <td><?= $row['prod_price'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3"> -- ไม่มี สินค้า -- </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">                
            </div>
        </div>
    </div>
    <?php
}

function approve() {
    return array(
        '0' => 'รอ',
        '1' => 'อนุมัติ',
        '2' => 'ผิด พลาด !'
    );
}

function takephoto() {
    return array(
        '0' => 'ยังไม้ได้ถ่าย',
        '1' => 'ถ่ายเสร็จเรียบร้อยแล้ว'
    );
}
?>
