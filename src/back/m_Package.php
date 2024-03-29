<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการแพ็คเก็ต</label>
            <div class="col-md-3">
                <a href="index.php?page=f-pk" class="btn btn-primary">เพิ่มข้อมูล</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination" 
               cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>รูป</th>
                    <th>ชื่อ</th>
                    <th style="width: 10%">แก้ไข</th>
                    <th style="width: 10%">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_package = "SELECT * FROM package";
                $query_package = mysql_query($sql_package) or die();
                while ($r = mysql_fetch_array($query_package)) {
                    ?>
                    <tr>
                        <td><?php echo $r['pac_id']; ?></td>
                        <td>
                            <img class="img-thumbnail img-size80x80" src="<?= PATH_PACKAGE . $r['pac_img'] ?>"/>
                        </td>
                        <td><?php echo $r['pac_name']; ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-pk&id=<?php echo $r['pac_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $r['pac_id']; ?>, '_package.php?method=d')">
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
</script>



