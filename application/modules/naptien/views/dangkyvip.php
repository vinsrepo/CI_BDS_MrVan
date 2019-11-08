<div class="wr_page">    
    <div class="index-page">
        <div class="content">
            
            <? 
            $configtype=Modules::run('trangchu/getInfo','cauhinh','Loai',$type);
            $vip=json_decode($configtype['GiaTri'],true);
            include(APPPATH . 'includes/divLeft_thanhvien.php');?>
            
            <!-- Content Right -->
            <div class="user-mright">
                <!-- Đăng tin -->
                <div id="ContentPlaceHolder1_pnMainContent">
	<form action="" method="post" id="frmEdit">   
<div class="module-header-profile">
    <?php if($type=='xsieuvip_user'){echo $this->lang->line('lable_dangkysieuvip');}else{echo $this->lang->line('lable_dangkyvip');}?>
</div>
<div class="module-user module-user-bg ">
<div style="width: 92%;"><?php $this->load->view('template/statut_thongbao');?></div> 
    <div class="rc-item">
        <div class="text"><?php echo $this->lang->line('lable_type');?></div>
        <select class="select-item-regis" data-val="true" data-width="340px" id="loaithe" name="loaithe">
                                        <option value="vip_user" <? if($type=='vip_user'){echo 'selected';} ?>>Thành viên VIP</option> 
                                        <option value="xsieuvip_user"  <? if($type=='xsieuvip_user'){echo 'selected';} ?>>Thành viên SIÊU VIP</option> 
                                </select>
    </div>
    <div class="rc-item">
        <div class="text"><?php echo $this->lang->line('lable_time');?></div>
        <select class="select-item-regis" data-val="true" data-width="340px" id="month" name="month" onchange="ChangeMonth($(this).val());">
                                        <option value="1">1 tháng</option>   
                                        <option value="3">3 tháng</option>   
                                        <option value="6">6 tháng</option> 
                                        <option value="9">9 tháng</option> 
                                        <option value="12">1 năm</option> 
                                        <option value="24">2 năm</option> 
                                        <option value="36">3 năm</option> 
                                        <option value="48">4 năm</option> 
                                        <option value="60">5 năm</option> 
                                    </select>
        <script>
        function ChangeMonth(val){
            $('#money').html((val*<? echo $vip['price']; ?>).toLocaleString('en-US', {minimumFractionDigits: 0})+' VNĐ');
        }
        </script>
    </div>
    <div class="rc-item">
        <div class="text"><?php echo $this->lang->line('lable_money');?></div>
        <div id="money" style="color: blue; font-weight: bold;padding-top: 5px;"><? echo number_format($vip['price']); ?> VNĐ</div>
    </div> 
    <div class="rc-item rc-item-action ">
        <div class="text">&nbsp;</div>
        <button id="btnLogin" class="btnLogin" type="submit">Đăng ký</button>
    </div>
    
     
    
    <div class="loading-indicator" id="userUpdateLoading"></div>
   
</div>
 

</form>

<div class="module-user module-user-bg " >
        
	<img src="/style/images/Bang-so-sanh.png" />
</div>
 


</div>

            </div>
            
     
            
            
            <? include(APPPATH . 'includes/divRight.php');?>
            
            <div class="clear" style=": "></div>
        </div>
    </div>
    <script src="/Scripts/Members.min.js?v=20151126" type="text/javascript"></script>

            <div class="clear"></div>
        </div>