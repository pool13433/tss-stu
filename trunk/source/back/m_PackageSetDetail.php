<?php
include '../../config/Database.php';
$db = new Database();
?>
<script type="text/javascript">
    $(function() {
        $(".btn-danger").click(function() {
            var id = $(this).attr('name');
            $('.dialog').dialog({
                height: 140,
                modal: true,
                position: ['center', 100],
                buttons: {
                    "ลบ": function() {
                        //$(this).dialog("close");
                        sendAjax(id);
                    },
                    "ยกเลิก": function() {
                        $(this).dialog("close");
                    }
                }
            });
        });
    });
    function sendAjax(id) {
        $.ajax({
            url: "_packageSetDetail.php?method=d",
            type: "POST",
            data: {
                id: id,
            },
            success: function(data, textStatus, jqXHR)
            {
                //alert(data)
                window.location = "index.php?page=pksd";
            },
            error: function(jqXHR, textStatus, errorThrown)
            {

            }
        });
    }
</script>
<div class="box_header">
    <span>จัดการรายละเอียดกลุ่มแพ็คเก็ต</span><br/>
    <span><a href="index.php?page=f-pksd"><input type="button" class="btn-success" value="เพิ่มข้อมูล"/></a></span>
</div>
<div class="box_body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>กลุ่มแพ็คเก็ต</th>
                <th>ราคา</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db->select('package_set_detail','*','1=1','setd_id ASC');
            $result = $db->getResults();
            foreach ($result as $r) {
                ?>
                <tr>
                    <td><?php echo $r['setd_id'] ?></td>
                    <td><?php 
                            $db->select('package_set','pacset_name', 'pacset_id ='.$r['pacset_id']);
                            $p = $db->getResults();
                            echo $p['pacset_name'];
                          ?>
                    </td>
                    <td><?php echo $r['setd_imgsize'] ?></td>
                    <td><?php echo $r['setd_number'] ?></td>
                    <td><a href="index.php?page=f-pksd&id=<?php echo $r['setd_id']; ?>">
                            <input id="bt-e" type="button" class="btn-info" value="แก้ไข"/>
                        </a>
                    </td>
                    <td>
                        <input  type="button" class="btn-danger" value="ลบ" name="<?php echo $r['setd_id']; ?>" />
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="dialog" title="ยืนยันการลบ" style="visibility: hidden;">
        <p>ยืนยันการลบ</p>
    </div>
</div>
