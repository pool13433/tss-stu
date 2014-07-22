<?php
@ob_start();
@session_start();
?>
<ul class="list-group">
    <li class="list-group-item">
        <a href="index.php?page=pf"><img src="../../images/icon/User-icon.png"/>_ประวัติส่วนตัว</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=pd"><img src="../../images/icon/Favorites-icon.png"/>_สินค้า</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=ot"><img src="../../images/icon/Configuration-icon.png"/>_รูปแบบบริการ</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=c"><img src="../../images/icon/Shopping-Cart-icon.png"/>_ตะกร้า</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=od"><img src="../../images/icon/Document-icon.png"/>_ใบจอง</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=rp"><img src="../../images/icon/Document-icon.png"/>_ออกรายงาน</a>
    </li>
    <li class="list-group-item">
        <button class="btn btn-danger" onclick="return logoutUser()">
            <i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ
        </button>
    </li>
</ul>
<script type="text/javascript">
            function logoutUser() {
                if (confirm('ยืนยันการออกระบบ')) {
                    $.ajax({
                        url: "_logout.php",
                        dataType: 'json',
                        success: function(data) {
                            if (data.status) {
                                window.location = '../index.php?page=i=i';
                            } else {
                                alert('ระบบเกิดข้อผิดพลาด');
                            }
                        }
                    });
                }
                return false;
            }
</script>