
<div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href="/dich-vu" title="Dịch vụ"><span>Dịch vụ</span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last"><?php $tit=explode('|',$title); echo $tit[0];?></span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
                 </ul>
           </div>
                    </div>
    </div>
<form>
<div class="center">
<? 
$show_content=str_replace('<div class="saloninfo">','<div class="saloninfo" style="margin-top: 0px;">',$show_content);
$show_content=str_replace('/Images/','/images/',$show_content);
echo $show_content;
?>