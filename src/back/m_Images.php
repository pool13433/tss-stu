<?php include '../../config/connect.php'; ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <label class="col-md-1">จัดการสถานที่</label>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination" 
               cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ อัลบัม</th>
                    <th> ชื่อ รูปใน อัลบัม</th>
                    <th style="width: 10%">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_album = "SELECT ";
                $sql_album .= " *";
                $sql_album .= "  FROM album_file af";
                $sql_album .= " JOIN album a on af.album_id = a.album_id";
                $sql_album .= " ORDER BY a.album_id";
                //echo '<pre> sql : ' . $sql_album . '</pre>';
                $query_album = mysql_query($sql_album) or die(mysql_error());
                ?>
                <?php while ($row = mysql_fetch_array($query_album)) {
                    ?>
                    <tr>
                        <td><?= $row['file_id'] ?></td>
                        <td><?= $row['album_nameth'] ?></td>
                        <td>
                            <img src="<?= PATH_ALBUMS . $row['album_nameeng'] . '/' . $row['file_name'] ?>"
                                 class="img-thumbnail img-size40x40"/>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="return deleteItem(<?= $row['file_id']; ?>, '_images.php?method=d')">
                                <i class="glyphicon glyphicon-trash"></i> ลบ
                            </button>
                        </td>
                    </tr>
                <?php } ?>
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
