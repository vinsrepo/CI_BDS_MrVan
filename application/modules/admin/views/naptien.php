 
<script type="text/javascript" src="/asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/asset/ckfinder/ckfinder.js"></script>
<!-- START CONTENT -->
<form action="#" method="post" class="form">
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
 <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?><?php
                   $data=json_decode($info['GiaTri']);
                   ?>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left"><? echo $title;?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                            
                            <div class="row">
                                    <div class="col-xs-5">
                                        <div class="form-group">
                                            <label class="form-label" for="merchant_id">Merchant ID</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="merchant_id" name="merchant_id" value="<?php echo $data->{'merchant_id'};?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="merchant_account">Tên tài khoản</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="merchant_account" name="merchant_account" value="<?php echo $data->{'merchant_account'};?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Mật khẩu</label> 
                                            <div class="controls">
                                                <input type="password" class="form-control input-lg" id="password" name="password" value="<?php echo $data->{'password'};?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-7">
                                        <div class="form-group">
                                            <label class="form-label" for="client_fullname">Họ và tên</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="client_fullname" name="client_fullname" value="<?php echo $data->{'client_fullname'};?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="client_email">Email</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="client_email" name="client_email" value="<?php echo $data->{'client_email'};?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="client_mobile">Điện thoại</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="client_mobile" name="client_mobile" value="<?php echo $data->{'client_mobile'};?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                 
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                         
                                         
                                        
                                        <button class="btn btn-success btn-icon bottom15 pull-right" type="submit">
                                            <i class="fa fa-check"></i> &nbsp; <span>Lưu thiết lập</span>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </section></div> 
                </section>
            </section>
</form>
            <!-- END CONTENT -->