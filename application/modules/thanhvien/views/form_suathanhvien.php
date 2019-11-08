 
<!-- START CONTENT -->
<form action="#" method="post" class="form">
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
 <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Thông tin tài khoản</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row"> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="username"><?php echo $this->lang->line('lable_username');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" name="username" id="username" value="<?php if(isset($users['username'])){echo $users['username'];}else{echo set_value('username');}?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="password"><?php echo $this->lang->line('lable_password');?> </label> 
                                            <div class="controls">
                                                <input type="password" class="form-control input-lg" name="password" id="password" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="Email"><?php echo $this->lang->line('lable_email');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" name="Email" id="Email" value="<?php if(isset($users['Email'])){echo $users['Email'];}else{echo set_value('Email');}?>">
                                            </div>
                                        </div>
                                           
                                         
                                         
                                        
                                        <button class="btn btn-success btn-icon bottom15 pull-right" type="submit">
                                            <i class="fa fa-save"></i> &nbsp; <span><?php echo $this->lang->line('lable_btnCapNhap');?></span>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </section></div> 
                                    <div class="col-lg-7 col-md-7 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Thông tin cá nhân</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                       <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 0px;padding-left: 0px;">
                                          <div class="form-group">
                                            <label class="form-label" for="HoVaTen"><?php echo $this->lang->line('lable_HoVaTen');?></label> 
                                            <div class="controls">
                                                <input type="text" name="HoVaTen" class="form-control input-lg" id="HoVaTen" value="<?php if(isset($users['HoVaTen'])){echo $users['HoVaTen'];}else{echo set_value('HoVaTen');}?>">
                                            </div>
                                          </div>
                                       </div>
                                       
                                       <div class="col-md-6 col-sm-6 col-xs-12" style="margin-right: 0px;padding-right: 0px;">
                                         <div class="form-group">
                                            <label class="form-label" for="DienThoai">Điện thoại</label> 
                                            <div class="controls">
                                                <input type="text" name="DienThoai" class="form-control input-lg" id="DienThoai" value="<?php if(isset($users['DienThoai'])){echo $users['DienThoai'];}else{echo set_value('DienThoai');}?>">
                                            </div>
                                         </div>
                                       </div>
                                    
                                    
                                    <div class="form-group">
                                            <label class="form-label" for="DiaChi">Địa chỉ</label> 
                                            <div class="controls">
                                                <input type="text" name="DiaChi" class="form-control input-lg" id="DiaChi" value="<?php if(isset($users['DiaChi'])){echo $users['DiaChi'];}else{echo set_value('DiaChi');}?>">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="form-label" for="TinhThanh"><?php echo $this->lang->line('lable_TinhThanh');?></label> 
                                            <div class="controls">
                                                <select name="TinhThanh" id="TinhThanh" class="form-control input-lg m-bot15">
                      <option value=""></option>
             <?php 
             $arr = file(APPPATH . 'includes/DSTinhThanh.txt');
             foreach($arr as $row) { 
                if($users['TinhThanh']==trim($row))
                { 
                    $select='selected';
                }else{
                    $select=set_value('TinhThanh');
                }
                echo '
                     <option value="'.trim($row).'" '.$select.' >'.trim($row).'</option>
                     ';
             }
             ?>
          </select>
                                            </div>
                                        </div> 

                                    </div>
                                </div>

                            </div>
                        </section></div>  
                </section>
            </section>
</form>
            <!-- END CONTENT -->