<?php
include '../../config/connect.php';

$sql_orderpayment = "SELECT * FROM order_header oh";
$sql_orderpayment .= " LEFT JOIN person p ON oh.pers_id = p.pers_id";
$sql_orderpayment .= " WHERE oh.order_id = " . $_GET['id'];
echo "<pre> sql : " . $sql_orderpayment . "</pre>";
$query_orderhead = mysql_query($sql_orderpayment) or die(mysql_error());
$result = mysql_fetch_assoc($query_orderhead);
?>
<form class="form-horizontal" name="" action="" method="" enctype="multipart/form-data">
    <div class="panel panel-warning">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 label-rigth">รหัส ตะกร้า</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="order_id" value="<?= $result['order_id'] ?>" disabled="true"/>
                </div>
                <label class="col-sm-2 label-rigth">รหัส ผู้สั่งซื้อ</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="pers_id" value="<?= $result['pers_fname'] ?>" disabled="true"/>
                </div>
            </div>

            <div class="form-group">          
                <label class="col-sm-2 label-rigth">มัดจำที่จ่ายไปแล้ว</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="deposit" value="<?= $result['order_deposit'] ?>"/>
                </div>
                <label class="col-sm-2 label-rigth">ยอดชำระ สุทธิ</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="total_price" value="<?= $result['order_totalprice'] ?>"/>
                </div>
            </div>
            <div class="form-group">                 
                <label class="col-sm-2 label-rigth">หญิง</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="female" value="<?= $result['order_number_fermale'] ?>"/>
                </div>
                <label class="col-sm-2 label-rigth"></label>
                <label class="col-sm-2 label-rigth">ชาย</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="male" value="<?= $result['order_number_male'] ?>"/>
                </div>
            </div>
            <div class="form-group">                 
                <label class="col-sm-2 label-rigth">วัน เวลา การ ชำระเงิน</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="datetime" required="true"/>
                </div>
                <label class="col-sm-2 label-rigth">ชาย</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" onchange="CheckFile(this)" name="total_price" required="true"/>
                </div>
            </div>
        </div>
        <div class="panel-footer"></div>
    </div>
</form>
