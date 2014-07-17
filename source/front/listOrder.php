<?php
include '../../config/connect.php';

$sql = "SELECT * FROM order_header";
$sql .= " WHERE pers_id = " . $_SESSION['id'];
$sql .= " ORDER BY order_id ASC";
$query = mysql_query($sql) or die(mysql_error() . "sql ==>>" . $sql)
?>
<script type="text/javascript">
    $(function() {
        $('.linkDialog').click(function() {
            var id = $(this).attr('id');
            var url = 'formPayment.php';

            showUrlInDialog(url, id);
        });
        $('.btn-danger').click(function() {
            
            var id = $(this).attr('id');
            //alert('id==>>>'+id);
            $('#dialog').dialog({
                height: 170,
                modal: true,
                position: ['center', 40],
                buttons: {
                    "ลบ": function() {
                        //$(this).dialog("close");
                        sendAjax(id);
                    },
                    "ยกเลิก": function() {
                        $(this).dialog("close");
                    }
                }
            });
        });
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
                    width: 850,
                    height: 550,
                    position: ['center', 100],
                    buttons: {
                        "ปิดหน้าต่าง": function() {
                            $(this).dialog("close");
                            window.location.reload();
                        },
                    }
                }).dialog('open');
            }
        });
    }
    function sendAjax(id) {
                $.ajax({
                    url: "_order.php",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data, textStatus, jqXHR)
                    {
                       // alert(data)
                        if(data){
                           window.location.reload();
                        }else{
                            alert('Delete fail');
                        }
                        
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {

                    }
                });
            }
</script>
<div class="box_header">
    <span>ใบรายการจองทั้งหมด</span>
</div>
<div class="box_body">
    <div style="overflow:scroll;height: 600px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>วันที่นัดหมาย</th>
                    <th>เวลาที่นัดหมาย</th>
                    <th>ชาย</th>
                    <th>หญิง</th>
                    <th>ยอดราคาสุทธิ</th>
                    <th>เงินมัดจำ</th>
                    <th>สถานะการจ่าย</th>
                    <th>สถานะการถ่ายภาพ</th>
                    <th>วันที่สั่งจอง</th>
                    <th>พิมพ์</th>
                    <th>ชำระเงิน</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
<?php
while ($r = mysql_fetch_array($query)) {
    ?>
                    <tr>
                        <td><a href="r_order.php?id=<?php echo $r['order_id'];?>" target="_blank"><?php echo $r['order_id'] ?></a></td>
                        <td><?php echo $r['order_date'] ?></td>
                        <td><?php echo $r['order_time'] ?></td>
                        <td><?php echo $r['order_number_fermale'] ?></td>
                        <td><?php echo $r['order_number_male'] ?></td>
                        <td><?php echo $r['order_totalprice'] ?></td>
                        <td><?php echo $r['order_deposit'] ?></td>
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
                        <td><?php echo $r['order_createdate'] ?></td>
                        <td>
                            <?php if ($r['order_status']==1) {
                                        echo "<a href='r_order.php?id=".$r['order_id']."' target=\"_blank\">
                                            <img src=\"../../images/icon/Print-icon.png\"/>_พิมพ์
                                            </a>";
                                  } 
                            ?>
                        </td>
                        <td>

                        <?php
                        switch ($r['order_status']) {
                            case 0:
                                ?>
                                    <a href="#" class="linkDialog" id="<?php echo $r['order_id']; ?>">
                                        <input  type="button"   class="btn-info" value="ชำระเงิน"/>
                                    </a>
                                <?php
                                break;
                            default:
                                break;
                        }
                        ?>
                        </td>
                        <td>
                            <button type="button" class="btn-danger" id="<?php echo $r['order_id']; ?>">ลบ</button>
                        </td>
                    </tr>
    <?php
}
?>
            </tbody>
        </table>
    </div>
</div>
<div id="dialog" title="ยืนยันการลบ" style="display: none;">
    <p>ยืนยันการยกเลิกการสั่งจอง การถ่ายภาพ</p>
</div>