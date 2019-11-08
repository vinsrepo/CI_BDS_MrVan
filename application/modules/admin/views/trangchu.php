<?
function getSymbolByQuantity($bytes) {
    $symbols = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $exp = floor(log($bytes)/log(1024));

    return sprintf('%.2f '.$symbols[$exp], ($bytes/pow(1024, floor($exp))));
}
//
?>
            
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 0px;padding-bottom: 0px;">
                        <div class="page-title">

                            <div >
                                <h1 class="title" style="font-size: 30px;text-align: center;">Trang quản trị</h1>                            

                            </div>


                        </div>
                    </div>
                      <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">
                            
                            
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-edit icon-md icon-rounded icon-success'></i>
                                            <div class="stats">
                                                <h4><strong><? echo Modules::run('trangchu/totalRows','tinban',array());?></strong></h4>
                                                <span>Tin rao</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-users icon-md icon-rounded icon-success'></i>
                                            <div class="stats">
                                                <h4><strong><? echo Modules::run('trangchu/totalRows','thanhvien',array());?></strong></h4>
                                                <span>Thành viên</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-bar-chart icon-md icon-rounded icon-success'></i>
                                            <div class="stats">
                                                <h4><strong><? echo Modules::run('trangchu/totalRows','truycap',array());?></strong></h4>
                                                <span>Lượt truy cập</span>
                                            </div>
                                        </div>
                                    </div>
                                   <!--  <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-newspaper-o icon-md icon-rounded icon-success'></i>
                                            <div class="stats">
                                                <h4><strong><? //echo Modules::run('trangchu/totalRows','baiviet',array('Loai IN(\'TinTuc\',\'TuVanXe\',\'SoSanhXe\',\'DanhGiaXe\',\'KinhNghiem\') and IDBaiViet !='=>''));?></strong></h4>
                                                <span>Bài viết & tin tức</span>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                </div> <!-- End .row -->	



                                <div class="row">

                                  
                                    <div class="col-md-9 col-sm-7 col-xs-12">
                                        <div class="r1_maingraph db_box">
                                            <span class='pull-left'>
                                                <i class='icon-success fa fa-square icon-xs'></i>&nbsp;<small>Lượt xem</small>&nbsp; &nbsp;<i class='fa fa-square icon-xs icon-primary'></i>&nbsp;<small>Lượt truy cập</small>
                                            </span>
                                            <span class='pull-right switch'>
                                                <i class='icon-default fa fa-line-chart icon-xs'></i>&nbsp; &nbsp; 
                                            </span>

                                            <div id="db_morris_line_graph" style="height:272px;width:100%;"></div>
                                            <div id="db_morris_area_graph" style="height:272px;width:90%;display:none;"></div>
                                            <div id="db_morris_bar_graph" style="height:272px;width:90%;display:none;"></div>
                                            <div style="display: block;padding-top: 25px;font-weight: bold;text-align: center;">Biểu dồ thông kê lưu lượng truy cập và lượt xem 10 ngày gần nhất</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="r1_graph4 db_box">
                                            <span class=''>
                                                <i class='icon-success fa fa-square icon-xs icon-1'></i>&nbsp;<small>SỐ DUNG LƯỢNG CPU ĐÃ SỬ DỤNG</small>
                                            </span>
                                            <canvas width='180' height='90' id="gauge-meter"></canvas>
                                            <h4 id='gauge-meter-text'></h4>
                                        </div>
                                        <div class="r1_graph5 db_box col-xs-6">
                                        <?
                                        $total_space=disk_total_space($this->config->item('disk'));
                                                $total_free=disk_free_space($this->config->item('disk'));
                                                ?>
                                            <span class=''><i class='icon-success fa fa-square icon-xs icon-1'></i>&nbsp;<small>Đã dùng: <? echo getSymbolByQuantity(($total_space-$total_free));?></small>&nbsp; &nbsp;<i class='fa fa-square icon-xs icon-2'></i>&nbsp;<small>Còn: <? echo getSymbolByQuantity(($total_free));?></small></span>
                                            <div style="width:120px;height:120px;margin: 0 auto;">
                                                <span class="db_easypiechart1 easypiechart" data-percent="<? 
                                                
                                                echo (($total_space-$total_free)/$total_space)*100;?>"><span class="percent" style='line-height:120px;'></span></span>
                                            </div>
                                        </div>

                                    </div>

                                </div> <!-- End .row -->


                                
 

                            </div>
                        </section></div>



                </section>
            </section>
            <!-- END CONTENT -->
            