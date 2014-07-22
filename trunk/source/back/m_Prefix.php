<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการคำนำหน้าชื่อ</label>
            <div class="col-md-3">
                <a href="index.php?page=f-pre" class="btn btn-primary">เพิ่มข้อมูล</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination" 
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
                $sql_loca = "SELECT * FROM prefix";
                $query_location = mysql_query($sql_loca) or die(mysql_error());
                while ($r = mysql_fetch_array($query_location)) {
                    ?>
                    <tr>
                        <td><?php echo $r['pref_id'] ?></td>
                        <td><?php echo $r['pref_name'] ?></td>
                        <td><?php echo $r['pref_descrition'] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-pre&id=<?php echo $r['pref_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $r['pref_id']; ?>, '_prefix.php?method=d')">
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
