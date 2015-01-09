<ul class="nav nav-pills">
    <li class="active"><a href="index.php?page=i-i">หน้าหลัก</a></li>
    <li><a href="index.php?page=i-a">อัลบัมลูกค้า</a></li>    
    <li><a href="index.php?page=i-p">โปรโมชั่น</a></li>
    <li><a href="index.php?page=i-m">การชำระเงิน</a></li>
    <li><a href="index.php?page=i-c">ติดต่อเรา</a></li>
    <li><a href="index.php?page=i-h">ช่วยเหลือ</a></li>
    <form id="login-form" class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="true" >
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="true">
        </div>
        <button id="btLogin" type="button" class="btn btn-success" onclick="return login();">Sign in</button>
    </form>   
</ul>
<script type="text/javascript">
            function login() {
                if (confirm('login')) {
                    $.ajax({
                        url: "_checkLogin.php",
                        data: $('#login-form').serialize(),
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status === 1) {
                                switch (data.personstatus) {
                                    case '1': // dmin
                                        window.location = './back/index.php?page=h';
                                        break;
                                    case '2': // customer
                                        window.location = './front/index.php?page=pd';
                                        break;
                                }
                            } else {
                                alert('ไม่มีชื่อในระบบ');
                            }
                        }
                    });
                    return true;
                }
                return false;
            }
</script>
