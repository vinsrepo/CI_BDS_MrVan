<div class="wr_page">
            
    <div class="index-page">
        <div class="content">
             
<form action="" method="post">             
<div class="login">
    <div class="login-title">Đăng nhập</div>
    <div class="login-content">
    <?php $this->load->view('template/statut_thongbao');?>
        <div>
            <label>Tên đăng nhập</label>
            <input name="username" type="text" id="ContentPlaceHolder1_BoxLogin1_txtUserName" />
        </div>
        <div>
            <label>Mật khẩu</label>
            <input name="password" type="password" id="txtPassword" />
        </div>
        
        <div>
            <label>&nbsp;</label>
            <input id="ContentPlaceHolder1_BoxLogin1_chkRemember" type="checkbox" name="ctl00$ContentPlaceHolder1$BoxLogin1$chkRemember" />
            <span>Ghi nhớ mật khẩu</span> | <a href="/thanh-vien/quen-mat-khau.html" title="Quên mật khẩu" class="a-lost-pass">Quên mật khẩu</a>
        </div>
        <div>
            <label>&nbsp;</label>
            <button id="btnLogin" class="btnLogin" type="submit">Đăng nhập</button>
        </div>
        <div class="dangky">
            Nếu bạn chưa có tài khoản tại <? echo $_SERVER['HTTP_HOST'];?>, vui lòng <a href="/thanh-vien/dang-ky.html" title="Đăng ký" class="a-lost-pass">đăng ký tại đây</a>

        </div>
    </div>
</div>
</form> 
<script type="text/javascript">
    $('#txtPassword').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            window.__doPostBack('ctl00$ContentPlaceHolder1$BoxLogin1$btnLogin', '');
        }
        return true;
    });
    $('#txtUserName').keypress(function (event) {

        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            if ($('#txtPassword').val() != '')
                window.__doPostBack('ctl00$ContentPlaceHolder1$BoxLogin1$btnLogin', '');
            else
                $('#txtPassword').focus();
        }
        return true;
    });


</script>
 
        </div>
    </div>

            <div class="clear"></div>
        </div>