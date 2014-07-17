<?php
include '../../config/Database.php';
$db = new Database();
$db->select('location', '*', '1=1', 'loc_id ASC');
$result = $db->getResults();
?>
<script type="text/javascript">
    $(function() {
        $('#use_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
        });
        cal();
        accept();
        $('#btAccept').click(function (){
            var useDate = $('#use_date').val();
            if($('#use_date').val().length ==0){
                alert("กรุณากรอก วันที่นัดถ่าย");
                return false;
            }else if($('#use_time').val().length ==0){
                alert("กรุณากรอก เวลานัดถ่าย");
                return false;
            }else if($('#male').val().length ==0){
                alert("กรุณากรอก จำนวนชาย");
                return false;
            }else if($('#fermale').val().length ==0){
                alert("กรุณากรอก จำนวนหญิง");
                return false;
            }else{
                //alert('order_id===>>'+$('input[name=order]').val());
                if(confirm("ยืนยันการสั่งจอง")){
                    submit();
                }else{
                    return false;
                }
               // return true;
            }
        });
    });
    
    function accept() {
        $('#btAccept').attr("disabled", true);
        $('#chkAccept').click(function() {
            if ($(this).prop("checked")) {
                $('#btAccept').attr("disabled", false);
            } else {
                $('#btAccept').attr("disabled", true);
            }
        });
    }
    function submit() {
        var order_id = $('input[name=order]').val();
        //alert('order_id'+order_id);
        var u_id = $('#u_id').val();
        var u_name = $('#u_name').val();
        var use_date = $('#use_date').val();
        var use_time = $('#use_time').val();
        var arrLoc = [];
        var male = $('#male').val();
        var fermale = $('#fermale').val();
        var total_price = $('#totalprice').val();
        var total_deposit = $('#totaldeposit').val();

        $('input[type=checkbox][name=location]').each(function() {
            var loc_id = $(this).attr('id');
            if ($(this).prop("checked")) {
                arrLoc.push(loc_id);
            }
        });
            //        alert("arrloc.size==>>"+arrLoc.length);
            //        for(var i = 0;i < arrLoc.length;i++){
            //            alert('loc===>>id==>>'+arrLoc[i]);
            //        }
        var arrOrder = [];
        arrOrder.push(order_id); // index 0
        arrOrder.push(u_id); // index 1
        arrOrder.push(u_name); // index 2
        arrOrder.push(use_date); // index 3
        arrOrder.push(use_time); // index 4
        arrOrder.push(male); // index 5
        arrOrder.push(fermale); // index 6
        arrOrder.push(total_price); // index 7
        arrOrder.push(total_deposit); // index 8
        
        sendAjax(arrOrder,arrLoc);
    }
    function sendAjax(arrOrder,arrLocation) {
        //alert('send Ajax');
        $.ajax({
            url: "_location.php",
            type: "POST",
            data: {
                arrOrder: arrOrder,
                arrLocation:arrLocation,
            },
            success: function(data, textStatus, jqXHR)
            {
                //alert(data);
                if(data){
                    window.location = "index.php?page=od";
                }else{
                    alert('จองไม่สำเร็จ กรุณาติดต่อร้าน');
                }
                //window.location = "index.php?page=b";
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                alert(jqXHR);
            }
        });
    }
    function cal() {
        $('#totaldeposit').val(parseFloat($('#totalprice').val()) / 2);
        $('input[type=checkbox][name=location]').click(function() {
            var loc_id = $(this).attr('id');
            var loc_value = $(this).val();
            var price = $('#totalprice').val();
            var deposit = $('#totaldeposit').val();
            var total;
            if ($(this).prop("checked")) {
                //alert('check');
                total = parseFloat(price) + parseFloat(loc_value);
                $(this).parent().addClass("highlight");
            } else {
                //alert('not check');
                total = parseFloat(price) - parseFloat(loc_value);
                $(this).parent().addClass("highlight");
            }
            $('#totalprice').val(parseInt(total));
            $('#totaldeposit').val(parseInt(total) / 2);
            //alert('value==>>'+loc_id+" id==>>"+loc_value);
            
        });

    }
</script>
<div class="box_header">

</div>
<div class="box_body">
    <div class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-sm-2 control-label">รหัสใบจอง</label><div class="col-sm-1"></div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="order" value="<?php echo $_SESSION['order_id']; ?>" id="order" placeholder="รหัสใบสั่งจอง" readonly="true">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">รหัสผู้จอง</label><div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="u_id" name="u_id" value="<?php echo $_SESSION['id']; ?>" placeholder="ชื่อผู้จอง" readonly="true">
            </div>
            <label class="col-sm-2 control-label">ชื่อผู้จอง</label><div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="u_name" name="u_name" value="<?php echo $_SESSION['username']; ?>" placeholder="ชื่อผู้จอง" readonly="true">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">วันที่นัดถ่าย</label><label class="col-sm-1 control-label" style="color: red;">*</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="use_date" placeholder="วันที่นัดถ่าย" required="true">
            </div>
            <label class="col-sm-2 control-label">เวลานัดถ่าย</label><label class="col-sm-1 control-label" style="color: red;">*</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="use_time" placeholder="เวลานัดถ่าย" required="true">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">สถานที่</label><label class="col-sm-1 control-label" style="color: red;">*</label>
            <div class="col-sm-9">
                <div class="col-sm-12">
                    <label style="color: red;">*** การเลือกสถานที่ ต้องดูตามความเหมาะสม ความใกล้ ไกล</label>
                </div>
                <table class="table table-striped">
                    <tbody>
                        <?php
                        $index = 0;
                        foreach ($result as $r) {
                            if ($index == 0) {
                                echo "<tr>";
                            }
                            echo "<td>";
                            echo "<div style=\"text-align: center;border: 1px red solid;\">";
                            echo "<div>";
                            echo "<p>" . $r['loc_name'] . "</p>";
                            echo "</div>";
                            echo "<div>";
                            echo "<p>" . $r['loc_price'] . "</p>";
                            echo "</div>";
                            echo "<div class=\"div_check\" style=\"border-top: 2px solid blue;\">";
                            echo "<p><input type=\"checkbox\" id='" . $r['loc_id'] . "' value='" . $r['loc_price'] . "' name=\"location\"/></p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</td>";
                            if ($index == 6) {
                                echo "</tr>";
                                $index = 0;
                            }
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">จำนวนชาย</label><label class="col-sm-1 control-label" style="color: red;">*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="male" name="male" placeholder="จำนวนชาย" required="true">
            </div>
            <label class="col-sm-2 control-label">จำนวนหญิง</label><label class="col-sm-1 control-label" style="color: red;">*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="fermale" name="fermale" placeholder="จำนวนหญิง" required="true">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ยอดเงินรวม</label><div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="totalprice" name="totalprice" value="<?php echo $_POST['total']; ?>" placeholder="ยอดเงินรวม" readonly="true">
            </div>
            <label class="col-sm-2 control-label">ยอดมัดจำ</label><div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="totaldeposit" name="totaldeposit" placeholder="ยอดมัดจำ" readonly="true">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="checkbox" id="chkAccept" name="chkAccept"/>
                <label>ท่านยอมรับเงื่อนไขการสั่งจอง ของทางร้านเรียบร้อยแล้ว</label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="btAccept" class="btn btn-success">สั่งจอง</button>
            </div>
        </div>
    </div>
</div>
