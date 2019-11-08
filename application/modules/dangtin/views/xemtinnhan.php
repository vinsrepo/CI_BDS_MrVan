<?
$region=$_GET["region"];
$exregion=explode('-',$region);
$exregion[end(array_keys($exregion))]=end($exregion)-1;
$exregion=implode('-',$exregion); 
?>
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
<form method="POST" action="/dangtin/quanlytinnhan/true/1?region=12-2" style="display: none;" id="formID">
<input class="  "  type="checkbox" name="XoaDuLieu[]" value="<?php echo $info['IDMaTin']; ?>" id="Xoa<?php echo $info['IDMaTin']; ?>">
</form>
                     

                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">

                                    <div class="col-md-3 col-sm-4 col-xs-12">
<? include APPPATH.'modules/lienhe/views/left_tab.php'; ?>

                                    </div>

                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <div class="mail_content">

                                            <div class="row"> 

                                                <div class="col-md-12  col-sm-12 col-xs-12  ">

                                                    <div class="pull-left">
                                                        <h3 class="">Xem tin nhắn: </h3>
                                                    </div>

                                                    <div class="pull-right">
                                                        <button class="btn btn-default btn-icon" onclick="window.location='/email/guiemail/replymail/?addmail=<?php echo $info['email']; ?>'" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Trả lời" data-placement="top">
                                                            <i class="fa fa-reply icon-xs"></i>
                                                        </button> 
                                                        <button onclick="Delete(<?php echo $info['IDMaTin']; ?>)" class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Xóa" data-placement="top">
                                                            <i class="fa fa-trash-o icon-xs"></i>
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="col-md-12  col-sm-12 col-xs-12 mail_view_info">

                                                    <div class="pull-left">
                                                        <span class=""><strong><?php echo $info['fullname']; ?></strong> (<?php echo $info['email']; ?>)  </span>
                                                        
                                                        <div><?php echo $this->lang->line('lable_mobile');?>: <?php echo $info['mobile']; ?></div>
                                                    </div>

                                                    <div class="pull-right">
                                                        <span class="msg_ts text-muted"><?php echo date("H:i d-m-Y", strtotime($info['NgayGui'])); ?></span>
                                                    </div>

                                                </div>



                                                <div class="col-md-12  col-sm-12 col-xs-12 mail_view">
                                                    <?php echo $info['content']; ?>
                                                </div>
 
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->
