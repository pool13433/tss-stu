<?php
include '../../config/Database.php';
$db = new Database();
$db->select('prefix', '*', '1=1', 'pref_id ASC');
$result = $db->getResults();

$db->select('province', '*', '1=1', 'prov_name ASC');
$province = $db->getResults();
?>
<script type="text/javascript">
    $(function() {

        $('#birthdate').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
        });
        $('#formRegister').submit(function() {
            if(confirm('ยืนยันการลงทะเบียน')){
                return true;
            }else{
                return false;
            }
        });
    });
    function validate() {
        var refex = "[0-9]{2}";
        var tel = $('#tel').val();
        var idcart = $('#idcart').val();
        if (refex.test(tel) || refex.test(idcart)) {
            return false;
        } else {
            return true;
        }
    }
</script>
<div class="box_header">
    กรุณากรอกข่อมูลให้ครบ
</div>
<div class="box_body">
    <form class="form-horizontal" id="formRegister" role="form" action="_register.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <div class="form-group">
                <label  class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" 
                           name="username" placeholder="username" required="true"
                           title="firstname lastname">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" 
                           name="password" placeholder="Password" required="true" min="5">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Re-Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="repassword" 
                           name="repassword" placeholder="RePassword" required="true">
                </div>
            </div>
        </fieldset>



        <fieldset>
            <legend>ส่วนตัว</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label">คำนำหน้าชื่อ</label>
                <div class="col-sm-4">
                    <select name="prefix" class="form-control" required>
                        <?php
                        foreach ($result as $r) {
                            echo "<option value='" . $r[pref_id] . "'>" . $r['pref_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">ชื่อ</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ" required="">
                </div>
                <label class="col-sm-2 control-label">นามสกุล</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">รหัสบัตรประชาชน</label>
                <div class="col-sm-4">
                    <input type="number" pattern="\d*" class="form-control" id="idcart" name="idcart" maxlength="13" placeholder="รหัสบัตรประชาชน" required="">
                </div>
                <label class="col-sm-2 control-label">วันเดือนปี เกิด</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="วันเดือนปี เกิด" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">ที่อยู่</label>
                <div class="col-sm-4">
                    <textarea  id="address" class="form-control" name="address" placeholder="ที่อยู่" required=""></textarea>
                </div>
                <label class="col-sm-2 control-label">หมู่บ้าน</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="alley" name="alley" placeholder="หมู่บ้าน" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">ตำบล</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="district" name="district" placeholder="ตำบล" required="">
                </div>
                <label class="col-sm-2 control-label">อำเภอ</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="prefecture" name="prefecture" placeholder="อำเภอ" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">จังหวัด</label>
                <div class="col-sm-4">
                    <select name="province" class="form-control" required>
                        <?php
                        foreach ($province as $r) {
                            echo "<option value='" . $r[prov_id] . "'>" . $r['prov_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <label class="col-sm-2 control-label">รหัสไปรษณีย์</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="postcode" name="postcode" maxlength="5" placeholder="รหัสไปรษณีย์" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">มือถือ</label>
                <div class="col-sm-4">
                    <input type="tel" pattern="\d*" class="form-control" id="tel" name="tel" placeholder="มือถือ" required="true">
                </div>
                <label class="col-sm-2 control-label">อีเมลล์</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="อีเมลล์" required="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <button type="button" class="btn btn-danger">ล้างข้อมูล</button>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </fieldset>
    </form>
</div>
<div id="dialog_confirm" title="ลงทะเบียน เดี๋ยวนี้" style="display: none">
    <div class="box_menu_top"></div>
    <p>ยืนยันการ ลงทะเบียน</p>
</div>