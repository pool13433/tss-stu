<?php
include '../../config/connect.php';

$sql_orderpayment = "SELECT * FROM order_header oh";
$sql_orderpayment .= " LEFT JOIN person p ON oh.pers_id = p.pers_id";
$sql_orderpayment .= " WHERE oh.order_id = " . $_GET['id'];
echo "<pre> sql : " . $sql_orderpayment . "</pre>";
$query_orderhead = mysql_query($sql_orderpayment) or die(mysql_error());
$result = mysql_fetch_assoc($query_orderhead);
?>
<ol class="breadcrumb">
    <li><a href="index.php?page=od"><i class="glyphicon glyphicon-arrow-left"></i> รายการ ใบจอง</a></li>
    <li class="active">รายละเอียด</li>
</ol>
<form class="form-horizontal" name="payment-form" action="_payment.php?method=u" method="post" enctype="multipart/form-data">
    <div class="panel panel-warning">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 label-rigth">รหัส ตะกร้า</label>
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="id" value="<?= $result['order_id'] ?>"/>
                    <input type="text" class="form-control" name="order_id" value="<?= $result['order_id'] ?>" readonly="true"/>
                </div>
                <label class="col-sm-2 label-rigth">รหัส ผู้สั่งซื้อ</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="pers_id" value="<?= $result['pers_fname'] ?>" disabled="true"/>
                </div>
            </div>

            <div class="form-group">          
                <label class="col-sm-2 label-rigth">มัดจำที่จ่ายไปแล้ว</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="deposit" value="<?= $result['order_deposit'] ?>" disabled="true"/>
                </div>
                <label class="col-sm-2 label-rigth">ยอดชำระ สุทธิ</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="total_price" value="<?= $result['order_totalprice'] ?>" disabled="true"/>
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
                <label class="col-sm-2 label-rigth">วัน การ ชำระเงิน</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="day" name="date" required="true"/>
                </div>
                <label class="col-sm-2 label-rigth">เวลา การ ชำระเงิน</label>
                <div class="col-sm-3">
                    <input type="time" class="form-control" name="time" required="true"/>
                </div>
            </div>
            <div class="form-group">                 
                <label class="col-sm-2 label-rigth">ธนาคาร</label>
                <div class="col-sm-3">
                    <select class="form-control" name="bank">
                        <?php
                        $sql_bank = "SELECT * FROM bank ";
                        $query_bank = mysql_query($sql_bank) or die(mysql_error());
                        while ($row = mysql_fetch_array($query_bank)) {
                            ?>
                            <option value="<?= $row['bank_id'] ?>"><?= $row['bank_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <label class="col-sm-2 label-rigth">สลิป</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" onchange="CheckFile(this)" name="file" required="true"/>
                </div>
            </div>
            <div class="form-group">                 
                <label class="col-sm-2 label-rigth">หมายเหตุ</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="comment"></textarea>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('ยืนยัน การชำระเงิน')">
                <i class="glyphicon glyphicon-ok-sign"></i> ยืนยันชำระเงิน
            </button>
        </div>
    </div>
</form>
<script type="text/javascript">
                        $(function() {
                            datePicker1Day();
                        });
</script>
