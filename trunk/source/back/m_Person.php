
<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการผู้ใช้งาน</label>
            <div class="col-md-3">
                <a href="index.php?page=f-m" class="btn btn-primary">เพิ่มข้อมูล</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination" cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ที่อยู่</th>
                    <th>โทร</th>
                    <th>อีเมลล์</th>
                    <th>สถานะ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_person = "SELECT * FROM person ORDER BY pers_id";
                $query_person = mysql_query($sql_person) or die(mysql_error());
                while ($row = mysql_fetch_array($query_person)) {
                    ?>
                    <tr>
                        <td><?= $row['pers_id'] ?></td>
                        <td><?= $row['pers_fname'] ?></td>
                        <td><?= $row['pers_lname'] ?></td>
                        <td><?= $row['pers_alley'] . $row['pers_address'] . $row['prov_id'] ?></td>
                        <td><?= $row['pers_phone'] ?></td>
                        <td><?= $row['pers_email'] ?></td>
                        <td><?php
                            if ($row['persta_id'] == 1) {
                                echo 'admin';
                            } else {
                                echo 'customer';
                            }
                            ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-m&id=<?= $row['pers_id'] ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $row['pers_id'] ?>,'_person.php?method=d')">
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