 
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
                        <section class="box">
                            <header class="panel_header"> 
                            </header>
                            <div class="content-body">
                            
                            <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label class="form-label" for="solandangtin"><?php echo $this->lang->line('lable_solandangtin');?></label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg"  id="solandangtin" name="solandangtin" value="<?php echo $data->{'solandangtin'};?>">
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label class="form-label" for="solanuptin"><?php echo $this->lang->line('lable_solanuptin');?></label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="solanuptin" name="solanuptin" value="<?php echo $data->{'solanuptin'};?>">
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label class="form-label" for="price"><?php echo $this->lang->line('lable_price');?></label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" id="price" name="price" value="<?php echo $data->{'price'};?>">
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