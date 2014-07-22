<?php
include '../../config/connect.php';
$id = "";
$name = "";
$img = "required";
if (!empty($_GET['id'])) {
    $sql_package = "SELECT * FROM package WHERE pac_id =" . $_GET['id'];
    $query_package = mysql_query($sql_package) or die(mysql_error());
    $r = mysql_fetch_assoc($query_package);
    $id = $r['pac_id'];
    $name = $r['pac_name'];
    $img = "";
}
?>
<form class="form-horizontal" method="post" action="_package.php?method=i" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="panel panel-info">
        <div class="panel-heading">ฟอร์ม แพ๊คเก๊ต</div>
        <div class="panel-body">        
            <div class="form-group">
                <label class="col-sm-2 label-rigth">ชื่อ</label>
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="id" required value="<?= $id ?>"/>
                    <input type="text" class="form-control" name="name" required value="<?= $name ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">รูป สินค้า ["gif", "jpeg", "jpg", "png"]</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" name="file" <?= $img ?> onchange="CheckFile(this)"/>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>