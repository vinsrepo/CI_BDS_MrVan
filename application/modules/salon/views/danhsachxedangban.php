
<div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?>"><span><?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?></span></a> <span class="mpx-arr-thin-right"></span></li>  
                 <li><a href=""><span class="last"><? echo $this->lang->line('lable_xedangban');?></span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
                 </ul>
           </div>
                    </div>
    </div>
<form>
<div class="center">
<div class="list-content">
<div class="list-left-container" style="padding-top: 10px;">
<? 
if($this->uri->segment(2)==''){
    $page=1;
}else{
    $page=$this->uri->segment(2);
}
echo Modules::run('salon/xedangban',$salon_info['Domain'],$page);?>
</div>
<div class="list-right">
<? include APPPATH.'modules/dangtin/views/div_tool.php';?>
<? include APPPATH.'modules/baiviet/views/hot_news.php'; ?>
</div>
</div>
</div>