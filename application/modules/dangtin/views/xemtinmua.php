 <div class="breadcrumbs ">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="<? echo base_url();?>" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href="/mua-xe" title="<?php echo $this->lang->line('title_tinmuaxe');?>"><span><? echo $this->lang->line('title_tinmuaxe');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last"><? echo $tinmua['TieuDe'];?> [<? echo $tinmua['GiaTien'];?>]</span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
                 </ul>
           </div>
                    </div>
    </div>
     <div class="center">
 <div class="list-content">  
 <div class="list-left-container">
        <div class="contact">
                        <div class="contactinfo" style="width: 100%;">
                            <h2 class="tit" style="padding-bottom: 4px;margin-bottom: 7px;"><? echo $tinmua['TieuDe'];?> [<? echo $tinmua['GiaTien'];?>]</h2>
                            <p style="text-align: justify;"><? echo $tinmua['NoiDung'];?></p>
       <div class="ttnd_box shadowbox2" style="width: 97%;overflow: hidden;margin-top: 20px;padding: 10px;font-family:'Open Sans';font-size: 14px;">
        <div style="float: left;width: 80px;padding: 10px;text-align: center;">
        <img style="border: 0px;width: 80px;" src="<? echo base_url();?><? $ava=Modules::run('trangchu/getInfo','thanhvien','userid',$tinmua['NguoiDang']); echo $ava['Avatar'];?>" /><br />
        <b style="color: blue;"><? echo $ava['username'];?></b>
        </div>
        
        <div style="float: left;padding-left: 20px;padding-top: 10px;">
        <ul>
          <li>Tên người đăng: &nbsp;<b><? echo $ava['HoVaTen'];?> </b></li>
          <li>Điện thoại: &nbsp;<b><? echo $ava['DienThoai'];?></b></li>
          <li>Email: &nbsp;<b><? echo $ava['Email'];?></b></li>
		            
                              
                    
                  </ul>
        </div>
        <div style="float: left;padding-left: 80px;padding-top: 10px;">
        <ul>
          <li>Địa chỉ: &nbsp;<b><? echo $ava['DiaChi'];?> </b></li>
          <li>Tỉnh thành: &nbsp;<b><? echo $ava['TinhThanh'];?></b></li>
                    
                  </ul>
        </div>
      </div> 
                        </div> 

                    </div>    
</div>

<div class="list-right">
<? include 'div_search.php';?>
<? include 'div_tool.php';?>
</div>

        </div></div>