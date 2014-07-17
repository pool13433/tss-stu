<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

// update 

$db->select('package', '*', 'pac_id =' . $_GET['id']);
$result = $db->getResults();
?>
<div class="box_header">

</div>
<div class="box_body">
    <form action="_package.php?method=i" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend></legend>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label>ชื่อ package</label></td>
                        <td>
                            <input name="pk_name" class="form-control" type="text" value="<?php echo $result['pac_name'] != '' ? $result['pac_name'] : '' ?>"/>
                            <input type="hidden" name="id" value="<?php echo$result['pac_id']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label>รูป สินค้า ["gif", "jpeg", "jpg", "png"]</label></td>
                        <td>
                            <input name="file" class="form-control" type="file" />
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
