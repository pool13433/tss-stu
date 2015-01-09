<?php
include '../../config/connect.php';
// ประกาศ ตัวแปร
$id = "";
$name = "";
$price = "";
if (!empty($_GET['id'])) {
    $sql_loca = "SELECT * FROM location WHERE loc_id = " . $_GET['id'];
    $query_location = mysql_query($sql_loca) or die(mysql_error());
    $r = mysql_fetch_assoc($query_location);
    $id = $r['loc_id'];
    $name = $r['loc_name'];
    $price = $r['loc_price'];
}
?>
<form class="form-horizontal" action="_location.php?method=i" method="post">
    <div class="panel panel-info">
        <div class="panel-heading">ฟอร์ม คำนำหน้าชื่อ</div>
        <div class="panel-body">

            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">ชื่อ</label>
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>"/>
                    <input type="text" class="form-control" name="l_name" value="<?= $name ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">ราคา</label>
                <div class="col-sm-3">
                    <input type="number" name="l_price" class="form-control" value="<?= $price ?>" required/>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>
