        <div class="wr_page">
            
    <div class="index-page" style="padding-top: 65px">
        <div class="content">
    <form name="frmEdit" id="frmEdit" action="" method="post" enctype="multipart/form-data">        
<div id="boxContact">

    <h1 class="h1">Gửi góp ý</h1>
    <div class="listbox">
    <?php $this->load->view('template/statut_thongbao');?>
        <div class="form-group item row">
            <div class="lable">
                Họ tên <span class="text-red">*</span>
            </div>
            <input name="name" value="<?php echo set_value('name');?>" type="text" id="txtName" class="form-control textbox" />
        </div>
        <div class="form-group item row">
            <div class="lable">
                Email <span class="text-red">*</span>
            </div>
            <input name="email" value="<?php echo set_value('email');?>" type="text" id="txtEmail" class="form-control textbox" />
        </div>
        <div class="form-group item row">
            <div class="lable">
                Điện thoại</span>
            </div>
            <input name="DienThoai" value="<?php echo set_value('DienThoai');?>" type="text" id="txtPhone" class="form-control textbox" />
        </div>
        <div class="form-group item row">
            <div class="lable">
                Địa chỉ</span>
            </div>
            <input name="DiaChi" value="<?php echo set_value('DiaChi');?>" type="text" id="txtAddress" class="form-control textbox" />
        </div> 
        <div class="form-group item row">
            <div class="lable">
                Nội dung <span class="text-red">*</span>
            </div>
            <textarea name="message" rows="2" cols="20" id="txtContent" class="form-control txtContent"><?php echo set_value('message');?>
</textarea>
        </div>
        <div class="form-group item row">
            <div class="lable">
                Mã an toàn <span class="text-red">*</span>
            </div>
            <input name="MaXacNhan" type="text" id="txtcode" class="form-control txtcode" />
            <span class="imgCaptcha">
                <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" style=" margin-left: 5px;  vertical-align: middle;"/><img title="Đổi mã xác nhận khác" src="/style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();" style=" vertical-align: middle;"/>
            </span>
        </div>
        <div class="item row">
            <div class="lable">
            </div>
            <a id="btContact" onclick="document.getElementById('frmEdit').submit();" style="cursor: pointer;" class="text-white btn btn-success btn-sm">Gửi liên hệ</a>      
            <a href="/" class="btn btn-danger btn-sm">Hủy</a>
        </div>
    </div>
    <!-- <script src="/Scripts/Contact.min.js"></script> -->
    <div class="loading_contact">
        <img src="/Images/loading.gif" />
    </div>
    <div class="clear"></div>
</div>
</form>
        </div>
    </div>

            <div class="clear"></div>
        </div>