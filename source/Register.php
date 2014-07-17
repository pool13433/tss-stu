<?php
include '../config/connect.php';
?>
<div class="panel panel-success">
    <div class="panel-heading">สมัครสมาชิก</div>
    <div class="panel-body">
        <form class="form-horizontal" id="register-form" role="form" action="_register.php" method="post">
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
                        <input type="password" class="form-control" id="repassword" onchange="return checkPassword();"
                               name="repassword" placeholder="RePassword" required="true">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>ส่วนตัว</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label">คำนำหน้าชื่อ</label>
                    <div class="col-sm-4">
                        <select name="prefix" id="prefix" class="form-control" required>
                            <?php
                            $sql_prefix = "SELECT * FROM prefix ORDER BY pref_id";
                            $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
                            while ($r = mysql_fetch_array($query_prefix)) {
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
                    <label class="col-sm-2 control-label">หมู่บ้าน</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="alley" name="alley" placeholder="หมู่บ้าน" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ที่อยู่</label>
                    <div class="col-sm-10">
                        <textarea  id="address" class="form-control" rows="4" name="address" placeholder="ที่อยู่" required=""></textarea>
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
                        <select name="province" id="province" class="form-control" required>
                            <?php
                            $sql_province = "SELECT * FROM province ORDER BY prov_name";
                            $query_province = mysql_query($sql_province) or die(mysql_error());
                            while ($r = mysql_fetch_array($query_province)) {
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
                        <button type="button" class="btn btn-danger" onclick="clearRegisterForm()">ล้างข้อมูล</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="panel-footer"></div>
</div>
<script type="text/javascript">
                            function checkPassword() {
                                var password1 = $('#password').val();
                                var password2 = $('#repassword').val();
                                if (checkLengthPassword()) {
                                    return false;
                                }
                                if (password1 !== password2) {
                                    alert('กรุณากรอก password ให้ตรงกัน');
                                    return false;
                                }

                                return true;
                            }
                            function checkLengthPassword() {
                                var passLength = 8;
                                var password1 = $('#password').val();
                                var password2 = $('#repassword').val();
                                if (password1.length < passLength) {
                                    alert('กรุณากรอก ความยาว ' + passLength + ' ตัวอักษร');
                                    return false;
                                }
                                if (password2.length < passLength) {
                                    alert('กรุณากรอก ความยาว ' + passLength + ' ตัวอักษร');
                                    return false;
                                }
                                return true;
                            }
                            function clearRegisterForm() {
                                $('#register-form')[0].reset();
                            }
                            function checkRegisterForm(){
                                var user = $('#username').val();
                                var pass = $('#password').val();
                                var repassword = $('#repassword').val();
                                var prefix = $('#prefix').val();
                                var fname = $('#fname').val();
                                var lname = $('#lname').val();
                                var idcard = $('#idcart').val();
                                var birth = $('#birthdate').val();
                                var moo = $('#alley').val();
                                var address = $('#address').val();
                                var tumbon = $('#district').val();
                                var umpur = $('#prefecture').val();
                                var province = $('#province').val();
                                var tel = $('#tel').val();
                                var email = $('#email').val();
                            }
</script>