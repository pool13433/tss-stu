<?php
include '../../config/connect.php';
?>
<div class="panel panel-warning">
    <div class="panel-heading">
        <span>รายการ package</span>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination">
            <thead>
                <tr>                    
                    <th class="label-center" style="width: 20%">รูป package</th>
                    <th class="label-center">ชื่อ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_package = "SELECT * FROM package ORDER BY pac_id";
                $query_package = mysql_query($sql_package) or die(mysql_error());
                while ($r = mysql_fetch_array($query_package)) {
                    ?>
                    <tr>
                        <td class="label-center">
                            <img src="<?= PATH_PACKAGE . $r['pac_img'] ?>" class="img-thumbnail img-size150x150"/>
                        </td>
                        <td>
                            <div class="jumbotron">
                                <h1><?= $r['pac_name'] ?></h1>
                                <p></p>
                                <p> <a class="btn btn-primary btn-lg" href="index.php?page=o-pkd&id=<?= $r['pac_id'] ?>">
                                        ดูรายละเอียด
                                    </a></p>
                            </div>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2"></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = tableGridPagination(5);
        oTable.fnSort([[0, 'asc']]); //, [1, 'desc']
    });
</script>
