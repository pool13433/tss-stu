<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

// update 

$db->select('package', '*', '1=1','pac_id ASC');
$comboPackage = $db->getResults();

$db->select('package_set', '*', 'pacset_id =' . $_GET['id']);
$r = $db->getResults();

?>
<div class="box_header">

</div>
<div class="box_body">
    <form action="_packageSet.php?method=i" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend></legend>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label>ชื่อ package</label></td>
                        <td>
                            <input name="pks_name" class="form-control" type="text" value="<?php echo $result['pac_name'] != '' ? $result['pac_name'] : '' ?>"/>
                            <input type="hidden" name="id" value="<?php echo$result['pac_id']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label>กลุ่ม แพ็คเก็ต </label></td>
                        <td>
                            <select name="package" multiple="2" class="form-control">
                            <?php 
                                foreach ($comboPackage as $p){
                                      echo "<option value='".$p['pac_id']."'>".$p['pac_name']."</option>";
                                }
                            ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>ราคา ชุดแพ็คเก็ต</label></td>
                        <td>
                            <input name="pks_price" class="form-control" type="text" value="<?php echo $result['pac_name'] != '' ? $result['pac_name'] : '' ?>"/>
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
