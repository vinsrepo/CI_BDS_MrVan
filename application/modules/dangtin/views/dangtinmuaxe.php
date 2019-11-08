<div class="breadcrumbs ">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li>  
           <li><a href=""><span class="last"><?php echo $this->lang->line('title_dangmuabanxe');?></span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
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
            <div class="header-pageinfo" style="width: 100%;"><?php echo $this->lang->line('title_dangmuabanxe');?></div>

            <div class="content-pageinfo "> 
            
                <div style="width: 95%;"><?php $this->load->view('template/statut_thongbao');?>
                                </div>
                <div class="left-row" style="width: 40%;">
                    <div class="row">
                        <label class="name"><?php echo $this->lang->line('lable_TieuDe');?> <span>*</span></label>
                        <input name="TieuDe" id="TieuDe" value="<?php if(isset($tinmua['TieuDe'])){echo $tinmua['TieuDe'];}else{echo set_value('TieuDe');} ?>" class="name required" type="text" style="width: 217px;">
                    </div>
                    <div class="row">
                        <label class="name"><?php echo $this->lang->line('lable_muctien');?> <span>*</span></label>
                        <select name="GiaTien" class="search_input dvcombo" style="margin-left: 10px;">
                            <option value="">--- Chọn giá tiền ---</option>
                           	  <?php 
             $arr = file(APPPATH . 'includes/muctien.txt');
             foreach($arr as $row) { 
                
                
                if(strpos(trim($row),'<')!==false){
                    $stt='Dưới ';
                    $money=giaca(str_replace('<','',trim($row)).'000000');
                }else{
                   if(strpos(trim($row),'>')!==false){
                    $stt='Trên ';
                    $money=giaca(str_replace('>','',trim($row).'000000'));
                   }else{
                    $stt='Từ ';
                    $khoang1=preg_replace('/([0-9]+)-([0-9]+)/',"$1",trim($row));
                    $khoang2=preg_replace('/([0-9]+)-([0-9]+)/',"$2",trim($row));
                    $money=giaca($khoang1.'000000').' đến '.giaca($khoang2.'000000');
                   } 
                }
                if($tinmua['GiaTien']!=''&&$tinmua['GiaTien']==trim($stt.$money)){
                    $select='selected="selected"';
                    }else{
                    $select=set_select('GiaTien', trim($stt.$money));
                    }
                echo '
                     <option value="'.trim($stt.$money).'" '.$select.'  >'.$stt.$money.'</option>
                     ';
             }
             ?>
             </select>
                    </div> 
                     <? if(!isset($tinmua['NoiDung'])):?>
                    <div class="row ">
                        <label class="name" style=" "><?php echo $this->lang->line('lable_captcha');?> <span>*</span></label>
                        <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" style="margin-left: 10px;width: 135px;"><img title="Đổi mã xác nhận khác" src="/style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();">                       
                        <input type="text" id="txtImgVerify" class="contactcapchar required" rel="Mã xác thực" name="MaXacNhan" style="width: 217px;">
                        <div id="errorflag" style="display: none"></div>
                    </div>
                    <? endif;?>
                </div>
                <div class="right-row" style="width: 60%;">
                    <div class="row noidunglh">
                        <label class=" " style=""><?php echo $this->lang->line('lable_NoiDung');?> <span>*</span></label>
                        <textarea name="NoiDung" id="NoiDung" class="required contentmail" style="width: 467px;float: right;"><?php if(isset($tinmua['NoiDung'])){echo $tinmua['NoiDung'];}else{ echo set_value('NoiDung');}?></textarea>
                    </div>                    
                    <? if(!isset($tinmua['NoiDung'])):?>
                    <input type="submit" class="btnGui" value="<?php echo $this->lang->line('lable_Send');?>" style="float: right;margin-right: 50px;">
                    <? else:?>
                    <input type="submit" class="btnGui" value="<?php echo $this->lang->line('lable_btnCapNhap');?>" style="float: right;margin-right: 50px;">
                    <? endif;?>
                </div>         
            </div>
            <div class="overlay">
            </div>
        </div>
    </div>

    
 <style> 
label span{
    color: red;
}
</style>
    
</div></form>
     
 </div>
</div>