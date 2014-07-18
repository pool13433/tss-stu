<?php
@ob_start();
@session_start();
include '../../config/connect.php';
?>
<div class="panel panel-info">
    <div class="panel-heading">เพิ่มสมาชิก</div>
    <div class="panel-body">
        <form class="form-horizontal" name="person-form" id="person-form">

            <!-- user , pass-->
            <div class="row">
                <div class="col-md-2" style="text-align: right;">
                    <img src="../../images/icon/Key-icon128x128.png" class="img-thumbnail alert-warning"/>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label class="col-md-1 label-rigth" for="">UserName</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="username" id="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 label-rigth" for="">Password</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="password" id="password"/>
                        </div>
                    </div>
                    <div class="form-group label-rigth">
                        <label class="col-md-1" for="">RePassword</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="repassword" id="repassword"/>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!--user , data profile-->
                <div class="form-group">
                    <label class="col-md-1 label-rigth" for="">คำนำหน้า</label>
                    <div class="col-md-2">          
                        <select name="prefix" id="prefix" class="form-control">
                            <?php
                            $sql_prefix = "SELECT * FROM prefix ORDER BY pref_name";
                            $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
                            while ($row = mysql_fetch_array($query_prefix)) {
                                ?>
                                <option value="<?= $row['pref_id'] ?>"><?= $row['pref_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 label-rigth" for="">ชื่อ</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="fname" id="fname" required/>
                    </div>
                    <label class="col-md-1 label-rigth" for="">นามสกุล</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="lname" id="lname" required/>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer"></div>
</div>