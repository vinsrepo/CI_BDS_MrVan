 
<!-- START CONTENT -->
<form action="#" method="post" class="form">
    <section id="main-content" class=" ">
        <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
            <div class="col-md-12 col-sm-12 col-xs-12">
            <?php $this->load->view("admin/statut_thongbao");?>
            <?php
                $data=json_decode($info['GiaTri']);
            ?>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Thông tin SEO</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="TenTrangWeb"><?php echo $this->lang->line('lable_TenTrangWeb');?></label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="TenTrangWeb" name="TenTrangWeb" value="<?php echo $data->{'TenTrangWeb'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="Description">Description</label> 
                                            <div class="controls">
                                                <textarea name="TieuDe" id="Description" class="form-control input-lg" style="height: 100px;"><?php echo $data->{'TieuDe'};?></textarea>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="tagsinput-1">Keywords</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="tagsinput-1" data-role="tagsinput" name="MoTa" value="<?php echo $data->{'MoTa'};?>"/>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                        
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">CÔNG CỤ</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="google_analytics">Mã google analytics </label> 
                                            <div class="controls">
                                                <textarea name="google_analytics" id="google_analytics" class="form-control input-lg" style="height: 135px;"><?php echo $data->{'google_analytics'};?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="webmaster_tool">Mã webmaster tool </label> 
                                            <div class="controls">
                                                <textarea name="webmaster_tool" id="webmaster_tool" class="form-control input-lg" style="height: 130px;"><?php echo $data->{'webmaster_tool'};?></textarea>
                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
                        
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Thông tin công ty/đơn vị</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="TenCongTy">Tên công ty</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="TenCongTy" name="TenCongTy" value="<?php echo $data->{'TenCongTy'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="DiaChi">Địa chỉ</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="DiaChi" name="DiaChi" value="<?php echo $data->{'DiaChi'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="DienThoai">Điện thoại</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="DienThoai" name="DienThoai" value="<?php echo $data->{'DienThoai'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="Fax">Fax</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="Fax" name="Fax" value="<?php echo $data->{'Fax'};?>"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="Email">Email</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="Email" name="ThoiGianLamViec" value="<?php echo $data->{'ThoiGianLamViec'};?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                        
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Mạng xã hội</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="Skype">Skype</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="Skype" name="Skype" value="<?php echo $data->{'Skype'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="LinkedIn">LinkedIn</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="LinkedIn" name="LinkedIn" value="<?php echo $data->{'LinkedIn'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="Facebook">Fanpage Facebook</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="Facebook"  name="Facebook" value="<?php echo $data->{'Facebook'};?>"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="Google">Google +</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="Google"  name="Google" value="<?php echo $data->{'Google'};?>"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="Youtube">Youtube</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="Youtube"  name="Youtube" value="<?php echo $data->{'Youtube'};?>"/>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
                        
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Thông tin Bản quyền</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="GiayPhep">Giấy phép hoạt động</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="GiayPhep" name="GiayPhep" value="<?php echo $data->{'GiayPhep'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="GhiChu">Ghi chú</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="GhiChu" name="GhiChu" value="<?php echo $data->{'GhiChu'};?>"/>
                                            </div>
                                        </div> 
                                         
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                        
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Thông số</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="PhanTrang">Số tin hiển thị mỗi trang</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="PhanTrang" name="PhanTrang" value="<?php echo $data->{'PhanTrang'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="cache">Thời gian lưu trữ bộ nhớ đệm</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="cache" name="cache" value="<?php echo $data->{'cache'};?>"/>
                                            </div>
                                        </div> 
                                        
                                        
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">MAIN BANNER</h2>
                            <div class="actions panel_actions pull-right">
                                <i class="box_toggle fa fa-chevron-down"></i> 
                                <i class="box_close fa fa-times"></i>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">                                                    
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-label" for="MainBanner">Nhập tọa độ trên Google map</label> 
                                        <div class="form-group">
                                            <label class="form-label" for="x">Tọa độ X</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-sm"  id="x" name="toado_x" value="<?php echo $data->{'toado_x'};?>"/>
                                            </div>
                                            <label class="form-label" for="y">Tọa độ Y</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-sm"  id="y" name="toado_y" value="<?php echo $data->{'toado_y'};?>"/>
                                            </div>
                                        </div>
                                    </div>                                     
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                       <button class="btn btn-success btn-icon bottom15 pull-right" type="submit">
                            <i class="fa fa-save"></i> &nbsp; <span><?php echo $this->lang->line('lable_btnCapNhap');?></span>
                        </button>
                    </div>
                </div>
            </div>
                        
        </section>
    </section>
</form>
            <!-- END CONTENT -->