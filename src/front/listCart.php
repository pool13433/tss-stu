<?php
@ob_start();
@session_start();
include '../../config/connect.php';
$date = date('Y-m-d');
?>

<div class="panel panel-warning">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-3">
                <h3 class="panel-title">สินค้าที่เลือก</h3>
            </div>
            <div class="col-md-9" style="text-align: right;">
                <a id="btChooseLocation" href="index.php?page=lo" onclick="return  goLocation()" class="btn btn-primary">
                    <i class="glyphicon glyphicon-arrow-right"></i> ไปเลือกสถานที่ถ่าย
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge alert-info" style="font-size: larger">
                    <?php echo $_SESSION['username'] ?>
                </span>
                ผู้สั่งจอง
            </li>
            <li class="list-group-item">
                <span class="badge alert-info" style="font-size: larger">
                    <?php
                    if (!empty($_SESSION['order_id'])) {
                        echo $_SESSION['order_id'];
                    } else {
                        echo "ตะกร้า ว่าง";
                    }
                    ?>
                </span>
                รหัสของใบสั่งจอง
            </li>
            <li class="list-group-item">
                <span class="badge alert-info">
                    <?php
                    $total = 0;
                    if (!empty($_SESSION['order_id']))
                        $total = sumTotal($_SESSION['order_id']);
                    ?>
                    <input type="text" class="form-control" id="total" value="<?= $total ?>" readonly="true"/>
                </span>
                ราคารวม
            </li>
        </ul>
        <div class="panel panel-info">
            <div class="panel-heading">
                <span>แพ็กเก็ต ทั้งหมด</span>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%">รหัสแพ็คเก็ต</th>
                            <th>ชื่อ</th>
                            <th style="width: 15%">ราคา</th>
                            <th style="width: 10%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM order_package AS o,package_set AS p,order_header AS h";
                        $sql .= " WHERE h.order_id = o.cart_id";
                        $sql .= " AND h.order_success = 0";
                        $sql .= " AND o.pers_id =" . $_SESSION['id'];
                        //$sql .= " AND o.temp_createdate LIKE '" . $date . "'";
                        $sql .= " AND DATE(o.temp_createdate) = DATE(NOW()) ";
                        $sql .= " AND o.pack_id = p.pacset_id";
                        $sql .= " ORDER BY o.temp_id ASC ";
                        //echo '<pre> sql : ' . $sql . '</pre>';
                        $query = mysql_query($sql) or die(mysql_error() . "sql==>>" . $sql);
                        $record = mysql_num_rows($query);
                        if ($record > 0) {
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
                                        <input class="box_price form-control" value="<?php echo $r['pacset_price'] ?>" readonly="true"/>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                                onclick="return deleteItem(<?= $r['temp_id'] ?>, 'item_pac')">
                                            <i class="glyphicon glyphicon-trash"></i> ลบ
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">-- ไม่มีสินค้า --</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <div class="panel panel-info">
            <div class="panel-heading">
                <span>สินค้า ทั้งหมด</span>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%">รหัสสินค้า</th>
                            <th>ชื่อ</th>
                            <th style="width: 15%">ราคา</th>
                            <th style="width: 10%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM order_product AS o,product AS p,order_header AS h";
                        $sql .= " WHERE h.order_id = o.cart_id";
                        $sql .= " AND h.order_success = 0";
                        $sql .= " AND o.pers_id =" . $_SESSION['id'];
                        //$sql .= " AND o.temp_createdate LIKE '" . $date . "'";
                        $sql .= " AND DATE(o.temp_createdate) = DATE(NOW()) "; //DATE(myDate) = DATE(NOW())
                        $sql .= " AND p.prod_id  = o.prod_id ";
                        $sql .= " ORDER BY o.temp_id ASC";
                        //echo '<pre> sql : ' . $sql . '</pre>';
                        $query_orderproduct = mysql_query($sql) or die(mysql_error() . $sql);
                        $record1 = mysql_num_rows($query_orderproduct);
                        if ($record1 > 0) {
                            while ($r = mysql_fetch_array($query_orderproduct)) {
                                ?>
                                <tr>
                                    <td><?= $r['prod_id'] ?></td>
                                    <td>
                                        <?= $r['prod_name'] ?>
                                    </td>
                                    <td>
                                        <input class="box_price form-control" 
                                               value="<?= $r['prod_price'] ?>" readonly="true"/>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                                onclick="return deleteItem(<?= $r['temp_id'] ?>, 'item_pro')">
                                            <i class="glyphicon glyphicon-trash"></i> ลบ
                                        </button>
                                    </td>
                                </tr> 
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4"> -- ไม่มีสินค้า -- </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <div style="text-align:right; ">            
        </div>
    </div>
</div>
<script type="text/javascript">
                    function deleteItem(id, type) {
                        if (confirm('ยืนยันการลบ item รหัส: [ ' + id + ' ] ใช่หรือไม่')) {
                            $.ajax({
                                url: '_cart.php?method=d',
                                type: "POST",
                                data: {
                                    id: id,
                                    typeItem: type,
                                },
                                success: function(data) {
                                    // alert(data);
                                    if (data) {
                                        window.location.reload();
                                    } else {
                                        alert('delete item fail');
                                    }
                                }
                            });
                        }
                        return false;
                    }
                    function goLocation() {
                        var total = parseInt($('#total').val());
                        if (total == 0) {
                            alert('กรุณาเลือก สิน ค้า และบริการก่อน ');
                            return false;
                        }
                    }
</script>

<?php

function sumTotal($id) {
    $num_pac = 0;
    $num_pro = 0;
    $sql_pac = "SELECT sum(`pacset_price`) as sumorder_package FROM order_package op";
    $sql_pac .= " JOIN package_set pks ON pks.pacset_id = op.pack_id ";
    $sql_pac .= " WHERE op.cart_id = " . $id;
    //echo "<pre> sql: " . $sql_pac . "</pre>";
    $query_pac = mysql_query($sql_pac) or die(mysql_error());
    $r_pac = mysql_fetch_assoc($query_pac);

    $num_pac = $r_pac['sumorder_package'];

    //var_dump($num_pac);

    $sql_pro = "SELECT sum(`prod_price`) as sumorder_product FROM order_product op";
    $sql_pro .= " JOIN product pd ON op.prod_id = pd.prod_id";
    $sql_pro .= " WHERE op.cart_id = " . $id;

    //echo "<pre> sql: " . $sql_pro . "</pre>";
    $query_pro = mysql_query($sql_pro) or die(mysql_error());
    $r_pro = mysql_fetch_assoc($query_pro);

    $num_pro = $r_pro['sumorder_product'];

    //var_dump($num_pro);
//echo "<pre> sum:" . intval($num_pac) + intval($num_pro) . "</pre>";
    //unset($_SESSION['total_price']);
    $_SESSION['total_price'] = intval($num_pac) + intval($num_pro);
    //echo '<pre> total_price : ' . $_SESSION['total_price'] . '</pre>';
    return number_format(intval($num_pac) + intval($num_pro), 2, '.', ',');
}
?>