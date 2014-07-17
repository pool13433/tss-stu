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
        <table class="table table-striped tablePagination" cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>รูป</th>
                    <th>โค๊ด</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
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
                            <img src="<?= $row['prod_img'] ?>" class="img-thumbnail">
                        </td>
                        <td><?= $row['prod_code'] ?></td>
                        <td><?= $row['prod_name'] ?></td>
                        <td><?= $row['prod_price'] ?></td>
                        <td>
                            <button class="btn btn-info">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return delProduct(<?= $row['prod_id'] ?>)">
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
                                function delProduct(id) {
                                    if (confirm('ยืนยันการลบ รหัส: ' + id + " ใช่หรือไม่")) {
                                        $.ajax({
                                            url: "_product.php?method=d",
                                            data: id,
                                            success: function(data) {
                                                if (data) {
                                                    window.location.reload();
                                                } else {
                                                    alert('ลบไม่สำเร็จ เกิดข้อผิดพลาด');
                                                }
                                            }
                                        });
                                    }
                                }
</script>
