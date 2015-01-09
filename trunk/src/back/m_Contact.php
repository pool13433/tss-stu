<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการ ติดต่อเรา</label>
            <div class="col-md-3">
                <a href="index.php?page=f-contact" class="btn btn-primary">เพิ่มข้อมูล</a>
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
                    <th>หัวข้อ</th>
                    <th>รายละเียอด</th>
                    <th>วันที่สร้าง</th>
                    <th style="width: 10%">แก้ไข</th>
                    <th style="width: 10%">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql_contact = "SELECT * FROM contact ORDER BY con_createdate ASC"; // มากไปน้อย => DESC , น้อยไปมาก => ASC

                echo '<pre> sql : ' . $sql_contact . '</pre>';
                $query_contact = mysql_query($sql_contact) or die(mysql_error());
                while ($r = mysql_fetch_array($query_contact)) {
                    ?>
                    <tr>
                        <td><?php echo $r['con_id']; ?></td>
                        <td><?php echo $r['pres_fullname']; ?></td>
                        <td><?php echo $r['con_title']; ?></td>
                        <td><?php echo $r['con_detail']; ?></td>
                        <td><?php echo $r['con_createdate']; ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?page=f-contact&id=<?php echo $r['con_id'];?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $r['con_id']; ?>, '_contact.php?method=delete')">
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



