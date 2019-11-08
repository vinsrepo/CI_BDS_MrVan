 
<!-- START CONTENT -->
<form action="#" method="post" class="form">
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
 <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Tạo tài khoản mới <b style="color: blue;"><? echo $username;?></b>:</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="username">Tên đăng nhập </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" name="username" id="username" value="<?php if(isset($users['username'])){echo $users['username'];}else{echo set_value('username');}?>">
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="form-label" for="password">Mật khẩu </label> 
                                            <div class="controls">
                                                <input type="password" class="form-control input-lg" name="password" id="password" value="">
                                            </div>
                                        </div> 
                                         
                                        <div class="form-group">
                                            <label class="form-label" for="password">Quyền hạn </label> 
                                            <div class="controls">
                                                <select name="ChucVu" class="form-control input-lg m-bot15">
                                                    <option value="0" <?php set_select('ChucVu', '0'); ?> ><?php echo $this->lang->line('lable_Member');?></option>
                                                    <option value="1" <?php set_select('ChucVu', '1'); ?> ><?php echo $this->lang->line('lable_Admin');?></option>
                                                </select>
                                            </div>
                                        </div> 
                                        
                                        <button class="btn btn-success btn-icon bottom15 pull-right" type="submit">
                                            <i class="fa fa-save"></i> &nbsp; <span><?php echo $this->lang->line('lable_btnCapNhap');?></span>
                                        </button>

                                    </div><div class="col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                </div>

                            </div>
                        </section></div>  
                </section>
            </section>
</form>
            <!-- END CONTENT -->