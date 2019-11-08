        <!-- *.Breadcrumb.* -->
        <section class="breadcrumb">
            <div class="container">
                <a href="<?php echo base_url();?>" title=""> <?php echo $this->lang->line('lable_home');?> </a>
                <span> <img style="border: 0px;" src="<?php echo base_url();?>style/images/dian.png" /> </span>
                <a href="<?php echo base_url();?>thanh-vien" title=""> Thành viên </a>
                <span> <img style="border: 0px;" src="<?php echo base_url();?>style/images/dian.png" /> </span>
                <span class="current-crumb"> Trang cá nhân </span>
            </div>
        </section>
        <!-- *.Breadcrumb End.* -->
        
        <!-- *.Main.* -->
        <section id="main" style="background: white;">
            <!-- *.Main Container.* -->
            <div class="container">
               <div class="content content-full-width">    
               
                   <div class="column one-third last">
                       <div class="wp-caption alignleft" style="width: 90%;">
                       <h3 style="color: #25ade4;"><? echo $info_user['username'];?></h3>
                        <img src="<? echo base_url();?><? if($info_user["Avatar"]==''){
                    $info_user["Avatar"]='style/images/no_avatar_nam.jpg';
                  } echo $info_user['Avatar'];?>" style="border: 0px; width: 90%;" />
                        <p class="wp-caption-text">Thành viên</p>
                        <div class="progress progress-striped active animated" style="margin: 10px;">
                            <div data-value="70" style="background-color: rgb(227, 36, 36); width: 70%;" class="bar">
                                <div style="display: block;" class="bar-text"> LEVEL <span>5</span></div>
                            </div>
                        </div>
                        <div class="progress progress-striped active animated" style="margin: 10px;">
                            <div data-value="85" style="background-color: rgb(224, 36, 227); width: 85%;" class="bar">
                                <div style="display: block;" class="bar-text"> EXP <span>750</span></div>
                            </div>
                        </div>
                        <div class="progress progress-striped active animated" style="margin: 10px;">
                            <div data-value="90" style="background-color: rgb(33, 217, 208); width: 90%;" class="bar">
                                <div style="display: block;" class="bar-text"> SP <span>90%</span></div>
                            </div>
                        </div>
                        <div style="text-align: left;padding-left: 20px;">
                        <ul class="fancy-list rounded-arrow">
                            <li> <?php echo $this->lang->line('lable_HoVaTen');?>: <b><? echo $info_user['HoVaTen'];?></b> </li>
                            <li> <?php echo $this->lang->line('lable_GioiTinh');?>: <b><? echo $info_user['GioiTinh'];?></b> </li>
                            <li> <?php echo $this->lang->line('lable_NgayThamGia');?>: <b><? echo $info_user['date'];?></b> </li>
                            <li> <?php echo $this->lang->line('lable_TinhThanh');?>: <b><? echo $info_user['TinhThanh'];?></b> </li>
                        </ul>
                        </div>
                       </div>
                         
                    </div>   
                    <div class="column two-third" style="padding-top: 20px;padding-bottom: 50px;">
                        <?php echo Modules::run("binhluan/vietbinhluan",'TuongThanhVien',$info_user['userid']);?>  
                         
                    </div>  
                         
                  
               </div>
            </div><!-- *.Main Container End.* -->
            
        </section><!-- *.Main End.* -->
                            
