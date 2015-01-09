<?php
include '../config/connect.php';
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span>Product</span>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th></th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>วันที่สร้าง</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_pro = "SELECT * FROM product";
                $query_product = mysql_query($sql_pro) or die($sql_pro);
                $record = mysql_num_rows($query_product);
                while ($r = mysql_fetch_array($query_product)) {
                    ?>
                    <tr>
                        <td><?php echo$r['prod_id'] ?></td>
                        <td>
                            <img class="img-thumbnail img-size80x80" src="<?= '../images/product/' . $r['prod_img'] ?>"/>
                        </td>
                        <td><?php echo$r['prod_name'] ?></td>
                        <td><?php echo$r['prod_price'] ?></td>
                        <td><?php echo$r['prod_createdate'] ?></td>
                        <td>
                            <button class="btn btn-success"
                                    onclick="return addItemProduct(<?= $r['prod_id']; ?>)">
                                <i class="glyphicon glyphicon-shopping-cart"></i> สั่งจอง</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5"></th>
                    <th class="alert alert-info">สินค้า <span class="badge alert-danger"><?= $record ?></span> ชิ้น</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="panel-footer">

    </div>
</div>
<div class="dialog" title="สั่งจอง" style="visibility: hidden"></div>
<script type="text/javascript">
                                        $(document).ready(function() {
                                            var oTable = tableGridPagination(10);
                                            oTable.fnSort([[0, 'asc']]); //, [1, 'desc']
                                        });
                                        function addItemProduct(id) {
                                            alert('กรุณา login เข้า ระบบ ก่อน ถึงจะสามารถสั่งจองได้');
                                            return false;
                                        }
</script>

