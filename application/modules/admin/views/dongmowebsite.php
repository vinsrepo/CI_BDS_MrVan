 
<script type="text/javascript" src="/asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/asset/ckfinder/ckfinder.js"></script>
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
                                <h2 class="title pull-left"><?php echo $this->lang->line('title_DongMoWebsite');?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                            
                            <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label class="form-label" for="TieuDe"><?php echo $this->lang->line('lable_TrangThai');?></label> 
                                            <div class="controls">
                                                <select name="TrangThai" class="form-control input-lg">
                       <option value="0" <?php if($site['TrangThai']=='0'){ echo "selected";}?>><?php echo $this->lang->line('lable_DangHoatDong');?></option>
                       <option value="1" <?php if($site['TrangThai']=='1'){ echo "selected";}?>><?php echo $this->lang->line('lable_TamDung');?></option>
                   </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <label class="form-label" for="TieuDe"><?php echo $this->lang->line('lable_TieuDe');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" name="TieuDe" id="TieuDe" value="<?php if(isset($site['TieuDe'])){echo $site['TieuDe'];}else{echo set_value('TieuDe');}?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                 
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        
                                        
                                        
                                          
                                        <div class="form-group">  
                                            <div class="controls">
                                                <?php
         
        if(isset($site['TieuDe'])){
            $NoiDung=$site['GiaTri'];
        }else{
            $NoiDung=set_value('NoiDung');
        }
        echo $this->ckeditor->editor("ThongBao",html_entity_decode($NoiDung)); 
        
         
        ?>
                                            </div>
                                        </div> 

                                         
                                        
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