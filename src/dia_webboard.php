<script type="text/javascript">
    $(function() {
        $('button').click(function() {
            var id = $('#post_id').val();
            var message = $('#post_message').val();
            if (message != ""){
                sendAjax(id,message);
            }else{
                alert("กรุณากรอกข้อมูล");
                return false;
            }
        });
    });
    function sendAjax(id, message) {
        $.ajax({
            url: "_webboard.php",
            type: "POST",
            data: {
                id: id,
                message: message
            },
            success: function(data, textStatus, jqXHR)
            {
                //alert(data);
                if (data) {
                    window.location.reload();
                } else {
                    alert("บันทึกข้อมูลไม่สำเร็จ");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
            }
        });
    }
</script>
<form>
    <div class="row">
        <input type="hidden" id="post_id" name="id" value="<?php echo $_POST['id'];?>"/>
        <textarea id="post_message" name="message" class="form-control" rows="3"></textarea>
    </div>
    <div class="row">
        <button type="button" class="btn btn-primary" name="post">Comment</button>
    </div>
</form>
