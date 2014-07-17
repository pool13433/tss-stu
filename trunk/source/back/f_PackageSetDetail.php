<?php
include '../../config/Database.php';
include '../../config/Html.php';
$db = new Database();
$html = new Html();

// update 

$db->select('package_set', '*', '1=1', 'pacset_id ASC');
$comboPackageSet = $db->getResults();

$db->select('package_set_detail', '*', 'setd_id =' . $_GET['id']);
$r = $db->getResults();
?>
<div class="box_header">

</div>
<div class="box_body">
    <form action="_packageSetDetail.php?method=i" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend></legend>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label>กลุ่ม แพ็คเก็ต </label></td>
                        <td>
                            <select name="packageSet" multiple class="form-control">
                                <?php
                                foreach ($comboPackageSet as $p) {
                                    echo "<option value='" . $p['pacset_id'] . "'>" . $p['pacset_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>ขนาด</label></td>
                        <td>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input name="pksd1" class="input-group-sm" type="text" value=""/>
                                    X
                                    <input name="pksd2" class="input-group-sm" type="text" value=""/>   
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>ราคา ชุดแพ็คเก็ต</label></td>
                        <td>
                            <select name="pksd_no" multiple class="form-control">
                                <?php
                                    for ($i = 0; $i < 20; $i++) {
                                        echo "<option value='" . $i. "'>" . $i. "</option>";
                                    }
                                ?>
                            </select>
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
