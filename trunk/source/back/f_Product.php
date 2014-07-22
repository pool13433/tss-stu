<?php
include '../../config/connect.php';

$id = "";
$code = "";
$name = "";
$price = "";
$img = "required";
if (!empty($_GET['id'])) {
    $sql_product = "SELECT * FROM product WHERE prod_id = " . $_GET['id'];
    $query_product = mysql_query($sql_product) or die(mysql_error());
    $r = mysql_fetch_assoc($query_product);
    $id = $r['prod_id'];
    $code = $r['prod_code'];
    $name = $r['prod_name'];
    $price = $r['prod_price'];
    $img = "";
}
?>
<form class="form-horizontal" method="post" action="_product.php?method=i" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="panel panel-info">
        <div class="panel-heading">ฟอร์ม สินค้า</div>
        <div class="panel-body">        
            <div class="form-group">
                <label class="col-sm-2 label-rigth">โค๊ด</label>
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>"/>
                    <input type="text" class="form-control" name="code" required value="<?= $code ?>"/>
                </div>
                <label class="col-sm-1 label-rigth">ชื่อ</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="name" required value="<?= $name ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">รูป สินค้า ["gif", "jpeg", "jpg", "png"]</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" name="file" <?= $img ?> onchange="CheckFile(this)"/>
                </div>
                <label class="col-sm-1 label-rigth">ราคา</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="price" required value="<?= $price ?>"/>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>
