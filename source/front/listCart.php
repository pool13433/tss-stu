<?php
@ob_start();
@session_start();
include '../../config/Database.php';
$db = new Database();
$date = date('Y-m-d');
?>
<script type="text/javascript">
    $(function() {
        var total = 0;
        $('INPUT.box_price').each(function() {
            var price = $(this).val();
            total = total + parseFloat(price);
        });
        $('#total').val(total);
        $("button[name=delpro]").click(function() {
            $('.dialog_con').dialog({
                height: 140,
                modal: true,
                position: ['center', 100],
                buttons: {
                    "ลบ": function() {
                        $(this).dialog("close");
                        var typeItem = 'item_pro';
                        var url = "_cart.php?method=d";
                        var id = $("button[name=delpro]").attr("id");
                        sendAjax(url, id, typeItem);
                    },
                    "ยกเลิก": function() {
                        $(this).dialog("close");
                    }
                }
            });
        });

        $("button[name=delpac]").click(function() {
            $('.dialog_con').dialog({
                height: 140,
                modal: true,
                position: ['center', 100],
                buttons: {
                    "ลบ": function() {
                        $(this).dialog("close");
                        var typeItem = 'item_pac';
                        var url = "_cart.php?method=d";
                        var id = $("button[name=delpac]").attr("id");
                        sendAjax(url, id, typeItem);
                    },
                    "ยกเลิก": function() {
                        $(this).dialog("close");
                    }
                }
            });
        });
        $('#btChooseLocation').click(function() {
            // ตรวตชจสอบ การ เลือกสินค้า ก่อนการไปเลือกสถานที่
            if ($('#orderId').val() != "" && $('#total').val() !=0) {
                var total = $('#total').val();
                var url = 'd_location.php';

                showUrlInDialog(url, total);
            } else {
                $('#dialog_fail').dialog({
                    height: 200,
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
    function sendAjax(url, id, type) {

        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
                typeItem: type,
            },
            success: function(data, textStatus, jqXHR)
            {
                // alert(data);
                window.location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {

            }
        });
    }
    function showUrlInDialog(url, total) {
        var tag = $("<div></div>");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                total: total,
            },
            success: function(data) {
                tag.html(data).dialog({
                    modal: true,
                    width: 900,
                    height: 600,
                    position: ['center', 10],
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
</script>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">สินค้าที่เลือก</h3>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge"><?php echo $_SESSION['id'] ?></span>
                ผู้สั่งจอง
            </li>
            <li class="list-group-item">
                <span class="badge"><input type="text" id="orderId" value="<?php echo $_SESSION['order_id'] ?>" readonly="true"/></span>
                รหัสของใบสั่งจอง
            </li>
            <li class="list-group-item">
                <span class="badge"><input type="text" id="total" readonly="true"/></span>
                ราคารวม
            </li>
        </ul>
        <div class="box_header">
            <span>แพ็กเก็ต ทั้งหมด</span>
        </div>
        <div class="box_body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>รหัสแพ็คเก็ต</th>
                        <th>ชื่อ</th>
                        <th>ราคา</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM order_package AS o,package_set AS p,order_header AS h";
                    $sql .= " WHERE h.order_id = o.cart_id";
                    $sql .= " AND h.order_success = 'F'";
                    $sql .= " AND o.pers_id =" . $_SESSION['id'];
                    $sql .= " AND o.temp_createdate LIKE '" . $date . "'";
                    $sql .= " AND o.pack_id = p.pacset_id";
                    $sql .= " ORDER BY o.temp_id ASC ";
                    $query = mysql_query($sql) or die(mysql_error() . "sql==>>" . $sql);
                    while ($r = mysql_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo$r['pack_id'] ?></td>
                            <td>
                                <?php
                                echo $r['pacset_name'];
                                ?>
                            </td>
                            <td>
                                <input class="box_price" value="<?php echo $r['pacset_price'] ?>" readonly="true"/>
                            </td>
                            <td>
                                <button class="btn-warning" name="delpac" id="<?php echo $r['temp_id'] ?>">ลบ</button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr/>
        <div class="box_header">
            <span>สินค้า ทั้งหมด</span>
        </div>
        <div class="box_body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อ</th>
                        <th>ราคา</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM order_product AS o,product AS p,order_header AS h";
                    $sql .= " WHERE h.order_id = o.cart_id";
                    $sql .= " AND h.order_success = 'F'";
                    $sql .= " AND o.pers_id =" . $_SESSION['id'];
                    $sql .= " AND o.temp_createdate LIKE '" . $date . "'";
                    $sql .= " AND p.prod_id  = o.prod_id ";
                    $sql .= " ORDER BY o.temp_id ASC";
                    $query = mysql_query($sql) or die(mysql_error() . $sql);
                    while ($r = mysql_fetch_array($query)) {
                        ?>
                        <tr>

                            <td><?php echo$r['prod_id'] ?></td>
                            <td>
                                <?php
                                echo $r['prod_name'];
                                ?>
                            </td>
                            <td>
                                <input class="box_price" value="<?php echo $r['prod_price'] ?>" readonly="true"/>
                            </td>
                            <td>
                                <button class="btn-danger" name="delpro" id="<?php echo $r['temp_id'] ?>">ลบ</button>
                            </td>
                        </tr> 
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr/>
        <div style="text-align:center; ">
            <button id="btChooseLocation" class="btn-primary">ไปเลือกสถานที่ถ่าย</button>
        </div>
    </div>
</div>
<div class="dialog_con" title="ยืนยันการลบ"></div>
<div class="dialog_suc" title="ลบสำเร็จ"></div>
<div id="dialog_fail" title="เลือกสินค้าก่อน" style="display: none;">
    <p>กรุณาเลือกสินค้าก่อน</p>
    <p>ถึงจะเลือก สถานที่ถ่ายทำได้</p>
</div>
