
<?php
include '../../config/connect.php';

$GET_id = "";

$id = "";
$name = "";
$price = "";
$remark = "";
$package = "";
if (!empty($_GET['id'])) {
    $GET_id = $_GET['id'];
    $sql_packageSet = "SELECT * FROM package_set WHERE pacset_id = " . $_GET['id'];
    $query_packageSet = mysql_query($sql_packageSet) or die(mysql_error());
    $r = mysql_fetch_assoc($query_packageSet);
    $id = $r['pacset_id'];
    $name = $r['pacset_name'];
    $price = $r['pacset_price'];
    $package = $r['pac_id'];
    $remark = $r['pacset_remark'];
}
?>
<form class="form-horizontal" action="_packageSet.php?method=i" method="post">
    <div class="panel panel-info">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 label-rigth">ชื่อ</label>
                <div class="col-sm-4 alert alert-warning">
                    <input type="hidden" name="id" class="form-control" value="<?= $id ?>"/>
                    <input type="text" name="name" class="form-control" value="<?= $name ?>"/>
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
            <div class="form-group ">
                <label class="col-sm-2 label-rigth">ราคา</label>
                <div class="col-sm-2 alert alert-warning">
                    <input type="number" name="price" class="form-control" value="<?= $price ?>" required/>
                </div>
                <label class="col-sm-2 label-left">บาท</label>
            </div>
            <div class="form-group ">
                <label class="col-sm-2 label-rigth">ขนาด</label>
                <div class="col-sm-4 alert alert-warning">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">เลือก</th>
                                <th>ขนาด</th>
                                <th style="width: 20%">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_GET['id'])) {
                                $arr_imgsize = getImag_size($_GET['id']);
                                foreach ($arr_imgsize as $size) {
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" checked="true"
                                                   class="form-control checkbox" 
                                                   name="size[]" 
                                                   value="<?= $size['setd_id'] ?>"
                                                   alt="<?= $size['setd_id'] ?>"
                                                   onclick="openInput_ischeck(<?= $size['setd_id'] ?>)"/></td>
                                        <td><?= $size['size_name'] ?></td>
                                        <td>
                                            <input type="number"                                               
                                                   name="num[]" 
                                                   class="form-control"
                                                   value="<?= $size['setd_number'] ?>"
                                                   alt="input<?= $size['setd_id'] ?>"
                                                   />
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            $arr_size = getPhoto_size($GET_id);
                            foreach ($arr_size as $size) {

                                //echo "<pre>setd_imgsize: " . $arr_imgsize[$j]['setd_imgsize'] . "</pre>";
                                //echo "<pre> size_id :" . $arr_size[$i]['size_id'] . "</pre>";
                                ?>
                                <tr>
                                    <td><input type="checkbox"
                                               class="form-control " 
                                               name="size[]" 
                                               value="<?= $size['size_id'] ?>"
                                               alt="<?= $size['size_id'] ?>"
                                               onclick="openInput_ischeck(<?= $size['size_id'] ?>)"/></td>
                                    <td><?= $size['size_name'] ?></td>
                                    <td>
                                        <input type="number"                                               
                                               name="num[]" 
                                               class="form-control"
                                               alt="input<?= $size['size_id'] ?>"
                                               disabled/>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    <input type="text" id="total"  value="0" class="form-control"/>
                                </th>
                                <th colspan="2"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
<script type="text/javascript">
                                               function openInput_ischeck(id) {
                                                   //var total = parseInt($('#total').val());
                                                   var total = $('#total').val();
                                                   //alert(id);
                                                   var checkBox = $('.checkbox[alt=' + id + ']');
                                                   var inputNum = $('input[alt=input' + id + ']');
                                                   if (checkBox.is(':checked')) {
                                                       inputNum.attr('disabled', false);
                                                       inputNum.attr('required', true); // required=""
                                                       total + 1;
                                                   } else {
                                                       inputNum.attr('disabled', true);
                                                       inputNum.val('');
                                                       inputNum.attr('required', true);
                                                       total - 1;
                                                   }
                                                   console.log(total);
                                                   $('#total').val(total);
                                               }
</script>
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
