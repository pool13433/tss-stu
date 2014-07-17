<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

// update 

$db->select('product', '*', 'prod_id =' . $_GET['id']);
$result = $db->getResults();
?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
<script type="text/javascript">
    $(function() {
        $('#form :input').submit(function() {
            var res = true;
            // here I am checking for textFields, password fields, and any 
            // drop down you may have in the form
            $("input[type='text'],select,input[type='password']", this).each(function() {
                if ($(this).val().trim() == "") {
                    res = false;
                    error();
                }
            });
            return res; // returning false will prevent the form from submitting.
        });
    });
     function error() {
        $('.dialog').dialog({
            height: 140,
            modal: true,
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
    }
    // just for the demos, avoids form submit
</script>
<div class="box_header">
    <span>กรุณากรอกข้อมูล</span>
</div>
<div class="box_body">
    <form action="_product.php?method=i" id="form" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend></legend>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label>ชื่อ สินค้า</label></td>
                        <td>
                            <input name="p_name" class="form-control" type="text" value="<?php echo $result['prod_name'] != '' ? $result['prod_name'] : '' ?>"/>
                            <input type="hidden" name="id" value="<?php echo$result['prod_id']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label>โค๊ด สินค้า</label></td>
                        <td>
                            <input name="p_code" class="form-control" type="text" value="<?php echo $result['prod_code'] != '' ? $result['prod_code'] : '' ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label>รูป สินค้า ["gif", "jpeg", "jpg", "png"]</label></td>
                        <td>
                            <input name="file" class="form-control" type="file" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>ราคา สินค้า</label></td>
                        <td>
                            <input name="p_price" class="form-control" type="text" value="<?php echo $result['prod_price'] != '' ? $result['prod_price'] : '' ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึก" class="btn-success"/></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
</div>
<div class="dialog" title="ยืนยันการลบ" style="visibility: hidden;">
    <p>ยืนยันการลบ</p>
</div>
