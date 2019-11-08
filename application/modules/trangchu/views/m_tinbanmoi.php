<?php
    $dulieu=$vip;
?>                               
<?php 
  if($dulieu==''){
    echo '<div class="note note-warning" style="margin:0px;margin-top: -10px;width:93.3%!important"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
    }
?>  
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
        <?php for($j=0; $j<count($dulieu); $j++) {?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $j; ?>" class=""></li>
        <?php }; ?>
    </ol> -->
    <div class="carousel-inner">
        <?php 
        $i=1;
        $xe_view='pr';
        if($dulieu) :
            foreach ($dulieu as $tintuc) :
            $c_HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);                                                        
            $link='/'.stripUnicode($c_HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$xe_view.$tintuc['IDMaTin'].'.html';
            include 'vip.php';  
        ?>
            <div class="carousel-item <?php echo ($i==1) ? "active" : "" ?>">
                <!-- <div class="thumb-wrapper" style="background: url(<?php //echo get_first_img($tintuc['AlbumAnh'],'624x476') ?>);background-size: cover;background-position: center;height: 300px"> -->
                    <div class="thumb-img">
                        <a href="<?php echo $link ?>"><img src="<?php echo get_first_img($tintuc['AlbumAnh'],'624x476') ?>" alt="" style="height: 200px;width: 100%"></a>
                    </div>
                    <div class="thumb-content">
                        <h4 class="ml-2" style="float: left; font-weight: 600;font-size: 16px;">
                            <?php echo ($tintuc['GiaTien']==0?'': $tintuc['GiaTien'])?> <i><small class="small"><?=$tintuc['SoKM']?></small></i>
                        </h4>
                        <h4 class="mr-2" style="float: right;">
                            <?php echo $tintuc['NamSX'].' - '.$tintuc['DoiXe']; ?>
                        </h4>
                        <div class="huu_desc">
                            <p class="pt-2" style="clear:both; font-weight: 600">
                                <i class="i_h fas fa-home"></i> <a href="<?php echo $link ?>" class="text-white"><span><?php echo $tintuc['TieuDe']; ?></span></a>
                            </p>
                            <p>
                                <span><i class="i_op fas fa-caret-right"></i> Mặt tiền:</span> <span class="t_op"><?php if($tintuc['HopSo']!=''){ echo $tintuc['HopSo'].'m';}?></span>, đường vào: <span class="t_op"><?php if($tintuc['DanDong']!=''){echo $tintuc['DanDong'].'m';} ?></span>
                            </p>
                            <p>
                                <span><i class="i_op fas fa-caret-right"></i> Diện tích nhà:</span> <span class="t_op"><?php echo $tintuc['NgoaiThat'].'m² x'.$tintuc['</span>NhienLieu'].' tầng'; ?></span>
                            </p>
                            <p>
                                <span><i class="i_op fas fa-caret-right"></i> Hướng:</span> <span class="t_op"><?php echo $tintuc['NoiThat']; ?></span>
                            </p>
                            <p style="text-align: center; font-style: italic;">
                                <span style="float: left;"><i class="i_ft fas fa-bed"></i>
                                    <?php echo $tintuc['HeThongNapNhienLieu'] ?>
                                </span>
                                <span style="clear: both;"><i class="i_ft fas fa-bath"></i>
                                    <?php echo $tintuc['MucTieuThu'] ?>
                                </span> 
                                <span style="float: right;"><i class="i_ft fas fa-location-arrow"></i>
                                    <?php echo $tintuc['NoiThat'] ?>
                                </span>   
                            </p>
                            <span class="date" style="font-size: 11px;">
                                <i>Ngày đăng: <?php echo date('d/m/Y',strtotime($tintuc['NgayDang'])) ?></i>
                            </span>   
                        </div>    
                    </div>    
                <!-- </div>     -->
            </div>
        <?php $i++;  ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>
<!--     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> -->
</div>
<script src="/style/mobile/js/jquery.touchSwipe.min.js"></script>
<script>
$("#myCarousel").swipe({

  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});
</script>
