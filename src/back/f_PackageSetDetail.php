<?php
include '../../config/connect.php';
$id = "";
$pacset_id = "";
$imgsize = "";
$number = "";
if (!empty($_GET['id'])) {
    $sql_packageSet = "SELECT * FROM package_set_detail WHERE setd_id = " . $_GET['id'];
    $query_packageSet = mysql_query($sql_packageSet) or die(mysql_error());
    $r = mysql_fetch_assoc($query_packageSet);
    $id = $r['setd_id'];
    $pacset_id = $r['pacset_id'];
    $imgsize = $r['setd_imgsize'];
    $number = $r['setd_number'];
}
?>
<form class="form-horizontal" action="_packageSetDetail.php?method=i" method="post">
    <div class="panel panel-info">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 label-rigth"> package</label>
                <div class="col-sm-3 alert alert-warning">
                    <input type="hidden" name="id" value="<?= $id ?>"/>
                    <select id="my-select" class="form-control" name="pac_set">
                        <?php
                        $sql_package = "SELECT * FROM package_set";
                        //echo "<pre> sql :" . $sql_package . "</pre>";
                        $query_package = mysql_query($sql_package) or die(mysql_error());
                        while ($r = mysql_fetch_array($query_package)) {
                            ?>
                            <option value="<?= $r['pacset_id'] ?>"><?= $r['pacset_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="hidden" class="inputMutiselect" name="pacset" value="<?= $pacset_id ?>"/>
                </div>
            </div>
            <div class="form-group ">
                <label class="col-sm-2 label-rigth">ชื่อ</label>
                <div class="col-sm-4 alert alert-warning">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">à¹€à¸¥à¸·à¸­à¸</th>
                                <th>à¸‚à¸™à¸²à¸”</th>
                                <th style="width: 20%">à¸ˆà¸³à¸™à¸§à¸™</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_size = "SELECT * FROM photo_size";
                            $query = mysql_query($sql_size) or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" 
                                               class="form-control checkbox" 
                                               name="size[]" 
                                               value="<?= $row['size_id'] ?>"
                                               alt="<?= $row['size_id'] ?>"
                                               onclick="openInput_ischeck(<?= $row['size_id'] ?>)"/></td>
                                    <td><?= $row['size_name'] ?></td>
                                    <td>
                                        <input type="number"                                               
                                               name="num[]" 
                                               class="form-control"
                                               alt="input<?= $row['size_id'] ?>"
                                               disabled/>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary btn-lg" onclick="return confirm('à¸šà¸±à¸™à¸—à¸¶à¸')">à¸šà¸±à¸™à¸—à¸¶à¸</button>
        </div>    
    </div>
</form>
<script type="text/javascript">
                                               $(function() {
                                                   //select2_muti();
                                                   renderComboSize();
                                               });
                                               function openInput_ischeck(id) {
                                                   var checkBox = $('.checkbox[alt=' + id + ']');
                                                   var inputNum = $('input[alt=input' + id + ']');
                                                   if (checkBox.is(':checked')) {
                                                       inputNum.attr('disabled', false);
                                                       inputNum.attr('required', true); // required=""
                                                   } else {
                                                       inputNum.attr('disabled', true);
                                                       inputNum.attr('required', true);
                                                   }
                                               }
</script>
