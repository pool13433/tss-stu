<?php
include '../../config/connect.php';
$sql = "SELECT * FROM package_set WHERE pac_id =" . $_POST['id'];
$sql .= " ORDER BY pac_id ASC";
$query = mysql_query($sql) or die(mysql_error() . "sql==>" . $sql);
?>
<script type="text/javascript">
    $(function() {
        $('.btn-success').hide();
        $('select#packageset').change(function() {
            var id = $(this).val();
            //alert("id===="+id);
            if (id != "") {
                sendAjax(id);
            } else {
                $('#tbodyResult').children().remove();
                $('.btn-success').hide();
            }
        });
        $('.btn-success').click(function() {
            var typeItem = 'item_pac';
            var id = $(this).attr('name');
            $.ajax({
                url: "_cart.php?method=a",
                type: "POST",
                data: {
                    id: id,
                    typeItem: typeItem,
                },
                success: function(data, textStatus, jqXHR)
                {
                    //alert(data);
                    window.location = 'index.php?page=c';
                },
                error: function(jqXHR, textStatus, errorThrown)
                {

                }
            });
        });
    });
    function sendAjax(id) {

        //alert("id===>>" + id);
        $.ajax({
            url: "_packageSet.php",
            type: "POST",
            data: {
                id: id,
            },
            success: function(data, textStatus, jqXHR)
            {
                //alert(data);
                $('#tbodyResult').children().remove();
                var arr = JSON.parse(data);
                $.each(arr, function(idx, obj) {
                    var chile = "<tr>";
                    chile += "<td>" + obj.setd_id + "</td>";
                    chile += "<td>" + obj.pacset_id + "</td>";
                    chile += "<td>" + obj.setd_imgsize + "</td>";
                    chile += "<td>" + obj.setd_number + "</td>";
                    chile += "</tr>";
                    $('#tbodyResult').append(chile);
                });
                $('.btn-success').attr('name', id);
                $('.btn-success').show();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {

            }
        });
    }
</script>
<div class="box_header">

</div>
<div class="box_body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>เลือกรูปแบบแพ็คเก็ต</th>
                <th>รายละเอียด</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select id="packageset" name="packageset" style="width: 200px;">
                        <option value="">เลือก</option>
                        <?php
                        while ($r = mysql_fetch_array($query)) {
                            echo "<option value='" . $r['pacset_id'] . "'>" . $r['pacset_name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <table class="table table-striped" id="tableResult">
                        <thead>
                            <tr>
                                <td>รหัส</td>
                                <td>รหัส</td>
                                <td>ขนาด</td>
                                <td>จำนวน</td>
                            </tr>
                        </thead>
                        <tbody id="tbodyResult">

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button class="btn-success" name="">เลือกจอง</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="dialog_empty" style="display: none;">
    <p>ไม่พบข้อมูลที่ค้นหา</p>
</div>

