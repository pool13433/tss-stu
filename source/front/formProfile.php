<?php
@ob_start();
@session_start();
include '../../config/connect.php';
$sql_person = "SELECT * FROM person WHERE pers_id = " . $_SESSION['id'];
$query_person = mysql_query($sql_person) or die(mysql_error());
$r = mysql_fetch_assoc($query_person);

$id = $r['pers_id'];
$prefix = $r['pref_id'];
$province = $r['prov_id'];
$status = $r['persta_id'];
$user = $r['pers_username'];
$pass = $r['pers_password'];
$fname = $r['pers_fname'];
$lname = $r['pers_lname'];
$idcard = $r['pers_idcard'];
$birthday = $r['pers_birthday'];
$address = $r['pers_address'];
$alley = $r['pers_alley'];
$district = $r['pers_district'];
$prefecture = $r['pers_prefecture'];
$potcode = $r['pers_postcode'];
$phone = $r['pers_phone'];
$email = $r['pers_email'];
$active = $r['pers_active'];
?>
<form class="form-horizontal" id="formRegister" role="form" action="_person.php" method="post">
    <div class="panel panel-warning">
        <div class="panel-heading">
            กรุณากรอกข่อมูลให้ครบ
        </div>
        <div class="panel-body">

            <fieldset>
                <legend>Login</legend>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="id" value="<?= $id ?>"/>
                        <input type="text" class="form-control" id="username" 
                               name="username" placeholder="username" required="true"
                               title="firstname lastname" value="<?= $user ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password" 
                               name="password" placeholder="Password" required="true" min="5" value="<?= $pass ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Re-Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="repassword" 
                               name="repassword" placeholder="RePassword" required="true" value="<?= $pass ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>ส่วนตัว</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label">คำนำหน้าชื่อ</label>
                    <div class="col-sm-4">
                        <select name="prefix" class="form-control" required>
                            <option>-- select --</option>
                            <?php
                            $sql_prefix = "SELECT * FROM prefix ORDER BY pref_id";
                            $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
                            while ($r = mysql_fetch_array($query_prefix)) {
                                if ($r['perf_id'] == $prefix):
                                    echo "<option value='" . $r[pref_id] . "' selected>" . $r['pref_name'] . "</option>";
                                else:
                                    echo "<option value='" . $r[pref_id] . "'>" . $r['pref_name'] . "</option>";
                                endif;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ชื่อ</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ" required="" value="<?= $fname ?>">
                    </div>
                    <label class="col-sm-2 control-label">นามสกุล</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล" required="" value="<?= $lname ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">รหัสบัตรประชาชน</label>
                    <div class="col-sm-4">
                        <input type="number" pattern="\d*" class="form-control" id="idcart" name="idcart" maxlength="13" placeholder="รหัสบัตรประชาชน" required="" value="<?= $idcard ?>">
                    </div>
                    <label class="col-sm-2 control-label">วันเดือนปี เกิด</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="วันเดือนปี เกิด" required="" value="<?= $birthday ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">ที่อยู่</label>
                    <div class="col-sm-4">
                        <textarea  id="address" class="form-control" name="address" placeholder="ที่อยู่" required=""><?= $address ?></textarea>
                    </div>
                    <label class="col-sm-2 control-label">หมู่บ้าน</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="alley" name="alley" placeholder="หมู่บ้าน" required="" value="<?= $alley ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">ตำบล</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="district" name="district" placeholder="ตำบล" required="" value="<?= $district ?>">
                    </div>
                    <label class="col-sm-2 control-label">อำเภอ</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="prefecture" name="prefecture" placeholder="อำเภอ" required="" value="<?= $prefecture ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">จังหวัด</label>
                    <div class="col-sm-4">
                        <select name="province" class="form-control" required>
                            <option>-- seelct --</option>
                            <?php
                            $sql_province = "SELECT * FROM province ORDER BY  prov_name";
                            $query_province = mysql_query($sql_province) or die(mysql_error());
                            while ($r = mysql_fetch_array($query_province)) {
                                if ($r['prov_id'] == $province):
                                    echo "<option value='" . $r[prov_id] . "' selected>" . $r['prov_name'] . "</option>";
                                else:
                                    echo "<option value='" . $r[prov_id] . "'>" . $r['prov_name'] . "</option>";
                                endif;
                            }
                            ?>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label">รหัสไปรษณีย์</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="postcode" name="postcode" maxlength="5" placeholder="รหัสไปรษณีย์" required="" value="<?= $potcode ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">มือถือ</label>
                    <div class="col-sm-4">
                        <input type="tel" pattern="\d*" class="form-control" id="tel" name="tel" placeholder="มือถือ" required="true" value="<?= $phone ?>">
                    </div>
                    <label class="col-sm-2 control-label">อีเมลล์</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="อีเมลล์" required="" value="<?= $email ?>">
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="panel-footer label-center">
            <button type="submit" class="btn btn-success" onclick="return confirm('บันทึก')">บันทึก</button>
            <button type="button" class="btn btn-danger">ล้างข้อมูล</button>
        </div>
    </div>
</form>