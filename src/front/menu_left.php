<?php
@ob_start();
@session_start();
?>
<ul class="list-group">
    <li class="list-group-item">
        <a href="index.php?page=pf">
            <i class="glyphicon glyphicon-user"></i>_ประวัติส่วนตัว
        </a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=pd">
            <i class="glyphicon glyphicon-shopping-cart"></i> _สินค้า
        </a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=ot">
            <i class="glyphicon glyphicon-sort-by-order-alt"></i>_รูปแบบบริการ</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=c">
            <i class="glyphicon glyphicon-shopping-cart"></i> _ตะกร้า</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=od">
            <i class="glyphicon glyphicon-asterisk"></i> _ใบจอง</a>
    </li>
    <li class="list-group-item">
        <a href="index.php?page=rp">
            <i class="glyphicon glyphicon-tree-conifer"></i> _ออกรายงาน</a>
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