<script type="text/javascript">
    $(function() {
        $('.a_comment').click(function() {
            var id = $(this).attr('id');
            //alert("id"+id);
            $('.ul_comment' + id).css({display: "block"});
        });
        saveComment();
        savePost();

    });
    function saveComment(id) {
        $('button.btn-primary').click(function() {
            var id = $(this).val();
            var message = $('#message' + id + '').val();
            //alert("id==>>"+id);
            //alert("message===>>>" + message);

            if (message != "") {
                if (confirm("ยืนยันการแสดงความคิดเห็น")) {
                    var url = "_comment.php";
                    sendAjax(id, message, url);
                } else {
                    return false;
                }
            } else {
                alert("กรุณากรอกข้อมูล เพื่อแสดงความคิดเห็น");
                return false;
            }
        });
    }
    function savePost() {
        $('#btnPost').click(function() {
            var message = $('#post_message').val();
            if (message != "") {
                if (confirm("ยืนยันการโพสต์")) {
                    var url = "_post.php";
                    sendAjax(0, message, url);
                } else {
                    return false;
                }
            } else {
                alert("กรุณากรอกข้อมูลก่อนการโพสต์");
                return false;
            }
        });
    }
    function showUrlInDialog(url, id) {
        var tag = $("<div></div>");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                tag.html(data).dialog({
                    modal: true,
                    width: 600,
                    height: 450,
                    position: ['center', 10],
                    buttons: {
                        "ปิดหน้าต่าง": function() {
                            $(this).dialog("close");
                            window.location.reload();
                        },
                    }
                }).dialog('open');
            }
        });
    }
    function sendAjax(id, message, url) {
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
                message: message
            },
            success: function(data, textStatus, jqXHR)
            {
                //alert(data);
                if (data) {
                    window.location = 'index.php?page=i-i';
                } else {
                    alert("บันทึกข้อมูลไม่สำเร็จ");
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                //alert(jqXHR.toString());
                window.location = 'index.php?page=i-i';
            }
        });
    }
    function dialogConfirm(message) {
        $('<div title="ยืนยัน">' + message + '</div>').dialog({
            height: 220,
            modal: true,
            position: ['center', 100],
            buttons: {
                OK: function() {
                    $(this).dialog("close");
                },
                CANCEL: function() {
                    $(this).dialog("close");
                }
            }
        });
    }
</script>
<span class="col-md-12" style="font: 18px;color: blue;">วันนี้จะโพสต์ไรดี ? </span>
<div class="row" style="padding-top: 20px;">
    <div class="col-md-1"></div>
    <div class="col-md-9">
        <textarea style="width: 95%;" rows="3" id="post_message" placeholder="กรอกข้อความ"></textarea>
    </div>
    <div class="col-md-2">
        <button type="" id="btnPost" class="btn-success" >โพสต์ข้อความ</button>
    </div>
</div>
<?php
include '../config/connect.php';

$sqlPost = " SELECT * FROM webboard_post ORDER BY post_id DESC";
$qPost = mysql_query($sqlPost) or die(mysql_error() . "sql==>>" . $sqlPost);
$rowPost = mysql_numrows($qPost) or die(mysql_error());
while ($rPost = mysql_fetch_array($qPost)) {
    ?>
    <div class="webboard" id="webboard">
        <ul >
            <li class="li_post">
                <div class="row">
                    <div class="col-md-2">รูป :: <?php echo "Picture"; ?></div>
                    <div class="col-md-10">
                        <span class="col-sm-12" style="width: 200px;">
                            ข้อความ :: 
                                <?php
                                        echo $rPost['post_message']; ?>
                        </span>
                        <span class="col-sm-12">
                            วันที่โพสต์ :: [ <?php echo $rPost['post_createdate']; ?> ]
                        </span>
                    </div>
                </div>
            </li>
            <li><a title="comment" href="#" class="a_comment" id="<?php echo $rPost['post_id']; ?>">comment</a></li>
            <li>
                <ul class="ul_comment<?php echo $rPost['post_id']; ?>" style="display: none;">
                    <li>
                        <div class="row">

                            <div class="col-md-9">
                                <input type="hidden"  name="comment_id<?php echo $rPost['post_id']; ?>" value="<?php echo $rPost['post_id']; ?>"/>
                                <textarea style="width: 95%;" rows="2" id="message<?php echo $rPost['post_id']; ?>"></textarea>
                            </div>
                            <div class="col-md-2">
                                <button  class="btn-primary" name="btnSubmit"  value="<?php echo $rPost['post_id']; ?>">แสดงความคิดเห็น</button>
                            </div>

                        </div>
                    </li>
                    <?php
                    $sqlComment = " SELECT * FROM webboard_comment WHERE post_id = " . $rPost['post_id'];
                    $sqlComment .= " ORDER BY comment_id DESC";
                    $qComment = mysql_query($sqlComment) or die(mysql_error() . "sql===>>" . $sqlComment);
                    while ($rComment = mysql_fetch_array($qComment)) {
                        ?>
                        <li class="li_comment">
                            <div class="row">
                                <div class="col-md-2">
                                    <?php echo $rComment['comment_id'] ?>
                                </div>
                                <div class="col-md-10">
                                    <span class="col-sm-12">
                                        <?php echo $rComment['comment_message'] ?>
                                    </span>
                                    <span class="col-sm-12">
                                        <?php echo $rComment['comment_createdate'] ?>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
    <hr/>
    <?php
}
?>