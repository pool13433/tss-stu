<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการรายละเอียดกลุ่มแพ็คเก็ต</label>
            <div class="col-md-3">
                <a href="index.php?page=f-pksd" class="btn btn-primary">เพิ่มข้อมูล</a>
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
                $sql_packageSetDetail = " SELECT * FROM package_set_detail psd,package_set ps";
                $sql_packageSetDetail .= " WHERE psd.pacset_id = ps.pacset_id";
                $query_packageSetSetail = mysql_query($sql_packageSetDetail) or die(mysql_error());
                while ($r = mysql_fetch_array($query_packageSetSetail)) {
                    ?>
                    <tr>
                        <td><?= $r['setd_id'] ?></td>
                        <td><?= $r['pacset_name']; ?>
                        </td>
                        <td><?= $r['setd_imgsize'] ?></td>
                        <td><?= $r['setd_number'] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-pksd&id=<?php echo $r['setd_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return delPackageSetDeatil(<?= $r['setd_id']; ?>)">
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
                                function delPackageSetDeatil(id) {
                                    if (confirm('ยืนยันการลบ รหัส: ' + id + " ใช่หรือไม่")) {
                                        $.ajax({
                                            url: "_packageSetDetail.php?method=d",
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
