<div id="ContentPlaceHolder1_pnProduct">	
<? 
$dulieu=$vip;
?>                               
<?php 
  if($dulieu==''){
    echo '<div class="note note-warning" style="margin:0px;margin-top: -10px;width:93.3%!important"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
    }
?>   
    <div id="myCarousel" class="carousel slide multi-item-carousel" data-ride="carousel" data-interval="7000">
        <div class="carousel-inner" role="listbox">
            <?php
                $i = 4; //set 4 items
                $xe_view='pr';               
                if($dulieu) :
                    $chunks = array_chunk($dulieu, $i);
                    $html = "";
                    foreach($chunks as $chunk):
                        // Sets as 'active' the first item
                        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
                            $html .= '<div class="item carousel-item '.$active.'"><div class="row">';
                            foreach($chunk as $tintuc):
                                $c_HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);                                                        
                                $link='/'.stripUnicode($c_HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$xe_view.$tintuc['IDMaTin'].'.html';
                                include 'vip.php';
                                $html .= '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 pop" data-container="body" data-toggle="popover" data-placement="top" data-content=" 
                                        <p><b>'.$tintuc['TieuDe'].'</b></p> 
                                        <p><b>Mô tả</b>: <i>'.word_limiter($tintuc['ThongTinMota'], 40).'</i></p>
                                        <p><b>Địa chỉ</b>: <i>'.$tintuc['DongXe'].'</i></p>
                                        <p><b>Gia chủ</b>: <i>'.$tintuc['HoVaTen'].'</i></p>
                                        <p><b>Điện thoại</b>: <i>'.$tintuc['DienThoai'].'</i></p>
                                    ">';
                                    $html .= '<div class="thumb-wrapper">';
                                        $html .= '<div class="img-box">';
                                            $html .= '<a href="'.$link.'">';
                                                $html.= '<img id="ContentPlaceHolder1_ProductSearchResult1_rpProductList_imgAvatar_0" title="'.$tintuc['TieuDe'].'" 
                                                src="'.get_first_img($tintuc['AlbumAnh'],'624x476').'" class="img-responsive img-fluid" alt="'.$tintuc['TieuDe'].'">';
                                            $html .= '</a>';
                                        $html .= '</div>';
                                        $html .= '<div class="thumb-content">';
                                            $html .= '<h4 class="text-dark ml-2" style="float: left; font-weight: 600">';
                                                $html .= ($tintuc['GiaTien']==0?'':$tintuc['GiaTien']);
                                                $html .= '<i><small class="small">'.$tintuc['SoKM'].'</small></i>';    
                                            $html .= '</h4>';

                                            $html .= '<h4 class="text-success mr-2" style="float: right; letter-spacing: -1px">';
                                                $html .=$tintuc['NamSX'].' - '.$tintuc['DoiXe'];   
                                            $html .= '</h4>';

                                            $html .= '<div class="huu_desc">';
                                                $html .= '<p class="'.$divType.'" style="clear:both; font-weight: 600">';
                                                    $html .= $tintuc['TieuDe'];
                                                $html .= '</p>';

                                                $html .= '<p>';
                                                    $html .= 'Mặt tiền: ';
                                                    if($tintuc['HopSo']!=''){$html .= $tintuc['HopSo'].'m';}
                                                    $html .= ', đường vào: ';
                                                    if($tintuc['DanDong']!=''){$html .= $tintuc['DanDong'].'m';}
                                                $html .= '</p>';

                                                $html .= '<p>';
                                                    $html .= 'Diện tích nhà: ';
                                                    $html .= $tintuc['NgoaiThat'].'m² x'.$tintuc['NhienLieu'].' tầng';                                              
                                                $html .= '</p>';

                                                $html .= '<p>';
                                                    $html .= 'Hướng: ';
                                                    $html .= $tintuc['NoiThat'];                                              
                                                $html .= '</p>';

                                                $html .= '<p style="text-align: center; font-style: italic;">';
                                                    $html .= '<span style="float: left;"><i class="fas fa-bed"></i>'.' '.$tintuc['HeThongNapNhienLieu'].'</span>';
                                                    $html .= '<span style="clear: both;"><i class="fas fa-bath"></i>'.' '.$tintuc['MucTieuThu'].'</span>';
                                                    $html .= '<span style="float: right;"><i class="fas fa-location-arrow"></i>'.' '.$tintuc['NoiThat'].'</span>';
                                                $html .= '</p>';

                                                $html .= '<span class="date text-danger">';
                                                    $html .= 'Ngày đăng: '.date('d/m/Y',strtotime($tintuc['NgayDang']));
                                                $html .= '</span>';
                                            $html .= '</div>';
                                        $html .= '</div>';
                                    $html .= '</div>';
                                $html .= '</div>';
                            endforeach;
                            $html .= '</div></div>';                         
                    endforeach;
                    echo $html;
                endif;
            ?>                                                                                            
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div> 
<script>
    $(".pop").popover({ 
        trigger: "manual" , 
        html: true, 
        animation:false,
    })
    .on("mouseenter", function () {
        var _this = this;
        $(this).popover("show");
        $(".popover").on("mouseleave", function () {
            $(_this).popover('hide');
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide");
            }
        }, 300);
});
</script>