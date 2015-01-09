<?php
include '../../config/connect.php';
// ประกาศ ตัวแปร
$id = "";
$name = "";
$file = "required";
$startdate = "";
$enddate = "";
if (!empty($_GET['id'])) {
    $sql_loca = "SELECT * FROM promotion WHERE prom_id = " . $_GET['id'];
    $query_location = mysql_query($sql_loca) or die(mysql_error());
    $r = mysql_fetch_assoc($query_location);
    $id = $r['prom_id'];
    $name = $r['prom_name'];
    $file = "";
    $startdate = $r['prom_startdate'];
    $enddate = $r['prom_enddate'];
}
?>
<form class="form-horizontal" action="_promotion.php?method=i" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="panel panel-info">
        <div class="panel-heading">ฟอร์ม คำนำหน้าชื่อ</div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">ชื่อ</label>
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>"/>
                    <input type="text" class="form-control" name="name" value="<?= $name ?>" required/>
                </div>
                <label class="col-sm-1 label-rigth" for="">ชื่อ</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" name="file" value="<?= $file ?>" onchange="CheckFile(this)" <?= $file ?>/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">เริ่ม</label>
                <div class="col-sm-2">
                    <input type="text" name="startdate" id="from" class="form-control" value="<?= $startdate ?>" required/>
                </div>
                <label class="col-sm-1"></label>
                <label class="col-sm-1 label-rigth" for="">สิ้นสุด</label>
                <div class="col-sm-2">
                    <input type="text" name="enddate" id="to" class="form-control" value="<?= $enddate ?>" required/>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>
