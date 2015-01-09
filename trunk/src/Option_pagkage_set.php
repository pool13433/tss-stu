
<ol class="breadcrumb">
    <li><a href="index.php?page=o-pk">
            <i class="glyphicon glyphicon-arrow-left"></i> รายการ package</a></li>
    <li class="active">รายละเอียด</li>
</ol>
<?php
include '../config/connect.php';
$sql_packageSet = "SELECT * FROM package_set WHERE pac_id =" . $_GET['id'];
$query_packageSet = mysql_query($sql_packageSet) or die(mysql_error());
$record = mysql_num_rows($query_packageSet);
if ($record > 0) {
    while ($row = mysql_fetch_array($query_packageSet)) {
        ?>    
        <div class="panel panel-info">
            <div class="panel-heading">                                                    
                <?= $row['pacset_name'] ?> ราคา:: 
                <span class="badge alert-danger"><?= $row['pacset_price'] ?></span>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <?php
                    $sql_PackageSetDetail = "SELECT * FROM package_set_detail pksd,photo_size ps WHERE 1=1";
                    $sql_PackageSetDetail .= " AND pksd.setd_imgsize = ps.size_id";
                    $sql_PackageSetDetail .= " AND pacset_id =" . $row['pacset_id'];
                    $query_packageSetSetail = mysql_query($sql_PackageSetDetail) or die(mysql_error());
                    $record1 = mysql_num_rows($query_packageSetSetail);
                    if ($record1 > 0) {
                        while ($row1 = mysql_fetch_array($query_packageSetSetail)) {
                            ?>
                            <li class="list-group-item list-group-item-warning">
                                ขนาด <?= $row1['size_name'] ?>   จำนวน <?= $row1['setd_number'] ?>
                            </li>
                            <?php
                        }
                    } else {
                        ?>
                        <li class="list-group-item list-group-item-warning">
                            Data Not Fail ไม่มีข้อมูล รายละเอียด
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="panel-footer">
                <?php
                if ($record1 > 0) {
                    ?>
                    <button class="btn btn-primary" 
                            onclick="alert('กรุณา login เข้าระบบ ถึงจะสามารถ สั่งจอง ได้')">
                        <i class="glyphicon glyphicon-shopping-cart"></i> เลือก
                    </button>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="panel panel-info">
        <div class="panel-heading">                                    
            Data Not Fail ไม่มีข้อมูล รายละเอียด
        </div>
    </div>
    <?php
}
?>

<script type="text/javascript">
                    //return addItemPackageSet(<?= $row['pacset_id'] ?>, '<?= $row['pacset_name'] ?>')
                    function addItemPackageSet(id, name) {
                        if (confirm('เพิ่ม สินค้า รหัส : [ ' + name + ' ] เข้าตะกร้า ใช่หรือไม่')) {
                            $.ajax({
                                url: "_cart.php?method=a",
                                type: "POST",
                                data: {
                                    id: id,
                                    typeItem: 'item_pac',
                                },
                                success: function(data) {
                                    //alert(data);
                                    console.log(data);
                                    if (data) {
                                        window.location = 'index.php?page=c';
                                    } else {
                                        alert('error: ' + data);
                                    }
                                },
                            });
                        }
                        return false;
                    }
</script>
