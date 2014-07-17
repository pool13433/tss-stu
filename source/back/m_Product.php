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
            url: "_product.php?method=d",
            type: "POST",
            data: {
                id: id,
            },
            success: function(data, textStatus, jqXHR)
            {
                //alert(data)
                window.location = "index.php?page=p";
            },
            error: function(jqXHR, textStatus, errorThrown)
            {

            }
        });
    }
</script>
<div class="box_header">
    <span>จัดการสินค้า</span><br/>
    <span><a href="index.php?page=f-p"><input type="button" class="btn-success" value="เพิ่มข้อมูล"/></a></span>
</div>
<div class="box_body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>รูป</th>
                <th>โค๊ด</th>
                <th>ชื่อ</th>
                <th>ราคา</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db->select('product','*','1=1','prod_id ASC');
            $result = $db->getResults();
            foreach ($result as $r) {
                ?>
                <tr>
                    <td><?php echo $r['prod_id'] ?></td>
                    <td>
                        <div class="img-style"><img  src="<?php echo $r['prod_img'] ?>"/>
                        </div>
                    </td>
                    <td><?php echo $r['prod_code'] ?></td>
                    <td><?php echo $r['prod_name'] ?></td>
                    <td><?php echo $r['prod_price'] ?></td>
                    <td><a href="index.php?page=f-b&id=<?php echo $r['prod_id']; ?>">
                            <input id="bt-e" type="button" class="btn-info" value="แก้ไข"/>
                        </a>
                    </td>
                    <td>
                        <input  type="button" class="btn-danger" value="ลบ" name="<?php echo $r['prod_id']; ?>" />
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
