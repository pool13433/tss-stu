<?php
include '../../config/connect.php';
include '../../config/General.php';
?>
<script type="text/javascript">
    $(function() {
        $('.linkDialog').click(function() {
            var id = $(this).attr('id');
            var url = 'd_Order.php';

            showUrlInDialog(url, id);
        });
        datePicker();
        search();
    });
    function showUrlInDialog(url, id) {
        var tag = $("<div></div>");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                tag.html(data).dialog({
                    modal: true,
                    width: 700,
                    height: 500,
                    position: ['center', 100],
                    buttons: {
                        "ปิดหน้าต่าง": function() {
                            $(this).dialog("close");
                        },
                    }
                }).dialog('open');
            }
        });
    }
    function datePicker() {
        $("#from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            onClose: function(selectedDate) {
                $("#to").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            onClose: function(selectedDate) {
                $("#from").datepicker("option", "maxDate", selectedDate);
            }
        });
    }
    function search() {

    }
</script>
<div class="box_header">
    <span>ใบสั่งจองการถ่ายภาพ</span>
</div>
<div class="box_body">
    <div class="row">
        <form action="#" method="post" accept-charset="utf-8">
            <div class="col-sm-5">
                <label for="from">From</label>
                <input type="text" id="from" name="from">
                <label for="to">to</label>
                <input type="text" id="to" name="to">
            </div>
            <div class="col-sm-1">
                <button class="btn-warning" type="submit" id="bt-search">ค้นหา</button>
            </div>
        </form>
        <div class="col-sm-4" style="text-align: right;">
            <button id="bt-print"  class="btn-primary">ออกรายงาน</button>
        </div>
    </div>
    <div style="overflow:scroll;height: 600px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อลูกค้า</th>
                    <th>วันที่นัดถ่าย</th>
                    <th>เวลาที่นัดถ่าย</th>
                    <th>จำนวนชาย</th>
                    <th>จำนวนหญิง</th>
                    <th>ราคารวม</th>
                    <th>มัดจำ</th>
                    <th>ชำระเงิน</th>
                    <th>ดำเนินการ</th>
                    <th>วันที่จอง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fromDate = $_POST['from'];
                $todate = $_POST['to'];

                //echo "form==>>" . $fromDate . "</br>to==>>" . $todate;
                $sql = "SELECT * FROM order_header";
                $sql .= " WHERE 1=1";

                if ($fromDate != "" && $todate != "") {

                    $sql .= " AND order_date BETWEEN ";
                    $sql .= "'" . $fromDate . "' AND '" . $todate . "'";
                }
                $sql .= " ORDER BY order_id ASC";


                $query = mysql_query($sql) or die(mysql_error() . "sql==>>" . $sql);

                while ($r = mysql_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $r['order_id']; ?></td>
                        <td><?php echo $r['pers_id']; ?></td>
                        <td><?php echo $r['order_date']; ?></td>
                        <td><?php echo $r['order_time']; ?></td>
                        <td><?php echo $r['order_number_fermale']; ?></td>
                        <td><?php echo $r['order_number_male']; ?></td>
                        <td><?php echo $r['order_totalprice']; ?></td>
                        <td><?php echo $r['order_deposit']; ?></td>
                        <td>
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
                        </td>
                        <td>
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
                        </td>
                        <td><?php echo $r['order_createdate']; ?></td>
                        <td>
                            <a href="#" class="linkDialog" id="<?php echo $r['order_id']; ?>">
                                <input  type="button"   class="btn-info" value="จัดการ"/>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>