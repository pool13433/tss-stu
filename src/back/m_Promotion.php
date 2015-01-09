<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการ ขนาด</label>
            <div class="col-md-3">
                <a href="index.php?page=f-promote" class="btn btn-primary">เพิ่มข้อมูล</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination" 
               cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th style="width: 5%">รหัส</th>
                    <th>ชื่อ</th>
                    <th>ไฟล์</th>
                    <th>เริ่ม</th>
                    <th>สิ้นสุด</th>
                    <th style="width: 10%">แก้ไข</th>
                    <th style="width: 10%">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_promote = "SELECT * FROM promotion";
                $query_promote = mysql_query($sql_promote) or die(mysql_error());
                while ($r = mysql_fetch_array($query_promote)) {
                    ?>
                    <tr>
                        <td><?php echo $r['prom_id']; ?></td>
                        <td><?php echo $r['prom_name']; ?></td>
                        <td>
                            <img src="<?= PATH_PROMOTION . $r['prom_file']; ?>" class="img-size125x125 img-thumbnail"/>
                        </td>
                        <td><?php echo $r['prom_startdate']; ?></td>
                        <td><?php echo $r['prom_enddate']; ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-promote&id=<?php echo $r['prom_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $r['prom_id']; ?>, '_promotion.php?method=d')">
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