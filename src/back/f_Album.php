<?php
include '../../config/connect.php';
$id = "";
$nameth = "";
$nameeng = "";
$engdisable = "";
if (!empty($_GET['id'])) {
    $sql_album = "SELECT * FROM album WHERE album_id = " . $_GET['id'];
    $query_album = mysql_query($sql_album) or die(mysql_error());
    $r = mysql_fetch_assoc($query_album);
    $id = $r['album_id'];
    $nameth = $r['album_nameth'];
    $nameeng = $r['album_nameeng'];
    $engdisable = "readonly";
}
?>

<form class="form-horizontal" action="_images.php?method=i" name="upload-form" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="panel panel-info">
        <div class="panel-heading">
            เลือกรูป 
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">album TH</label>
                <div class="col-sm-3">
                    <input type="hidden" name="id" value="<?= $id ?>"/>
                    <input type="text" id="targetFolder" name="albumsTh" class="form-control" required="true" placeholder="ชื่อ ไทย" value="<?= $nameth ?>"/>
                </div>
                <label class="col-sm-2 control-label">album ENG</label>
                <div class="col-sm-3">
                    <input type="text" id="targetFolder" name="albumsEng" class="form-control" required="true" placeholder="ชื่อ eng" value="<?= $nameeng ?>" <?= $engdisable ?>/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">เลือกรูป Muti file</label>
                <div class="col-sm-2">              
                    <input type="file" name="file[]" class="form-control" multiple="true" onchange="CheckFile(this)"/>
                </div>
                <label class="col-md-2"></label>
                <div class="col-sm-4">
                    <?php
                    if (!empty($id)):
                        $sql_file = "SELECT * FROM album_file af";
                        $sql_file .= " JOIN album a ON a.album_id = af.album_id";
                        $sql_file .= " WHERE af.album_id = " . $id;
                        $query_file = mysql_query($sql_file) or die(mysql_error());
                        $record = mysql_num_rows($query_file);
                        if ($record > 0):
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">ลำดับ</th>
                                        <th>รูป</th>
                                        <th style="width: 7%">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php while ($row = mysql_fetch_array($query_file)) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td>
                                                <img src="<?= PATH_ALBUMS . $row['album_nameeng'] . '/' . $row['file_name'] ?>" class="img-thumbnail img-size60x60"/>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" type="button" onclick="return deleteItem(<?= $row['file_id']; ?>, '_images.php?method=d')">
                                                    <i class="glyphicon glyphicon-trash"></i> ลบ
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        endif;
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" type="submit" onclick=" return confirm('ยืนยันการ บันทึก')">
                <i class="glyphicon glyphicon-upload"></i> Upload File
            </button>
        </div>
    </div>
</form>
