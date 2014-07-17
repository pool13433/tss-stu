<ul class="nav nav-pills">
    <li class="active"><a href="index.php?page=h">Home</a></li>
    <!--    ผู้ใช้งาน-->
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">ผู้ใช้งาน <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="index.php?page=m">จัดการผู้ใช้งาน</a></li>
        </ul>
    </li>
    <!--    สินค้า-->
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">ข้อมูลสินค้า <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="index.php?page=p">สินค้า</a></li>
            <li class="divider"></li>
            <li><a href="index.php?page=pk">แพ็คเก็ต</a></li>
            <li><a href="index.php?page=pks">ชุดแพ็คเก็ต</a></li>
            <li><a href="index.php?page=pksd">รายละเอียดชุดแพ็คเก็ต</a></li>
            <li class="divider"></li>            
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">ข้อมูลหลัก <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="index.php?page=l">สถานที่</a></li>
            <li class="divider"></li>
            <li><a href="index.php?page=b">ธนาคาร</a></li>
            <li><a href="index.php?page=od">ใบจองการถ่าย</a></li>
            <li><a href="index.php?page=pm">การชำระเงิน</a></li>
            <li><a href="index.php?page=img">อัลบัมรูป</a></li>
            <li class="divider"></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </li>
    <li class="dropdown pull-right">
        <a href="#" onclick="return logout();" data-toggle="dropdown" class="dropdown-toggle">ออกระบบ</a>        
    </li>
</ul>
<script type="text/javascript">
            function logout() {
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