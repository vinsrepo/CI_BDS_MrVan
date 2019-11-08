<style>
    .e_note {
        color: red;
        font-size: 13px;
        display: none;
        padding-top: 4px;
    }
</style>

<div class="content2">
<form action="" method="post">       
<div class="div_menulogin">
    <div class="tit " style="border-color: #7d7d7d">
        <div class="content-tit">
            <a href="/thanh-vien/dang-nhap.html" class="alogin" >Đăng nhập</a>
            <a href="/thanh-vien/dang-ky.html" class="selected">Đăng ký</a>
            <div class="clear"></div>
        </div>
    </div>
    <div style="color: red;padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
    <div class="clear"></div>
    <div id="boxRegister" class=""> 

        <div class="listbox">  
            
            <div class="form-group">
                <label>Tên đăng nhập <span class="text-danger">*</span></label>
                <input name="username" type="text" id="txtUserName" class="form-control" value="<?php echo set_value('username');?>"/> 
            </div>
            <div class="form-group">
                <label>Mật khẩu <span class="text-danger">*</span></label>
                <input name="password" type="password" id="txtMatkhau" class="form-control" /> 
            </div>
            <div class="form-group">
                <label>Xác nhận lại mật khẩu <span class="text-danger">*</span></label>
                <input name="repassword" type="password" id="txtNhaplaimatkhau" class="form-control" /> 
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="Email" type="text" id="txtEmail" class="form-control" value="<?php echo set_value('Email');?>"/><span class="null" id="spanEmail"></span>
            </div>
            <div class="form-group">
                <label>Họ tên</label>
                <input name="HoVaTen" type="text" id="txtTendaydu" class="form-control" value="<?php echo set_value('HoVaTen');?>"/> 
            </div>
            
            <div class="form-group">
                <label>Điện thoại <span class="text-danger">*</span></label>
                <input name="DienThoai" type="number" maxlength="12" id="txtDidong" class="form-control"/>
                <!-- <span class="e_note"><i>Chúng tôi sẽ gửi một mã xác thực đến SĐT được đăng ký.</i></span>  -->
            </div>
          
            <div class="form-group">
                <label>Địa chỉ</label>
                <input name="DiaChi" type="text" id="txtTendaydu" class="form-control" value="<?php echo set_value('DiaChi');?>"/> 
            </div>
            
            <div class="form-group">
                <label>Tỉnh / Thành phố</label> 
                <select id="ddlCityRegis" class="custom-select" name="TinhThanh" onchange="ChangeTinhthanhpho($(this).val())">
                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                     <option value="Hà Nội">Hà Nội</option>
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
                <label>Mã xác nhận<span class="text-danger">*</span></label>
                <input name="MaXacNhan" type="text" maxlength="4" id="txtcode" class="form-control" />
                <span class="imgCaptcha">
                <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" style="width: 146px; height: 41px; vertical-align: middle;padding: 5px;"/><img title="Đổi mã xác nhận khác" src="/style/images/ref.gif" width="30" height="30" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();" style=" vertical-align: middle;"/>
                     
                </span> 
                
            </div>

            <div class="item item-btn">
                <div class="content-itembtn">
                    <button type="submit" class="btn btn-success btn-sm">Đăng ký</button>
                </div>
            </div>
        </div>
    </div> 
</div>
</form> 

</div>
<!-- <script type="text/javascript">
    $('#txtDidong').keyup(function(){
        $('.e_note').css('display','block');
    });
</script> -->