<div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?>"><span><?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?></span></a> <span class="mpx-arr-thin-right"></span></li>  
                 <li><a href="/xe-dang-ban" title="<? echo $this->lang->line('lable_xedangban');?>"><span><? echo $this->lang->line('lable_xedangban');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last">Thông tin xe <? echo $HangXe['TieuDe'];?> <?  echo $DoiXe['TieuDe'];?> <? echo $xemtinban['PhanHang'];?> <? echo $xemtinban['NamSX'];?></span></a> <span class="mpx-arr-thin-right last"></span></li>             
                 </ul>
           </div>
                    </div>
    </div>
     
<div class="center"> 
    <div style="width:1000px;height:19px"></div>
    <div class="list-content">
        <div class="list-left-container">
            <div class="autodetail">
               <? include APPPATH.'modules/dangtin/views/car.php'; ?>
 
    <div class="autosamemodel ">
        <h2 class="title oswaldlarge-tab"><a href="/xe-dang-ban"><? echo $this->lang->line('lable_xedangban');?></a></h2>
        <div class="autoitem">
<?
$dulieu=$xecungloai;
include 'div_grid.php';
?> 
                    </div>
                            <div class="viewmore">
                    <a href="/xe-dang-ban">» Xem thêm các xe khác đang bán</a>
                </div>
        </div>
    </div> 

 

            </div>
        </div>
        <div class="list-right">
 
<? include APPPATH.'modules/dangtin/views/tinhtoan.php';?>

            
<? include APPPATH.'modules/baiviet/views/tinnhieunguoidoc.php';?>
<? include APPPATH.'modules/baiviet/views/danhgia_sosanh.php';?>         
        </div>
    </div>
</div>