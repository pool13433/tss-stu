<?php
include '../../config/connect.php';
// ประกาศ ตัวแปร
$id = "";
$name = "";
$descrition = "";
if (!empty($_GET['id'])) {
    $sql_prefix = "SELECT * FROM prefix WHERE pref_id = " . $_GET['id'];
    $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
    $r = mysql_fetch_assoc($query_prefix);
    $id = $r['pref_id'];
    $name = $r['pref_name'];
    $descrition = $r['pref_descrition'];
}
?>
<form class="form-horizontal" action="_prefix.php?method=i" method="post">
    <div class="panel panel-info">
        <div class="panel-heading">ฟอร์ม คำนำหน้าชื่อ</div>
        <div class="panel-body">

            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">ชื่อ</label>
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>"/>
                    <input type="text" class="form-control" name="name" value="<?= $name ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">อธิบาย</label>
                <div class="col-sm-3">
                    <textarea name="desc" class="form-control" rows="3" required><?= $descrition ?></textarea>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>
