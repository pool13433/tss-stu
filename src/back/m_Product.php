<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการสินค้า</label>
            <div class="col-md-3">
                <a href="index.php?page=f-p" class="btn btn-primary">เพิ่มข้อมูล</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination" cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>รูป</th>
                    <th>โค๊ด</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th style="width: 10%">แก้ไข</th>
                    <th style="width: 10%">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_product = "SELECT * FROM product ORDER BY prod_id";
                $query_product = mysql_query($sql_product) or die(mysql_error());
                while ($row = mysql_fetch_array($query_product)) {
                    ?>
                    <tr>
                        <td><?= $row['prod_id'] ?></td>
                        <td>
                            <img src="<?= PATH_PRODUCT . $row['prod_img'] ?>" class="img-thumbnail img-size60x60">
                        </td>
                        <td><?= $row['prod_code'] ?></td>
                        <td><?= $row['prod_name'] ?></td>
                        <td><?= $row['prod_price'] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-p&id=<?= $row['prod_id'] ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $row['prod_id'] ?>, '_product.php?method=d')">
                                <i class="glyphicon glyphicon-trash"></i> ลบ
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer"></div>
</div>
<script type="text/javascript">
                                $(document).ready(function() {
                                    var oTable = tableGridPagination(10);
                                    oTable.fnSort([[0, 'asc']]); //, [1, 'desc']
                                });
</script>
