 
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
                                <h2 class="title pull-left">Phân quyền quản trị cho <b style="color: blue;"><? echo $username;?></b>:</h2>
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
                                            <label class="form-label" for="permission"><?php echo $this->lang->line('lable_ChucVu');?> </label> 
                                            <div class="controls">
                                                <select name="permission" id="permission" class="form-control input-lg m-bot15">
                    <option value="1" <?php if(isset($permission)&&($permission=='1')){ echo "selected";} ?> >Quyền điều hành như ADMIN</option>
             <option value="0" <?php if(isset($permission)&&($permission=='0')){ echo "selected";} ?> >Thành viên thường</option> 
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