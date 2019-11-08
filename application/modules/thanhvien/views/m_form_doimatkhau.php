 <div class="content_default">	<form action="" method="post" id="frmEdit">  
        <div class="content">
            <div id="boxRegister">
                <div class="tit mt9">
                    <h1 class="content-tit">Đổi mật khẩu</h1>
                </div>
                <style>
            .note {
                padding: 7px!important;
            }
            </style>
            <div style="padding-top: 10px; "><?php $this->load->view('template/statut_thongbao');?></div>
                <div class="listbox boxchangePass">
                    <div class="form-group item">
                        <div class="text">Mật khẩu cũ <span class="text-danger">*</span></div>
                        <input name="MatKhauCu" type="password" value="<?php echo $data_thanhvien['MatKhauCu'];?>" id="txtOldPassword" class="form-control textbox" />
                        <span id="validateFortxtOldPassword" class="message" style="width:100%">Mật khẩu cũ không chính xác</span>
                    </div>
                    <div class="form-group item">
                        <div class="text">Mật khẩu mới <span class="text-danger">*</span></div>
                        <input name="MatKhauMoi" type="password" value="<?php echo $data_thanhvien['lable_MatKhauMoi'];?>" id="txtNewPassword" class="form-control textbox" />
                        <span id="validateFortxtNewPassword" class="message valnotnull"></span>
                    </div>
                    <div class="form-group item">
                        <div class="text">Nhập lại Mật khẩu <span class="text-danger">*</span></div>
                        <input name="NhapLaiMatKhauMoi" type="password" value="<?php echo $data_thanhvien['NhapLaiMatKhauMoi'];?>" id="txtConfirmPassword" class="form-control textbox" />
                        <span id="validateFortxtConfirmPassword" class="message">Mật khẩu nhập lại không khớp</span>
                    </div>
                    
                    <div class="form-group item center">
                        <a id="btnConfirmPassword" class="btn btn-success btn-sm" href="javascript:document.getElementById('frmEdit').submit();">Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
        </div></form>
    </div>
