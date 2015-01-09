
<?php
include '../../config/connect.php';

$method = "";

$id = "";
$name = "";
$price = "";
$remark = "";
$package = "";
if (!empty($_GET['id'])) {

    $sql_packageSet = "SELECT * FROM package_set WHERE pacset_id = " . $_GET['id'];
    $query_packageSet = mysql_query($sql_packageSet) or die(mysql_error());
    $r = mysql_fetch_assoc($query_packageSet);
    $id = $r['pacset_id'];
    $name = $r['pacset_name'];
    $price = $r['pacset_price'];
    $package = $r['pac_id'];
    $remark = $r['pacset_remark'];
    $method = 'e'; // edit
} else {
    $id = getlastPackagSetId();
    $method = 'i'; // insert 
}
?>
<form class="form-horizontal" action="_packageSet.php?method=<?= $method ?>" method="post">
    <div class="panel panel-info">
        <div class="panel-heading"></div>
        <div class="panel-body">            
            <div class="form-group ">
                <label class="col-sm-2 label-rigth">ขนาด</label>
                <div class="col-sm-4 alert alert-warning">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            ขนาดรูปทั้งหมดใน ระบบ
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ขนาด</th>
                                        <th style="width: 20%">จำนวน</th>
                                        <th style="width: 15%">เอาเข้า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $arr_size = getPhoto_size($id);
                                    foreach ($arr_size as $size) {

                                        //echo "<pre>setd_imgsize: " . $arr_imgsize[$j]['setd_imgsize'] . "</pre>";
                                        //echo "<pre> size_id :" . $arr_size[$i]['size_id'] . "</pre>";
                                        ?>
                                        <tr>                                    
                                            <td><?= $size['size_name'] ?></td>
                                            <td>
                                                <input type="number"                                               
                                                       name="num<?= $size['size_id'] ?>" 
                                                       class="form-control"
                                                       alt="input<?= $size['size_id'] ?>"/>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" type="button" onclick="return insertISize(<?= $size['size_id'] ?>)">
                                                    <i class="glyphicon glyphicon-arrow-right"></i> เอาเข้า
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
                </div>
                <label class="col-sm-1"></label>
                <div class="col-sm-4 alert alert-warning">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            รูปที่เลือก 
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>                                
                                        <th style="width: 15%">เอาออก</th>
                                        <th>จำนวน</th>
                                        <th style="width: 10%">จำนวน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($id)) {
                                        $arr_imgsize = getImag_size($id);
                                        foreach ($arr_imgsize as $size) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-warning" type="button" onclick="return deleteSize(<?= $size['setd_id'] ?>)">
                                                        <i class="glyphicon glyphicon-arrow-left"></i> เอาออก
                                                    </button>
                                                </td>
                                                <td><?= $size['size_name'] ?></td>                                       
                                                <td><?= $size['setd_number'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>                            
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth"> package</label>
                <div class="col-sm-3 alert alert-warning">
                    <select id="my-select" class="select2 form-control" name="package">
                        <?php
                        $sql_package = "SELECT * FROM package";
                        //echo "<pre> sql :" . $sql_package . "</pre>";
                        $query_package = mysql_query($sql_package) or die(mysql_error());
                        while ($r = mysql_fetch_array($query_package)) {
                            if ($package == $r['pac_id']):
                                ?>
                                <option value="<?= $r['pac_id'] ?>" selected><?= $r['pac_name'] ?></option>
                            <?php else:
                                ?>
                                <option value="<?= $r['pac_id'] ?>"><?= $r['pac_name'] ?></option>
                            <?php
                            endif;
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">ชื่อ</label>
                <div class="col-sm-4 alert alert-warning">
                    <input type="hidden" name="id" class="form-control" value="<?= $id ?>"/>
                    <input type="text" name="name" class="form-control" value="<?= $name ?>"/>
                </div>
            </div>            
            <div class="form-group ">
                <label class="col-sm-2 label-rigth">ราคา</label>
                <div class="col-sm-2 alert alert-warning">
                    <input type="number" name="price" class="form-control" value="<?= $price ?>" required/>
                </div>
                <label class="col-sm-2 label-left">บาท</label>
            </div>
            <div class="form-group ">
                <label class="col-sm-2 label-rigth">หมายเหตุ</label>
                <div class="col-sm-4 alert alert-warning">
                    <textarea class="form-control" name="remark" rows=""><?= $remark ?></textarea>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary btn-lg" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>    
    </div>
</form>
<?php

function getPhoto_size($pak_id) {
    $size = array();
    $sql_size = "SELECT * FROM photo_size WHERE 1=1 ";
    if ($pak_id != "") {
        $sql_size .= " AND size_id NOT IN (SELECT setd_imgsize FROM package_set_detail WHERE pacset_id =" . $pak_id . " )";
    }
    $sql_size .= " ORDER BY size_name ASC";
    //echo "<pre> sql: " . $sql_size . "</pre>";
    $query = mysql_query($sql_size) or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $size[] = $row;
    }
    //echo "<pre>lenght :" . count($size) . "</pre>";
    return $size;
}

function getImag_size($pak_id) {
    $size = array();
    $sql_PackageSetDetail = "SELECT * FROM package_set_detail pksd,photo_size s ";
    $sql_PackageSetDetail .= " WHERE pksd.setd_imgsize = s.size_id";
    $sql_PackageSetDetail .= " AND pksd.pacset_id =" . $pak_id;
    //echo "<pre> sql: " . $sql_PackageSetDetail . "</pre>";
    $query_packageSetSetail = mysql_query($sql_PackageSetDetail) or die(mysql_error());
    while ($row = mysql_fetch_array($query_packageSetSetail)) {
        $size[] = $row;
    }
    //echo "<pre>lenght :" . count($size) . "</pre>";

    return $size;
}

function getlastPackagSetId() {
    $sql_packageSet = "SELECT * FROM package_set ORDER BY pacset_id DESC LIMIT 1";
    //echo "<pre> sql: " . $sql_packageSet . "</pre>";
    $query_pacakgeSet = mysql_query($sql_packageSet) or die(mysql_error());
    $r = mysql_fetch_assoc($query_pacakgeSet);
    return intval($r['pacset_id']) + 1;
}
?>
<script type="text/javascript">
                                                    function insertISize(id) {
                                                        var number = $('input[name=num' + id + ']').val();
                                                        //alert(number);
                                                        var set_id = $('input[name=id]').val();
                                                        if (number != '') {
                                                            if (parseInt(number)) {
                                                                $.ajax({
                                                                    url: '_packageSetDetail.php?method=a',
                                                                    type: 'POST',
                                                                    data: {
                                                                        id: id,
                                                                        number: number,
                                                                        set_id: set_id
                                                                    },
                                                                    success: function(data) {
                                                                        if (data) {
                                                                            window.location.reload();
                                                                        } else {
                                                                            alert(' เกิด ข้อ ผิดพลาดในการ เพิ่มข้อมูล');
                                                                        }
                                                                    }
                                                                });
                                                            } else {
                                                                alert('กรุณา กรอก เฉพาะ ตัวเลขเท่านั้น');
                                                                return false;
                                                            }
                                                        } else {
                                                            alert(' กรุณากรอก ข้อมูล ตัวเลข ก่อน');
                                                            return false;
                                                        }
                                                    }
                                                    function deleteSize(id) {
                                                        if (confirm('ยืนยันการ ลบ item : [' + id + '] ใช่หรือไม่')) {
                                                            $.ajax({
                                                                url: '_packageSetDetail.php?method=d',
                                                                type: 'POST',
                                                                data: {id: id},
                                                                success: function(data) {
                                                                    if (data) {
                                                                        window.location.reload();
                                                                    } else {
                                                                        alert(' เกิด ข้อ ผิดพลาดในการ ลบ ข้อมูล');
                                                                    }
                                                                }
                                                            })
                                                        }
                                                        return false;
                                                    }
</script>