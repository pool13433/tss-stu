<?php
@ob_start();
@session_start();
include '../../config/connect.php';
$id = "";
$prefix = "";
$province = "";
$status = "";
$username = "";
$password = "";
$fname = "";
$lname = "";
$idcard = "";
$birthday = "";
$address = "";
$alley = "";
$district = "";
$perfecture = "";
$postcode = "";
$phone = "";
$email = "";
$active = "";
if (!empty($_GET['id'])) {
    $sql_person = "SELECT * FROM person WHERE pers_id = " . $_GET['id'];
    $query_person = mysql_query($sql_person) or die(mysql_error());
    $row = mysql_fetch_assoc($query_person);
    $id = $row['pers_id'];
    $prefix = $row['pref_id'];
    $province = $row['prov_id'];
    $status = $row['persta_id'];
    $username = $row['pers_username'];
    $password = $row['pers_password'];
    $fname = $row['pers_fname'];
    $lname = $row['pers_lname'];
    $idcard = $row['pers_idcard'];
    $birthday = $row['pers_birthday'];
    $address = $row['pers_address'];
    $alley = $row['pers_alley'];
    $district = $row['pers_district'];
    $perfecture = $row['pers_prefecture'];
    $postcode = $row['pers_postcode'];
    $phone = $row['pers_phone'];
    $email = $row['pers_email'];
    $active = $row['pers_active'];
}
?>
<form class="form-horizontal" action="_person.php?method=i" method="post" name="person-form" id="person-form">
    <div class="panel panel-info">
        <div class="panel-heading">เพิ่มสมาชิก</div>
        <div class="panel-body">
            <!-- user , pass-->
            <div class="row">
                <div class="col-md-4" style="text-align: right;">
                    <img src="../../images/icon/Key-icon128x128.png" class="img-thumbnail alert-warning"/>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="col-md-2 label-rigth" for="">UserName</label>
                        <div class="col-md-3">
                            <input type="hidden" class="form-control" name="id"  value="<?= $id ?>"/>
                            <input type="text" class="form-control" name="username" id="username" value="<?= $username ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 label-rigth" for="">Password</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="password" id="password" value="<?= $password ?>"/>
                        </div>
                    </div>
                    <div class="form-group label-rigth">
                        <label class="col-md-2" for="">RePassword</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="repassword" id="repassword" value="<?= $password ?>"/>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!--user , data profile-->
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">คำนำหน้า</label>
                    <div class="col-md-2">          
                        <select name="prefix" id="prefix" class="form-control">
                            <?php
                            $sql_prefix = "SELECT * FROM prefix ORDER BY pref_name";
                            $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
                            while ($row = mysql_fetch_array($query_prefix)) {
                                if ($row['pref_id'] == $prefix):
                                    ?>
                                    <option value="<?= $row['pref_id'] ?>" selected="true"><?= $row['pref_name'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $row['pref_id'] ?>"><?= $row['pref_name'] ?></option>
                                <?php
                                endif;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">ชื่อ</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="fname" id="fname" required value="<?= $fname ?>"/>
                    </div>
                    <label class="col-md-1 label-rigth" for="">นามสกุล</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="lname" id="lname" required value="<?= $lname ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">รหัสบัตร ประชาชน</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="idcard" id="idcard" required value="<?= $idcard ?>"/>
                    </div>
                    <label class="col-md-1 label-rigth" for="">วันเกิด</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="birthday" id="day" required value="<?= $birthday ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">ที่อยู่</label>
                    <div class="col-md-3">
                        <textarea class="form-control" rows="3" name="address"><?= $address ?></textarea>
                    </div>
                    <label class="col-md-1 label-rigth" for="">หมู่บ้าน</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="alley" id="alley" required value="<?= $alley ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">ตำบล</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="district" id="district" required value="<?= $district ?>"/>
                    </div>
                    <label class="col-md-2 label-rigth" for="">อำเภอ</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="prefecture" id="prefecture" required value="<?= $perfecture ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">จังหวัด</label>
                    <div class="col-md-3">
                        <select class="form-control" name="province">
                            <?php
                            $sql_province = "SELECT * FROM province ORDER BY prov_name asc";
                            $query_province = mysql_query($sql_province) or die(mysql_error());
                            while ($row = mysql_fetch_array($query_province)) {
                                if ($row['prov_id'] == $province):
                                    ?>
                                    <option value="<?= $row['prov_id'] ?>" selected="true"><?= $row['prov_name'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $row['prov_id'] ?>"><?= $row['prov_name'] ?></option>
                                <?php
                                endif;
                            }
                            ?>
                        </select>
                    </div>
                    <label class="col-md-1 label-rigth" for="">รหัส ไปรษณีย์</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="postcode" id="postcode" required value="<?= $postcode ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">เบอร์โทร</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="phone" id="phone" required value="<?= $phone ?>"/>
                    </div>
                    <label class="col-md-2 label-rigth" for="">อีเมลล์</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="email" id="email" required value="<?= $email ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 label-rigth" for="">สถานะ</label>
                    <div class="col-md-2">
                        <select class="form-control" name="status">                            
                            <?php if ($active == 'active'): ?>
                                <option value="active" selected="true">Active</option>
                                <option value="nonactive">Unactive</option>
                            <?php else: ?>
                                <option value="active">Active</option>
                                <option value="nonactive" selected="true">Unactive</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <label class="col-md-2 label-rigth" for="">สถานะ</label>
                    <div class="col-md-2">
                        <select class="form-control" name="permission_status">
                            <?php if ($status == 1): ?>
                                <option value="1" selected="true">Administrator</option>
                                <option value="2">Customer</option>
                            <?php else: ?>
                                <option value="1">Administrator</option>
                                <option value="2" selected="true">Customer</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary btn-lg" onclick="return confirm('บันทึก')">บันทึก</button>
        </div>
    </div>
</form>
<script type="text/javascript">
                $(function() {
                    datePicker1Day();
                });
</script>