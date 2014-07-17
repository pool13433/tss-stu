<?php
include '../../config/connect.php';
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการกลุ่มแพ็คเก็ต</label>
            <div class="col-md-3">
                <a href="index.php?page=f-pks" class="btn btn-primary">เพิ่มข้อมูล</a>
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
                    <th>กลุ่มแพ็คเก็ต</th>
                    <th>ราคา</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_packageSet = " SELECT * FROM package p, package_set ps";
                $sql_packageSet .= " WHERE p.pac_id = ps.pac_id";
                $query_packageSet = mysql_query($sql_packageSet) or dir(mysql_error());
                while ($r = mysql_fetch_array($query_packageSet)) {
                    ?>
                    <tr>
                        <td><?= $r['pacset_id'] ?></td>
                        <td><?= $r['pacset_name'] ?></td>
                        <td><?= $r['pac_name'];
                    ?>
                        </td>
                        <td><?= $r['pacset_price'] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-pks&id=<?php echo $r['pacset_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return delPackageSet(<?= $r['pacset_id']; ?>)">
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
                                function delPackageSet(id) {
                                    if (confirm('ยืนยันการลบ รหัส: ' + id + " ใช่หรือไม่")) {
                                        $.ajax({
                                            url: "_packageSet.php?method=d",
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
