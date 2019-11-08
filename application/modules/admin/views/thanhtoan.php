 
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
                                            <label class="form-label" for="SoTaiKhoan">Số tài khoản</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="SoTaiKhoan" name="SoTaiKhoan" value="<?php echo $data->{'SoTaiKhoan'};?>">
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-xs-7">
                                        <div class="form-group">
                                            <label class="form-label" for="NguoiHuongLoi">Người hưởng lợi</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="NguoiHuongLoi" name="NguoiHuongLoi" value="<?php echo $data->{'NguoiHuongLoi'};?>">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="form-label" for="ChiNhanh">Chi nhánh</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="ChiNhanh" name="ChiNhanh" value="<?php echo $data->{'ChiNhanh'};?>">
                                            </div>
                                        </div> 
                                    </div>
 
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="form-label" for="NoiDung">Nội dung chuyển tiền </label> 
                                            <div class="controls">
                                                <textarea class="form-control" cols="5" style=" height: 150px;" id="NoiDung" name="NoiDung"><?php echo $data->{'NoiDung'};?></textarea>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="form-label" for="LuuY">Lưu ý </label> 
                                            <div class="controls">
                                                <textarea class="form-control" cols="5" style=" height: 150px;" id="LuuY" name="LuuY"><?php echo $data->{'LuuY'};?></textarea>
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