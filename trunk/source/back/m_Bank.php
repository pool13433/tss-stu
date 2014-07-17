
<?php
include '../../config/Database.php';
$db = new Database();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                    url: "_bank.php?method=d",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data, textStatus, jqXHR)
                    {
                        //alert(data)
                        window.location = "index.php?page=b";
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {

                    }
                });
            }
        </script>
    </head>
    <body>

        <div class="box_header">
            <span>จัดการธนาคาร</span><br/>
            <span><a href="index.php?page=f-b"><input type="button" class="btn-success" value="เพิ่มข้อมูล"/></a></span>
        </div>
        <div class="box_body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ชื่อ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db->select('bank','*','1=1','bank_id ASC');
                    $result = $db->getResults();
                    foreach ($result as $r) {
                        ?>
                        <tr>
                            <td><?php echo $r['bank_id']; ?></td>
                            <td><?php echo $r['bank_name']; ?></td>
                            <td><a href="index.php?page=f-b&id=<?php echo $r['bank_id']; ?>">
                                    <input id="bt-e" type="button" class="btn-info" value="แก้ไข"/>
                                </a>
                            </td>
                            <td>
                                <input  type="button" class="btn-danger" value="ลบ" name="<?php echo $r['bank_id']; ?>" />
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="dialog" title="ยืนยันการลบ" style="visibility: hidden">
            <p>ยืนยันการลบ</p>
        </div>
    </body>
</html>
        


