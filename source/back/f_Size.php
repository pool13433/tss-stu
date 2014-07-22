<?php
include '../../config/StudioUtil.php';
include '../../config/connect.php';
$id = "";
$name1 = "";
$name2 = "";
$unit = "";
if (!empty($_GET['id'])) {
    $sql_size = "SELECT * FROM photo_size WHERE size_id =" . $_GET['id'];
    $query_size = mysql_query($sql_size) or die(mysql_error());
    $r = mysql_fetch_assoc($query_size);
    $id = $r['size_id'];
    $name = explode("x", $r['size_name']);
    $name1 = $name[0];
    $name2 = $name[1];
    $unit = $r['size_unit'];
}
?>
<form class="form-horizontal" method="post" action="_size.php?method=i" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="panel panel-info">
        <div class="panel-heading">ฟอร์ม แพ๊คเก๊ต</div>
        <div class="panel-body">        
            <div class="form-group">
                <label class="col-sm-2 label-rigth">ขนาด</label>
                <div class="col-sm-1">
                    <input type="hidden" class="form-control" name="id" required value="<?= $id ?>"/>
                    <input type="number" class="form-control" name="name1" required value="<?= $name1 ?>"/>
                </div>
                <label class="col-sm-1 label-center">x</label>
                <div class="col-sm-1">
                    <input type="num" class="form-control" name="name2" required value="<?= $name2 ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">หน่วย</label>
                <div class="col-sm-3">
                    <select class="form-control" name="unit">
                        <?php $units = StudioUtil::unit(); ?>
                        <?php
                        foreach ($units as $key => $value):
                            if ($key == $unit):
                                ?>
                                <option value="<?= $key ?>" selected><?= $value ?></option>
                            <?php else: ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php
                            endif;
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>