<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการธนาคาร</label>
            <div class="col-md-3">
                <a href="index.php?page=f-b" class="btn btn-primary">เพิ่มข้อมูล</a>
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
                    <th>คำอธิบาย</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_bank = "SELECT * FROM bank";
                $query_bank = mysql_query($sql_bank) or die(mysql_error());
                while ($r = mysql_fetch_array($query_bank)) {
                    ?>
                    <tr>
                        <td><?php echo $r['bank_id']; ?></td>
                        <td><?php echo $r['bank_name']; ?></td>
                        <td><?php echo $r['bank_detail']; ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-b&id=<?php echo $r['bank_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $r['bank_id']; ?>,'_bank.php?method=d')">
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



