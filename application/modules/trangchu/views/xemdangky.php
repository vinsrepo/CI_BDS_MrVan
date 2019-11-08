<?
$region=$_GET["region"];
$exregion=explode('-',$region);
$exregion[end(array_keys($exregion))]=end($exregion)-1;
$exregion=implode('-',$exregion); 
?>
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
<form method="POST" action="/trangchu/quanlydangky/true/1?region=12-3" style="display: none;" id="formID">
<input class="  "  type="checkbox" name="XoaDuLieu[]" value="<?php echo $info['ID']; ?>" id="Xoa<?php echo $info['ID']; ?>">
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
                                                        <h3 class="">Xem thông tin đăng ký: </h3>
                                                    </div>

                                                    <div class="pull-right">
                                                        <button class="btn btn-default btn-icon" onclick="window.location='/email/guiemail/replymail/?addmail=<?php echo $info['txtEmailRegister']; ?>'" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Trả lời" data-placement="top">
                                                            <i class="fa fa-reply icon-xs"></i>
                                                        </button> 
                                                        <button onclick="Delete(<?php echo $info['ID']; ?>)" class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Xóa" data-placement="top">
                                                            <i class="fa fa-trash-o icon-xs"></i>
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="col-md-12  col-sm-12 col-xs-12 mail_view_info">

                                                    <div class="pull-left">
                                                        <span class=""><strong><?php echo $info['txtEmailRegister']; ?></strong>  </span>
                                                         
                                                    </div>

                                                    <div class="pull-right">
                                                        <span class="msg_ts text-muted"><?php echo date("H:i d-m-Y", strtotime($info['NgayGui'])); ?></span>
                                                    </div>

                                                </div>



                                                <div class="col-md-12  col-sm-12 col-xs-12 mail_view">
                                                    <table class="table table-striped">
                                          
                                            <tbody>
                                                <tr> 
                                                    <td>Loại nhà đất</td>
                                                    <td><?php $HangXe=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$info['hddECate']); echo $HangXe['TieuDe']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Tỉnh/Thành Phố</td>
                                                    <td><?php echo $info['hddECity']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Quận/Huyện</td>
                                                    <td><?php echo $info['hddEDist']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Diện tích</td>
                                                    <td><?php echo $info['hddEArea']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Mức giá</td>
                                                    <td><?php echo $info['hddEPrice']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Đơn vị tính</td>
                                                    <td><?php echo $info['dvtEPrice']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Phường/Xã</td>
                                                    <td><?php echo $info['hddEWard']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Đường/Phố</td>
                                                    <td><?php echo $info['hddEStreet']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Số phòng ngủ</td>
                                                    <td><?php echo $info['hddERoom']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Hướng nhà</td>
                                                    <td><?php echo $info['hddEDirection']; ?></td> 
                                                </tr>
                                                <tr> 
                                                    <td>Dự án</td>
                                                    <td><?php echo $info['hddEProject']; ?></td> 
                                                </tr> 
                                            </tbody>
                                        </table>
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
