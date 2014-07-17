<?php
@ob_start();
@session_start();
        include '../../config/Html.php';
        $html = new Html();
    if (empty($_SESSION['id'])&& !isset($_SESSION['id'])) {
            echo "<script>alert('กรุณา login ก่อน);</script>";
            $html->redirect('../index.php?page=l');
    }
?>
<script type="text/javascript">
    $(function() {
        $('#linkLogout').click(function() {
            $('#dialog_logout').dialog({
                height: 140,
                modal: true,
                position: ['center', 100],
                buttons: {
                    "Logout Now": function() {
                        sendAjax();
                    },
                    "Cancle": function() {
                        $(this).dialog("close");
                    }
                }
            });
        });
        function sendAjax() {
            $.ajax({
                url: "_logout.php",
                type: "POST",
                data: {
                },
                success: function(data, textStatus, jqXHR)
                {
                    //alert(data);
                    var arr = JSON.parse(data);
                    if (arr.status) {
                        window.location = '../index.php';
                    } else {
                        $('.dialog_fail').dialog({
                            height: 140,
                            modal: true,
                            position: ['center', 100],
                            buttons: {
                                "Cancle": function() {
                                    $(this).dialog("close");
                                }
                            }
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown)
                {

                }
            });
        }
    });
</script>
<div class="box">
    <div class="box_header">
        <span>Profile</span>
    </div>
    <div class="box_body">
        <div class="box_small">
            FirstName :: <?php echo $_SESSION['username']?>
        </div>
        <div class="box_small">
            LastName :: <?php echo $_SESSION['password']?>
        </div>
        <div class="box_small">
            Status :: <?php echo $_SESSION['status']?>
        </div>
    </div>
    <div class="box_header">
        <span>Menu</span>
    </div>
    <div class="box_body">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="index.php?page=pf"><img src="../../images/icon/User-icon.png"/>_ประวัติส่วนตัว</a></li>
            <li><a href="index.php?page=pd"><img src="../../images/icon/Favorites-icon.png"/>_สินค้า</a></li>
            <li><a href="index.php?page=ot"><img src="../../images/icon/Configuration-icon.png"/>_รูปแบบบริการ</a></li>
            <li><a href="index.php?page=c"><img src="../../images/icon/Shopping-Cart-icon.png"/>_ตะกร้า</a></li>
            <li><a href="index.php?page=od"><img src="../../images/icon/Document-icon.png"/>_ใบจอง</a></li>
            <li><a href="index.php?page=rp"><img src="../../images/icon/Document-icon.png"/>_ออกรายงาน</a></li>
            <li><button class="btn-danger" id="linkLogout">ออกจากระบบ</button></li>
        </ul>
    </div>
</div>

<div id="dialog_logout" title="Confirm Logout System" style="visibility: hidden">
    <p></p>
</div>
<div class="dialog_fail" title="Logout fail Plase Contact Administrator Now" style="visibility: hidden">
    <p></p>
</div>
