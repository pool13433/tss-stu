<?php
include '../../config/connect.php';

// ดึงรายการ สั่ง จอง ทั้งหมด ยกเว้น อันที่ ยกเลิก table order_header order_success != 2
$sql = "SELECT * FROM order_header";
$sql .= " WHERE pers_id = " . $_SESSION['id'];
$sql .= " AND order_success NOT IN  (0,2) ";  // != 2
$sql .= " ORDER BY order_id ASC";
$query = mysql_query($sql) or die(mysql_error() . "sql ==>>" . $sql)
?>
<div class="panel panel-warning">
    <div class="panel-heading">
        <span>ใบรายการจองทั้งหมด</span>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination">
            <thead>
                <tr>
                    <th style="width: 10%">รหัส</th>
                    <th>วันที่นัดหมาย</th>
                    <th>เวลาที่นัดหมาย</th>
                    <th>ยอดราคาสุทธิ</th>
                    <th>เงินมัดจำ</th>
                    <th>สถานะการจ่าย</th>
                    <th>สถานะการถ่ายภาพ</th>
                    <th>ชำระเงิน</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($r = mysql_fetch_array($query)) {
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?page=od-d&id=<?php echo $r['order_id']; ?>" class="btn btn-info">
                                <i class="glyphicon glyphicon-zoom-in"></i> <?php echo $r['order_id'] ?>
                            </a>
                        </td>
                        <td><?php echo $r['order_date'] ?></td>
                        <td><?php echo $r['order_time'] ?></td>
                        <td><?php echo $r['order_totalprice'] ?></td>
                        <td><?php echo $r['order_deposit'] ?></td>
                        <td>
                            <?php
                            switch ($r['order_status']) {
                                case 0:
                                    echo "<i class='glyphicon glyphicon-info-sign'></i>_wait";
                                    break;
                                case 1:
                                    echo "<i class='glyphicon glyphicon-ok-sign'></i>_success";
                                    break;
                                case 2:
                                    echo "<i class='glyphicon glyphicon-remove-sign'></i>_fail";
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
                                    echo "<i class='glyphicon glyphicon-info-sign'></i>_wait";
                                    break;
                                case 1:
                                    echo "<i class='glyphicon glyphicon-ok-sign'></i>_success";
                                    break;
                                case 2:
                                    echo "<i class='glyphicon glyphicon-remove-sign'></i>_fail";
                                    break;
                                default:
                                    echo "<i class='glyphicon glyphicon-remove-sign'></i>_error";
                                    break;
                            }
                            ?>
                        </td>
                        <td>

                            <?php
                            if ($r['order_status'] == 0):
                                ?>
                                <a href = "index.php?page=pm&id=<?= $r['order_id'] ?>" 
                                   class = "btn btn-info" id = "<?php echo $r['order_id']; ?>">
                                    <i class="glyphicon glyphicon-usd"></i>ชำระเงิน
                                </a>
                                <?php
                            else:
                                ?>
                                <button class="btn btn-success" type="button">
                                    <i class="glyphicon glyphicon-ok-sign"></i>  ชำระเงินแล้ว
                                </button>
                            <?php
                            endif;
                            ?>
                        </td>
                        <td>
                            <?php if ($r['order_status'] != 1): ?>
                                <button type="button" class="btn btn-danger"
                                        onclick="return cancleOrder(<?= $r['order_id'] ?>)"
                                        id="<?php echo $r['order_id']; ?>">
                                    <i class="glyphicon glyphicon-trash"></i> ยกเลิกการจอง
                                </button>
                            <?php else: ?>
                                <!-- จ่ายเงินไปแล้ว ยกเลิกไม่ได้ แล้ว-->
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
                                            $(document).ready(function() {
                                                var oTable = tableGridPagination(10);
                                                oTable.fnSort([[0, 'asc']]); //, [1, 'desc']
                                            });
                                            function cancleOrder(id) {
                                                if (confirm('ยืนยันการลบ ใบสั่งจอง เลขที่ : [ ' + id + ' ] ใช่หรือไม่ ?')) {
                                                    $.ajax({
                                                        url: '_cart.php?method=c', // cancle order
                                                        data: {id: id},
                                                        type: 'POST',
                                                        success: function(data) {
                                                            //alert(data);
                                                            if (data) {
                                                                window.location.reload();
                                                            } else {
                                                                alert('เกิดข้อผิดพลาด ในการ ยกเลิก ใบสั่งจอง ' + data);
                                                            }
                                                        }
                                                    });
                                                }
                                                return false;
                                            }
</script>