<?php 
    include '../../config/Database.php';
    include '../../config/Html.php';
    $db = new Database();
    $html = new Html();
    
    // update 
    
    $db->select('location', '*','loc_id ='.$_GET['id'] );
    $result = $db->getResults();
?>
<div class="box_header">

</div>
<div class="box_body">
    <form action="_location.php?method=i" method="post">
        <fieldset>
            <legend></legend>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label>ชื่อ สถานที่</label></td>
                        <td>
                            <input name="l_name" class="form-control" type="text" value="<?php echo $result['loc_name'] != '' ? $result['loc_name'] : '' ?>"/>
                            <input type="hidden" name="id" value="<?php echo$result['bank_id'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label>ราคา สถานที่</label></td>
                        <td>
                            <input name="l_price" class="form-control" type="text" value="<?php echo $result['loc_price'] != '' ? $result['loc_price'] : '' ?>"/>
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
