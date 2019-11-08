<style> 
label span{
    color: red;
}
</style>
<div class="breadcrumbs ">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?>"><span><?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?></span></a> <span class="mpx-arr-thin-right"></span></li>  
                 <li><a href=""><span class="last"><? echo $this->lang->line('lable_contact');?> </span></a> <span class="mpx-arr-thin-right last"></span></li>             
                 </ul>
           </div>
                    </div>
    </div>
     <div class="center">
 <div class="list-content">
<form name="frmEdit" id="frmEdit" action="" method="post" enctype="multipart/form-data">
<div class="page-contact">
    <div class="pageinfo">
        <div class="container-pageinfo shadowbox2" style="padding: 0px;padding-left: 20px;padding-right: 20px;text-align: justify;width: 95%;overflow: hidden;padding-bottom: 20px;">
            <div class="header-pageinfo" style="width: 100%;">Liên hệ với <? echo $salon_info['TenSalon'];?></div>

            <div class="content-pageinfo "> 
                <div style="width: 95%;">
                <?php $this->load->view('template/statut_thongbao');?>
                </div>
                <div class="left-row">
                    <div class="row">
                        <label class="name"><?php echo $this->lang->line('lable_HoVaTen');?> <span> *</span></label>
                        <input name="HoVaTen" id="HoVaTen" value="<?php echo set_value('HoVaTen');?>" class="name required" type="text" />
                    </div>
                    <div class="row">
                        <label class="name"><?php echo $this->lang->line('lable_email');?> <span> *</span></label>
                        <input class="email required" name="Email" id="Email" value="<?php echo set_value('Email');?>" type="text" />
                    </div>
                    <div class="row">
                        <label class="name"><?php echo $this->lang->line('lable_mobile');?> <span> *</span></label>
                        <input class="required isPhoneNumber" name="DienThoai" id="DienThoai" value="<?php echo set_value('DienThoai');?>" type="text" maxlength="12" />
                    </div>
                    <div class="row">
                        <label class="name"><?php echo $this->lang->line('lable_add');?> <span> *</span></label>
                        <input name="DiaChi" id="DiaChi" value="<?php echo set_value('DiaChi');?>" type="text" />
                    </div>
                </div>
                <div class="right-row">
                    <div class="row noidunglh">
                        <label class="name" style=""><?php echo $this->lang->line('lable_NoiDung');?> <span> *</span> </label>
                        <textarea name="NoiDung" id="NoiDung" class="required contentmail"><?php echo set_value('NoiDung');?></textarea>
                    </div>                    
                    <div class="row ">
                        <label class="name" style=" "><?php echo $this->lang->line('lable_captcha');?> <span> *</span></label>
                        <img src="<? echo base_url();?>maxacnhan/captcha" id="captcha" title="Mã xác nhận"  style="margin-left: 10px;width: 135px;"/><img title="Đổi mã xác nhận khác" src="<? echo base_url();?>style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='<? echo base_url();?>maxacnhan/captcha?'+Math.random();"/>                       
                        <input type="text" id="txtImgVerify" class="contactcapchar required" rel="Mã xác thực" name="MaXacNhan" />
                        <input type="hidden" name="Salon" value="<? echo $salon_info['IDSalon'];?>" />
                        <div id="errorflag" style="display: none"></div>
                    </div>
                    <input type="submit" class="btnGui" value="<?php echo $this->lang->line('lable_Send');?>" />
                </div>         
            </div> 
        </div>
    </div>

     

    </form>
</div>           

	</div>
    	</div>