<form action="#" method="post" class="form">
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                      <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?>
                                    </div>
                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">

                                    <div class="col-md-3 col-sm-4 col-xs-12">


                                        <a class="btn btn-primary btn-block" href='/email/guiemail?region=10-1'>Gửi thư mới</a>

                                        <ul class="list-unstyled mail_tabs">
                                            <li class="">
                                                <a href="/lienhe/quanlylienhe/true/1?region=12-1">
                                                    <i class="fa fa-envelope"></i> Liên hệ <span class="badge badge-primary pull-right">6</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/dangtin/quanlytinnhan/true/1?region=12-2">
                                                    <i class="fa fa-comments"></i> Tin nhắn <span class="badge badge-orange pull-right">2</span>
                                                </a>
                                            </li> 
                                            <li class="">
                                                <a href="/dangtin/quanlytinnhan/true/1?region=12-2">
                                                    <i class="fa fa-edit"></i> Email đăng ký  <span class="badge badge-orange pull-right">2</span>
                                                </a>
                                            </li> 
                                            <li class="active">
                                                <a href="/email/guiemail?region=10-1">
                                                    <i class="fa fa-send-o"></i> Gửi thư mới
                                                </a>
                                            </li>
                                            
                                        </ul>

                                    </div>

                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <div class="mail_content">

                                            <div class="row"> 

                                                 

                                                <div class="col-md-12 col-sm-12 col-xs-12 mail_view_info">

                                                    <div class="form-group mail_cc_bcc">
                                                        <label class="form-label" for="Email">Gửi đến:</label>
                                                        <span class="desc" style="font-weight: bold;font-size: 16px;"></span> 
                                                        <div class="controls">
                                                            <input type="text" placeholder="Nhập tên thành viên hoặc địa chỉ email, nếu bỏ trống ô này thì mặc định hệ thống sẽ gửi cho tất cả thành viên" id="Email" name="Email" class="form-control " value="<? if(!isset($addmail)){$display='';$email='';$check='';echo $_POST['Email'];?><?}else{$display=' style="display: none;"';$email=$addmail;$check='checked=""';?><? echo $addmail;?> <?}?>" />
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <label class="form-label" for="TieuDe"><?php echo $this->lang->line('lable_TieuDe');?>:</label> 
                                                        <div class="controls">
                                                            <input name="TieuDe" id="TieuDe" type="text" class="form-control" value="<? echo $_POST['TieuDe'];?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label" for="NoiDung"><?php echo $this->lang->line('lable_NoiDung');?>:</label>
                                                        <textarea class="mail-compose-editor" id="NoiDung" name="NoiDung" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 23px;padding:15px;"><? echo $_POST['NoiDung'];?></textarea>
                                                    </div>



                                                </div>





                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <div class='pull-left'>
                                                        <button class="btn btn-primary" type="submit" style="text-transform: uppercase;">
                                                            <i class="fa fa-paper-plane-o icon-xs"></i> &nbsp; <?php echo $this->lang->line('lable_Send');?>
                                                        </button> 
                                                    </div>

                                                </div>


<input type="hidden" name="token" value="1" />


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->
</form>