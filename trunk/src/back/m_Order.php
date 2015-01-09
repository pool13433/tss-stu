<?php
include '../../config/connect.php';
?>
<div class="panel panel-info">    
    <div class="panel-heading">        
        <div class="row">
            <div class="col-md-9">
                <form action="#" method="post" accept-charset="utf-8" class="form-horizontal">
                    <div class="form-group">
                        <label for="from" class="col-md-1">ค้นหา</label>
                        <label for="from" class="col-md-1">From</label>
                        <div class="col-md-2">
                            <input type="text" id="from" class="form-control" name="from">    
                        </div>
                        <label for="to" class="col-md-1">to</label>
                        <div class="col-md-2">
                            <input type="text" id="to" class="form-control" name="to">    
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-warning" type="submit" id="bt-search">
                                <i class="glyphicon glyphicon-search"></i> ค้นหา
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 navbar-right" style="text-align: right;">
                <button id="bt-print"  class="btn btn-primary">ออกรายงาน</button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered tablePagination">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อลูกค้า</th>
                    <th>วันที่นัดถ่าย</th>
                    <th>เวลาที่นัดถ่าย</th>
                    <th>จำนวนชาย</th>
                    <th>จำนวนหญิง</th>
                    <th>ราคารวม</th>
                    <th>มัดจำ</th>
                    <th>ชำระเงิน</th>
                    <th>ดำเนินการ</th>
                    <th>วันที่จอง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM order_header";
                $sql .= " WHERE 1=1";
                $sql .= " AND order_status NOT IN (0,2)";
                if (!empty($_POST)) {
                    if ($_POST['from'] != '' && $_POST['to'] != '') {
                        $fromDate = $_POST['from'];
                        $todate = $_POST['to'];

                        $sql .= " AND order_date BETWEEN ";
                        $sql .= "'" . $fromDate . "' AND '" . $todate . "'";
                    }
                }
                $sql .= " ORDER BY order_id ASC";

                echo "<pre>sql: " . $sql . "</pre>";
                $query = mysql_query($sql) or die(mysql_error() . "sql==>>" . $sql);

                while ($r = mysql_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $r['order_id']; ?></td>
                        <td><?php echo $r['pers_id']; ?></td>
                        <td><?php echo $r['order_date']; ?></td>
                        <td><?php echo $r['order_time']; ?></td>
                        <td><?php echo $r['order_number_fermale']; ?></td>
                        <td><?php echo $r['order_number_male']; ?></td>
                        <td><?php echo $r['order_totalprice']; ?></td>
                        <td><?php echo $r['order_deposit']; ?></td>
                        <td>
                            <?php
                            switch ($r['order_status']) {
                                case 0:
                                    echo "<i class = 'glyphicon glyphicon-info-sign'></i>_wait";
                                    break;
                                case 1:
                                    echo "<i class = 'glyphicon glyphicon-usd'></i>_pay"; //
                                    break;
                                case 2:
                                    echo "<i class = 'glyphicon glyphicon-remove-sign'></i>_fail";
                                    break;
                                default:
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            switch ($r['order_approve_status']) {
                                case 0:
                                    echo "<i class = 'glyphicon glyphicon-info-sign'></i>_wait";
                                    break;
                                case 1:
                                    echo "<i class = 'glyphicon glyphicon-ok-sign'></i>_success";
                                    break;
                                case 2:
                                    echo "<i class = 'glyphicon glyphicon-remove-sign'></i>_fail";
                                    break;
                                default:
                                    echo "<i class = 'glyphicon glyphicon-info-sign'></i>_error";
                                    break;
                            }
                            ?>
                        </td>
                        <td><?php echo $r['order_createdate']; ?></td>
                        <td>
                            <a  class="btn btn-info" href="index.php?page=f-od&id=<?= $r['order_id'] ?>">
                                <i class="glyphicon glyphicon-wrench"></i> จัดการ
                            </a>
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