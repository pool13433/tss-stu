
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
                    url: "_person.php?method=d",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data, textStatus, jqXHR)
                    {
                        alert(data);
                        window.location = "index.php?page=m";
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
            <span>จัดการผู้ใช้งาน</span><br/>
            <span><a href="index.php?page=f-m"><input type="button" class="btn-success" value="เพิ่มข้อมูล"/></a></span>
        </div>
        <div class="box_body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ที่อยู่</th>
                        <th>จังหวัด</th>
                        <th>โทร</th>
                        <th>อีเมลล์</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db->select('person','*','1=1','pers_id ASC');
                    $result = $db->getResults();
                    foreach ($result as $r) {
                        ?>
                        <tr>
                            <td><?php echo $r['pers_id']; ?></td>
                            <td>
                                <?php 
                                    $db->select("prefix", "*", "pref_id = ".$r['pref_id']);
                                    $p = $db->getResults();
                                    echo $p['pref_name'];
                                ?>
                            </td>
                            <td><?php echo $r['pers_fname']; ?></td>
                            <td><?php echo $r['pers_lname']; ?></td>
                            <td><?php 
                                    echo $r['pers_address'].$r['pers_alley'].$r['pers_district'].
                                        $r['pers_prefecture'].$r['pers_postcode']; 
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $db->select("province","*", "prov_id = ".$r['prov_id']);
                                    $pv = $db->getResults();
                                    echo $pv['prov_name'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $r['pers_phone'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $r['pers_email'];
                                ?>
                            </td>
                            <td><?php 
                                    if($r['persta_id']==1){
                                        echo "Admin";
                                    }else{
                                        echo "Customer";
                                    }
                                ?>
                            </td>
                            <td><a href="index.php?page=f-m&id=<?php echo $r['pers_id']; ?>">
                                    <input id="bt-e" type="button" class="btn-info" value="แก้ไข"/>
                                </a>
                            </td>
                            <td>
                                <input  type="button" class="btn-danger" value="ลบ" name="<?php echo $r['pers_id']; ?>" />
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