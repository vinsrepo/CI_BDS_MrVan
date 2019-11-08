<div class="breadcrumbs " style="margin-bottom: 0px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li>  
                 <li><a href="/quan-ly-salon-oto" title="<?php echo $this->lang->line('lable_quanlysalon');?>"><span><?php echo $this->lang->line('lable_quanlysalon');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last"><?php echo $this->lang->line('lable_caidatsalon');?></span></a> <span class="mpx-arr-thin-right last"></span></li>             
                 </ul>
           </div>
                    </div>
    </div> 
     
<div class="center">
    <div class="manage">
        <div class="colleft">
           <? include(APPPATH . 'includes/divLeft_QLSalon.php');?>
        </div>
        <div class="colright">
            <div class="content pageregister salonmanage" style="margin-top:0">
                <div class="container-register shadowbox2" style="padding-top: 10px;overflow: hidden;padding-left: 15px;padding-bottom: 15px;">
                     
                    <div class="titleauto" style="width: 98%;"><?php echo $this->lang->line('lable_caidatsalon');?></div>
                    <div class="status-message" style="width: 98%;padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
                    <div class="content-pageregister" id="divuserprofiles" style="padding-top: 10px;">
<form action="" method="post">   
                           <? 
                           $styx='';
                           if($this->session->userdata('permission')==1):
                           $styx=' style="border-top: 1px solid #eee;padding-top: 10px;width: 98%;"';
                           ?>
                            <div class="line" style="">
                                <label><?php echo $this->lang->line('lable_domain_salon');?></label>
                                <input class="required " id="Domain" name="Domain" type="text" style="width: 200px!important;" value="<?php echo $data_salon['Domain'];?>"/><span style="font-size: 16px;vertical-align: middle;float: left;padding-top: 7px;">.<? echo $_SERVER['HTTP_HOST'];?></span>
                            </div>
                            <div class="line">
                                <label><?php echo $this->lang->line('lable_name_salon');?></label>
                                <input class="required " id="TenSalon" name="TenSalon" type="text" value="<?php echo $data_salon['TenSalon'];?>"/>
                            </div>
                            <div class="line">
                                <label><?php echo $this->lang->line('lable_TrangThai');?></label>
                                <label><input required="" type="radio" name="TrangThai" value="1" <?php if($data_salon['TrangThai']==1){echo 'checked';} ?> /> <?php echo $this->lang->line('lable_KichHoat');?> </label>
<label style="width: 270px!important;"><input type="radio" name="TrangThai" value="0" <?php if($data_salon['TrangThai']==0){echo 'checked';} ?> /> <?php echo $this->lang->line('lable_ChuaKichHoat');?></label>
                            </div>
                            <? endif?>
                           <div class="line" <? echo $styx;?>>
                                <label>Logo hiện tại</label>
                                <span id="AnhLoGo" style="float: left;">
                            <?php
                               if($data_salon['LoGo']!=''){
                                echo '
                            <img src="'.show_img($data_salon['LoGo'],'150x150').'" style="max-width: 400px;">
                            ';
                            }
                            ?>
                            
                           </span>
                           <input type="file" name="file_photo" id="file_photo" style="width: 250px; float: left;" class="input" />
                <div id='dfile1'> 
                <span class="" id='loading1' style='display:none'><img src="<? echo base_url();?>style/images/loader.gif" alt="Đang tải...."/></span>
                <div class="note note-success" id='succes1' style='margin-left: 118px;display:none;font-weight: bold; padding: 10px;padding-top: 5px;padding-bottom: 5px;margin-top: 8px;width: 80%;overflow: hidden;'><i class="mpx-checked"></i> Tải ảnh thành công</div>
				</div>
                           
                           <input type="hidden" id="LoGo" name="LoGo" value="<?php echo $data_salon['LoGo'];?>" />
                            </div> 
                                <div class="line">
                                    <label><?php echo $this->lang->line('lable_mobile');?></label>
                                    <input class="bxhInputValidate bxhInputValidateSpecial" id="DienThoai" name="DienThoai" type="text" value="<?php echo $data_salon['DienThoai'];?>">
                                </div>
                            <div class="line">
                                <label><?php echo $this->lang->line('lable_add');?></label>
                                <input class="required email" id="DiaChi" name="DiaChi" type="text" value="<?php echo $data_salon['DiaChi'];?>">
                            </div>
                            <div class="line">
                                <label><?php echo $this->lang->line('lable_email_lienhe');?></label>
                                <input class="required email" id="Email" name="Email" type="text" value="<?php echo $data_salon['Email'];?>">
                            </div>
                            <div class="line">
                                <label><?php echo $this->lang->line('lable_TinhThanh');?></label>
                                <select class="selectpicker bxhSelectOptionValidate bxhSelectOptionValidateRequired bxhInputValidateIsNumber" data-val="true" data-width="340px" id="TinhThanh" name="TinhThanh">
                                <option value=""></option>
             <?php 
             $arr = file(APPPATH . 'includes/DSTinhThanh.txt');
             foreach($arr as $row) { 
                if($data_salon['TinhThanh']==trim($row))
                { 
                    $select='selected';
                }else{
                    $select='';
                }
                echo '
                     <option value="'.trim($row).'" '.$select.' >'.trim($row).'</option>
                     ';
             }
             ?>
</select>
                            </div>
                            <div class="line">
                                <label><?php echo $this->lang->line('lable_gioithieu');?></label>
                                <textarea style="width: 500px;height: 300px;" name="GioiThieu"  ><?php echo $data_salon['GioiThieu'];?></textarea>
                            </div>
                            
                            <div id="errorflag" style="display: none"></div>
                            <div class="line">
                                <input type="submit" value="Lưu lại" class="btnchangepass bxhvalidatesumit" style="margin-left: 120px;margin-top: 20px;">
                            </div>
                 </div>
                </div>
                
                <?
                        include APPPATH.'modules/dangtin/views/upanh.php';
                        ?>
                        </form>   
                        <style>
.sortableitem
{ 
	height:100px;
	width:169px;
}
.uploading{
    top: 0px;
}
                        </style>
                        <script>
 (function () {
	var input = document.getElementById("file_photo"), 
		formdata = false;

	 

	if (window.FormData) {
  		formdata = new FormData();
  	}
	
 	input.addEventListener("change", function (evt) {
 	    $("#loading1").show();
        $("#succes1").hide();
        $("#AnhLoGo").hide();
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
	
			if (!!file.type.match(/image.*/)) {
				 
				if (formdata) {
					formdata.append("userfile", file);
				}
			}	
		}
	
		if (formdata) {
			$.ajax({
				url: base_url+"dangtin/dangtinbanxe/logo",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (responseText) {
					$('#AnhLoGo').html(responseText);
                                  $("#loading1").hide();
                                  $("#file_photo").val('');
                                  $("#succes1").show();
                                  $("#LoGo").val($("#imgID").val());
                                  $("#imgID").remove();
                                  $("#AnhLoGo").show();
				}
			});
		}
	}, false);
}());
 </script>
                
            </div>
        </div>
        <div class="colmess">
            <? include(APPPATH . 'includes/divRight.php');?>
        </div>
    </div>
</div>
</div>