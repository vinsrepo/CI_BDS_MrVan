  <div class="boxcontact">
         <form action="" method="post" id="adminForm2">    
<div id="boxContact">
    <h1 class="tit"><span class="content-tit">Gửi góp ý</span></h1>
    <div style="color: red;padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
    <div class="listbox">
        <div class="form-group item">
            <div class="lable">
                Họ tên <span class="request">*</span>
            </div>
            <input name="name" value="<?php echo set_value('name');?>" type="text" id="txtName" class="form-control textbox" />
        </div>
        <div class="form-group item">
            <div class="lable">
                Email <span class="request">*</span>
            </div>
            <input name="email" value="<?php echo set_value('email');?>" type="text" id="txtEmail" class="form-control textbox" />
        </div>
        <div class="form-group item">
            <div class="lable">
                Điện thoại
            </div>
            <input name="DienThoai"  value="<?php echo set_value('DienThoai');?>" type="text" id="txtPhone" class="form-control textbox" />
        </div>
        <div class="form-group item">
            <div class="lable">
                Địa chỉ
            </div>
            <input name="DiaChi" value="<?php echo set_value('DiaChi');?>" type="text" id="txtAddress" class="form-control textbox" />
        </div> 
        <div class="form-group item">
            <div class="lable">
                Nội dung <span class="request">*</span>
            </div>
            <textarea name="message" rows="2" cols="20" id="txtContent" class="form-control txtContent textbox"><?php echo set_value('message');?>
</textarea>
        </div>
        <div class="form-group item">
            <div class="lable">
                Mã an toàn <span class="request">*</span>
            </div>
            <input name="MaXacNhan" type="text" id="txtcode" class="form-control txtcode textbox" />
            
        </div>
        <div class="form-group item">
            <div class="lable">&nbsp;</div>
            <span class="imgCaptcha">
                <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" style=" vertical-align: middle;"/><img title="Đổi mã xác nhận khác" src="/style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();" style=" vertical-align: middle;"/>
            </span>
        </div>
        <div class="form-group item">
            <div class="item-btn">
                <a id="btContact" onclick="document.getElementById('adminForm2').submit();" class="btn btn-success btn-sm" style="cursor: pointer;">Gửi</a>
            </div>
        </div>
    </div>
    <script src="/Scripts/Contact.js"></script>
    <div class="loading_contact">
        <img src="/Images/ajax_loader.gif" />
    </div>
    <div class="clear"></div>
</div>
</form>
        </div>