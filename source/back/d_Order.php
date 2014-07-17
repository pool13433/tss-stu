<?php
include '../../config/Database.php';
$db = new Database();
$db->select('order_header', '*', 'order_id =' . $_POST['id']);
$r = $db->getResults();
?>
<script type="text/javascript">
    $(function() {
        $('#btSave').click(function() {
            var id = $(this).attr('name');
            var statusPay = $('select[name=status_pay]').val();
            var statusTake = $('select[name=status_take]').val();
            //alert('id====>>>>'+id+'=====pay====>>>>'+statusPay+"====take====>>"+statusTake);
            sendAjax(parseInt(id), parseInt(statusPay), parseInt(statusTake));
        });
    });
    function sendAjax(id, pay, take) {
        $.ajax({
            url: "_order.php",
            type: "POST",
            data: {
                id: id,
                pay: pay,
                take: take,
            },
            success: function(data, textStatus, jqXHR)
            {
                 //alert(data);

                if (data) {
                    $('.dialog_success').dialog({
                        height: 140,
                        modal: true,
                        position: ['center', 100],
                        buttons: {
                            "OK": function() {
                                $(this).dialog("close");
                                window.location.reload();
                            }
                        }
                    });
                } else {
                    alert("Error");
                }
                //window.location = "index.php?page=b";
            },
            error: function(jqXHR, textStatus, errorThrown)
            {

            }
        });
    }
</script>
<div class="box_header">
    <span>ใบจองหมายเลข :: <?php echo $r['order_id']; ?></span>
</div>
<div class="box_body">
    <div class="row">
        <div class="col-md-3">
            <span>รหัสใบจอง</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['order_id']; ?>
        </div>
        <div class="col-md-3">
            <span>ชื่อผู้จอง</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['pers_id']; ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <span>วันที่นัดถ่ายภาพ</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['order_date']; ?>
        </div>
        <div class="col-md-3">
            <span>เวลานัดถ่ายภาพ</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['order_time']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <span>จำนวนชาย</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['order_number_fermale']; ?>
        </div>
        <div class="col-md-3">
            <span>จำนวนหญิง</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['order_number_male']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <span>ยอดค่าใช้จ่าย</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['order_totalprice']; ?>
        </div>
        <div class="col-md-3">
            <span>ยอดเงินมัดจำ</span>
        </div>
        <div class="col-md-3">
            <?php echo $r['order_deposit']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <span>สถานะการจ่ายเงิน</span>
        </div>
        <div class="col-md-3">
            <?php
            switch ($r['order_status']) {
                case 0:
                    echo "<img src=\"../../images/icon/Information-icon.png\"/>_wait";
                    break;
                case 1:
                    echo "<img src=\"../../images/icon/Success-icon.png\"/>_pay";
                    break;
                case 2:
                    echo "<img src=\"../../images/icon/Error-icon.png\"/>_fail";
                    break;
                default:
                    break;
            }
            ?>
        </div>
        <div class="col-md-3">
            <span>สถานะการถ่าย</span>
        </div>
        <div class="col-md-3">
            <?php
            switch ($r['order_approve_status']) {
                case 0:
                    echo "<img src=\"../../images/icon/Information-icon.png\"/>_wait";
                    break;
                case 1:
                    echo "<img src=\"../../images/icon/Success-icon.png\"/>_success";
                    break;
                case 2:
                    echo "<img src=\"../../images/icon/Error-icon.png\"/>_fail";
                    break;
                default:
                    echo "<img src=\"../../images/icon/Error-icon.png\"/>_error";
                    break;
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <span>วันที่ เวลา สั่งจอง</span>
        </div>
        <div class="col-md-9">
            <?php echo $r['order_createdate']; ?>
        </div>
    </div>
</div>
<div class="box_header">
    <span>จัดการ</span>
</div>
<div class="box_body">
    <div class="row">
        <label class="col-md-3">สถานะการจ่ายเงิน</label>
        <select name="status_pay" class="col-md-9">
            <option value="">select</option>
            <option value="0">wait</option>
            <option value="1">pay</option>
            <option value="2">fail</option>
        </select>
    </div>
    <div class="row">
        <label class="col-md-3">สถานะการถ่ายภาพ</label>
        <select name="status_take" class="col-md-9">
            <option value="">select</option>
            <option value="0">wait</option>
            <option value="1">success</option>
            <option value="2">fail</option>
        </select>
    </div>
    <div class="row">
        <div style="text-align: center"><button class="btn-success" id="btSave" name=<?php echo $r['order_id']; ?>>บันทึก</button></div>
    </div>
</div>
<div class="dialog_success" title="จัดการเปลี่ยนสถานะสำเร็จ" style="visibility: hidden">
    <p>จัดการเปลี่ยนสถานะสำเร็จ</p>
</div>