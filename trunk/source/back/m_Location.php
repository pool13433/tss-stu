<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการสถานที่</label>
            <div class="col-md-3">
                <a href="index.php?page=f-l" class="btn btn-primary">เพิ่มข้อมูล</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped tablePagination" 
               cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_loca = "SELECT * FROM location";
                $query_location = mysql_query($sql_loca) or die(mysql_error());
                while ($r = mysql_fetch_array($query_location)) {
                    ?>
                    <tr>
                        <td><?php echo $r['loc_id'] ?></td>
                        <td><?php echo $r['loc_name'] ?></td>
                        <td><?php echo $r['loc_price'] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-l&id=<?php echo $r['loc_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return delLoca(<?= $r['loc_id']; ?>)">
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
                                    var oTable = tableGridPagination(5);
                                    oTable.fnSort([[0, 'asc']]); //, [1, 'desc']
                                });
                                function delLoca(id) {
                                    if (confirm('ยืนยันการลบ รหัส: ' + id + " ใช่หรือไม่")) {
                                        $.ajax({
                                            url: "_location.php?method=d",
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
