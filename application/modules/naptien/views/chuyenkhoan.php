<div class="breadcrumbs " style="margin-bottom: 0px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li>  
                 <li><a href="/nap-tien" title="<?php echo $this->lang->line('lable_naptien');?>"><span><?php echo $this->lang->line('lable_naptien');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last"><?php echo $this->lang->line('lable_chuyenkhoan');?></span></a> <span class="mpx-arr-thin-right last"></span></li>             
                 </ul>
           </div>
                    </div>
    </div>  

<div class="center">
    <div class="manage">
        <div class="colleft">
           <? include(APPPATH . 'includes/divLeft_thanhvien.php');
           $tt=Modules::run('trangchu/getInfo','cauhinh','Loai','ThanhToan');
           $tt=json_decode($tt['GiaTri'],true);
           ?>
        </div>
        <div class="colright">
            <div class="content salonmanage">
                <div class="titleauto">Nạp tiền</div>                
                <div class="rechargedes" style="margin-top: 15px;">
                    <div id="container-ck" class="box" style="display:block;">
                        <div class="name">Chuyển khoản</div>
                        <div class="info">Vui lòng thực hiện chuyển tiền theo các thông tin dưới đây:</div>
                        
                        <div class="infotransaction">
                            <label>Số tài khoản</label>
                            <input type="text" id="taikhoan" value="<? echo $tt['SoTaiKhoan'];?>" readonly="true">
                        </div>
                        <div class="infotransaction">
                            <label>Chi nhánh</label>
                            <textarea id="chinhanh" readonly="true" style="overflow:hidden;"><? echo $tt['ChiNhanh'];?>
                            </textarea>
                        </div>
                        <div class="infotransaction">
                            <label>Người hưởng lợi</label>
                            <input type="text" value="<? echo $tt['NguoiHuongLoi'];?>" readonly="true">
                        </div>
                        <div class="infotransaction">
                            <label>Số tiền</label>
                            <input type="text" value="<? echo number_format($_POST['Money']);?> VNĐ">
                        </div>
                        <div class="infotransaction">
                            <label>Nội dung chuyển tiền</label>
                            
                            <textarea readonly="readonly">
<? echo str_replace('[MATAIKHOAN]',$this->session->userdata('userid'),$tt['NoiDung']);?>
                            </textarea>
                        </div>

                        <div class="note" style="line-height: 18px;">
                            <? echo $tt['LuuY'];?>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="colmess">
            <? include(APPPATH . 'includes/divRight.php');?>
        </div>
    </div>
</div>
</div>