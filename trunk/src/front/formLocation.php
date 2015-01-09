<?php
include '../../config/connect.php';
$person = $_SESSION['object'];
?>
<form class="form-horizontal" action="_location.php" method="post">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <a class="btn btn-primary" href="index.php?page=c">
                <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ
            </a>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 label-rigth">ข้อมูล</label>
                <div class="col-sm-8 input-group">
                    <div class="input-group-addon">ชื่อจริง</div>
                    <input type="text" class="form-control" name="fname" value="<?= $person['pers_fname'] ?>" required/>
                    <div class="input-group-addon">นามสกุล</div>
                    <input type="text" class="form-control" name="lname" value="<?= $person['pers_lname'] ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">วันที่จอง</label>
                <div class="col-sm-4 input-group">
                    <div class="input-group-addon">วันที่</div>
                    <input type="text" class="form-control" name="day" id="day" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">เวลา ใช้งาน</label>
                <div class="col-sm-4 input-group">
                    <div class="input-group-addon">เริ่ม</div>
                    <input type="time" class="form-control" name="time1"  required/>
                    <div class="input-group-addon">ถึง</div>
                    <input type="time" class="form-control" name="time2" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">เวลา ใช้งาน</label>
                <div class="col-sm-4 input-group">
                    <div class="input-group-addon">ชาย</div>
                    <input type="number" class="form-control" name="male"  required/>
                    <div class="input-group-addon">หญิง</div>
                    <input type="number" class="form-control" name="female" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">สถานที่</label>
                <div class="col-sm-8 input-group">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">เลือก</th>
                                <th>รหัส</th>
                                <th>ชื่อ</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_loca = "SELECT * FROM location";
                            $query_location = mysql_query($sql_loca) or die(mysql_error());
                            while ($row = mysql_fetch_array($query_location)) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="location[]" 
                                               id="<?= $row['loc_price'] ?>"
                                               onclick="sumMoneyByCheck(this,<?= $row['loc_id'] ?>,<?= $row['loc_price'] ?>)"
                                               class="form-control" value="<?= $row['loc_id'] ?>"/>
                                    </td>
                                    <td><?= $row['loc_id'] ?></td>
                                    <td><?= $row['loc_name'] ?></td>
                                    <td><?= $row['loc_price'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>หมายเหตุ อื่น ๆ ระบุ </th>
                                <th colspan="3">
                                    <textarea name="location_other" rows="3" class="form-control"></textarea>
                                </th>
                            </tr>
                        </tfoot>
                    </table>   
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">จ่ายเงินมัดจำ</label>
                <div class="col-sm-3 input-group">                    
                    <input type="number" name="deposit" class="form-control" value="0" required onchange="sumDeposit(this)"/>
                    <div class="input-group-addon">บาท</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 label-rigth">ค่า ใช้จ่าย รวม</label>
                <div class="col-sm-3 input-group">                    
                    <input type="text" id="total" readonly="true" class="form-control" name="price" value="<?= $_SESSION['total_price'] ?>" required/>
                    <div class="input-group-addon">บาท</div>
                </div>
            </div>          
            <div class="form-group">
                <div class="col-sm-2 label-rigth">                    
                    <input type="checkbox" name="" onclick="confirmOrder(this)"/>
                </div>          
                <label class="col-sm-10 label-left">
                    เลือกได้ 2 สถานที่ เลือกในจังหวัดสระแก้ว ...
                </label>
            </div>
        </div>
        <div class="panel-footer label-center">
            <button class="btn btn-primary" id="btn-confirm" disabled="true" onclick="return confirm('ยืนยันการ สั่งจอง การถ่ายภาพ ใช่ หรือ ไม่')">
                <i class="glyphicon glyphicon-ok"></i> ยืนยันการ บันทึก
            </button>
        </div>
    </div>
</form>
<script type="text/javascript">
                                               $(function() {
                                                   //jqueryMutiSelect('location');
                                                   datePicker1Day();
                                               });
                                               function sumMoneyByCheck(element, id, price) {
                                                   var total = $('#total').val();
                                                   var check = element.checked;
                                                   if (element.checked) {
                                                       total = parseInt(total) + parseInt(price);
                                                   } else {
                                                       total = parseInt(total) - parseInt(price);
                                                   }
                                                   //alert('element : ' + check + '\n id : ' + id + '\n price : ' + price);
                                                   $('#total').val(total);
                                               }
                                               function confirmOrder(element) {
                                                   if (element.checked) {
                                                       $('#btn-confirm').attr('disabled', false);
                                                   } else {
                                                       $('#btn-confirm').attr('disabled', true);
                                                   }
                                               }
                                               function sumDeposit(element) {
                                                   var value = element.value;
                                                   var total = $('#total').val();
                                                   if (parseInt(value)) {
                                                       total = parseInt(total) - parseInt(value);
                                                   } else {
                                                       alert('กรุณากรอก ตัเลข');
                                                   }
                                                   $('#total').val(total);
                                               }
</script>
