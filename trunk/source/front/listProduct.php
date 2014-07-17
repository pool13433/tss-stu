<?php
include '../../config/Database.php';
$db = new Database();
?>
<script type="text/javascript">
    $(function() {
        $('.btn-success').click(function() {
            var id = $(this).attr('name');
            $('.dialog').dialog({
                height: 140,
                modal: true,
                position: ['center', 100],
                buttons: {
                    "จอง": function() {
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
        var typeItem = 'item_pro';
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
    }
</script>
<div class="box_header">
    <span>สินค้าในร้าทั้งหมด</span>
</div>
<div class="box_body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>รหัส</th>
                <th></th>
                <th>ชื่อ</th>
                <th>ราคา</th>
                <th>วันที่สร้าง</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db->select('product');
            $result = $db->getResults();
            foreach ($result as $r) {
                ?>
                <tr>
                    <td><?php echo$r['prod_id'] ?></td>
                    <td>
                        <div class="img-style">
                            <img src="<?php echo$r['prod_img'] ?>"/>
                        </div>
                    </td>
                    <td><?php echo$r['prod_name'] ?></td>
                    <td><?php echo$r['prod_price'] ?></td>
                    <td><?php echo$r['prod_createdate'] ?></td>
                    <td><button class="btn-success" name="<?php echo$r['prod_id']; ?>">สั่งจอง</button></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="dialog" title="สั่งจอง" style="visibility: hidden"></div>

