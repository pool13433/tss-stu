<?php
include '../../config/Database.php';
$db = new Database();
$db->select('bank', '*');
$r = $db->getResults();


$db->select('order_header', '*', 'order_id = '.$_POST['id']);
$o = $db->getResults();
?>
<script type="text/javascript">
    $(function() {
        $('#formpayment').submit(function() {
            if (confirm('ยืนยันการ จ่ายเงิน')) {
                if ($('#deposit').val() == "") {
                    alert('กรุณากรอกจำนวนเงิน');
                    return false;
                } else if ($('#file').val() == "") {
                    alert('กรุณาเลือกไฟล์ สลิป');
                    return false;
                } else if ($('#paymentdate').val() == "") {
                    alert('กรุณาเลือกวันที่นัดถ่าย');
                    return false;
                } else if ($('#paymenttime').val() == "") {
                    alert('กรุณากรอกเวลาที่นัดจ่าย');
                    return false;
                } else {
                    return true;
                }
            }
            else {
                return false;
            }
        });
        datePicker();
        $('#deposit').change(function (){
                var deposit = $(this).val();
                var examdepopsit = $('#examdeposit').val(); 
                if(parseInt(deposit) < parseInt(examdepopsit)){
                    $('#dialog_fail').dialog({
                        height: 170,
                        modal: true,
                        position: ['center', 100],
                        buttons: {
                            "OK": function() {
                                $(this).dialog("close");
                            }
                        }
                    });
                }
        });
    });

    function datePicker() {
        $('#paymentdate').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
        });
    }
</script>
<div class="box_header">
    <span>ชำระเงิน มัดจำ ร้านถ่ายภาพ ออนไลน์</span>
</div>
<div class="box_body">  
    <form class="form-horizontal" id="formpayment" action="_payment.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">รหัสใบจอง</label><div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="order" value="<?php echo $_POST['id']; ?>" id="order" readonly="true">
            </div>
            <label class="col-sm-2 control-label">รหัสคนจอง</label><div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="u_id" value="<?php echo $_SESSION['id']; ?>" id="u_id" readonly="true">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">รหัสใบจอง</label><div class="col-sm-1" style="color: red;">*</div>
            <div class="col-sm-3">
                <select name="bank" id="bank" class="form-control">
                    <?php
                    foreach ($r as $r) {
                        echo "<option value='" . $r['bank_id'] . "'>" . $r['bank_name'] . "</option>";
                    }
                    ?>

                </select>
            </div>
            <label class="col-sm-2 control-label">มัดจำต้องจ่าย</label><div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="examdeposit" value="<?php echo $o['order_deposit'] ?>" id="examdeposit" readonly="true">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">จ่ายมัดจำ</label><div class="col-sm-1" style="color: red;">*</div>
            <div class="col-sm-3">
                <input type="text" pattern="[0-9]*" class="form-control" name="deposit"  id="deposit" required="true">
            </div>
            <label class="col-sm-2 control-label">สลิปจ่ายเงิน</label><div class="col-sm-1" style="color: red;">*</div>
            <div class="col-sm-3">
                <input type="file" class="form-control" name="file"  id="file" required="true">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">วันที่จ่ายเงิน</label><span class="col-sm-1" style="color: red;">*</span>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="paymentdate"  id="paymentdate" required="true">
            </div>
            <label class="col-sm-2 control-label">เวลาที่จ่ายเงิน</label><span class="col-sm-1" style="color: red;">*</span>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="paymenttime"  id="paymenttime" required="true">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">คอมเม้น</label><span class="col-sm-1" style="color: red;"></span>
            <div class="col-sm-9">
                <textarea class="" cols="50" rows="4" name="comment" id="comment" required="true">

                </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <input type="submit" class="btn-success" value="จ่าย"/>
            </div>
        </div>
    </form>
</div>
<div id="dialog_success" title="จัดการเปลี่ยนสถานะสำเร็จ" style="visibility: hidden">
    <p>จัดการเปลี่ยนสถานะสำเร็จ</p>
</div>
<div id="dialog_fail" title="กรอกเงินไม่ถูกต้อง" style="visibility: hidden">
    <p>ท่านชำระเงิน ไม่ถูกต้อง</p>
    <p>กรอกเงินน้อยกว่า ที่ตกลงกันไว้</p>
</div>