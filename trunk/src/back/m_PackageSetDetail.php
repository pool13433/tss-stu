<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการรายละเอียดกลุ่มแพ็คเก็ต</label>
            <div class="col-md-3">
                <!--                <a href="index.php?page=f-pksd" class="btn btn-primary">เพิ่มข้อมูล</a>-->
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination" 
               cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ กลุ่มแพ็คเก็ต</th>
                    <th>ขนาด</th>
                    <th>จำนวน</th>
                    <!--<th style="width: 10%">แก้ไข</th>-->
                    <th style="width: 10%">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_packageSetDetail = " SELECT * FROM package_set_detail psd";
                $sql_packageSetDetail .= " LEFT JOIN photo_size pz ON pz.size_id = psd.setd_imgsize";
                $sql_packageSetDetail .= " JOIN package_set ps ON psd.pacset_id = ps.pacset_id";
                //$sql_packageSetDetail .= " WHERE psd.pacset_id = ps.pacset_id";
                echo "<pre> sql: " . $sql_packageSetDetail . "</pre>";
                $query_packageSetSetail = mysql_query($sql_packageSetDetail) or die(mysql_error());
                while ($r = mysql_fetch_array($query_packageSetSetail)) {
                    ?>
                    <tr>
                        <td><?= $r['setd_id'] ?></td>
                        <td><?= $r['pacset_name']; ?>
                        </td>
                        <td><?= $r['size_name'] ?></td>
                        <td><?= $r['setd_number'] ?></td>
    <!--                        <td>
                            <a class="btn btn-info" href="index.php?page=f-pksd&id=<?php echo $r['setd_id']; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                        </td>-->
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $r['setd_id']; ?>, '_packageSetDetail.php?method=d')">
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
