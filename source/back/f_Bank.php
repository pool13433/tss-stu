<?php 
    include '../../config/Database.php';
    include '../../config/Html.php';
    $db = new Database();
    $html = new Html();
    
    // update 
    
    $db->select('bank', '*','bank_id ='.$_GET['id'] );
    $result = $db->getResults();
?>
<div class="box_header">

</div>
<div class="box_body">
    <form action="_bank.php?method=i" method="post">
        <fieldset>
            <legend></legend>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label>ชื่อ ธนาคาร</label></td>
                        <td>
                            <input name="bank" class="form-control" type="text" value="<?php echo $result['bank_name'] != '' ? $result['bank_name'] : '' ?>"/>
                            <input type="hidden" name="id" value="<?php echo$result['bank_id'];?>"/>
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
