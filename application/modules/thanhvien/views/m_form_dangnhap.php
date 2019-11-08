<div class="content2">
<form action="" method="post">        
<div class="div_menulogin">
    <div class="tit">
        <div class="content-tit">
            <a href="/thanh-vien/dang-nhap.html" class="alogin selected">Đăng nhập</a>
            <a href="/thanh-vien/dang-ky.html">Đăng ký</a>
            <div class="clear"></div>
        </div>
    </div>
<div style="color: red;padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
    <div id="boxLogin">
        <div class="form-group">
            <label>Tên đăng nhập <span class="text-danger">*</span></label>
            <input name="username" type="text" id="txtUserName" class="form-control" autocomplete="off" />
        </div>
        <div class="form-group">
            <label>Mật khẩu <span class="text-danger">*</span></label>
            <input name="password" type="password" id="txtPassword" class="form-control" autocomplete="off" />
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="MainContent_LoginMobile_chkRemember">
            <label class="form-check-label" for="MainContent_LoginMobile_chkRemember">Nhớ mật khẩu</label>
        </div>     
        <div class="item item-btn">
            <div class="content-itembtn">
                <button class="btn btn-success btn-sm" type="submit">Đăng nhập</button>
                <div class="lostpass">
                    <a href="/thanh-vien/quen-mat-khau.html" title="Quên mật khẩu">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</form> 
<script type="text/javascript">
    $('input[type="text"]').bind("keypress", function (e) {
        if (e.keyCode == 13) {
            $(this).parent().next().find('input').focus()
        }
    });
    $('#txtPassword').bind("keypress", function (e) {
        // enter key code is 13button
        if (e.which === 13) {
            __doPostBack('ctl00$MainContent$LoginMobile$btnLogin', '');
        }
    })
</script>

    </div>