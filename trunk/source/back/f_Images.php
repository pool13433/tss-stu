<script type="text/javascript" src="../../js/jquery.uploadify.min.js"></script>
<link rel="stylesheet" href="../../css/uploadify.css"/>
<script type="text/javascript">
<?php $timestamp = time(); ?>
    $(function() {
        var targetFolder = $('#targetFolder').val();
        $('#file_upload').uploadify({
            'formData': {
                'timestamp': '<?php echo $timestamp; ?>',
                'token': '<?php echo md5('unique_salt' . $timestamp); ?>'
            },
            'swf': 'uploadify.swf',
            'uploader': '_images.php',
            'folder': '/stu/images/albums/'+ targetFolder,
        });
    });
</script>
<div class="box_header">
    เลือกรูป 
</div>
<div class="box_body">
    <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <p style="color: red;">** กรุณา เปลี่ยนชื่อ รูป เป็น อักษร อังกฤษ และตัวเลข (ห้ามเป็นตัวไทย เด็ดขาด)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">album</label>
            <div class="col-sm-3">
                <input id="targetFolder" name="targetFolder" class="form-control"/>
            </div>
            <div class="col-sm-5">
                <p>ชื่อ Album เป็น ภาษา English</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">เลือกรูป Muti file</label>
            <div class="col-sm-2">
                <form>

                    <div id="queue"></div>
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                </form>
            </div>
        </div>
    </div>


</div>
