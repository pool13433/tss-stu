<?php
include '../../config/connect.php';
// ประกาศ ตัวแปร
$id = "";
$name = "";
$detail = "";
if (!empty($_GET['id'])) {
    $sql_bank = "SELECT * FROM bank WHERE bank_id = " . $_GET['id'];
    $query_bank = mysql_query($sql_bank) or die(mysql_error());
    $r = mysql_fetch_assoc($query_bank);
    $id = $r['bank_id'];
    $name = $r['bank_name'];
    $detail = $r['bank_detail'];
}
?>
<form class="form-horizontal" action="_bank.php?method=i" method="post">
    <div class="panel panel-info">
        <div class="panel-heading">จัดการธนาคาร</div>
        <div class="panel-body">

            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">ชื่อธนาคาร</label>
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>"/>
                    <input type="text" class="form-control" name="name" value="<?= $name ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth" for="">คำอธิบาย</label>
                <div class="col-sm-3">
                    <textarea name="detail" class="form-control" rows="3"><?= $detail ?></textarea>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>
