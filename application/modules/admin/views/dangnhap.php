<!-- BEGIN BODY --> 


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8" style="margin-top: 221px;">
                <h1><a href="#" title="Đăng nhập" tabindex="-1">Ultra Admin</a></h1>
                <?php $this->load->view("statut_thongbao");?>
                <form name="loginform" id="loginform" action="" method="post"> 
                    <p>
                        <label for="user_login">Tên đăng nhập<br />
                            <input type="text" name="username" id="user_login" class="input"  /></label>
                    </p>
                    <p>
                        <label for="user_pass">Mật khẩu<br />
                            <input type="password" name="password" id="user_pass" class="input"  /></label>
                    </p>
                    <p class="forgetmenot" style="display: none;">
                        <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> Remember me</label>
                    </p>



                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-success btn-block" value="<?php echo $this->lang->line('lable_btnDangNhap');?>" />
                    </p>
                </form>

                <p id="nav">
                    <a class="pull-left" href="/thanh-vien/quen-mat-khau.html" title="Bạn quên mật khẩu?">Bạn quên mật khẩu?</a>
                </p>


            </div>
        </div>

<style>
.copyright{
    padding-top: 20px;
    color: #ddd;
}
.copyright a{ 
    color: #fff;
}
</style>