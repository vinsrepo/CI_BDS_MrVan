 
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
                                <h2 class="title pull-left"><?php echo $this->lang->line('title_config_email');?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row"> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="protocol"><?php echo $this->lang->line('lable_mailer');?></label> 
                                            <div class="controls">
                                                <select name="protocol" id="protocol" class="form-control input-lg">
                                                  <option value="smtp" <?php if($email['protocol']['GiaTri']=='smtp'){ echo "selected";}?>>SMTP</option>
                                                  <option value="mail" <?php if($email['protocol']['GiaTri']=='mail'){ echo "selected";}?>>Mail</option>
                                                  <option value="sendmail" <?php if($email['protocol']['GiaTri']=='sendmail'){ echo "selected";}?>>Sendmail</option>
                                               </select>
                                            </div>
                                          </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="email_from"><?php echo $this->lang->line('lable_mail_add');?></label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="email_from" name="email_from" value="<?php echo $email['email_from']['GiaTri'];?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="email_name"><?php echo $this->lang->line('lable_email_name');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="email_name" name="email_name" value="<?php echo $email['email_name']['GiaTri'];?>">
                                            </div>
                                        </div>
                                           
                                         <div class="form-group">
                                            <label class="form-label" for="email_path"><?php echo $this->lang->line('lable_email_path');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="email_path"  name="email_path" value="<?php echo $email['email_path']['GiaTri'];?>">
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
                                <h2 class="title pull-left">Thông tin đăng nhập SMTP</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                            <label class="form-label" for="smtp_host"><?php echo $this->lang->line('lable_smtp_host');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="smtp_host" name="smtp_host" value="<?php echo $email['smtp_host']['GiaTri'];?>">
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <label class="form-label" for="smtp_port"><?php echo $this->lang->line('lable_smtp_port');?></label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="smtp_port" name="smtp_port" value="<?php echo $email['smtp_port']['GiaTri'];?>">
                                            </div>
                                         </div>
                                        
                                    
                                    
                                    <div class="form-group">
                                            <label class="form-label" for="smtp_user"><?php echo $this->lang->line('lable_smtp_user');?></label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="smtp_user" name="smtp_user" value="<?php echo $email['smtp_user']['GiaTri'];?>">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="form-label" for="smtp_pass"><?php echo $this->lang->line('lable_smtp_pass');?></label> 
                                            <div class="controls">
                                                <input type="password" class="form-control input-lg" id="smtp_pass" name="smtp_pass" value="<?php echo base64_decode(base64_decode($email['smtp_pass']['GiaTri']));?>">
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