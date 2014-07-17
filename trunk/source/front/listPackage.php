<?php
include '../../config/Database.php';
$db = new Database();
$db->select('package', '*', '1=1', 'pac_id asc');
$result = $db->getResults();
?>
<script type="text/javascript">
    $(function() {
        $('.linkDialog').click(function() {
            var id = $(this).attr('id');
            var url = 'd_packageSet.php';

            showUrlInDialog(url, id);
        });
    });
    function showUrlInDialog(url, id) {
        var tag = $("<div></div>");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                tag.html(data).dialog({
                    modal: true,
                    width: 700,
                    height: 500,
                    position: ['center', 100],
                    buttons: {
                        "ปิดหน้าต่าง": function() {
                            $(this).dialog("close");
                            window.location = "index.php?page=o-pk";
                        },
                    }
                }).dialog('open');
            }
        });
    }
</script>

<div class="box_header">
    <span>สินค้าทั้งหมดในตะกร้าที่ สั่งจอง</span>
</div>
<div class="box_body">
    <table>
        <?php
        $index = 0;
        foreach ($result as $r) {
            if ($index == 0) {
                echo "<tr>";
            }
            echo "<td>";
            echo "<div class=\"box_img\">";
            echo "<div class=\"box_img-header\">";
            echo $r['pac_name'];
            echo "</div>";
            echo "<div class=\"box_img-body\">";
            echo "<img src='" . $r['pac_img'] . "'>";
            echo "</dvi>";
            echo "<div class=\"box_img-footer\">";
            echo "<a href=\"#\" class=\"linkDialog\" id='".$r['pac_id']."'>";
            echo "<button id=\"btChoose\" class=\"btn-primary\">เลือก</button>";
            echo "</a>";
            echo "</div>";
            echo "</div>";
            echo "</td>";

            if ($index == 3) {
                echo "</tr>";
            }
            $index++;
        }
        ?>
    </table>
</div>
<div class="dialog" title="เลือก" style="display: none;">
    <p>เลือกจอง</p>
</div>
