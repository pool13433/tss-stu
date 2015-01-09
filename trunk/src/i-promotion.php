<?php include '../config/connect.php'; ?>
<div class="panel panel-success">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i> Promotion
    </div>
    <div class="panel-body">
        <?php
        $date = date('Y-m-d');
        $sql_promote = "SELECT * FROM promotion ";
        $sql_promote .= " WHERE prom_startdate <= DATE(NOW())";
        $sql_promote .= " AND prom_enddate >= DATE(NOW())";
        $query_promote = mysql_query($sql_promote) or die(mysql_error());
        while ($row = mysql_fetch_array($query_promote)) {
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading"><?= $row['prom_name'] ?></div>
                <div class="panel-body" style="font-size: large">
                    <div class="row form-group">
                        <label class="col-md-2 alert alert-info">กำหนดวันที่ เริ่ม</label>
                        <label class="col-md-2  alert alert-success"><?= $row['prom_startdate'] ?></label>
                        <label class="col-md-2  alert alert-info">วันที่ สิ้นสุด</label>
                        <label class="col-md-2  alert alert-success"><?= $row['prom_enddate'] ?></label>
                    </div>      
                    <div class="row form-group" style="text-align:center;">
                        <img src="../images/promotion/<?=$row['prom_file']?>" class="img-thumbnail img-size300x300"/>
                    </div>              
                </div>
                <div class="panel-footer"></div>
            </div>
        <?php } ?>
    </div>
    <div class="panel-footer"></div>
</div>
