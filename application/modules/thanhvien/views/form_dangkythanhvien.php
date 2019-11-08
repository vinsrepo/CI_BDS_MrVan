<script src="/style/js/jquery.validate.min.js"></script>
<style>
    .btn_img {
        display: none;
    }
    .e_note {
        color: red;
        font-size: 13px;
        display: none;
        padding-top: 4px;
    }
</style>
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal_text modal-title"><img src="/style/images/modal_img.jpg" height="35px" width="35px" alt="Bất động sản Jooland"><h3> Sàn nhà đất</h3></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff"><span aria-hidden="true">&times;</span>
                </button>               
            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" style="border-bottom: none; padding-bottom: 18px;" role="tablist">
                        <li class="tab_info" role="presentation"><a  class="tab-login active" href="#loginTab" aria-controls="loginTab" role="tab" data-toggle="tab">Đăng nhập</a>
                        </li>
                        <li class="tab_info" role="presentation"><a class="tab-login" href="#signupTab" aria-controls="signupTab" role="tab" data-toggle="tab">Đăng ký</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="loginTab">
                            <form method="post" id="formDN">
                                <?php $this->load->view('template/statut_thongbao');?>
                                <div class="form-group">
                                    <label for="txtuserName">Tên đăng nhập</label>
                                    <input name="username" type="text" class="form-control" id="txtuserName" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <label for="txtPassword">Mật khẩu</label>
                                    <input name="password" type="password" class="form-control" id="txtPassword" placeholder="Mật khẩu">
                                </div>
                                <div class="form-check">
                                    <input name="chkRemember" type="checkbox" class="form-check-input" id="ContentPlaceHolder1_BoxLogin1_chkRemember">
                                    <label class="form-check-label" for="ContentPlaceHolder1_BoxLogin1_chkRemember">Ghi nhớ mật khẩu?</label>
                                    <label><a href="/thanh-vien/quen-mat-khau.html">| Quên mật khẩu?</a></label>
                                </div>
                                <div>&nbsp;</div>
                                <div class="form-group">
                                    <button type="button" id="btn_dn" class="form-control btn btn-primary btn-sm">Đăng nhập</button>
                                </div>                                  
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="signupTab">
                            <form method="post" action="" id="formDK">
                                <?php $this->load->view('template/statut_thongbao');?>              
                                <div class="form-group">
                                    <label for="txtTendaydu">Họ tên</label>
                                    <input type="text" name="HoVaTen" class="form-control" value="<?php echo set_value('HoVaTen');?>" id="txtTendaydu" placeholder="Nhập họ và tên">
                                </div>
                                <div class="form-group">
                                    <label for="txtUserName">Tên đăng nhập <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" value="<?php echo set_value('username');?>" id="txtUserName" placeholder="Tên đăng nhập">
                                </div>

                                <div class="form-group">
                                    <label for="txtMatkhau">Mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="txtMatkhau" placeholder="Mật khẩu">
                                </div>

                                <div class="form-group">
                                    <label for="txtNhaplaimatkhau">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" name="repassword" class="form-control" id="txtNhaplaimatkhau" placeholder="Xác nhận mật khẩu">
                                </div>                               
                                <div class="form-group">
                                    <label for="txtEmail">Email</label>
                                    <input type="email" name="Email" class="form-control" id="txtEmail" placeholder="Địa chỉ email">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="txtDidong">Điện thoại <span class="text-danger">*</span></label>
                                    <input type="number" name="DienThoai" class="form-control" id="txtDidong" placeholder="Số điện thoại">
                                    <!-- <span class="e_note"><i>Chúng tôi sẽ gửi một mã xác thực đến SĐT được đăng ký.</i></span> -->
                                </div>
                                <div class="form-group">
                                    <label for="txtAddress">Địa chỉ</label>
                                    <input type="text" name="DiaChi"  value="<?php echo set_value('DiaChi');?>" class="form-control" id="txtAddress" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="province">Tỉnh thành</label> -->
                                    <select name="TinhThanh" class="form-control" id="province">
                                        <option value="">--- Chọn tỉnh thành --- </option>
                                        <?php 
                                        $arr = file(APPPATH . 'includes/DSTinhThanh.txt');
                                        foreach($arr as $row) { 
                                            echo '
                                             <option value="'.trim($row).'" '.set_select('TinhThanh', trim($row)).' >'.trim($row).'</option>
                                             ';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="code">Mã an toàn <span class="text-danger">*</span></label>
                                    <input type="text" name="MaXacNhan" style="width: 200px; display: inline-block;" class="form-control" id="txtcode" placeholder="Nhập mã an toàn">
                                    <span class="imgCaptcha" style="padding: 5px 0 0; float: right;">
                                        <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" style=" margin-left: 5px;margin-top: -3px; vertical-align: middle;"/><img title="Đổi mã xác nhận khác" src="/style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();" style=" vertical-align: middle;"/>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_dk">Đăng ký <img id="btn_img" src="style/images/ajax_loader.gif" alt="" width="17px" height="auto" class="btn_img"></button>

                                </div>                                                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $('#txtDidong').keyup(function(){
    //     $('.e_note').css('display','block');
    // });
    $('#btn_dk').click(function(){
        $('#formDK').submit();
        $('#btn_img').removeClass('btn_img');
        setTimeout(function() {
            $('#btn_img').addClass('btn_img');
        },5000);
    })
    $('#btn_dn').click(function(){      
        $('#formDN').submit();
    })
    $(document).ready(function(){
        $("#formDK").submit(function(event){
            event.preventDefault();
            var form = $(this);
            $.ajax({
                url: "<?php echo base_url();?>thanh-vien/dang-ky-json",  
                type: "POST",
                data: form.serialize(),
                dataType: 'json',
                success: function (response){
                    if(response.status == true){
                        $('#formModal').modal('hide');
                        window.location=response.message;
                    } else{  
                        var al = response.message;
                        var text = (al.indexOf(/(<([^>]+)>)/ig)) ? al.replace(/(<([^>]+)>)/ig,"") : al;                    
                        alert(text);                       
                    }                   
                }
            });
        });
    });
    $(document).ready(function(){
        $("#formDN").submit(function(){
            var form = $(this);
            $.ajax({
                url: "<?php echo base_url();?>thanh-vien/dang-nhap-json",  
                type: "POST",
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    if(response.status == true){
                        $('#formModal').modal('hide');
                        window.location=response.message;
                    } else{  
                        var al = response.message;
                        var text = al.replace(/(<([^>]+)>)/ig,"");                    
                        alert(text);                       
                    }
                },               
            });
            return false;
        });
    });
</script>